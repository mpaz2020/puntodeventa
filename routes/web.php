<?php

use App\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->names('purchases')->except(['edit','update','destroy']);
Route::resource('sales', 'SaleController')->names('sales')->except(['edit','update','destroy']);


Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');

Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::resource('printers', 'PrinterController')->names('printers')->only(['index','update']);

Route::resource('business', 'BusinessController')->names('business')->only(['index','update']);

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('purchases.upload');

//Route::get('sales/upload/{sale}', 'SaleController@upload')->name('purchases.upload');

Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('purchases.change.status');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('sales.change.status');
Route::get('change_status/products/{product}', 'ProductController@change_status')->name('products.change.status');

Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');

Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Route::get('/prueba', function () {
    return view('prueba');
});

// Route::get('/barcode', function () {
//     $products=Product::get();
//     return view('admin.product.barcode',compact('products'));
// });

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');
