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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [App\Http\Controllers\ContentController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'menu'], function () {
    Route::get('/index-menu', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('admin.menu.index');
    Route::get('/create', [App\Http\Controllers\Admin\MenuController::class, 'create'])->name('admin.menu.create');
    Route::post('/store', [App\Http\Controllers\Admin\MenuController::class, 'store'])->name('admin.menu.store');

    Route::get('/add-content/{id}', [App\Http\Controllers\Admin\MenuController::class, 'addContent'])->name('admin.menu.addcontent');

    Route::post('/editor/image_upload', [App\Http\Controllers\Admin\MenuController::class, 'upload'])->name('upload');

    Route::post('/store-content', [App\Http\Controllers\Admin\MenuController::class, 'storeContent'])->name('admin.menu.storecontent');
});

Route::group(['prefix' => 'sub-menu'], function () {
    Route::get('/add-category/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'addCategory'])->name('admin.submenu.addcategory');
    // storeSubmenu
    Route::post('/store-submenu-content', [App\Http\Controllers\Admin\SubmenuController::class, 'storeSubContent'])->name('admin.submenu.content');

    //content
    Route::get('/add-sub-content/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'addSubContent'])->name('admin.submenu-content');
    Route::post('/store-category', [App\Http\Controllers\Admin\SubmenuController::class, 'storeSubmenu'])->name('admin.submenu.store');
    Route::get('/edit-sub-content/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'editSubContent'])->name('admin.submenu.content-edit');
    Route::post('/update-subcontent/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'updateSubContent'])->name('admin.submenu.content.update');

    Route::get('/add-sub-category/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'addSubCategory'])->name('admin.sub-category');

    Route::post('/admin-store-subcategory/{id}', [App\Http\Controllers\Admin\SubmenuController::class, 'storeSubCategory'])->name('admin.store.subcategory');


    Route::get('/admin-add-subcategory-content/{id}/{submenu_id}', [App\Http\Controllers\Admin\SubmenuController::class, 'addSubCategoryContent'])->name('admin.add.subcategory.content');

    Route::post('/store-subcategory-content', [App\Http\Controllers\Admin\SubmenuController::class,'storeSubCategoryDepartmentContent'])->name('admin.store.subcategory.content');

    Route::get('/view-subcategory-content/{submenu_id}/{sub_category_id}/{dept_menu_id}', [App\Http\Controllers\Admin\SubmenuController::class, 'viewSubCategoryDepartmentContent'])->name('admin.view.subcategory.content');

    Route::post('/update-subcategry-content', [App\Http\Controllers\Admin\SubmenuController::class, 'updateDepartmentContent'])->name('admin.update.subcategory.content');


});

Route::group(['prefix' => 'tender'], function () {
    Route::get('/create', [App\Http\Controllers\Admin\TenderController::class, 'create'])->name('admin.tender.create');
    Route::post('/store', [App\Http\Controllers\Admin\TenderController::class, 'store'])->name('admin.tender.store');
    Route::get('/index', [App\Http\Controllers\Admin\TenderController::class, 'index'])->name('admin.tender.index');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\TenderController::class, 'edit'])->name('admin.tender.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\TenderController::class, 'update'])->name('admin.tender.update');

    Route::get('/delete/{id}', [App\Http\Controllers\Admin\TenderController::class, 'destroy'])->name('admin.tender.delete');
});

Route::group(['prefix' => 'notification'], function () {
    Route::get('/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('admin.notification.create');
    Route::post('/store', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('admin.notification.store');
    Route::get('/index', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('admin.notification.index');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('admin.notification.edit');
    Route::post('/update/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('admin.notification.update');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('admin.notification.delete');

});

Route::group(['prefix' => 'slider'], function () {
    Route::get('/create', [App\Http\Controllers\Admin\SliderImageController::class, 'create'])->name('admin.slider.create');
    Route::post('/store', [App\Http\Controllers\Admin\SliderImageController::class, 'store'])->name('admin.slider.store');
    Route::get('/index', [App\Http\Controllers\Admin\SliderImageController::class, 'index'])->name('admin.slider.index');
    Route::get('/publish/{id}', [App\Http\Controllers\Admin\SliderImageController::class, 'publish'])->name('admin.slider.publish');
    Route::get('/unpublish/{id}', [App\Http\Controllers\Admin\SliderImageController::class, 'unpublish'])->name('admin.slider.unpublish');

    Route::get('/delete/{id}', [App\Http\Controllers\Admin\SliderImageController::class, 'destroy'])->name('admin.slider.delete');
});

Route::group(['prefix' => 'gallery'], function () {
    Route::get('/create', [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/store', [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/index', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery.index');

    Route::get('/publish/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'publish'])->name('admin.gallery.publish');
    Route::get('/unpublish/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'unpublish'])->name('admin.gallery.unpublish');

    Route::get('/delete/{id}', [App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.gallery.delete');
});


Route::group(['prefix' => 'menu-content'], function () {
    Route::get('/get-content/{menu_id}/{submenu_id}', [App\Http\Controllers\ContentController::class, 'getMenuContent'])->name('menu.content');

    Route::get('/load-more/{id}', [App\Http\Controllers\ContentController::class, 'loadMore'])->name('menu.load-more');

    Route::get('/event-sub-load/{id}', [App\Http\Controllers\ContentController::class, 'eventSubPage'])->name('menu.event-sub-load');

    Route::get('/get-subcategory/{menu_id}/{submenu_id}', [App\Http\Controllers\ContentController::class, 'getSubCategory'])->name('menu.subcategory');

    Route::get('/get-gallery', [App\Http\Controllers\ContentController::class, 'gallery'])->name('gallery');

    // Route::get('/get-sub-category/{menu_id}/{submenu_id}', [App\Http\Controllers\ContentController::class, 'getMenuContent'])->name('menu.content');

    Route::get('/get-department/{menu}/{submenu}/{subcategory}', [App\Http\Controllers\ContentController::class, 'getdepartmentData'])->name('menu.get-department');

});

Route::group(['prefix' => 'academic'], function () {
    Route::get('/create', [App\Http\Controllers\Admin\AcademicArchiveController::class, 'create'])->name('admin.academic.create');
    Route::post('/store', [App\Http\Controllers\Admin\AcademicArchiveController::class, 'store'])->name('admin.academic.store');
    // Route::get('/index', [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery.index');

    Route::get('/publish/{id}', [App\Http\Controllers\Admin\AcademicArchiveController::class, 'publish'])->name('admin.academic.publish');

    Route::get('/delete/{id}', [App\Http\Controllers\Admin\AcademicArchiveController::class, 'destroy'])->name('admin.academic.delete');
});






