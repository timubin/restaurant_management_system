<?php

use App\Http\Middleware\VerifyAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\UserController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\Management\CategoryController;

Route::get('/', function () {
    //return view('auth.login');
    return view('frontend.site.index');
});
// Auth::routes(['register' => false]);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        /* return view('admin.admin_master'); */
        return view('dashboard');
    })->name('dashboard');
});


/* frontend route  */

Route::get('/', [HomeController::class, 'Home'])->name('/');
Route::get('/about', [HomeController::class, 'About'])->name('about');















Route::middleware(['auth', 'VerifyAdmin'])->group(function(){



/* route for management */

Route::resource('management/categories', CategoryController::class);

Route::resource('management/categories', CategoryController::class)->except([
    'show'
]);
/* user management */
Route::resource('management/users', UserController::class);

Route::post('management/categories/{category}', [CategoryController::class, 'update'])
    ->name('categories.update');


/* Menu controller  */
Route::resource('management/menu', MenuController::class);

/* Table controller  */
Route::resource('management/table', TableController::class);



/* Table cashier   */
Route::get('/cashier', [CashierController::class, 'index']);
Route::get('/cashier/getTable', [CashierController::class, 'getTables']);
Route::get('/cashier/getMenuByCategory/{category_id}', [CashierController::class, 'getMenuByCategory']);

Route::post('/cashier/orderFood', [CashierController::class, 'orderFood']);
Route::get('/cashier/getSaleDetailsByTable/{table_id}', [CashierController::class, 'getSaleDetailsByTable']);
Route::post('/cashier/confirmOrderStatus', [CashierController::class, 'confirmOrderStatus']);
Route::post('/cashier/deleteSaleDetail', [CashierController::class, 'deleteSaleDetail']);

/* payment  option  */
Route::post('/cashier/savePayment', [CashierController::class, 'savePayment']);
/* Cashier  Receipt  */
Route::get('/cashier/showReceipt/{saleID}', [CashierController::class, 'showReceipt']);

Route::post('/cashier/increase-quantity', [CashierController::class, 'increaseQuantity']);

Route::post('/cashier/decrease-quantity', [CashierController::class, 'decreaseQuantity']);


/* route for roport  */
Route::get('/report', [ReportController::class, 'index']);
Route::get('/report/show', [ReportController::class, 'show']);

//Export to excel
Route::get('/report/show/export', [ReportController::class, 'export']);
});

//Logout section 
Route::post('/logout', [ManagementController::class, 'logout'])->name('logout');
