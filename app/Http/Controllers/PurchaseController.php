<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\Product;
use App\Provider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:purchases.create')->only(['create','store']);
        $this->middleware('can:purchases.index')->only(['index']);
        $this->middleware('can:purchases.show')->only(['show']);
        $this->middleware('can:purchases.pdf')->only(['pdf']);
        $this->middleware('can:purchases.upload')->only(['upload']);
        $this->middleware('can:purchases.change.status')->only(['change_status']);
    }

    public function index()
    {
        $purchases = Purchase::get();

        return view('admin.purchase.index', compact('purchases'));
    }


    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status','ACTIVE')->get();

        return view('admin.purchase.create', compact('providers', 'products'));
    }


    public function store(StoreRequest $request)
    {

        $purchase = Purchase::create($request->all() + ['user_id' => Auth::user()->id, 'purchase_date' => Carbon::now('America/Lima')]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array(
                "product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key],
                "price" => $request->price[$key]
            );
        }
        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }


    public function show(Purchase $purchase)
    {
        $subtotal = 0;

        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }


    public function edit(Purchase $purchase)
    {
        // $providers=Provider::get();

        // return view('admin.purchase.edit', compact('purchase','providers'));
    }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());

        // return redirect()->route('purchases.index');
    }


    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();

        // return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;

        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf =PDF::loadView('admin.purchase.pdf', compact('purchase', 'purchaseDetails', 'subtotal'));

        return $pdf->download(time().'_Reporte_de_compra'.$purchase->id.'.pdf');
    }

    public function upload(Request $request, Purchase $purchase)
    {
        // $purchase->update($request->all());

        // return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status==='VALID') {
            $purchase->update(['status'=>'CANCELED']);
        } else {
            $purchase->update(['status'=>'VALID']);
        }
        return redirect()->back();
    }
}
