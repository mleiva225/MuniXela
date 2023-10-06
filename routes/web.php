<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

require_once __DIR__ . '/auth.php';

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MemberController;
use App\Http\Controllers\Backend\FamilyController;
use App\Http\Controllers\Backend\ItemController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

    /// Usuarios rutas
    Route::controller(UserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all.user');
        Route::get('/view/user/{id}', 'ViewUser')->name('view.user');
        Route::get('/add/user', 'AddUser', 'mostrarGuatemala')->name('add.user');
        Route::post('/store/user', 'StoreUser')->name('user.store');
        Route::get('/edit/user/{id}', 'EditUser')->name('edit.user');
        Route::post('/update/user', 'UpdateUser')->name('user.update');
        Route::get('/delete/user/{id}', 'DeleteUser')->name('delete.user');
    });

    /// Editar usuario rutas
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Items Rutas
    Route::controller(ItemController::class)->group(function () {
        Route::get('/all/item', 'AllItem')->name('all.item');
        Route::get('/view/item/{id}', 'ViewUser')->name('view.item');
        Route::get('/add/item', 'AddItem')->name('add.item');
        Route::post('/store/item', 'StoreItem')->name('item.store');
        Route::get('/edit/item/{id}', 'EditItem')->name('edit.item');
        Route::post('/update/item', 'UpdateItem')->name('item.update');
        Route::get('/delete/item/{id}', 'DeleteItem')->name('delete.item');
    });

    /// Familias rutas
    Route::controller(FamilyController::class)->group(function () {
        Route::get('/all/family', 'AllFamily')->name('all.family');
        Route::get('/view/family/{id}', 'ViewFamily')->name('view.family');
        Route::get('/add/family', 'AddFamily')->name('add.family');
        Route::post('/store/family', 'StoreFamily')->name('family.store');
        Route::get('/edit/family/{id}', 'EditFamily')->name('edit.family');
        Route::post('/update/family', 'UpdateFamily')->name('family.update');
        Route::get('/delete/family/{id}', 'DeleteFamily')->name('delete.family');
    });

    /// Participantes rutas
    Route::controller(MemberController::class)->group(function () {
        Route::get('/all/member', 'AllMember')->name('all.member');
        Route::get('/add/member', 'AddMember')->name('add.member');
        Route::get('/view/member/{id}', 'ViewMember')->name('view.member');
        Route::post('/store/member', 'StoreMember')->name('member.store');
        Route::get('/edit/member/{id}', 'EditMember')->name('edit.member');
        Route::post('/update/member', 'UpdateMember')->name('member.update');
        Route::get('/delete/member/{id}', 'DeleteMember')->name('delete.member');
    });

    /// Programa escolar rutas
    Route::controller(ScolarshipController::class)->group(function () {
        Route::get('/all/scholarship', 'AllScolarship')->name('all.scholarship');
        Route::get('/add/scholarship', 'AddScolarship')->name('add.scholarship');
        Route::get('/view/scholarship/{id}', 'ViewScholarship')->name('view.scholarship');
        Route::post('/store/scholarship', 'StoreScolarship')->name('scholarship.store');
        Route::get('/edit/scholarship/{id}', 'EditScolarship')->name('edit.scholarship');
        Route::post('/update/scholarship', 'UpdateScolarship')->name('scholarship.update');
        Route::get('/delete/scholarship/{id}', 'DeleteScolarship')->name('delete.scholarship');
    });

    /// Categorias productos rutas
    Route::controller(CartegoryController::class)->group(function () {
        Route::get('/all/cartegory', 'AllCartegory')->name('all.cartegory');
        Route::get('/add/cartegory', 'AddCartegory')->name('add.cartegory');
        Route::get('/view/cartegory/{id}', 'ViewCartegory')->name('view.cartegory');
        Route::post('/store/cartegory', 'StoreCartegory')->name('cartegory.store');
        Route::get('/edit/cartegory/{id}', 'EditCartegory')->name('edit.cartegory');
        Route::post('/update/cartegory', 'UpdateCartegory')->name('cartegory.update');
        Route::get('/delete/cartegory/{id}', 'DeleteCartegory')->name('delete.cartegory');
    });

    /// Productos rutas
    Route::controller(ProductController::class)->group(function () {
        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::get('/view/product/{id}', 'ViewProduct')->name('view.product');
        Route::post('/store/product', 'StoreProduct')->name('product.store');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('product.update');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
    });

    /// Talleres rutas
    Route::controller(WorkshopController::class)->group(function () {
        Route::get('/all/workshop', 'AllWorkshop')->name('all.workshop');
        Route::get('/add/workshop', 'AddWorkshop')->name('add.workshop');
        Route::get('/view/workshop/{id}', 'ViewWorkshop')->name('view.workshop');
        Route::post('/store/workshop', 'StoreWorkshop')->name('workshop.store');
        Route::get('/edit/workshop/{id}', 'EditWorkshop')->name('edit.workshop');
        Route::post('/update/workshop', 'UpdateWorkshop')->name('workshop.update');
        Route::get('/delete/workshop/{id}', 'DeleteWorkshop')->name('delete.workshop');
    });

    /// Usuarios_Programas rutas
    Route::controller(UserProgramController::class)->group(function () {
        Route::get('/all/userprogram', 'AllUserPrograms')->name('all.userprogram');
        Route::get('/add/userprogram', 'AddUserPrograms')->name('add.userprogram');
        Route::get('/view/userprogram/{id}', 'ViewUserPrograms')->name('view.userprogram');
        Route::post('/store/userprogram', 'StoreUserPrograms')->name('userprogram.store');
        Route::get('/edit/userprogram/{id}', 'EditUserPrograms')->name('edit.userprogram');
        Route::post('/update/userprogram', 'UpdateUserPrograms')->name('userprogram.update');
        Route::get('/delete/userprogram/{id}', 'DeleteUserPrograms')->name('delete.userprogram');
    });

    /// Ayudas rutas
    Route::controller(HelpController::class)->group(function () {
        Route::get('/all/help', 'AllHelp')->name('all.help');
        Route::get('/add/help', 'AddHelp')->name('add.help');
        Route::get('/view/help/{id}', 'ViewHelp')->name('view.help');
        Route::post('/store/help', 'StoreHelp')->name('help.store');
        Route::get('/edit/help/{id}', 'EditHelp')->name('edit.help');
        Route::post('/update/help', 'UpdateHelp')->name('help.update');
        Route::get('/delete/help/{id}', 'DeleteHelp')->name('delete.help');
    });

    /// Visitas rutas
    Route::controller(VisitController::class)->group(function () {
        Route::get('/all/visit', 'AllVisit')->name('all.visit');
        Route::get('/add/visit', 'AddVisit')->name('add.visit');
        Route::get('/view/visit/{id}', 'ViewVisit')->name('view.visit');
        Route::post('/store/visit', 'StoreVisit')->name('visit.store');
        Route::get('/edit/visit/{id}', 'EditVisit')->name('edit.visit');
        Route::post('/update/visit', 'UpdateVisit')->name('visit.update');
        Route::get('/delete/visit/{id}', 'DeleteVisit')->name('delete.visit');
    });

    /// Visitas rutas
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/all/register', 'AllRegister')->name('all.register');
        Route::get('/add/register', 'AddRegister')->name('add.register');
        Route::get('/view/register/{id}', 'ViewRegister')->name('view.register');
        Route::post('/store/register', 'StoreRegister')->name('register.store');
        Route::get('/edit/register/{id}', 'EditRegister')->name('edit.register');
        Route::post('/update/register', 'UpdateRegister')->name('register.update');
        Route::get('/delete/register/{id}', 'DeleteRegister')->name('delete.register');
    });
}); // End Middleware 