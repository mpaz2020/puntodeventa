<?php

namespace App\Http\Controllers;

use App\Client;
use App\Sale;
use App\Product;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use App\Printer as Impresora;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:sales.create')->only(['create','store']);
        $this->middleware('can:sales.index')->only(['index']);
        $this->middleware('can:sales.show')->only(['show']);
        $this->middleware('can:sales.pdf')->only(['pdf']);
        $this->middleware('can:sales.print')->only(['print']);
        $this->middleware('can:sales.change.status')->only(['change_status']);
    }

    public function index()
    {
        $sales = Sale::get();

        return view('admin.Sale.index', compact('sales'));
    }


    public function create()
    {
        $clients = Client::get();
        $products = Product::get();

        return view('admin.sale.create', compact('clients', 'products'));
    }


    public function store(StoreRequest $request)
    {
        $sale = Sale::create($request->all() + ['user_id' => Auth::user()->id, 'sale_date' => Carbon::now('America/Lima')]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array(
                "product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key],
                "price" => $request->price[$key],
                "discount" => $request->discount[$key]
            );
        }
        $sale->saleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }


    public function show(Sale $sale)
    {
        $subtotal = 0;

        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }

        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }


    public function edit(Sale $sale)
    {
        // $clients=Client::get();

        // return view('admin.sale.edit', compact('sale','clients'));
    }

    public function update(UpdateRequest $request, Sale $sale)
    {
        // $Sale->update($request->all());

        // return redirect()->route('sales.index');
    }


    public function destroy(Sale $sale)
    {
        // $Sale->delete();

        // return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;

        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'saleDetails', 'subtotal'));

        return $pdf->download(time() . '_Reporte_de_venta' . $sale->id . '.pdf');
    }

    public function print(Sale $sale)
    {
        try {

            $subtotal = 0;
            $saleDetails = $sale->saleDetails;

            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
            }

            $impresora=Impresora::all()[0];

            $connector = new WindowsPrintConnector($impresora->name);
            $printer = new Printer($connector);

            $printer->text("Hello World!\n");

            $printer->cut();
            $printer->close();
            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status==='VALID') {
            $sale->update(['status'=>'CANCELED']);
        } else {
            $sale->update(['status'=>'VALID']);
        }
        return redirect()->back();
    }
}
