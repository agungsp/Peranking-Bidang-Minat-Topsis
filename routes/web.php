<?php
use Intervention\Image\ImageManager;
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

// Route::get('/', function ()
// {
//     return view('phpinfo');
// });


Route::get('/', 'Home@index');

Route::get('/InputNilaiMK', 'InputNilaiMK@index');
Route::put('/InputNilaiMK', 'InputNilaiMK@insert');

Route::get('/InputNilaiKriteria', 'InputNilaiKriteria@index');
Route::put('/InputNilaiKriteria', 'InputNilaiKriteria@insert');

Route::get('/Hasil', 'Hasil@index');

Route::get('/Login', 'Login@index');
Route::put('/Login', 'Login@login');

Route::get('/Register', 'Register@index');
Route::put('/Register', 'Register@signup');

Route::get('/Logout', 'Login@out');

Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('public/' . $filename))->response();
});
