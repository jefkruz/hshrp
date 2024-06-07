<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\AppraisalAttributeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\KcController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubDepartmentController;
use Illuminate\Support\Facades\Artisan;
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



Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::get('auth/login/{person}', [AuthController::class, 'showAdminLogin'])->name('showAdminLogin');
Route::get('kc/admin/auth/{token}', [KcController::class, 'successfulAdminLogin'])->name('kcAdminAuth');
Route::get('kc/staff/auth/{token}', [KcController::class, 'successfulStaffLogin'])->name('kcStaffAuth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('feedback', [AuthController::class, 'showFeedback'])->name('feedback');
Route::post('feedback', [AuthController::class, 'submitFeedback']);



Route::group(['middleware' => 'isStaff'], function(){
    Route::get('/', [PlatformController::class, 'dashboard'])->name('dashboard');
    Route::get('team', [PlatformController::class, 'leaderTeam'])->name('leaderTeam');
    Route::get('team/view/{id}', [PlatformController::class, 'viewTeamMember'])->name('viewTeamMember');

    Route::get('projects', [PlatformController::class, 'projects'])->name('projects');
    Route::get('projects/create', [PlatformController::class, 'showCreateProjectForm'])->name('createProjectForm');
    Route::post('projects', [ProjectsController::class, 'store'])->name('createProject');

    Route::get('appraisals', [PlatformController::class, 'appraisals'])->name('appraisals');
    Route::get('appraisal/view/{id}', [PlatformController::class, 'viewAppraisal'])->name('viewAppraisal');
    Route::get('goals', [PlatformController::class, 'goals'])->name('goals');
    Route::get('goal/{id}', [PlatformController::class, 'viewGoal'])->name('viewGoal');
    Route::get('goals/create', [PlatformController::class, 'showCreateGoalsForm'])->name('createGoalsForm');
    Route::post('goals', [GoalsController::class, 'store'])->name('createGoals');
    Route::post('reports', [GoalsController::class, 'addReport'])->name('addReport');

    Route::post('team/appraisal', [AppraisalController::class, 'submitAppraisal'])->name('submitAppraisal');
    Route::patch('goal/close/{id}', [GoalsController::class, 'closeGoal'])->name('closeGoal');

    Route::get('profile', [PlatformController::class, 'profile'])->name('profile');
    Route::post('profile/basic/update', [StaffController::class, 'updateBasicProfile'])->name('updateBasicProfile');
    Route::post('profile/ministry/update', [StaffController::class, 'updateMinistryProfile'])->name('updateMinistryProfile');
    Route::post('profile/marital/update', [StaffController::class, 'updateMaritalProfile'])->name('updateMaritalProfile');
    Route::post('profile/bank/update', [StaffController::class, 'updateBankProfile'])->name('updateBankProfile');
    Route::post('profile/nok/update', [StaffController::class, 'updateNokProfile'])->name('updateNokProfile');
    Route::post('profile/parental/update', [StaffController::class, 'updateParentalProfile'])->name('updateParentalProfile');
    Route::post('profile/medical/update', [StaffController::class, 'updateMedicalProfile'])->name('updateMedicalProfile');
    Route::post('profile/education/update', [StaffController::class, 'updateEducationProfile'])->name('updateEducationProfile');
});

Route::group(['middleware' => 'isAdmin', 'prefix' => 'admin'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('units', [AdminController::class, 'departments'])->name('admin.departments');
    Route::get('unit/{id}', [AdminController::class, 'viewDepartment'])->name('admin.view_department');
    Route::get('staff', [AdminController::class, 'staff'])->name('admin.staff');
    Route::get('staff/view/{id}', [AdminController::class, 'viewStaff'])->name('admin.viewStaff');
    Route::get('director', [AdminController::class, 'director'])->name('admin.director');
    Route::get('projects', [AdminController::class, 'projects'])->name('admin.projects');
    Route::get('platform', [AdminController::class, 'platform'])->name('admin.platform');
    Route::get('reports', [AdminController::class, 'reports'])->name('admin.report');
    Route::get('view/reports/{id}', [AdminController::class, 'viewReports'])->name('admin.viewReport');
    Route::get('appraisals', [AdminController::class, 'appraisal'])->name('admin.appraisal');
    Route::get('departments', [AdminController::class, 'subDepartment'])->name('admin.subDepartments');
    Route::resource('appraisal-attributes', AppraisalAttributeController::class);
    Route::resource('sub-departments', SubDepartmentController::class);

    Route::patch('director', [AdminController::class, 'updateDirector'])->name('admin.updateDirector');
    Route::patch('unit/{id}/assign', [DepartmentsController::class, 'assignUnitHead'])->name('admin.assignUnitHead');

    Route::post('staff', [StaffController::class, 'store'])->name('createStaff');
    Route::post('units', [DepartmentsController::class, 'store'])->name('createDepartment');
});


Route::group(['middleware' => 'isDirector', 'prefix' => 'director'], function(){
    Route::get('/', [DirectorController::class, 'index'])->name('director.index');
    Route::get('projects', [AdminController::class, 'projects'])->name('director.projects');
    Route::get('units', [AdminController::class, 'departments'])->name('director.departments');
    Route::get('unit/{id}', [AdminController::class, 'viewDepartment'])->name('director.view_department');
    Route::get('staff', [AdminController::class, 'staff'])->name('director.staff');
    Route::get('staff/view/{id}', [AdminController::class, 'viewStaff'])->name('director.viewStaff');
    Route::get('appraisal/view/{id}', [AdminController::class, 'viewAppraisal'])->name('director.viewAppraisal');
    Route::get('goal/{id}', [AdminController::class, 'viewGoal'])->name('director.viewGoal');
    Route::post('staff/appraisal', [AppraisalController::class, 'submitAppraisal'])->name('director.submitAppraisal');
});
 Route::get('change/password', [DashboardController::class, 'changePassword'])->name('changePassword');
 Route::post('update/password', [DashboardController::class, 'updatePassword'])->name('updatePassword');

Route::get('clear', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('storage:link');

    return "Cleared!";

});
