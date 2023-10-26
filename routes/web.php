<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

require_once __DIR__ . '/auth.php';

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ItemController;
use App\Http\Controllers\Backend\ResponsibilitySheetController;
use App\Http\Controllers\Public\PublicItemController;
use App\Http\Controllers\Backend\OrderController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
Route::get('/logout', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

Route::get('/guatemala.json', function () {
    return response()->file(public_path('guatemala.json'));
});

// De las vistas que no requieren una autenticación
Route::get('/view/item/{id}', [PublicItemController::class, 'ViewItem'])->name('view.item');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

    /** ========== Usuarios rutas  ========== */
    Route::controller(UserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all.user');
        Route::get('/view/user/{id}', 'ViewUser')->name('view.user');
        Route::get('/add/user', 'AddUser', 'mostrarGuatemala')->name('add.user');
        Route::post('/store/user', 'StoreUser')->name('user.store');
        Route::get('/edit/user/{id}', 'EditUser')->name('edit.user');
        Route::post('/update/user', 'UpdateUser')->name('user.update');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    });

    /** ========== Editar usuario rutas  ========== */
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    /** ========== Item Rutas  ========== */
    Route::controller(ItemController::class)->group(function () {
        // Vistas
        Route::get('/all/item', 'AllItem')->name('all.item');
        Route::get('/add/item', 'AddItem')->name('add.item');
        Route::get('/edit/item/{id}', 'EditItem')->name('edit.item');
        // La ruta view ahora no requiere de autenticación

        // Acciones
        Route::post('/store/item', 'StoreItem')->name('item.store');
        Route::post('/update/item', 'UpdateItem')->name('item.update');
        Route::get('/delete/item/{id}', 'DeleteItem')->name('item.delete');

        Route::get('/download/item/{id}', 'DownloadItemQr')->name('item.downloadqr');
    });

    /** ========== Hoja de responsabilidad Rutas  ========== */
    Route::controller(ResponsibilitySheetController::class)->group(function () {
        // Vistas
        Route::get('/all/responsibility', 'AllResponsibility')->name('all.responsibility');
        Route::get('/add/responsibility', 'Pos')->name('add.responsibility');
        Route::get('/edit/responsibility/{id}', 'EditResponsibility')->name('edit.responsibility');
        Route::get('/view/responsibility/{id}', 'ViewResponsibility')->name('view.responsibility');
        Route::get('/delete/responsibility/{id}', 'DeleteResponsibility')->name('responsibility.delete');

        // Acciones
        Route::post('/store/responsibility', 'StoreResponsibility')->name('responsibility.store');
        Route::post('/update/responsibility', 'UpdateResponsibility')->name('responsibility.update');
        Route::get('/delete/responsibility/{id}', 'DeleteResponsibility')->name('responsibility.delete');
        Route::post('/add-cart', 'AddCart');
        Route::get('/allitem', 'AllItem');
        Route::post('/cart-update/{rowId}', 'CartUpdate');
        Route::get('/cart-remove/{rowId}', 'CartRemove');
        Route::post('/create-invoice', 'CreateInvoice');
    });

        /** ========== Responsabilidad Rutas  ========== */
        Route::controller(OrderController::class)->group(function(){
            Route::post('/final-invoice','FinalInvoice');
            Route::get('/pending/order','PendingOrder')->name('pending.order');
            Route::get('/order/details/{order_id}','OrderDetails')->name('order.details');
            Route::post('/order/status/update','OrderStatusUpdate')->name('order.status.update');
            Route::get('/complete/order','CompleteOrder')->name('complete.order');
            Route::get('/stock','StockManage')->name('stock.manage');
           });


}); // End Middleware 