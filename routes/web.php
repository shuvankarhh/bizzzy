<?php

use App\Models\RecruiterProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\UserSkillController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\JobProposalController;
use App\Http\Controllers\ResendEmailController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\RecruiterJobController;
use App\Http\Controllers\UserLanguageController;
use App\Http\Controllers\ClientAccountController;
use App\Http\Controllers\Stripe\StripeController;
use App\Http\Controllers\UserPortfolioController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ContractBillingController;
use App\Http\Controllers\SingleMilestoneController;
use App\Http\Controllers\Staff\StaffAuthController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ChangeAccountTypeController;
use App\Http\Controllers\ContractMilestoneController;
use App\Http\Controllers\FreelancerProfileController;
use App\Http\Controllers\Stripe\StripeCardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminContractController;
use App\Http\Controllers\Recruiter\NewMilestonePayment;
use App\Http\Controllers\Admin\PermissionRoleController;
use App\Http\Controllers\GetStarted\EducationController;
use App\Http\Controllers\Freelancer\ExperienceController;
use App\Http\Controllers\Freelancer\PreferenceController;
use App\Http\Controllers\Freelancer\VisibilityController;
use App\Http\Controllers\GetStarted\GetStartedController;
use App\Http\Controllers\Stripe\StripeCustomerController;
use App\Http\Controllers\ActivateContractMilestoneController;
use App\Http\Controllers\Admin\AdminMoneyWithdrawController;
use App\Http\Controllers\Admin\VerificationRequestController;
use App\Http\Controllers\FreelancerProfileCategoryController;
use App\Http\Controllers\GetStarted\WorkExperienceController;
use App\Http\Controllers\Freelancer\FreelancerTitleController;
use App\Http\Controllers\Recruiter\RecruiterProfileController;
use App\Http\Controllers\Freelancer\FreelancerSaveJobController;
use App\Http\Controllers\Freelancer\FreelancerOverviewController;
use App\Http\Controllers\Jobs\Freelancer\FreelancerJobController;
use App\Http\Controllers\Recruiter\RecruiterEndContractController;
use App\Http\Controllers\Freelancer\FreelancerEndContractController;
use App\Http\Controllers\Freelancer\FreelancerJobFeedbackController;
use App\Http\Controllers\Jobs\Recruiter\RecruiterActiveJobController;
use App\Http\Controllers\Jobs\Freelancer\FreelancerActiveJobController;
use App\Http\Controllers\Jobs\Freelancer\FreelancerDirectJobController;
use App\Http\Controllers\Freelancer\FreelancerAccountVerificationController;
use App\Http\Controllers\Freelancer\FreelancerWithdrawMoneyController;
use App\Http\Controllers\Freelancer\FreelancerWorkDiaryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Recruiter\RecruiterHourlyContractController;
use Symfony\Component\Mime\MessageConverter;

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
Route::get('production-hard-reset', function () {
    Artisan::call('optimize:clear');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    Artisan::call('config:cache');
    Artisan::call('key:generate');
});
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
})->name('home');
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

        // Route::get('/', [UserController::class, 'index']);
    });

    Route::post('user/edit', [UserController::class, 'update'])->name('user.self.edit');

    Route::get('/education/{education}/edit', [EducationController::class, 'edit'])->name('education.edit');
    Route::patch('/education/{education}', [EducationController::class, 'update'])->name('education.update');

    Route::prefix('job')->group(function () {
        Route::get('/', [JobController::class, 'index'])->name('user.job.index');
        Route::post('/', [JobController::class, 'store'])->name('freelancer.job.store');
        Route::get('/create', [JobController::class, 'create'])->name('recruiter.job.create');
    });

    Route::prefix('visibility')->group(function () {
        Route::post('/', [VisibilityController::class, 'store'])->name('visibility.store');
    });

    Route::prefix('preference')->group(function () {
        Route::post('/', [PreferenceController::class, 'store'])->name('preference.store');
    });

    Route::prefix('experience')->group(function () {
        Route::post('/', [ExperienceController::class, 'store'])->name('experience.store');
        Route::get('/{experience}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
        Route::patch('/{experience}', [ExperienceController::class, 'update'])->name('experience.update');
    });

    Route::prefix('job-apply')->group(function () {
        Route::get('create/{id}', [JobApplyController::class, 'create'])->name('job.apply.create');
        Route::post('/', [JobApplyController::class, 'store'])->name('job.apply.store');
    });

    Route::prefix('f')->group(function () {
        Route::get('/', [FreelancerProfileController::class, 'index'])->name('freelancer.profile.index');
        // Route::get('/create/{id}', [JobController::class, 'create'])->name('job.create');
    });

    Route::get('f/job-feedback/{id}', [FreelancerJobFeedbackController::class, 'show'])->name('freelancer.job.feedback.show');

    Route::prefix('recruiter-job')->group(function () {
        Route::get('/', [RecruiterJobController::class, 'index'])->name('recruiter.job.index');
        Route::get('/{id}', [RecruiterJobController::class, 'proposal'])->name('recruiter.job.proposal');
        Route::delete('/{job}', [RecruiterJobController::class, 'destroy'])->name('recruiter.job.delete');
    });

    Route::prefix('recruiter-job-proposal')->group(function () {
        Route::post('/', [JobProposalController::class, 'store'])->name('job.proposal.store');
        Route::get('/{freelancer}/{job_id}', [JobProposalController::class, 'show'])->name('job.proposal.show');
        Route::post('/validate', [JobProposalController::class, 'pre_validate'])->name('job.proposal.validate');
    });

    Route::prefix('job-offers')->group(function () {
        Route::get('', [FreelancerJobController::class, 'index'])->name('job.offer.index');
        Route::get('/{contract}', [FreelancerJobController::class, 'show'])->name('job.offer.show');
        Route::post('/{contract_id}', [FreelancerJobController::class, 'store'])->name('job.offer.store');
    });

    Route::prefix('user_portfolio')->group(function () {
        Route::get('/create', [UserPortfolioController::class, 'create'])->name('portfolio.create');
        Route::post('/', [UserPortfolioController::class, 'store'])->name('portfolio.store');
        Route::get('/{portfolio}/edit', [UserPortfolioController::class, 'edit'])->name('portfolio.edit');
        Route::patch('/{userPortfolio}', [UserPortfolioController::class, 'update'])->name('portfolio.update');
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

    Route::prefix('f/end-contract')->group(function () {
        Route::get('/create/{id}', [FreelancerEndContractController::class, 'create'])->name('freelancer.end.contract.create');
        Route::post('/', [FreelancerEndContractController::class, 'store'])->name('freelancer.end.contract.store');
    });

    Route::patch('f/edit-title', [FreelancerTitleController::class, 'update'])->name('freelancer.title.update');

    Route::post('f/save-job/store', [FreelancerSaveJobController::class, 'store'])->name('freelancer.save.job.store');
    Route::delete('f/save-job/{savedJob}', [FreelancerSaveJobController::class, 'destroy'])->name('freelancer.save.job.destroy');
    Route::get('f/save-job/', [FreelancerSaveJobController::class, 'index'])->name('freelancer.save.job.index');

    Route::get('/f/overview', [FreelancerOverviewController::class, 'index'])->name('freelancer.overview.index');

    Route::post('f/withdraw-balance', [FreelancerWithdrawMoneyController::class, 'store'])->name('freelancer.withdraw.money.store');

    Route::prefix('f/work-diary')->group(function () {
        Route::get('/', [FreelancerWorkDiaryController::class, 'index'])->name('freelancer.work.diary.index');
        Route::get('/{contract}/{date}', [FreelancerWorkDiaryController::class, 'show'])->name('freelancer.work.diary.show');
        Route::DELETE('/', [FreelancerWorkDiaryController::class, 'destroy'])->name('freelancer.work.diary.destroy');
    });

    Route::get('r/work-diary/{contract}', [RecruiterHourlyContractController::class, 'show'])->name('recruiter.hourly.contract.index');
    
    /**
     * r indicates recruiter
     */
    Route::prefix('r/contracts')->group(function () {
        Route::get('/', [RecruiterActiveJobController::class, 'index'])->name('recruiter.contract.index');
        Route::get('/{id}', [RecruiterActiveJobController::class, 'show'])->name('recruiter.contract.show');
    });

    Route::prefix('r/end-contract')->group(function () {
        Route::get('/create/{id}', [RecruiterEndContractController::class, 'create'])->name('recruiter.end.contract.create');
        Route::post('/', [RecruiterEndContractController::class, 'store'])->name('recruiter.end.contract.store');
    });

    Route::prefix('r/contract-milestone')->group(function () {
        Route::get('/create/{contract_milestone}', [ContractMilestoneController::class, 'create'])->name('contract.milestone.create');
        Route::patch('/{id}', [ContractMilestoneController::class, 'update'])->name('contract.milestone.update');
        Route::post('/{id}', [ContractMilestoneController::class, 'store'])->name('contract.milestone.store');
    });

    Route::patch('r/single-milestone/{id}', [SingleMilestoneController::class, 'update'])->name('single.contract.milestone.update');

    Route::get('r/activate-next-milestone/create', [ActivateContractMilestoneController::class, 'create'])->name('activate.milestone.create');

    Route::post('r/activate-next-milestone/{contract}', [ActivateContractMilestoneController::class, 'store'])->name('activate.milestone.store');

    Route::get('/payment-methods/create', [PaymentController::class, 'create'])->name('payment.create');    

    Route::post('/r/new-milestone/create/{contract}', [NewMilestonePayment::class, 'create'])->name('new.milestone.create');

    Route::patch('r/profile/edit', [RecruiterProfileController::class, 'update'])->name('recruiter.profile.update');

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

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/membership', [SettingController::class, 'membership'])->name('setting.membership');
        Route::post('/membership/change', [SettingController::class, 'planUpdate'])->name('setting.planUpdate');
    });

    Route::get('f/profile-verification', [FreelancerAccountVerificationController::class, 'index'])->name('freelancer.profile.verification.get');
    Route::post('f/profile-verification', [FreelancerAccountVerificationController::class, 'store'])->name('freelancer.profile.verification.store');

    Route::prefix('create-client-account')->group(function () {
        Route::get('/create', [ClientAccountController::class, 'create'])->name('client.account.create');
        Route::post('/', [ClientAccountController::class, 'store'])->name('client.account.store');
    });

    Route::post('change-account/{type}', [ChangeAccountTypeController::class, 'update'])->name('change.account');
    Route::patch('change-password', [PasswordController::class, 'update'])->name('change.password.store');

    Route::get('stripe', [StripeController::class, 'create'])->name('stripe.create');
    Route::post('stripe', [StripeController::class, 'store'])->name('stripe.store');

    Route::get('stripe/customer/create', [StripeCustomerController::class, 'store'])->name('stripe.customer.create');

    Route::post('stripe/card/create', [StripeCardController::class, 'create'])->name('stripe.card.create');
    Route::post('stripe/card/update', [StripeCardController::class, 'update'])->name('stripe.card.update');

    Route::get('billing/create', [BillingController::class, 'create'])->name('billing.create');
    Route::get('contract-billing/create', [ContractBillingController::class, 'create'])->name('contract.billing.create');
    Route::get('contract-billing/store', [ContractBillingController::class, 'store'])->name('contract.billing.store');

    Route::prefix('message')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('message.index');
        Route::get('/{from}', [MessageController::class, 'show'])->name('message.show');
        Route::patch('/read/{message}', [MessageController::class, 'update'])->name('message.update');
    });

});
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dash');
Route::group(['middleware' => ['guest', 'guest:admin']], function () {
    // ========= admin ========
    Route::prefix('admin')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginFrom'])->name('admin.show');
        Route::post('login', [AuthController::class, 'adminLoginStore'])->name('admin.login');

        //Route::get('/dashboard', [AdminController::class, 'admin'])->name('permission.role.index');
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
        Route::post('/store', [StaffController::class, 'store'])->name('staff.store');
        Route::get('/', [StaffController::class, 'index'])->name('staff.index');
        Route::get('/role', [StaffController::class, 'loadroles'])->name('staff.role');
        Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
        Route::post('/{id}', [StaffController::class, 'update'])->name('staff.update');
        Route::DELETE('/{id}', [StaffController::class, 'destroy'])->name('staff.delete');
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.index');
        Route::get('/{id}/edit', [AdminUserController::class, 'edit'])->name('user.edit');
        Route::post('/{id}', [AdminUserController::class, 'update'])->name('user.update');
        Route::DELETE('/{id}', [AdminUserController::class, 'destroy'])->name('user.delete');
        Route::get('/{id}/profile', [AdminUserController::class, 'profile'])->name('user.profile');
    });
    Route::prefix('job')->group(function () {
        Route::get('/', [AdminJobController::class, 'index'])->name('job.index');
        Route::get('/{id}/edit', [AdminJobController::class, 'edit'])->name('job.edit');
        Route::post('/{id}', [AdminJobController::class, 'update'])->name('job.update');
        Route::DELETE('/{id}', [AdminJobController::class, 'destroy'])->name('job.delete');
        Route::get('/{id}/contract', [AdminJobController::class, 'showcontract'])->name('job.showcontract');
        Route::get('/data', [AdminJobController::class, 'getData'])->name('job.get.data');
        Route::get('/milestone', [AdminJobController::class, 'getMilestone'])->name('job.get.milestone');
        // Route::get('/job-feedback/{id}', [AdminJobController::class, 'show'])->name('freelancer.job.feedback.show');
    });

    // admin verification user
    Route::prefix('verification')->group(function () {
        Route::get('/', [VerificationRequestController::class, 'index'])->name('user.verification.index');
        Route::get('/data', [VerificationRequestController::class, 'getData'])->name('user.get.data');
        Route::get('/{id}/photo', [VerificationRequestController::class, 'downloadPhoto'])->name('user.get.photo');
        Route::get('/{id}', [VerificationRequestController::class, 'update'])->name('user.verified');
        Route::get('/{id}/reject', [VerificationRequestController::class, 'reject'])->name('user.reject');
    });

    Route::prefix('contract')->group(function () {
        Route::get('/', [AdminContractController::class, 'index'])->name('contract.index');
        Route::get('/data', [AdminContractController::class, 'getData'])->name('contract.get.data');
        Route::get('/{id}', [AdminContractController::class, 'update'])->name('contract.approve');
        Route::get('/{id}/resolve', [AdminContractController::class, 'resolve'])->name('contract.resolve');
    });

    Route::prefix('tag')->group(function () {
        Route::get('', [TagController::class, 'index'])->name('tag.index');
    });

    Route::prefix('skill')->group(function () {
        Route::get('', [SkillController::class, 'index'])->name('skill.index');
        Route::post('/', [SkillController::class, 'store'])->name('skill.store');
        Route::get('/{id}/edit', [SkillController::class, 'edit'])->name('skill.edit');
        Route::post('/{id}', [SkillController::class, 'update'])->name('skill.update');
        Route::DELETE('/{id}', [SkillController::class, 'destroy'])->name('skill.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('', [AdminCategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/{id}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        Route::post('/', [AdminCategoryController::class, 'store'])->name('admin.category.store');
        Route::DELETE('/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.category.delete');
        Route::get('/{id}/sub-catogory', [AdminCategoryController::class, 'get_sub_category'])->name('admin.subcategory');
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

    Route::prefix('withdraw-request')->group(function () {
        Route::get('/', [AdminMoneyWithdrawController::class, 'index'])->name('admin.withdraw.request.index');
        Route::get('/datatable', [AdminMoneyWithdrawController::class, 'datatable'])->name('admin.withdraw.request.datatable');

    });
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
});