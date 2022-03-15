    <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FreelancerProfileCategoryController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\GetStarted\EducationController;
use App\Http\Controllers\GetStarted\GetStartedController;
use App\Http\Controllers\GetStarted\WorkExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\UserLanguageController;
use App\Http\Controllers\UserSkillController;

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

Route::post('test', [GetStartedController::class, 'test'])->name('test');

Route::group(['middleware' => 'auth'], function (){
    Route::get('category/sub-category/{id}', [CategoryController::class, 'get_sub_category'])->name('category.subCategory');

    Route::prefix('user/create')->group(function (){
        Route::get('get-started', [GetStartedController::class, 'index'])->name('start.message');
        Route::get('question-one', [GetStartedController::class, 'qOne'])->name('question.one');
        Route::get('question-two', [GetStartedController::class, 'qTwo'])->name('question.two');
        Route::get('question-three', [GetStartedController::class, 'qThree'])->name('question.three');

        Route::get('question-four', [GetStartedController::class, 'qFour'])->name('question.');
        Route::get('question-five', [GetStartedController::class, 'qFive'])->name('question.five');
        Route::get('work-experience', [WorkExperienceController::class, 'index'])->name('work.experience.index');
        Route::get('add-work-experience', [WorkExperienceController::class, 'create'])->name('work.experience.creat');
        Route::post('add-work-experience', [WorkExperienceController::class, 'store'])->name('work.experience.store');
        Route::get('education', [EducationController::class, 'index'])->name('education.index');
        Route::get('add-education', [EducationController::class, 'create'])->name('education.create');
        Route::post('add-education', [EducationController::class, 'store'])->name('education.store');
        Route::get('category', [FreelancerProfileCategoryController::class, 'create'])->name('category.create');
        Route::post('category', [FreelancerProfileCategoryController::class, 'store'])->name('category.store');
        Route::get('question-twelve', [GetStartedController::class, 'qTwelve'])->name('question.twelve');
        Route::post('hourly_rate', [FreelancerProfileController::class, 'hourly_rate_store'])->name('hourlyRate.store');
        Route::get('language', [UserLanguageController::class, 'index'])->name('language.index');
        Route::post('language', [UserLanguageController::class, 'store'])->name('language.store');


        Route::get('skill', [UserSkillController::class, 'index'])->name('skill.index');
        Route::post('skill', [UserSkillController::class, 'store'])->name('skill.store');
        Route::get('question-ten', [GetStartedController::class, 'qTen'])->name('question.ten');
        Route::post('freelancer-bio', [FreelancerProfileController::class, 'bio_store'])->name('freelancer.bio.store');
        Route::get('question-thirteen', [GetStartedController::class, 'qThirteen'])->name('question.thirteen');

        Route::post('uplaod_image', [FreelancerProfileController::class, 'image_store'])->name('freelancer.image.store');

        Route::get('/', [UserController::class, 'index']);
    });
    Route::post('user/logout', [AuthenticationController::class, 'logout'])->name('user.logout');
});
