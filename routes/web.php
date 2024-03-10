<?php

use App\Http\Controllers\ProfileController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//글 작성하는 페이지
Route::get('/articles/create', function () {
    return view('articles/create');
});

///articles/create 페이지에서 작성한 글 저장하기
Route::post('/articles', function(Request $request){
    //비어있지 않고, 문자열이고, 255자를 넘으면 안된다.
    //방법1
    $input = $request->validate([
        'body' => [
            'required',
            'string',
            'max:255'
        ],
    ]);

    Article::create([
        'body' => $input['body'],
        'user_id' => Auth::id()
    ]);

    return 'hello';
});


//저장한 글 목록 보여주는 페이지
Route::get('/articles', function () {
    $articles = Article::all();

    //넘겨주는 방법1
    return view('articles/index', ['articleList' => $articles]);

    //넘겨주는 방법2
//    return view('articles/index') -> with('articleList', $articles);
});
