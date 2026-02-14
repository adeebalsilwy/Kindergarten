<?php

use App\Http\Controllers\AccountingEntryController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ApiManagerController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\ChildrenController;
// use App\Http\Controllers\TestItem1769275927Controller;
// use App\Http\Controllers\TestItem1769276317Controller;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CommandLogController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\DashboardContentController;
use App\Http\Controllers\DatabaseImportController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\Finance\ReportController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController as MainReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestModelController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
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

Route::get('theme-switcher/{activeTheme}', [ThemeController::class, 'switch'])->name('theme-switcher');
Route::get('layout-switcher/{activeLayout}', [LayoutController::class, 'switch'])->name('layout-switcher');

// Public Routes
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('landing', [LandingController::class, 'index'])->name('landing');

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('auth.login.post')->middleware('guest');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register')->middleware('guest');
Route::post('register', [RegisterController::class, 'register'])->name('auth.register.post')->middleware('guest');
Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

// Email Verification Routes
Route::get('email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice')->middleware('auth');
Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware(['auth', 'signed']);
Route::post('email/verification-notification', [EmailVerificationController::class, 'send'])->name('verification.send')->middleware(['auth', 'throttle:6,1']);
// Main Dashboard (Protected)
Route::get('dashboard-overview-1', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1')->middleware(['auth', 'verified', 'role:Administrator|Principal|Accountant|Teacher|Staff']);

// Profile Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::patch('change-password', [ProfileController::class, 'updatePassword'])->name('password.update.post');
});

// Password reset
Route::controller(\App\Http\Controllers\Auth\PasswordResetController::class)->group(function () {
    Route::get('forgot-password', 'showLinkRequestForm')->name('password.request');
    Route::post('forgot-password', 'sendResetLink')->name('password.email');
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'reset')->name('password.update');
});

Route::middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal'])->prefix('finance')->name('finance.')->group(function () {
    Route::get('dashboard', [ReportController::class, 'dashboard'])->name('dashboard');
    Route::get('trial-balance', [ReportController::class, 'trialBalance'])->name('trial-balance');
    Route::get('general-ledger', [ReportController::class, 'generalLedger'])->name('general-ledger');
    Route::get('export/pdf', [ReportController::class, 'exportPdf'])->name('export.pdf');
    Route::get('export/excel', [ReportController::class, 'exportExcel'])->name('export.excel');
    Route::get('revenue', [ReportController::class, 'revenue'])->name('revenue');
    Route::get('expenses', [ReportController::class, 'expenses'])->name('expenses');
    Route::get('profit-loss', [ReportController::class, 'profitLoss'])->name('profit-loss');
    Route::get('outstanding-balances', [ReportController::class, 'outstandingBalances'])->name('outstanding-balances');
    Route::get('monthly-report', [ReportController::class, 'monthlyReport'])->name('monthly-report');
    Route::get('annual-report', [ReportController::class, 'annualReport'])->name('annual-report');
    Route::get('cash-flow', [ReportController::class, 'cashFlow'])->name('cash-flow');
    Route::get('attendance-report', [ReportController::class, 'attendanceReport'])->name('attendance-report');
});
Route::get('attendances/bulk', [AttendanceController::class, 'bulk'])->name('attendances.bulk')->middleware(['auth', 'role:Administrator|Principal|Teacher']);
Route::post('attendances/bulk', [AttendanceController::class, 'bulkStore'])->name('attendances.bulk.store')->middleware(['auth', 'role:Administrator|Principal|Teacher']);
Route::resource('grades', GradeController::class)->only(['index', 'store'])->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::resource('children', ChildrenController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
// Route::resource('parents', ParentsController::class); // Replaced by guardians resource below

Route::resource('languages', LanguageController::class)->middleware(['auth', 'verified', 'role:Administrator']);

Route::prefix('crud-builder')->middleware(['auth', 'verified', 'role:Administrator'])->group(function () {
    Route::get('/', [\App\Http\Controllers\CrudBuilderController::class, 'index'])->name('crud-builder.index');
    Route::get('/edit', [\App\Http\Controllers\CrudBuilderController::class, 'edit'])->name('crud-builder.edit');
    Route::post('/generate', [\App\Http\Controllers\CrudBuilderController::class, 'generate'])->name('crud-builder.generate');

    // API for Builder
    Route::get('/api/tables', [\App\Http\Controllers\CrudBuilderController::class, 'getTables'])->name('crud-builder.tables');
    Route::get('/api/table-details', [\App\Http\Controllers\CrudBuilderController::class, 'getTableDetails'])->name('crud-builder.table-details');
    Route::get('/api/columns', [\App\Http\Controllers\CrudBuilderController::class, 'getColumns'])->name('crud-builder.columns');
});

Route::prefix('database-import')->middleware(['auth', 'verified', 'role:Administrator'])->group(function () {
    Route::get('/', [DatabaseImportController::class, 'index'])->name('database-import.index');
    Route::get('/schema', [DatabaseImportController::class, 'getDatabaseSchema'])->name('database-import.schema');
    Route::post('/import', [DatabaseImportController::class, 'importTable'])->name('database-import.import');
    Route::post('/test-connection', [DatabaseImportController::class, 'testConnection'])->name('database-import.test-connection');
    Route::post('/save-config', [DatabaseImportController::class, 'saveConfig'])->name('database-import.save-config');
    Route::post('/bulk-import', [DatabaseImportController::class, 'bulkImport'])->name('database-import.bulk-import');
});

Route::prefix('backup')->middleware(['auth', 'verified', 'role:Administrator'])->group(function () {
    Route::get('/', [BackupController::class, 'index'])->name('backup.index');
    Route::post('/create', [BackupController::class, 'create'])->name('backup.create');
    Route::post('/restore', [BackupController::class, 'restore'])->name('backup.restore');
    Route::delete('/{backupId}', [BackupController::class, 'destroy'])->name('backup.destroy');
    Route::get('/download/{backupId}', [BackupController::class, 'download'])->name('backup.download');
});

Route::prefix('api-manager')->middleware(['auth', 'verified', 'role:Administrator'])->group(function () {
    Route::get('/', [ApiManagerController::class, 'index'])->name('api-manager.index');
    Route::post('/create', [ApiManagerController::class, 'create'])->name('api-manager.create');
    Route::post('/test', [ApiManagerController::class, 'test'])->name('api-manager.test');
    Route::get('/versions', [ApiManagerController::class, 'versions'])->name('api-manager.versions');
    Route::put('/{controllerName}', [ApiManagerController::class, 'update'])->name('api-manager.update');
    Route::delete('/{controllerName}', [ApiManagerController::class, 'destroy'])->name('api-manager.destroy');
});

Route::prefix('access-control')->middleware(['auth', 'verified', 'role:Administrator'])->group(function () {
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
});

Route::prefix('monitoring')->middleware(['auth', 'verified', 'role:Administrator'])->group(function () {
    Route::get('/', [\App\Http\Controllers\MonitoringController::class, 'index'])->name('monitoring.index');
    Route::get('/{log}', [\App\Http\Controllers\MonitoringController::class, 'show'])->name('monitoring.show');
    Route::get('/{log}/rerun', [\App\Http\Controllers\MonitoringController::class, 'rerun'])->name('monitoring.rerun');
});

// TestItem demo routes removed

Route::resource('accounting_entries', AccountingEntryController::class)->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for AccountingEntry
Route::get('accounting_entries/export/pdf', [AccountingEntryController::class, 'exportPdf'])->name('accounting_entries.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::get('accounting_entries/export/excel', [AccountingEntryController::class, 'exportExcel'])->name('accounting_entries.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::resource('attendances', AttendanceController::class)->middleware(['auth', 'role:Administrator|Principal|Teacher']);

// Export Routes for Attendance
Route::get('attendances/export/pdf', [AttendanceController::class, 'exportPdf'])->name('attendances.export.pdf')->middleware(['auth', 'role:Administrator|Principal|Teacher']);
Route::get('attendances/export/excel', [AttendanceController::class, 'exportExcel'])->name('attendances.export.excel')->middleware(['auth', 'role:Administrator|Principal|Teacher']);
Route::resource('cache', CacheController::class)->middleware(['auth', 'verified']);

// Export Routes for Cache
Route::get('cache/export/pdf', [CacheController::class, 'exportPdf'])->name('cache.export.pdf')->middleware(['auth', 'verified']);
Route::get('cache/export/excel', [CacheController::class, 'exportExcel'])->name('cache.export.excel')->middleware(['auth', 'verified']);

// Export Routes for Children
Route::get('children/export/pdf', [ChildrenController::class, 'exportPdf'])->name('children.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('children/export/excel', [ChildrenController::class, 'exportExcel'])->name('children.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::resource('classes', ClassesController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);

// Export Routes for Classes
Route::get('classes/export/pdf', [ClassesController::class, 'exportPdf'])->name('classes.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('classes/export/excel', [ClassesController::class, 'exportExcel'])->name('classes.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::resource('command_logs', CommandLogController::class)->middleware(['auth', 'verified']);

// Export Routes for CommandLog
Route::get('command_logs/export/pdf', [CommandLogController::class, 'exportPdf'])->name('command_logs.export.pdf')->middleware(['auth', 'verified']);
Route::get('command_logs/export/excel', [CommandLogController::class, 'exportExcel'])->name('command_logs.export.excel')->middleware(['auth', 'verified']);
Route::resource('dashboard_contents', DashboardContentController::class)->middleware(['auth', 'role:Administrator']);

// Export Routes for DashboardContent
Route::get('dashboard_contents/export/pdf', [DashboardContentController::class, 'exportPdf'])->name('dashboard_contents.export.pdf')->middleware(['auth', 'verified', 'role:Administrator']);
Route::get('dashboard_contents/export/excel', [DashboardContentController::class, 'exportExcel'])->name('dashboard_contents.export.excel')->middleware(['auth', 'verified', 'role:Administrator']);

Route::get('dashboard', [ReportController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::resource('expenses', ExpenseController::class)->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for Expense
Route::get('expenses/export/pdf', [ExpenseController::class, 'exportPdf'])->name('expenses.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::get('expenses/export/excel', [ExpenseController::class, 'exportExcel'])->name('expenses.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::resource('fees', FeeController::class)->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for Fee
Route::get('fees/export/pdf', [FeeController::class, 'exportPdf'])->name('fees.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::get('fees/export/excel', [FeeController::class, 'exportExcel'])->name('fees.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::resource('financial_reports', FinancialReportController::class)->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for FinancialReport
Route::get('financial_reports/export/pdf', [FinancialReportController::class, 'exportPdf'])->name('financial_reports.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::get('financial_reports/export/excel', [FinancialReportController::class, 'exportExcel'])->name('financial_reports.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for Grade
Route::get('grades/export/pdf', [GradeController::class, 'exportPdf'])->name('grades.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('grades/export/excel', [GradeController::class, 'exportExcel'])->name('grades.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::resource('jobs', JobController::class)->middleware(['auth', 'verified', 'role:Administrator']);

// Export Routes for Job
Route::get('jobs/export/pdf', [JobController::class, 'exportPdf'])->name('jobs.export.pdf')->middleware(['auth', 'verified', 'role:Administrator']);
Route::get('jobs/export/excel', [JobController::class, 'exportExcel'])->name('jobs.export.excel')->middleware(['auth', 'verified', 'role:Administrator']);

// Export Routes for Language
Route::get('languages/export/pdf', [LanguageController::class, 'exportPdf'])->name('languages.export.pdf')->middleware(['auth', 'verified', 'role:Administrator']);
Route::get('languages/export/excel', [LanguageController::class, 'exportExcel'])->name('languages.export.excel')->middleware(['auth', 'verified', 'role:Administrator']);

// Export Routes for Guardian
Route::get('guardians/export/pdf', [GuardianController::class, 'exportPdf'])->name('guardians.export.pdf')->middleware(['auth', 'verified']);
Route::get('guardians/export/excel', [GuardianController::class, 'exportExcel'])->name('guardians.export.excel')->middleware(['auth', 'verified']);
Route::resource('guardians', GuardianController::class)->middleware(['auth', 'verified']);
Route::resource('payments', PaymentController::class)->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for Payment
Route::get('payments/export/pdf', [PaymentController::class, 'exportPdf'])->name('payments.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);
Route::get('payments/export/excel', [PaymentController::class, 'exportExcel'])->name('payments.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Accountant|Principal']);

// Export Routes for Permission
Route::get('permissions/export/pdf', [PermissionController::class, 'exportPdf'])->name('permissions.export.pdf')->middleware(['auth', 'verified', 'role:Administrator']);
Route::get('permissions/export/excel', [PermissionController::class, 'exportExcel'])->name('permissions.export.excel')->middleware(['auth', 'verified', 'role:Administrator']);
Route::resource('teachers', TeacherController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal']);

// Export Routes for Teacher
Route::get('teachers/export/pdf', [TeacherController::class, 'exportPdf'])->name('teachers.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal']);
Route::get('teachers/export/excel', [TeacherController::class, 'exportExcel'])->name('teachers.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal']);
Route::resource('users', UserController::class)->middleware(['auth', 'verified', 'role:Administrator']);

// Export Routes for User
Route::get('users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf')->middleware(['auth', 'verified', 'role:Administrator']);
Route::get('users/export/excel', [UserController::class, 'exportExcel'])->name('users.export.excel')->middleware(['auth', 'verified', 'role:Administrator']);

// Kindergarten Management Routes
Route::resource('activities', ActivityController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::resource('events', EventController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);

Route::resource('curricula', CurriculumController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);

// Export Routes for Curriculum
Route::get('curricula/export/pdf', [CurriculumController::class, 'exportPdf'])->name('curricula.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('curricula/export/excel', [CurriculumController::class, 'exportExcel'])->name('curricula.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);

// Export Routes for Activity
Route::get('activities/export/pdf', [ActivityController::class, 'exportPdf'])->name('activities.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('activities/export/excel', [ActivityController::class, 'exportExcel'])->name('activities.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);

// Export Routes for Event
Route::get('events/export/pdf', [EventController::class, 'exportPdf'])->name('events.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('events/export/excel', [EventController::class, 'exportExcel'])->name('events.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Teacher']);
Route::get('/test-view', function () {
    return view('pages.users.index');
});

Route::resource('reports', MainReportController::class)->middleware(['auth', 'verified', 'role:Administrator|Principal|Accountant']);

// Export Routes for Report
Route::get('reports/export/pdf', [ReportController::class, 'exportPdf'])->name('reports.export.pdf')->middleware(['auth', 'verified', 'role:Administrator|Principal|Accountant']);
Route::get('reports/export/excel', [ReportController::class, 'exportExcel'])->name('reports.export.excel')->middleware(['auth', 'verified', 'role:Administrator|Principal|Accountant']);
Route::resource('test_models', TestModelController::class)->middleware(['auth', 'verified', 'role:Administrator']);

// Export Routes for TestModel
Route::get('test_models/export/pdf', [TestModelController::class, 'exportPdf'])->name('test_models.export.pdf')->middleware(['auth', 'verified', 'role:Administrator']);
Route::get('test_models/export/excel', [TestModelController::class, 'exportExcel'])->name('test_models.export.excel')->middleware(['auth', 'verified', 'role:Administrator']);

// Fallback route for undefined URLs
Route::fallback(function () {
    if (auth()->check()) {
        return redirect()->route('dashboard-overview-1');
    }

    return response()->view('pages.error-page', [], 404);
});
