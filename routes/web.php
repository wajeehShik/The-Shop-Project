<?php

use App\Http\Controllers\Front\CardController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\ContactusController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\PorudctsController;
use App\Http\Controllers\Front\ProudctsController;
use App\Http\Controllers\Front\RattingController;
use App\Http\Controllers\Front\ShopsController;
use App\Http\Controllers\TestController;
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
Route::get('/test',[TestController::class,'index']);
Route::get('/', [HomeController::class,'index'])->name('home');

Route::group(['as'=>'front.'],function(){
Route::get('/about_us', [HomeController::class,'about_us'])->name('about_us');
Route::get('/faqs',[FaqController::class,'show'])->name('faqs');
Route::get('/contact-us',[ContactusController::class,'index'])->name('contact_us');
Route::post('/contact-us',[ContactusController::class,'store'])->name('contact_us');

Route::get('/products',[ProudctsController::class,'index'])->name('products');
Route::get('/product/{slug}',[ProudctsController::class,'show'])->name('products.show');
Route::get('/products/{category}', [ProudctsController::class, 'category'])->name('products.category');
Route::get('/products/tags/{slug}', [ProudctsController::class, 'tags'])->name('products.tags');
Route::get('/shops-list',[ShopsController::class,'show_shop_list'])->name('shop_list');

Route::get("/card",[CardController::class,'index'])->name('card');
Route::put("/card/{id}",[CardController::class,'update'])->name('card.update');
Route::delete("/card/{id}",[CardController::class,'destroy'])->name('card.delete');
Route::post("/add_card/{id}",[CardController::class,'store'])->name('card.add');

Route::get('checkout', [CheckoutController::class, 'create'])->middleware('auth')->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store'])->middleware('auth')->name("checkout");
 Route::get('orders',[OrderController::class,'index'])->middleware('auth')->name("orders");
 Route::post('ratting',[RattingController::class,'store'])->name('ratting');
 

});
// Route::get('orders/{order}/pay', [PaymentsController::class, 'create'])
//     ->name('orders.payments.create');
//     Route::post('orders/{order}/pay', [PaymentsController::class, 'store'])
//     ->name('orders.payments.create');

//  Route::post('search',[SearchController::class,'index'])->name('search');

require __DIR__ . '/auth.php';
