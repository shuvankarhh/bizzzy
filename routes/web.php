<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\JobProposalController;
use App\Http\Controllers\ResendEmailController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\RecruiterJobController;
use App\Http\Controllers\UserLanguageController;
use App\Http\Controllers\UserPortfolioController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionRoleController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\GetStarted\EducationController;
use App\Http\Controllers\GetStarted\GetStartedController;
use App\Http\Controllers\FreelancerProfileCategoryController;
use App\Http\Controllers\GetStarted\WorkExperienceController;
use App\Http\Controllers\Jobs\Freelancer\FreelancerActiveJobController;
use App\Http\Controllers\Jobs\Freelancer\FreelancerDirectJobController;
use App\Http\Controllers\Jobs\Freelancer\FreelancerJobController;
use App\Http\Controllers\Jobs\Recruiter\RecruiterActiveJobController;
use App\Http\Controllers\Staff\StaffAuthController;
use App\Http\Controllers\UserRoleController;

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

/**
 * ---------------------------
 * Artisan Commands
 * ---------------------------
 * 
 * Currently without auth. Later will be under admin auth!
 */
Route::get('production-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('config:cache');
});
Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    // return what you want
});
Route::get('/link', function () {
    Artisan::call('storage:link');
});
Route::get('/migrate', function () {
    Artisan::call('migrate');
});

Route::get('/home', function () {
    return view('home');
});
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

Route::group(['middleware' => ['guest', 'guest:admin'], 'prefix' => 'user'], function () {
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

Route::group(['middleware' => ['auth:web,admin,staff', 'user.activity']], function () {
    Route::get('category/sub-category/{id}', [CategoryController::class, 'get_sub_category'])->name('category.subCategory');

    /**
     * Creating Freelancer Profile
     */
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

        Route::get('category', [FreelancerProfileCategoryController::class, 'create'])->name('user.category.create');
        Route::post('category', [FreelancerProfileCategoryController::class, 'store'])->name('user.category.store');

        Route::get('question-twelve', [GetStartedController::class, 'qTwelve'])->name('question.twelve');

        Route::post('hourly_rate', [FreelancerProfileController::class, 'hourly_rate_store'])->name('hourlyRate.store');

        Route::get('language', [UserLanguageController::class, 'index'])->name('language.index');
        Route::post('language', [UserLanguageController::class, 'store'])->name('language.store');
        Route::delete('language/{language}', [UserLanguageController::class, 'destroy'])->name('language.destroy');

        Route::get('skill', [UserSkillController::class, 'index'])->name('user.skill.index');
        Route::post('skill', [UserSkillController::class, 'store'])->name('user.skill.store');

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

    Route::prefix('f')->group(function () {
        Route::get('/', [FreelancerProfileController::class, 'index'])->name('freelancer.profile.index');
        // Route::get('/create/{id}', [JobController::class, 'create'])->name('job.create');
    });

    Route::prefix('recruiter-job')->group(function () {
        Route::get('/', [RecruiterJobController::class, 'index'])->name('recruiter.job.index');
    });

    Route::prefix('recruiter-job-proposal')->group(function () {
        Route::post('/', [JobProposalController::class, 'store'])->name('job.proposal.store');
        Route::get('/{freelancer}/{job_id}', [JobProposalController::class, 'show'])->name('job.proposal.show');
    });

    Route::prefix('job-offers')->group(function () {
        Route::get('', [FreelancerJobController::class, 'index'])->name('job.offer.index');
        Route::get('/{contract}', [FreelancerJobController::class, 'show'])->name('job.offer.show');
        Route::post('/{contract_id}', [FreelancerJobController::class, 'store'])->name('job.offer.store');
    });

    Route::prefix('user_portfolio')->group(function () {
        Route::get('/create', [UserPortfolioController::class, 'create'])->name('portfolio.create');
    });

    Route::prefix('skill')->group(function () {
        Route::get('/create', [UserSkillController::class, 'create'])->name('user.skill.create');
        Route::patch('/', [UserSkillController::class, 'update'])->name('user.skill.update');
    });

    /**
     * f indicates freelancer
     */
    Route::prefix('f/contracts')->group(function () {
        Route::get('/', [FreelancerActiveJobController::class, 'index'])->name('freelancer.contract.index');
    });

    /**
     * r indicates recruiter
     */
    Route::prefix('r/contracts')->group(function () {
        Route::get('/', [RecruiterActiveJobController::class, 'index'])->name('recruiter.contract.index');
        Route::get('/{id}', [RecruiterActiveJobController::class, 'show'])->name('recruiter.contract.show');
    });

    /**
     * fs indicated Freelancers
     */
    Route::get('fs', [FreelancerController::class, 'index'])->name('freelancer.index');
    Route::get('fs/{freelancer}', [FreelancerController::class, 'show'])->name('freelancer.show');

    /**
     * f indicated Freelancer, dj indicates direct job
     */
    Route::get('f/dj/{freelancer}', [FreelancerDirectJobController::class, 'create'])->name('freelancer.hire.create');
    Route::post('f/dj', [FreelancerDirectJobController::class, 'store'])->name('freelancer.hire.store');

    Route::post('user/logout', [AuthenticationController::class, 'logout'])->name('user.logout');
});

Route::group(['middleware' => ['guest', 'guest:admin']], function () {
    // ========= admin ========
    Route::prefix('admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginFrom'])->name('admin.show');
        Route::post('login', [AuthController::class, 'adminLoginStore'])->name('admin.login');
        Route::get('home', [AdminController::class, 'index']);
    });

    // ========= staff ========
    Route::prefix('staff')->group(function () {
        Route::get('login', [StaffAuthController::class, 'index'])->name('staff.login');
        Route::post('login', [StaffAuthController::class, 'store']);
    });
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::prefix('staff')->group(function () {
        Route::get('/create', [StaffController::class, 'create'])->name('staff.create');
        Route::post('/', [StaffController::class, 'store'])->name('staff.store');
        Route::get('/', [StaffController::class, 'index'])->name('staff.index');
        Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
        Route::post('/{id}', [StaffController::class, 'update'])->name('staff.update');
    });

    Route::prefix('tag')->group(function () {
        Route::get('', [TagController::class, 'index'])->name('tag.index');
    });

    Route::prefix('skill')->group(function () {
        Route::get('', [SkillController::class, 'index'])->name('skill.index');
        Route::post('/', [SkillController::class, 'store'])->name('skill.store');
        Route::patch('/{skill}', [SkillController::class, 'update'])->name('skill.update');
    });

    Route::prefix('category')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
    });

    Route::prefix('permission')->group(function () {
        Route::get('', [PermissionController::class, 'index'])->name('permission.index');
        Route::post('/', [PermissionController::class, 'store'])->name('permission.store');
    });

    Route::prefix('role')->group(function () {
        Route::get('', [RoleController::class, 'index'])->name('role.index');
        Route::post('/', [RoleController::class, 'store'])->name('role.store');
    });
    Route::prefix('permission-role')->group(function () {
        Route::get('', [PermissionRoleController::class, 'index'])->name('permission.role.index');
        Route::post('/', [PermissionRoleController::class, 'store'])->name('permission.role.store');
        Route::get('/{id}/{guard}', [PermissionRoleController::class, 'show'])->name('permission.role.show');
    });
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
});
