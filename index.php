<?
require 'Core/autoloader.php';

use \Core\Route;

// Registration routes
Route::get('/', 'Comment', 'pageMain');

Route::post('/', 'Comment', 'getViewList');
Route::post('/Comment@add');

Route::dispatch($_SERVER['REQUEST_URI']);
