<?php

use App\Http\Controllers\FatoorahController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoriesComponent;
use App\Http\Livewire\Admin\AdminAddCategoriesComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;

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

Route::get('/', HomeComponent::class)->name('home.index');
Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/category/{slug}', CategoryComponent::class)->name('category.index');
Route::get('/search', SearchComponent::class)->name('product.search');

Route::resource('order', OrderController::class);


/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});


Route::middleware(['auth', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', AdminCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add', AdminAddCategoriesComponent::class)->name('admin.category.add');
    Route::get('/admin/categories/edit/{category_id}', AdminEditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/add/', AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/products/edit/{product_id}', AdminEditProductComponent::class)->name('admin.product.edit');
});


/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/




require __DIR__ . '/auth.php';
