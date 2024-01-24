<?php
use Illuminate\Http\Request;

use App\Models\Slide;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;



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

Route::get('/', function () {
    $slides = Slide::take(3)->get();
    $products = Product::take(3)->get();
    return view('home', [
        'slides' => $slides,
        'products' => $products,
    ]);
})->name('home');

Route::get('/shop', function (Request $request) {
    $products = Product::paginate(12);

    if(isset($request->search) && strlen($request->search) > 1){
        $products = Product::where('name' , 'LIKE' , '%' . $request->search . '%')->paginate(12);
    }

    if(isset($request->sort) && !empty($request->sort)){
        
        $sort_parts = explode("_", $request->sort);
        $column = $sort_parts[0];
        $value = $sort_parts[1];
        
        if($column === 'name'){
        $products = Product::orderBy('name', $value)->paginate(12);

        }elseif($column === 'price'){
        $products = Product::orderBy('price', $value)->paginate(12);

        }
    }
    return view('shop',[
        'products' => $products
    ]);
})->name('shop');



Route::resource('slides', SlidesController::class)->middleware('role:admin');
// Route::resource('products', ProductsController::class)->middleware('role:admin');
Route::resource('products', ProductsController::class);
Route::get('/products/{product}', 'ProductsController@show')->name('products.show');


Route::resource('orders', OrdersController::class)->only(['index', 'destroy']);


Route::get('/cart',[CartController::class ,'index'])->name('cart.index');
Route::post('/cart/{product}/add', [CartController::class,'add'])->name('cart.add');
Route::get('/cart/{item}/inc', [CartController::class,'inc'])->name('cart.inc');

Route::get('/cart/{item}/dec', [CartController::class,'dec'])->name('cart.dec');
Route::post('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(!Auth::user()->hasRole('admin')){
            $orders = Order::where('user_id', Auth::id())->count();
            }else{
                $orders = Order::count();
            }


        return view('dashboard',[
            'slides'=> Slide::count(),
            'products'=> Product::count(),
            'orders'=>$orders
        ]);
    })->name('dashboard');
});
