<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $compras=DB::select('SELECT monthname(c.purchase_date) AS mes, SUM(c.total) AS total FROM purchases c WHERE c.status="VALID" GROUP BY monthname(c.purchase_date) ORDER BY MONTHNAME(c.purchase_date) DESC LIMIT 12');

        $ventas=DB::select('SELECT monthname(v.sale_date) AS mes, SUM(v.total) AS total FROM sales v WHERE v.status="VALID" GROUP BY monthname(v.sale_date) ORDER BY MONTHNAME(v.sale_date) DESC LIMIT 12');

        $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") AS dia, SUM(v.total) AS total FROM sales v WHERE v.status="VALID" GROUP BY v.sale_date ORDER BY DAY(v.sale_date) DESC LIMIT 15');

        $totales=DB::select('SELECT (SELECT IFNULL(SUM(c.total),0) FROM purchases c WHERE c.status="VALID" AND DATE(c.purchase_date)=CURDATE()) AS totalcompra, (SELECT IFNULL(SUM(v.total),0) FROM sales v WHERE v.status="VALID" AND DATE(v.sale_date)=CURDATE()) AS totalventa');

        $productosvendidos=DB::select('SELECT p.code AS code, SUM(dv.quantity) AS quantity, p.name AS name, p.id AS id, p.stock AS stock FROM products p
        INNER JOIN sale_details dv ON p.id=dv.product_id
        INNER JOIN sales v ON dv.sale_id=v.id
        WHERE v.status="VALID"
        AND YEAR(v.sale_date)=YEAR(CURDATE())
        GROUP BY p.code, p.name, p.id, p.stock ORDER BY SUM(dv.quantity) DESC LIMIT 10');

        return view('home', compact('compras','ventas','ventasdia','totales','productosvendidos'));
    }
}
