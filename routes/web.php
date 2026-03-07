<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use App\Services\ProductService;

Route::get('/', function () {
   return view('welcome', ['name' => 'Gonato-App']);  
   // return 'Hello World'; 
});

Route::get('/show-users', [UserController::class, 'show']);

Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

Route::get('/test-users', [UserController::class, 'index']);

Route::get('/test-facade', function (UserService $userService) {
    return Response::json($userService->listUsers());
    
});




Route::get('/post/{post}/comment/{comment}', function (string $postId, string $commentId){
    return "Post ID: " . $postId . "- Comment ID: " . $commentId;
});

Route::get('/post/{id}', function (string $id){
    return $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search){
    return $search;
})->where('search', '.*');

Route::get('/test/route/sample', function () {
    echo route('test-route');
})->name('test-route');

Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function (Request $request) {
       echo "First Route";
    });

    Route::get('route-middleware-group/second', function (Request $request) {
        echo "Second Route";
     });
});


//Route to Controller
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});


//CSRF

Route::get('/token', function (Request $request) {
    return View('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});


//middleware
Route::get('/users', [UserController::class, 'index']);

//Resource
Route::resource('products', ProductController::class);

//View
Route::get('/product-list', function (ProductService $productService) {
   $data ['products'] = $productService->listProducts();
   return view('products.list', $data);
});

