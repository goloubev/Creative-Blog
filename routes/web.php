<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Send email with confirmation link to verify email address
Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Main'], function() {
    Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])
        ->name('main.index');
});

Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
    Route::get('/', [App\Http\Controllers\Post\IndexController::class, 'index'])
        ->name('post.index');

    Route::get('/{post}', [App\Http\Controllers\Post\ShowController::class, 'index'])
        ->name('post.show');
});

//-------------------------------------------------------------------------
// PERSONAL
//-------------------------------------------------------------------------
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', [App\Http\Controllers\Personal\Main\IndexController::class, 'index'])
            ->name('personal.main.index');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function() {
        Route::get('/', [App\Http\Controllers\Personal\Liked\IndexController::class, 'index'])
            ->name('personal.liked.index');

        Route::post('/delete/{post}', [App\Http\Controllers\Personal\Liked\DeleteController::class, 'index'])
            ->name('personal.liked.delete');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function() {
        Route::get('/', [App\Http\Controllers\Personal\Comment\IndexController::class, 'index'])
            ->name('personal.comment.index');

        Route::get('/edit/{comment}', [App\Http\Controllers\Personal\Comment\EditController::class, 'index'])
            ->name('personal.comment.edit');

        Route::post('/update/{comment}', [App\Http\Controllers\Personal\Comment\UpdateController::class, 'index'])
            ->name('personal.comment.update');

        Route::post('/delete/{comment}', [App\Http\Controllers\Personal\Comment\DeleteController::class, 'index'])
            ->name('personal.comment.delete');
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
        Route::get('/view/{user}', [App\Http\Controllers\Admin\User\ShowController::class, 'index'])
            ->name('admin.user.show');

        // Edit user
        Route::get('/edit/{user}', [App\Http\Controllers\Admin\User\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.edit');

        // Save existing user
        Route::post('/save/{user}', [App\Http\Controllers\Admin\User\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.user.update');

        // Delete existing user
        Route::post('/delete/{user}', [App\Http\Controllers\Admin\User\DeleteController::class, 'index'])
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
        Route::get('/view/{post}', [App\Http\Controllers\Admin\Post\ShowController::class, 'index'])
            ->name('admin.post.show');

        // Edit post
        Route::get('/edit/{post}', [App\Http\Controllers\Admin\Post\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.edit');

        // Save existing post
        Route::post('/save/{post}', [App\Http\Controllers\Admin\Post\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.post.update');

        // Delete existing post
        Route::post('/delete/{post}', [App\Http\Controllers\Admin\Post\DeleteController::class, 'index'])
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
        Route::get('/view/{category}', [App\Http\Controllers\Admin\Category\ShowController::class, 'index'])
            ->name('admin.category.show');

        // Edit category
        Route::get('/edit/{category}', [App\Http\Controllers\Admin\Category\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.edit');

        // Save existing category
        Route::post('/save/{category}', [App\Http\Controllers\Admin\Category\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.category.update');

        // Delete existing category
        Route::post('/delete/{category}', [App\Http\Controllers\Admin\Category\DeleteController::class, 'index'])
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
        Route::get('/view/{tag}', [App\Http\Controllers\Admin\Tag\ShowController::class, 'index'])
            ->name('admin.tag.show');

        // Edit tag
        Route::get('/edit/{tag}', [App\Http\Controllers\Admin\Tag\EditController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.edit');

        // Save existing tag
        Route::post('/save/{tag}', [App\Http\Controllers\Admin\Tag\UpdateController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.update');

        // Delete existing tag
        Route::post('/delete/{tag}', [App\Http\Controllers\Admin\Tag\DeleteController::class, 'index'])
            ->middleware('admin')
            ->name('admin.tag.delete');
    });
});
