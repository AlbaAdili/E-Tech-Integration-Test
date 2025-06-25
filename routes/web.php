<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsletterController;

Route::resource('home', HomeController::class);
Route::resource('about', AboutController::class);
Route::resource('product', ProductController::class);
Route::resource('faqs', FaqsController::class);
Route::resource('contact', ContactController::class);
Route::resource('order', OrderController::class);
Route::resource('newsletter', NewsletterController::class);

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store')->middleware('admin');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('admin');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit')->middleware('admin');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destory')->middleware('admin');
Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/shopping-cart', [ProductController::class, 'cart'])->name('product.cart')->middleware('auth');
Route::get('/book/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart')->middleware('auth');
Route::patch('/update-shopping-cart', [ProductController::class, 'updateCart'])->name('product.updateCart')->middleware('auth');
Route::delete('/delete-cart-product', [ProductController::class, 'deleteFromCart'])->name('product.deleteFromCart')->middleware('auth');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('product.checkout')->middleware('auth');
Route::post('/checkout', [ProductController::class, 'processCheckout'])->name('product.processCheckout')->middleware('auth');
Route::get('/order-confirmation', [ProductController::class, 'orderConfirmation'])->name('product.orderConfirmation')->middleware('auth');
Route::get('/shop/{category?}', [ProductController::class, 'index'])->name('shop');

Route::get('/faqs', [FaqsController::class, 'index'])->name('faqs.index');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy')->middleware('admin');
Route::post('/contacts/search', [ContactController::class, 'search'])->name('contact.search');

Route::get('/orders', [OrderController::class, 'index'])->name('order.index')->middleware('auth');

Route::post('/subscribe/newsletter', [NewsletterController::class, 'subscribe'])->name('subscribe.newsletter');

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('/custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/signout', [CustomAuthController::class, 'signOutConfirmation'])->name('signout.confirmation')->middleware('auth');
Route::post('/custom-signout', [CustomAuthController::class, 'customSignOut'])->name('signout.custom')->middleware('auth');
