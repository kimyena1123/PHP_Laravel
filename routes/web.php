<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/articles/create', function () {
    return view('articles/create');
});

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
//    dd($input);

    $host = config('database.connections.mysql.host');
    $dbname = config('database.connections.mysql.database');
    $username = config('database.connections.mysql.username');
    $password = config('database.connections.mysql.password');
//    dd($host);

    //pdo 객체를 만들고 : $conn = new PDO("mysql:host=호스트명;dbnamae=데이터베이스", 사용자명, 패스워드);
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //쿼리를 준비하고
    $stmt = $conn -> prepare("INSERT INTO articles (body, user_id) VALUES (:body, :userId);");
//    dd($request->collect());
    $body = $request->input('body');
//    dd($body);

    //사용자 아이디 가져오는 방법1
    //dd($request->user()->id);

    //사용자 아이디 가져오는 방법2
    //dd(\Illuminate\Support\Facades\Auth::user()->id);

    //사용자 아이디 가져오는 방법3
    //dd(\Illuminate\Support\Facades\Auth::id());

    //쿼리 값을 설정하고
    $stmt->bindValue(':body', $input['body']);
    $stmt->bindValue(':userId', $request->user()->id);

    //실행
    $stmt->execute();

    return 'hello';
});
