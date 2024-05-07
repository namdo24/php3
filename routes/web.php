<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Models\category;
use App\Models\post;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/home', function () {
//     return view('master');
// });
// Route::get('/namdo', function () {
//     echo "18-02-24";
// });
// // Route::view('/', 'welcome'); //phù hợp tải trang tĩnh
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('user/{id}/{name?}', function ($id,$name=null) {
//     return "User" . $id."---Name :".$name ;
// });

// Route::get('/', function () {
    // Category -> Post
    //    $data = \App\Models\Category::query()->find(1);

      //  $post = $data->post; // quan hệ 1 - 1 - lấy data luôn
    //    $post = $data->post()->where('id', 9)->first(); // ~ Post::query() - quan hệ 1 - 1

    //    $posts = $data->posts; // quan hệ 1 - n - lấy data luôn
    //    $posts = $data->posts()->limit(3)->get(); // ~ Post::query() - quan hệ 1 - n
// dd($post);
//        $data = \App\Models\Category::query()->with('post')->limit(5)->get();
    // select * from `categories` limit 5
    // select * from `categories` where `categories`.`id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)
    //    foreach ($data as $item) {
    //        $post = $item->post;
    //    }

    // $data = \App\Models\Category::query()->limit(5)->get();
    // select * from `categories` limit 5

    //    \App\Models\Post::query()
    //        ->where('category_id', 1)
    //        ->update([
    //            'name' => 'QQQQQQQQQQQQQQQQQQ'
    //        ]);

    // $data->load('post'); // select * from `categories` where `categories`.`id` in (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)+

    // foreach ($data as $item) {
    //     $post = $item->post;
    // }



    // // Post -> Category
    // $posts = \App\Models\post::query()->with('category')->get();
    // foreach ($posts as $post) {
    //     $categoryName = $post->category->name;
    // }
//     return view('welcome');
// });

Route::get('/', function () {
    $post=\App\Models\post::query()->find(1);
    $tagIDs=[2,4,5];// chỉ gồm id
    $post->tags()->sync($tagIDs); // thêm y hệt trong kia
    // $post->tags()->syncWithoutDetaching($tagIDs); thêm nhưng k xóa cái cũ
    

    $tags=$post->tags->toArray();


    return view('welcome');
});
Route::view('/dashboard', 'dashboard')->name('dashboard')->middleware(['auth',IsAdminMiddleware::class]);

Route::resource('categories',CategoryController::class);
Route::resource('tags',TagController::class);

Route::get('show-form-signup',  [AuthController::class, 'showFormSignup'])  ->name('signup-form');
Route::get('show-form-login',   [AuthController::class, 'showFormLogin'])   ->name('login-form');
Route::post('signup',           [AuthController::class, 'signup'])          ->name('signup');
Route::post('login',            [AuthController::class, 'login'])           ->name('login');
Route::get('logout',           [AuthController::class, 'logout'])          ->name('logout')->Middleware('auth');


