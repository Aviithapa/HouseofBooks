<?php
Route::group(['namespace' => 'WebSite'], function () {

    Route::resource('posts', 'PostController', [
        'names' => [
            'index' => 'dashboard.posts.index',
            'create' => 'dashboard.posts.create',
            'store' => 'dashboard.posts.store',
            'edit' => 'dashboard.posts.edit',
            'update' => 'dashboard.posts.update',
            'destroy' => 'dashboard.posts.destroy',
        ]
    ]);
    Route::resource('banners', 'BannerController', [
        'names' => [
            'index' => 'dashboard.banners.index',
            'create' => 'dashboard.banners.create',
            'store' => 'dashboard.banners.store',
            'edit' => 'dashboard.banners.edit',
            'update' => 'dashboard.banners.update',
            'destroy' => 'dashboard.banners.destroy',
        ]
    ]);
    Route::resource('blog', 'BlogController', [
        'names' => [
            'index' => 'dashboard.blog.index',
            'create' => 'dashboard.blog.create',
            'store' => 'dashboard.blog.store',
            'edit' => 'dashboard.blog.edit',
            'update' => 'dashboard.blog.update',
            'destroy' => 'dashboard.blog.destroy',
        ]
    ]);

    Route::resource('services', 'ServicesController', [
        'names' => [
            'index' => 'dashboard.services.index',
            'create' => 'dashboard.services.create',
            'store' => 'dashboard.services.store',
            'edit' => 'dashboard.services.edit',
            'update' => 'dashboard.services.update',
            'destroy' => 'dashboard.services.destroy',
        ]
    ]);
    Route::resource('news', 'NewsController', [
        'names' => [
            'index' => 'dashboard.news.index',
            'create' => 'dashboard.news.create',
            'store' => 'dashboard.news.store',
            'edit' => 'dashboard.news.edit',
            'update' => 'dashboard.news.update',
            'destroy' => 'dashboard.news.destroy',
        ]
    ]);

    Route::resource('testimonials', 'TestimonialController', [
        'names' => [
            'index' => 'dashboard.testimonials.index',
            'create' => 'dashboard.testimonials.create',
            'store' => 'dashboard.testimonials.store',
            'edit' => 'dashboard.testimonials.edit',
            'update' => 'dashboard.testimonials.update',
            'destroy' => 'dashboard.testimonials.destroy',
        ]
    ]);

    Route::resource('events', 'EventController', [
        'names' => [
            'index' => 'dashboard.events.index',
            'create' => 'dashboard.events.create',
            'store' => 'dashboard.events.store',
            'edit' => 'dashboard.events.edit',
            'update' => 'dashboard.events.update',
            'destroy' => 'dashboard.events.destroy',
        ]
    ]);
    Route::resource('pages', 'PagesController', [
        'names' => [
            'index' => 'dashboard.pages.index',
            'create' => 'dashboard.pages.create',
            'store' => 'dashboard.pages.store',
            'edit' => 'dashboard.pages.edit',
            'update' => 'dashboard.pages.update',
            'destroy' => 'dashboard.pages.destroy',
        ]
    ]);
    Route::resource('category', 'CategoryController', [
        'names' => [
            'index' => 'dashboard.category.index',
            'create' => 'dashboard.category.create',
            'store' => 'dashboard.category.store',
            'edit' => 'dashboard.category.edit',
            'update' => 'dashboard.category.update',
            'destroy' => 'dashboard.category.destroy',
        ]
    ]);
    Route::resource('pages', 'PagesController', [
        'names' => [
            'index' => 'dashboard.pages.index',
            'create' => 'dashboard.pages.create',
            'store' => 'dashboard.pages.store',
            'edit' => 'dashboard.pages.edit',
            'update' => 'dashboard.pages.update',
            'destroy' => 'dashboard.pages.destroy',
        ]
    ]);
    Route::resource('help', 'HelpController', [
        'names' => [
            'index' => 'dashboard.help.index',
            'create' => 'dashboard.help.create',
            'store' => 'dashboard.help.store',
            'edit' => 'dashboard.help.edit',
            'update' => 'dashboard.help.update',
            'destroy' => 'dashboard.help.destroy',
            'show'=>'dashboard.help.show',
        ]
    ]);
    Route::resource('Clients', 'ClientsController', [
        'names' => [
            'index' => 'dashboard.Clients.index',
            'create' => 'dashboard.Clients.create',
            'store' => 'dashboard.Clients.store',
            'edit' => 'dashboard.Clients.edit',
            'update' => 'dashboard.Clients.update',
            'destroy' => 'dashboard.Clients.destroy',
        ]
    ]);
    Route::resource('donor', 'DonorController', [
        'names' => [
            'index' => 'dashboard.donor.index',
            'create' => 'dashboard.donor.create',
            'store' => 'dashboard.donor.store',
            'edit' => 'dashboard.donor.edit',
            'update' => 'dashboard.donor.update',
            'destroy' => 'dashboard.donor.destroy',
            'show'=>'dashboard.donor.show',
        ]
    ]);
    Route::resource('donation', 'DonationController', [
        'names' => [
            'index' => 'dashboard.donation.index',
            'create' => 'dashboard.donation.create',
            'store' => 'dashboard.donation.store',
            'edit' => 'dashboard.donation.edit',
            'update' => 'dashboard.donation.update',
            'destroy' => 'dashboard.donation.destroy',
            'show'=>'dashboard.donation.show',
        ]
    ]);
    Route::resource('product','ProductController',[
        'names' => [
            'index' => 'dashboard.product.index',
            'create' => 'dashboard.product.create',
            'store' => 'dashboard.product.store',
            'edit' => 'dashboard.product.edit',
            'show' => 'dashboard.product.show',
            'update' => 'dashboard.product.update',
            'destroy' => 'dashboard.product.destroy',

        ]
    ]);
    Route::resource('products','ProductsController',[
        'names' => [
            'index' => 'dashboard.products.index',
            'create' => 'dashboard.products.create',
            'store' => 'dashboard.products.store',
            'edit' => 'dashboard.products.edit',
            'update' => 'dashboard.products.update',
            'destroy' => 'dashboard.products.destroy',
        ]
    ]);
    Route::resource('secondhand','SecondHandController',[
        'names' => [
            'index' => 'dashboard.secondhand.index',
            'create' => 'dashboard.secondhand.create',
            'store' => 'dashboard.secondhand.store',
            'show' => 'dashboard.secondhand.show',
            'edit' => 'dashboard.secondhand.edit',
            'update' => 'dashboard.secondhand.update',
            'destroy' => 'dashboard.secondhand.destroy',
        ]
    ]);
    Route::resource('order','OrderController',[
        'names' => [
            'index' => 'dashboard.order.index',
            'create' => 'dashboard.order.create',
            'store' => 'dashboard.order.store',
            'edit' => 'dashboard.order.edit',
            'show' => 'dashboard.order.show',
            'update' => 'dashboard.order.update',
            'destroy' => 'dashboard.order.destroy',
        ]
    ]);
    Route::resource('semester','SemesterController',[
        'names' => [
            'index' => 'dashboard.semester.index',
            'create' => 'dashboard.semester.create',
            'store' => 'dashboard.semester.store',
            'edit' => 'dashboard.semester.edit',
            'show' => 'dashboard.semester.show',
            'update' => 'dashboard.semester.update',
            'destroy' => 'dashboard.semester.destroy',
        ]
    ]);
    Route::resource('faculty','FacultyController',[
        'names' => [
            'index' => 'dashboard.faculty.index',
            'create' => 'dashboard.faculty.create',
            'store' => 'dashboard.faculty.store',
            'edit' => 'dashboard.faculty.edit',
            'show' => 'dashboard.faculty.show',
            'update' => 'dashboard.faculty.update',
            'destroy' => 'dashboard.faculty.destroy',
        ]
    ]);
    Route::resource('contact', 'ContactController', [
        'names' => [
            'index' => 'dashboard.contact.index',
            'edit' => 'dashboard.contact.edit',
            'create' => 'dashboard.contact.create',
            'update' => 'dashboard.contact.update',
        ]
    ]);
    Route::resource('categories', 'CategoriesController', [
        'names' => [
            'index' => 'dashboard.categories.index',
            'edit' => 'dashboard.categories.edit',
            'create' => 'dashboard.categories.create',
            'update' => 'dashboard.categories.update',
            'store'  => 'dashboard.categories.store',
         ]
    ]);
    Route::resource('mail', 'MailController', [
        'names' => [
            'index' => 'dashboard.mail.index',
            'edit' => 'dashboard.mail.edit',
            'create' => 'dashboard.mail.create',
            'update' => 'dashboard.mail.update',
            'store'  => 'dashboard.mail.store',
        ]
    ]);
    Route::resource('request', 'RequestController', [
        'names' => [
            'index' => 'dashboard.request.index',
            'edit' => 'dashboard.request.edit',
            'create' => 'dashboard.request.create',
            'update' => 'dashboard.request.update',
            'store'  => 'dashboard.request.store',
            'show'  => 'dashboard.request.show',
        ]
    ]);
    Route::resource('cart', 'CartController', [
        'names' => [
            'index' => 'dashboard.cart.index',
            'edit' => 'dashboard.cart.edit',
            'create' => 'dashboard.cart.create',
            'update' => 'dashboard.cart.update',
            'store'  => 'dashboard.cart.store',
            'show'  => 'dashboard.cart.show',
        ]
    ]);
    Route::resource('invoice','InvoiceController',[
        'names' => [
            'show' => 'dashboard.invoice.show',
        ]
    ]);
    Route::resource('coupons','CouponsController',[
        'names' => [
            'index' => 'dashboard.coupons.index',
            'create' => 'dashboard.coupons.create',
            'store' => 'dashboard.coupons.store',
            'edit' => 'dashboard.coupons.edit',
           // 'show' => 'dashboard.coupons.show',
            'update' => 'dashboard.coupons.update',
            'destroy' => 'dashboard.coupons.destroy',
        ]
    ]);
    Route::match(['put', 'patch'], 'product/approve/{event}', 'ProductController@approve')->name('dashboard.product.approve');
});
