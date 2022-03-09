    <?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('user/login', [AuthenticationController::class, 'userLoginCreate'])->name('user.login');
Route::post('user/login', [AuthenticationController::class, 'userLoginStore']);
Route::get('user/register-email', [AuthenticationController::class, 'userRegisterEmail'])->name('user.register.email');
Route::get('user/verify-email', [AuthenticationController::class, 'userVerifyEmailCreate'])->name('user.verift.email');
Route::get('user/verify-email/{email}/{token}', [AuthenticationController::class, 'userVerifyEmailStore']);
Route::get('user/register', [AuthenticationController::class, 'userRegisterCreate'])->name('user.register');
Route::post('user/register', [AuthenticationController::class, 'userRegisterStore']);

Route::group(['middleware' => 'auth'], function (){
    Route::prefix('user')->group(function (){
        Route::get('/', [UserController::class, 'index']);
    });
    Route::post('user/logout', [AuthenticationController::class, 'logout'])->name('user.logout');
});
