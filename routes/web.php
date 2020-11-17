<?php





Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//site routes
Route::get('/', 'SiteController@index')->name('site-home');
Route::get('/book-search', 'SiteController@bookSearch')->name('book-search');
Route::get('/detail/{id}', 'SiteController@bookDetail')->name('detail');
Route::get('/category/{id}/books', 'SiteController@categoryBooks')->name('category-books');




//admin routes
Route::get('/admin-orders','AdminController@orders')->name('admin-orders');
Route::post('/admin-orders-search','AdminController@ordersSearch')->name('admin-orders-search');
Route::post('/admin-send-order', 'AdminController@sendOrder')->name('admin-send-order');
Route::get('/admin-site', 'AdminController@site')->name('admin-site');
Route::post('/admin-site/update-footer', 'AdminController@updateFooter')->name('admin-site-update-footer');
Route::post('/admin-slider-remove', 'AdminController@sliderRemove')->name('admin-slider-remove');
Route::post('/admin-slider-insert', 'AdminController@insertSlider')->name('admin-slider-insert');


Route::get('/admin-books', 'AdminController@books')->name('admin-books');
Route::get('/admin-books-new', 'AdminController@booksNew')->name('admin-books-new');
Route::get('/admin-books-new/accept/{id}', 'AdminController@booksNewAccept')->name('admin-books-new-accept');
Route::get('/admin-books-new/reject/{id}', 'AdminController@booksNewReject')->name('admin-books-new-reject');
Route::get('/admin-books/search', 'AdminController@bookSearch')->name('admin-books-search');
Route::post('/admin-book-insert', 'AdminController@bookInsert')->name('admin-book-insert');
Route::get('/admin-book/{id}', 'AdminController@book')->name('admin-book');
Route::post('/admin-book-edit', 'AdminController@bookEdit')->name('admin-book-edit');
Route::post('/admin-book-remove', 'AdminController@bookRemove')->name('admin-book-remove');
Route::get('/admin-user-remove/{id}', 'AdminController@userRemove')->name('admin-user-remove');



//discounts
Route::get('/admin-discounts', 'AdminController@discounts')->name('admin-discounts');
Route::post('/admin-discount-add', 'AdminController@discountAdd')->name('admin-discount-add');
Route::get('/admin-discount-remove/{id}', 'AdminController@discountRemove')->name('admin-discount-remove');



Route::get('/admin-change-password-page', 'AdminController@changePasswordPage')->name('admin-change-password-page');
Route::post('/admin-change-password', 'AdminController@changePassword')->name('admin-change-password');
Route::get('/admin/sales/report', 'AdminController@salesReport')->name('admin-sales-report');
Route::post('/admin/sales/report-result', 'AdminController@salesReportResult')->name('admin-sales-report-result');


//back up
Route::get('/admin-backup', 'BackupController@index')->name('admin-backup');



//Categories
Route::get('/admin/category', 'AdminController@categories');
Route::post('/admin/category/add', 'AdminController@categoryAdd');
Route::get('/admin/category/edit/{id}', 'AdminController@categoryEdit');
Route::post('/admin/category/update', 'AdminController@categoryUpdate');
Route::post('/admin/category/remove', 'AdminController@categoryRemove');



//Producers
Route::get('/admin/producers', 'AdminController@producers');
Route::post('/admin/producer/add', 'AdminController@producerAdd');
Route::get('/admin/producer-edit/{id}', 'AdminController@producerEdit');
Route::post('/admin/producer/update', 'AdminController@producerUpdate');
Route::post('/admin/producer/remove', 'AdminController@producerRemove');

//checkout
Route::get('/admin/checkout', 'AdminController@checkout');
//Route::get('/admin/checkout/do/{id}', 'AdminController@checkoutDone');
Route::get('/admin-orders-settlement', 'AdminController@settlement')->name('admin-orders-settlement');
Route::get('/admin-settlement/do', 'AdminController@settlementDo')->name('admin-orders-settlemnt-do');




//user routes
Route::get('/user-cart', 'UserController@cart')->name('user-cart');
Route::get('/user-cart-add/{book_id}', 'UserController@cartAdd')->name('user-cart-add');
Route::post('/user-cart-remove', 'UserController@cartRemove')->name('user-cart-remove');
Route::get('/user-cart-minus/{content_id}', 'UserController@cartMinus')->name('user-cart-minus');
Route::get('/user-cart-plus/{content_id}', 'UserController@cartPlus')->name('user-cart-plus');
Route::get('/user-orders', 'UserController@orders')->name('user-orders');

Route::post('/user-cart-pay', 'UserController@cartPay')->name('user-cart-pay');
Route::post('/user-cart-pay-verify', 'UserController@cartPayVerify')->name('user-cart-pay-verify');







//producer routes
Route::get('/producer/products', 'ProducerController@products');
Route::post('/producer/product-add', 'ProducerController@productAdd');
Route::get('/producer/product-edit/{id}', 'ProducerController@productEdit');
Route::post('/producer/product-remove', 'ProducerController@productRemove');
Route::get('/producer/sold', 'ProducerController@sold');
Route::get('/producer/settlement', 'ProducerController@settlement');
Route::get('/producer/change-pass', 'ProducerController@changePass');
Route::post('/producer/update-pass', 'ProducerController@updatePass');
Route::get('/producer/report', 'ProducerController@report');
Route::post('/producer/report-result', 'ProducerController@reportResult');




















