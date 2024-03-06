<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\CatController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // 1.預設近來是到welcome
    // return view('welcome');

    // 2.redirect 設定直接進哪個頁面
    return redirect('/cats');
});
// 1.網址輸入localhost/dogs執行 DogController
Route::resource('dogs', DogController::class);
Route::resource('cats', CatController::class);
// 2.在CatController自定義function，如何連結到自定義的function輸入cats_excel
// 做連結要指定->name cats代表controller ，.excel是controller裡定義的excel function
Route::get('cats_excel', [CatController::class, 'excel'])->name('cats.excel');

// 已製作views/layouts，測試進到child顯示什麼
Route::get('/', function () {
    // 1.預設進到child
    return view('child');

    // 2.redirect 設定直接進哪個頁面
    // return redirect('/cats');
});
