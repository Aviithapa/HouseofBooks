<?php
Route::any('esewa/success', 'EsewaController@success')->name('esewa.success');
Route::any('esewa/fail', 'EsewaController@fail')->name('esewa.fail');

Route::group(['namespace' => 'General'], function () {
    Route::get('change-password/{code}','HomeController@resetPasswordWithCode')->name('change-password');
    Route::post('change-password','HomeController@resetPasswordStore')->name('change-password.store');
    Route::post('help','HomeController@Help')->name('help');
    Route::get('donation/{id}','HomeController@donation')->name('donation');
    Route::post('donation/{id}','HomeController@User')->name('user');
    Route::get('/productDetails/{id}','HomeController@productDetails');
   // Route::get('/catalog/{category}/{university}/{faculty}','HomeController@UniversityCatalog');
    Route::get('/catalog/{category}/{university}','HomeController@UniversityCatalog');
    Route::get('/publication/{slug}','HomeController@publicationCatalog')->name('publication');
    Route::get('/catalog/semester/{slug}','HomeController@semesterCatalog')->name('semester');
    Route::get('/catalog/{category}/{university}/{faculty}','HomeController@facultyCatalog');
    Route::get('/catelog/sub_category/{slug}','HomeController@categoryCatalog');
    Route::get('/level/{slug}','HomeController@levelCatalog');
    Route::get('/novel/{slug}','HomeController@NobelCatalog')->name('nobel');
    Route::get('/catalog/{slug}','HomeController@catalog');
    Route::get('/secondhand/catalog/{slug}','HomeController@secondhandcatalog');
    Route::get('/cart','HomeController@cart')->middleware('auth');
    Route::get('add/to/cart/{id}', 'HomeController@addtocart')->middleware('auth')->name('add.to.cart');
    //Route::patch('update-cart', 'HomeController@update')->name('update.cart');
    Route::get('search','HomeController@search')->name('search');
    Route::get('/cart/delete/{id}','HomeController@Destroy')->name('destroy');
    Route::post('/order_confirmation','HomeController@Order');
    Route::post('contact','HomeController@Contact');
    Route::post('request','HomeController@Request');
    Route::post('filter','HomeController@Filter');
    Route::post('filters','HomeController@Filters')->name('filters');
    Route::get('/autocomplete/fetch', 'HomeController@ajaxsearch')->name('autocomplete.fetch');
    Route::get('/single-blog/{id}','HomeController@singleBlog');
    Route::get('/publicationData','HomeController@publicationData')->name('publication.data');
    Route::get('change','HomeController@user')->name('user.role');
    Route::match(['get', 'post'], '/{slug}', 'HomeController@slug')->where('slug', '.*');
    Route::match(['get', 'post'],'esewa/success','EsewaController@success')->name('esewa.success');
    Route::match(['get', 'post'],'esewa/fail','EsewaController@fail')->name('esewa.fail');
    });






