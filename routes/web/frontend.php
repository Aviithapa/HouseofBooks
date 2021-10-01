<?php

Route::get('/clear-config', function(){
    Artisan::call('cache:clear');
    return "Cache Cleared Successfully";
});
Route::get('/config-cache', function(){
    $exitcode=Artisan::call('config:cache');
    return "Cache Cleared Successfully";
});
Route::get('/view-clear', function(){
    $exitcode=Artisan::call('view:clear');
    return "View Cleared Successfully";
});
Route::get('/storage-link', function(){
    $exitcode=Artisan::call('storage:link');
    return "Storage Linked Successfully";
});
Route::get('/migrate', function(){
    $exitcode=Artisan::call('migrate');
    return "Migration Successful Linked Successfully";
});
Route::get('/dump-autoload', function(){
    $exitcode=Composer::call('dump-autoload');
    return "Dump Autoload  Successfully";
});
Route::get('/view-clear', function(){
    $exitcode=\Illuminate\Support\Facades\Artisan::call('view:clear');
    return "Dump Autoload  Successfully";
});

Route::group(['namespace' => 'Web'], function () {

    /*
    *----------------------------------------------------------------------------------------------------------------------
    * Route List for basic pages
    *----------------------------------------------------------------------------------------------------------------------
    */
    require 'frontend/general/general.php';




});

