<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('trangchu',[
    'as'=>'trang-chu',
    'uses'=>'PageCT@getTrangChu'
]);
Route::get('giohang/{id_sach}', [
    'as'=>'gio-hang',
    'uses'=>'PageCT@getGioHang'
]);
Route::get('notidathang', [
    'as'=>'noti-dat-hang',
    'uses'=>'PageCT@notidathang'
]);
