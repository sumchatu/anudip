<?php

Route::get('/',function(){
  return view('admin.home');
});

// Categories
Route::resource('/category', 'Admin\Category\CategoryController');

// Subcategory
Route::resource('/subcategory', 'Admin\Category\SubcategoryController');


 // For show subcategories by Ajax
 Route::get('get/subcategory/{category_id}','Admin\Product\ProductController@getSubcategories');

 // Products
Route::resource('/product', 'Admin\Product\ProductController');
Route::get('/product/active-deactive/{product_id}', 'Admin\Product\ProductController@activateDeactivateProduct')->name('product.activeDeactive');
Route::post('/product/file-update','Admin\Product\ProductController@fileUpdate')->name('product.file.update');

