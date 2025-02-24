<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;

Route::get('/greeting', [WelcomeController::class, 'greeting']);


// Route::get('/greeting', function () {
//     return view('blog.hello', ['name' => 'Agna Putra']);
//     });

// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Agna']);
//     });
    
// Menghubungkan Controller dengan Route
// use App\Http\Controllers\UserController;

// Route::get('/users', [UserController::class, 'index']);

// use App\Http\Controllers\PhotoController;

// Route::resource('photos', PhotoController::class);

// Route::resource('photos', PhotoController::class)->only([
//     'index', 'show'
// ]);

// Route::resource('photos', PhotoController::class)->except([
//     'create', 'store', 'update', 'destroy'
// ]);



// // update routing for single action controller
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\ArticleController;

// Route::get('/a', HomeController::class);
// Route::get('/about', AboutController::class);
// Route::get('/articles/{id}', ArticleController::class);



// // Page controller
// // use App\Http\Controllers\PageController;

// // Route::get('/a', [PageController::class, 'index']);
// // Route::get('/about', [PageController::class, 'about']);
// // Route::get('/articles/{id}', [PageController::class, 'articles']);


// // Membuat Controller
// Route::get('/hello', [WelcomeController::class, 'hello']);


// // View Routes
// Route::view('/welcome', 'welcome');
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


// // Redirect Routes
// Route::redirect('/here', '/there');

// // Route Group dan Route Prefixes
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//     // Uses first & second middleware...
//     });
// Route::get('/user/profile', function () {
//     // Uses first & second middleware...
//     });
// });
// Route::domain('{account}.example.com')->group(function () {
//     Route::get('user/{id}', function ($account, $id) {
//         //
//     });
// });
// Route::middleware('auth')->group(function () {
//     Route::get('/user', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);
// });

// // Route Name
// Route::get('/user/profile', function() {
//     //
//    })->name('profile');


// // Optional Parameters
// Route::get('/user/{name?}', function ($name = 'Agna') {
//     return 'Nama saya ' . $name;
// });


// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

// // - Route Parameters
// Route::get('/articles/{id}', function ($id) {
//     return 'Halaman Artikel dengan ID ' . $id;
// });


// Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
//     return 'Pos ke-' . $postId . " Komentar ke -: " . $commentId;
// });


// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya '. $name;
// });

// // - Basic Routing 
// Route::get('/about', function () {
//     return '2341720065 - Agna Putra Prawira';
// });
 

// Route::get('/', function () {
//     return 'Welcome';
// });

// Route::get('/hello', function () {
//     return 'Hello World';
// });

// Route::get('/world', function () {
//     return 'World';
// }); 
