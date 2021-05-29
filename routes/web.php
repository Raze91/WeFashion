<?php

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
// Appelle la méthode index du FrontController lorque l'on se trouve à la racine du site
Route::get('/', 'FrontController@index');

// Appelle la méthode showDiscount du FrontController lorsque l'on se trouve à l'url /soldes
Route::get('/soldes', 'FrontController@showDiscount');

// Appelle la méthode show du FrontController lorque l'on se trouve sur l'url d'un produit précis
Route::get('product/{id}', 'FrontController@show')->where(['id' => '[0-9]+']);

// Appelle la méthode showCategories lorsque l'on se trouve sur l'url d'une categorie precise
Route::get('category/{id}', 'FrontController@showCategories')->where(['id' => '[0-9]+']);

// Appelle la méthode index de l'HomeController lorsque l'on se trouve à l'url /home
Route::get('/home', 'HomeController@index')->name('home');

// Active l'authentification
Auth::routes();

// Vérifie si le compte utilisé possède la bonne élévation, ici un admin
Route::middleware(['auth', 'checkElevation'])->group(function () {
    // Appelle le controlleur de ressource ProductController lorsque l'on se trouve à l'url admin/product
    Route::resource('admin/product', 'ProductController');
    // Appelle le controlleur de ressource CategoryController lorsque l'on se trouve à l'url admin/category
    Route::resource('admin/category', 'CategoryController');
});