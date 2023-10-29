<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Send email with confirmation link to verify email address
Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Main'], function() {
    Route::get('/',
        [App\Http\Controllers\Main\IndexController::class, 'index']
    );
});

//-------------------------------------------------------------------------
// PERSONAL
//-------------------------------------------------------------------------
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', [App\Http\Controllers\Personal\Main\IndexController::class, 'index'])
            ->name('personal.main.index');
    });

    Route::group(['namespace' => 'Liked'], function() {
        Route::get('/liked', [App\Http\Controllers\Personal\Liked\IndexController::class, 'index'])
            ->name('personal.liked.index');

        Route::delete('/liked/delete/{post}', [App\Http\Controllers\Personal\Liked\DeleteController::class, 'index'])
            ->name('personal.liked.delete');
    });

    Route::group(['namespace' => 'Comments'], function() {
        Route::get('/comments', [App\Http\Controllers\Personal\Comments\IndexController::class, 'index'])
            ->name('personal.comments.index');
    });
});

//-------------------------------------------------------------------------
// ADMIN
//-------------------------------------------------------------------------
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'verified']], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', [App\Http\Controllers\Admin\Main\IndexController::class, 'index'])
            ->name('admin.main.index');
    });

    //-------------------------------------------------------------------------
    // USERS
    //-------------------------------------------------------------------------
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
        // List users
        Route::get('/list', [App\Http\Controllers\Admin\User\IndexController::class, 'index'])
            ->name('admin.user.index');

        // New user
        Route::get('/new', [App\Http\Controllers\Admin\User\CreateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.create');

        // Save new user
        Route::post('/save', [App\Http\Controllers\Admin\User\StoreController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.store');

        // Show user
        Route::get('/{user}/view', [App\Http\Controllers\Admin\User\ShowController::class, 'index'])
            ->name('admin.user.show');

        // Edit user
        Route::get('/{user}/edit', [App\Http\Controllers\Admin\User\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.edit');

        // Save existing user
        Route::patch('/{user}/save', [App\Http\Controllers\Admin\User\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.update');

        // Delete existing user
        Route::delete('/{user}/delete', [App\Http\Controllers\Admin\User\DeleteController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.delete');
    });

    //-------------------------------------------------------------------------
    // POSTS
    //-------------------------------------------------------------------------
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
        // List posts
        Route::get('/list', [App\Http\Controllers\Admin\Post\IndexController::class, 'index'])
            ->name('admin.post.index');

        // New post
        Route::get('/new', [App\Http\Controllers\Admin\Post\CreateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.create');

        // Save new post
        Route::post('/save', [App\Http\Controllers\Admin\Post\StoreController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.store');

        // Show post
        Route::get('/{post}/view', [App\Http\Controllers\Admin\Post\ShowController::class, 'index'])
            ->name('admin.post.show');

        // Edit post
        Route::get('/{post}/edit', [App\Http\Controllers\Admin\Post\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.edit');

        // Save existing post
        Route::patch('/{post}/save', [App\Http\Controllers\Admin\Post\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.update');

        // Delete existing post
        Route::delete('/{post}/delete', [App\Http\Controllers\Admin\Post\DeleteController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.delete');
    });

    //-------------------------------------------------------------------------
    // CATEGORIES
    //-------------------------------------------------------------------------
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
        // List categories
        Route::get('/list', [App\Http\Controllers\Admin\Category\IndexController::class, 'index'])
            ->name('admin.category.index');

        // New category
        Route::get('/new', [App\Http\Controllers\Admin\Category\CreateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.create');

        // Save new category
        Route::post('/save', [App\Http\Controllers\Admin\Category\StoreController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.store');

        // Show category
        Route::get('/{category}/view', [App\Http\Controllers\Admin\Category\ShowController::class, 'index'])
            ->name('admin.category.show');

        // Edit category
        Route::get('/{category}/edit', [App\Http\Controllers\Admin\Category\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.edit');

        // Save existing category
        Route::patch('/{category}/save', [App\Http\Controllers\Admin\Category\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.update');

        // Delete existing category
        Route::delete('/{category}/delete', [App\Http\Controllers\Admin\Category\DeleteController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.delete');
    });

    //-------------------------------------------------------------------------
    // TAGS
    //-------------------------------------------------------------------------
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function() {
        // List tags
        Route::get('/list', [App\Http\Controllers\Admin\Tag\IndexController::class, 'index'])
            ->name('admin.tag.index');

        // New tag
        Route::get('/new', [App\Http\Controllers\Admin\Tag\CreateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.create');

        // Save new tag
        Route::post('/save', [App\Http\Controllers\Admin\Tag\StoreController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.store');

        // Show tag
        Route::get('/{tag}/view', [App\Http\Controllers\Admin\Tag\ShowController::class, 'index'])
            ->name('admin.tag.show');

        // Edit tag
        Route::get('/{tag}/edit', [App\Http\Controllers\Admin\Tag\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.edit');

        // Save existing tag
        Route::patch('/{tag}/save', [App\Http\Controllers\Admin\Tag\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.update');

        // Delete existing tag
        Route::delete('/{tag}/delete', [App\Http\Controllers\Admin\Tag\DeleteController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.delete');
    });
});
