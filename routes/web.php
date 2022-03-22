<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KidController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PwdController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\QrcodeController;
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

Route::impersonate();

Route::get('/', function () {
    return redirect('/login');
});

// Route::get('/order', [OrderController::class, 'index'])->name('home');
// Route::get('/getDistrict/{id}',[OrderController::class, 'getDistrict']);
// Route::get('/getInfo/{info}',[OrderController::class, 'getInfo']);
// Route::get('/sendEmail',[OrderController::class, 'sendEmail']);
// Route::get('/testEmail',[OrderController::class, 'testEmail']);
// Route::post('/startOrder',[OrderController::class, 'store']);
// Route::get('/preview/{id}',[OrderController::class, 'previewOrder']);
// Route::get('/invoice/{id}',[OrderController::class, 'invoicePDF']);
// Route::get('/detail',[OrderController::class, 'detail']); 
// Route::get('/kid', [KidController::class, 'index']);

//Route::get('/testLink',[OrderController::class, 'testLink']);
// Route::get('/fileImportExport', [OrderController::class, 'fileImportExport']);
// Route::post('file-import', [OrderController::class, 'fileImport'])->name('file-import');
// Route::get('file-export', [OrderController::class, 'fileExport'])->name('file-export');

Auth::routes();

Route::any('/register', function() {
    return  view('auth.login');
});

// Route::get('/register', function() {
//     return redirect('/login');
// });

// Route::post('/register', function() {
//     return redirect('/login');
// });
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoice/{id}/edit', [InvoiceController::class, 'edit']);
    Route::post('/settle/{id}', [InvoiceController::class, 'settle']);
    Route::post('/cancel/{id}', [InvoiceController::class, 'cancelInvoice']);
    Route::post('/invoice/{id}', [InvoiceController::class, 'update']);
    Route::get('/changePwd/{id}', [PwdController::class, 'edit']);
    Route::post('/disableUser/{id}', [PwdController::class, 'disableUser']);
    Route::put('/updatepwd/{id}', [PwdController::class, 'update'])->name('pwd.update');
    Route::get('/invoices/search',[InvoiceController::class, 'search'])->name('invoice.search');
    Route::get('/invoices/pdf',[InvoiceController::class, 'DownloadInvoices']);
    Route::get('/books', [BookController::class, 'index']);
    Route::post('/disableBook/{id}', [BookController::class, 'disableBook']);
    Route::post('/book/store', [BookController::class, 'store']);
    Route::get('/books/create', [BookController::class, 'create']);
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/updatebook/{id}', [BookController::class, 'update'])->name('book.update');
    Route::get('/buyers', [BuyerController::class, 'index']);
    Route::get('/buyers/{id}/edit', [BuyerController::class, 'edit'])->name('buyer.edit');
    Route::put('/updatebuyer/{id}', [BuyerController::class, 'update'])->name('buyer.update');

    //qrcode
    Route::get('/qrcodes', [QrcodeController::class, 'index']);
    Route::post('/qrcode/store', [QrcodeController::class, 'store']);
    Route::get('/qrcode/create', [QrcodeController::class, 'create']);
    Route::get('/qrcode/{id}/edit', [QrcodeController::class, 'edit'])->name('qrcode.edit');
    Route::put('/updateqrcode/{id}', [QrcodeController::class, 'update'])->name('qrcode.update');
    Route::post('/disableQrcode/{id}', [QrcodeController::class, 'disableQrcode']);
    Route::post('/deleteQrcode/{id}', [QrcodeController::class, 'deleteQrcode']);
    Route::post('importQrcode', [QrcodeController::class, 'ImportQrcode'])->name('importQrcode');
    Route::post('importDel', [QrcodeController::class, 'ImportDel'])->name('importDel');

});
