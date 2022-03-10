    <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GetStarted\GetStartedController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('email-template', function (){
    return view('templates.email-verification')
    ->with([
        'user_name' => 'Samin Yeasar',
        'email' => 'seaum333@gmail.com',
        'token' => 'aspdjfpoasjdfop',
    ]);
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    // return what you want
});

Route::prefix('user')->group(function (){
    Route::get('login', [AuthenticationController::class, 'userLoginCreate'])->name('user.login');
    Route::post('login', [AuthenticationController::class, 'userLoginStore']);
    Route::get('register-email', [AuthenticationController::class, 'userRegisterEmail'])->name('user.register.email');
    Route::get('verify-email/{email}', [AuthenticationController::class, 'userVerifyEmailCreate'])->name('user.verification-need.email');
    Route::get('verify-email/{email}/{token}', [AuthenticationController::class, 'userVerifyEmailStore'])->name('user.verify.email');
    Route::get('register', [AuthenticationController::class, 'userRegisterCreate'])->name('user.register');
    Route::post('register', [AuthenticationController::class, 'userRegisterStore']);
});

//google login
Route::get('redirect', [SocialController::class, 'redirect']);
Route::get('callback', [SocialController::class, 'callback']);

Route::group(['middleware' => 'auth'], function (){
    Route::prefix('user')->group(function (){
        Route::get('get-started', [GetStartedController::class, 'index'])->name('start.message');
        Route::get('question-one', [GetStartedController::class, 'qOne'])->name('question.one');
        Route::get('question-two', [GetStartedController::class, 'qTwo'])->name('question.two');
        Route::get('question-three', [GetStartedController::class, 'qThree'])->name('question.three');
        Route::get('/', [UserController::class, 'index']);
    });
    Route::post('user/logout', [AuthenticationController::class, 'logout'])->name('user.logout');
});
