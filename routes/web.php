    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\JobController;
    use Illuminate\Support\Facades\Artisan;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SkillController;
    use App\Http\Controllers\SocialController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\UserSkillController;
    use App\Http\Controllers\ResendEmailController;
    use App\Http\Controllers\VerifyEmailController;
    use App\Http\Controllers\UserLanguageController;
    use App\Http\Controllers\AuthenticationController;
    use App\Http\Controllers\FreelancerProfileController;
    use App\Http\Controllers\GetStarted\EducationController;
    use App\Http\Controllers\GetStarted\GetStartedController;
    use App\Http\Controllers\FreelancerProfileCategoryController;
    use App\Http\Controllers\GetStarted\WorkExperienceController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\UserPortfolioController;

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

    Route::get('email-template', function () {
        return view('templates.email-verification')
            ->with([
                'user_name' => 'Samin Yeasar',
                'email' => 'seaum333@gmail.com',
                'token' => 'aspdjfpoasjdfop',
            ]);
    });

    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        // return what you want
    });
    Route::get('/link', function () {
        Artisan::call('storage:link');
    });
    Route::prefix('user')->group(function () {
        Route::get('login', [AuthenticationController::class, 'userLoginCreate'])->name('user.login');
        Route::post('login', [AuthenticationController::class, 'userLoginStore']);
        Route::get('register-email', [AuthenticationController::class, 'userRegisterEmail'])->name('user.register.email');
        Route::get('verify-email/{email}', [AuthenticationController::class, 'userVerifyEmailCreate'])->name('user.verification-need.email');
        Route::get('verify-email/{email}/{token}', [AuthenticationController::class, 'userVerifyEmailStore'])->name('user.verify.email');
        Route::post('resend_verification', [ResendEmailController::class, 'store'])->name('verify.email.store');
        Route::get('register', [AuthenticationController::class, 'userRegisterCreate'])->name('user.register');
        Route::post('register', [AuthenticationController::class, 'userRegisterStore']);
    });

    //google login
    Route::get('redirect', [SocialController::class, 'redirect']);
    Route::get('callback', [SocialController::class, 'callback']);

    Route::post('test', [GetStartedController::class, 'test'])->name('test');

    Route::group(['middleware' => ['auth', 'user.activity']], function () {
        Route::get('category/sub-category/{id}', [CategoryController::class, 'get_sub_category'])->name('category.subCategory');

        Route::prefix('user/create')->group(function () {
            Route::get('get-started', [GetStartedController::class, 'index'])->name('start.message');
            Route::get('question-one', [GetStartedController::class, 'qOne'])->name('question.one');
            Route::get('question-two', [GetStartedController::class, 'qTwo'])->name('question.two');
            Route::get('question-three', [GetStartedController::class, 'qThree'])->name('question.three');

            Route::get('question-four', [GetStartedController::class, 'qFour'])->name('question.');
            Route::get('question-five', [GetStartedController::class, 'qFive'])->name('question.five');
            Route::post('question-five', [FreelancerProfileController::class, 'title_store'])->name('title.store');
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
            Route::delete('language/{language}', [UserLanguageController::class, 'destroy'])->name('language.store');


            Route::get('skill', [UserSkillController::class, 'index'])->name('skill.index');
            Route::post('skill', [UserSkillController::class, 'store'])->name('skill.store');
            Route::get('question-ten', [GetStartedController::class, 'qTen'])->name('question.ten');
            Route::post('freelancer-bio', [FreelancerProfileController::class, 'bio_store'])->name('freelancer.bio.store');
            Route::get('question-thirteen', [GetStartedController::class, 'qThirteen'])->name('question.thirteen');
            Route::post('question-thirteen', [FreelancerProfileController::class, 'profile_store'])->name('freelancer.profile.store');

            Route::post('uplaod_image', [FreelancerProfileController::class, 'image_store'])->name('freelancer.image.store');


            Route::get('submit-profile', [ProfileController::class, 'submitProfile'])->name('profile');
            Route::get('blog', [BlogController::class, 'blog'])->name('blog');

            Route::get('/', [UserController::class, 'index']);
        });

        Route::prefix('job')->group(function () {
            Route::get('/', [JobController::class, 'index'])->name('job.index');
            Route::post('/', [JobController::class, 'store'])->name('job.store');
            Route::get('/create', [JobController::class, 'create'])->name('job.create');
        });
        
        Route::prefix('job-apply')->group(function () {
            Route::get('create/{id}', [JobApplyController::class, 'create'])->name('job.apply.create');
            Route::post('/', [JobApplyController::class, 'store'])->name('job.apply.store');
        });

        Route::prefix('freelancers')->group(function () {
            Route::get('/', [FreelancerProfileController::class, 'index'])->name('freelancer.index');
            // Route::get('/create/{id}', [JobController::class, 'create'])->name('job.create');
        });

        Route::prefix('user_portfolio')->group(function () {
            Route::get('/create', [UserPortfolioController::class, 'create'])->name('portfolio.create');
            Route::post('/', [UserPortfolioController::class, 'store'])->name('portfolio.index');
        });
        Route::post('user/logout', [AuthenticationController::class, 'logout'])->name('user.logout');
    });