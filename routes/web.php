<?php
use App\Mail\Coba;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;

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


// for backsoon or mainteance pages

// Route::get('/', function () {
//     return view('client.home.maintenance');
// });


// public or client

//  Route::get('/demo',[HomeController::class,'index'])->name('home');
//  Route::get('/demo/news/{slug}', 'App\Http\Controllers\Client\NewsController@detail');
//  Route::get('/demo/news', 'App\Http\Controllers\Client\NewsController@index');
//  Route::get('/demo/career','App\Http\Controllers\Client\CareerController@index');
 
 Route::get('/',[HomeController::class,'index'])->name('home');
 Route::get('/news/{slug}', 'App\Http\Controllers\Client\NewsController@detail');
 Route::get('/news', 'App\Http\Controllers\Client\NewsController@index');
 Route::get('/career','App\Http\Controllers\Client\CareerController@index');
 Route::get('/mail', function(){
    Mail::to('juandaent@gmail.com')->send(new Coba());
    return '<h1>Tes email</h1>';
});

//Route::post('/contact-form', [App\Http\Controllers\Clients\ContactController::class, 'storeContactForm'])->name('contact-form.store'); 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/privacy', function(){
    return view('client.privacy.index');
});


Route::get('/search/', [HomeController::class,'search'])->name('search');

//Route::get('/', [App\Http\Controllers\Web\HomeController::class]);

// Route::get('/', function () {
//     return view('frontend.home.details');
// });


// Route::get('/news-detail',function(){
//     return view('news.newsdetail');
// });

//Route::get('demo/news/business-visit-at-washington-d-c', function(){
//    return view('client.news.newsdetail1');
//});
//
//Route::get('demo/news/groundbreaking-ceremony-plant-2', function(){
//    return view('client.news.newsdetail2');
//});

// Route::get('/career', function(){
//     return view('frontend.career.index');
// });

// Route::get('/news', function(){
//     return view('frontend.news.newslist');
// });

//Route::get('/contact-form', [HomeController::class, 'storeContactForm']);
Route::post('/contact-form', [HomeController::class, 'storeContactForm'])->name('contact.us.store');

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {

   Artisan::call('optimize:clear');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/config-clear', function() {

   Artisan::call('config:clear');
    return '<h1>Clear Config cleared</h1>';
});



// admin for cms

Auth::routes();
Route::group(['prefix'=>'dashboard', 'middleware'=> ['web','auth']], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/delete', [\App\Http\Controllers\DashboardController::class, 'removeAll'])->name('dashboard.delete');
    //Slider
    Route::resource('/sliders', \App\Http\Controllers\SliderController::class);
    //categories
    Route::get('/categories/select', [\App\Http\Controllers\CategoryController::class, 'select'])->name('categories.select');
    Route::get('/categoriesproducts/select', [\App\Http\Controllers\CategoryProductsController::class, 'select'])->name('categoriesproducts.select');
    //categoories
    Route::resource('/categories', \App\Http\Controllers\CategoryController::class);
    Route::get('/posts/details/{id}', [\App\Http\Controllers\PostController::class, 'details'])->name('posts.details');
    Route::get('/posts/select/{postId}', [\App\Http\Controllers\PostController::class, 'select'])->name('posts.select');
    Route::get('/careers/search',[\App\Http\Controllers\CareerController::class, 'search'])->name('careers.search');
  
    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    
    Route::resource('/categoriesproducts', \App\Http\Controllers\CategoryProductsController::class);
    Route::resource('/products', \App\Http\Controllers\ProductsController::class);
    Route::resource('/postimages', \App\Http\Controllers\PostImagesController::class);
    Route::resource('/categoriesproductsimages', \App\Http\Controllers\CategoryProductsImagesController::class);
    Route::resource('/productimages', \App\Http\Controllers\ProductImagesController::class);
    Route::resource('/careers', \App\Http\Controllers\CareerController::class);
    Route::resource('/users', \App\Http\Controllers\UserController::class);
    
    Route::get('/contact/delete', [\App\Http\Controllers\ContactController::class, 'removeAll'])->name('contact.delete');
    //Route::get('/contact/export', [\App\Http\Controllers\ContactController::class, 'export'])->name('contact.export');
    Route::post('/contact/export', [\App\Http\Controllers\ContactController::class, 'export'])->name('contact.export');

        
    Route::resource('/contact', \App\Http\Controllers\ContactController::class);
    // file manager
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});

