<?php

use App\Http\Controllers\AccountingEntryController;
use App\Http\Controllers\ApiManagerController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ClassesController;
// use App\Http\Controllers\TestItem1769275927Controller;
// use App\Http\Controllers\TestItem1769276317Controller;
use App\Http\Controllers\CommandLogController;
use App\Http\Controllers\DashboardContentController;
use App\Http\Controllers\DatabaseImportController;
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
use App\Http\Controllers\TeacherController;
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

Route::get('/', [LandingController::class, 'index'])->name('home');
/*
Route::controller(PageController::class)->group(function () {
    Route::get('dashboard-overview-1-page', 'dashboardOverview1')->name('dashboard-overview-1');
    Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
    Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
    Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
    ... (many more)
});
*/

// Main Dashboard
Route::get('dashboard-overview-1', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('register', [RegisterController::class, 'register'])->name('auth.register.post');
Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
Route::get('landing', [LandingController::class, 'index'])->name('landing');

// Password reset
Route::controller(\App\Http\Controllers\Auth\PasswordResetController::class)->group(function () {
    Route::get('forgot-password', 'showLinkRequestForm')->name('password.request');
    Route::post('forgot-password', 'sendResetLink')->name('password.email');
    Route::get('reset-password/{token}', 'showResetForm')->name('password.reset');
    Route::post('reset-password', 'reset')->name('password.update');
});

Route::middleware('auth')->prefix('finance')->name('finance.')->group(function () {
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
Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('attendance/bulk', [AttendanceController::class, 'bulk'])->name('attendance.bulk');
Route::post('attendance/bulk', [AttendanceController::class, 'bulkStore'])->name('attendance.bulk.store');
Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::resource('grades', GradeController::class)->only(['index', 'store']);
Route::resource('children', ChildrenController::class);
// Route::resource('parents', ParentsController::class); // Replaced by guardians resource below

Route::resource('languages', LanguageController::class);

Route::prefix('crud-builder')->group(function () {
    Route::get('/', [\App\Http\Controllers\CrudBuilderController::class, 'index'])->name('crud-builder.index');
    Route::get('/edit', [\App\Http\Controllers\CrudBuilderController::class, 'edit'])->name('crud-builder.edit');
    Route::post('/generate', [\App\Http\Controllers\CrudBuilderController::class, 'generate'])->name('crud-builder.generate');

    // API for Builder
    Route::get('/api/tables', [\App\Http\Controllers\CrudBuilderController::class, 'getTables'])->name('crud-builder.tables');
    Route::get('/api/table-details', [\App\Http\Controllers\CrudBuilderController::class, 'getTableDetails'])->name('crud-builder.table-details');
    Route::get('/api/columns', [\App\Http\Controllers\CrudBuilderController::class, 'getColumns'])->name('crud-builder.columns');
});

Route::prefix('database-import')->group(function () {
    Route::get('/', [DatabaseImportController::class, 'index'])->name('database-import.index');
    Route::get('/schema', [DatabaseImportController::class, 'getDatabaseSchema'])->name('database-import.schema');
    Route::post('/import', [DatabaseImportController::class, 'importTable'])->name('database-import.import');
    Route::post('/test-connection', [DatabaseImportController::class, 'testConnection'])->name('database-import.test-connection');
    Route::post('/save-config', [DatabaseImportController::class, 'saveConfig'])->name('database-import.save-config');
    Route::post('/bulk-import', [DatabaseImportController::class, 'bulkImport'])->name('database-import.bulk-import');
});

Route::prefix('backup')->group(function () {
    Route::get('/', [BackupController::class, 'index'])->name('backup.index');
    Route::post('/create', [BackupController::class, 'create'])->name('backup.create');
    Route::post('/restore', [BackupController::class, 'restore'])->name('backup.restore');
    Route::delete('/{backupId}', [BackupController::class, 'destroy'])->name('backup.destroy');
    Route::get('/download/{backupId}', [BackupController::class, 'download'])->name('backup.download');
});

Route::prefix('api-manager')->group(function () {
    Route::get('/', [ApiManagerController::class, 'index'])->name('api-manager.index');
    Route::post('/create', [ApiManagerController::class, 'create'])->name('api-manager.create');
    Route::post('/test', [ApiManagerController::class, 'test'])->name('api-manager.test');
    Route::get('/versions', [ApiManagerController::class, 'versions'])->name('api-manager.versions');
    Route::put('/{controllerName}', [ApiManagerController::class, 'update'])->name('api-manager.update');
    Route::delete('/{controllerName}', [ApiManagerController::class, 'destroy'])->name('api-manager.destroy');
});

Route::prefix('access-control')->group(function () {
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->only(['index', 'store', 'destroy']);
});

Route::prefix('monitoring')->group(function () {
    Route::get('/', [\App\Http\Controllers\MonitoringController::class, 'index'])->name('monitoring.index');
    Route::get('/{log}', [\App\Http\Controllers\MonitoringController::class, 'show'])->name('monitoring.show');
    Route::get('/{log}/rerun', [\App\Http\Controllers\MonitoringController::class, 'rerun'])->name('monitoring.rerun');
});

// TestItem demo routes removed

Route::resource('accounting_entries', AccountingEntryController::class)->middleware('auth');

// Export Routes for AccountingEntry
Route::get('accounting_entries/export/pdf', [AccountingEntryController::class, 'exportPdf'])->name('accounting_entries.export.pdf')->middleware('auth');
Route::get('accounting_entries/export/excel', [AccountingEntryController::class, 'exportExcel'])->name('accounting_entries.export.excel')->middleware('auth');
Route::resource('attendances', AttendanceController::class)->middleware('auth');

// Export Routes for Attendance
Route::get('attendances/export/pdf', [AttendanceController::class, 'exportPdf'])->name('attendances.export.pdf')->middleware('auth');
Route::get('attendances/export/excel', [AttendanceController::class, 'exportExcel'])->name('attendances.export.excel')->middleware('auth');
Route::resource('cache', CacheController::class)->middleware('auth');

// Export Routes for Cache
Route::get('cache/export/pdf', [CacheController::class, 'exportPdf'])->name('cache.export.pdf')->middleware('auth');
Route::get('cache/export/excel', [CacheController::class, 'exportExcel'])->name('cache.export.excel')->middleware('auth');

// Export Routes for Children
Route::get('children/export/pdf', [ChildrenController::class, 'exportPdf'])->name('children.export.pdf')->middleware('auth');
Route::get('children/export/excel', [ChildrenController::class, 'exportExcel'])->name('children.export.excel')->middleware('auth');
Route::resource('classes', ClassesController::class)->middleware('auth');

// Export Routes for Classes
Route::get('classes/export/pdf', [ClassesController::class, 'exportPdf'])->name('classes.export.pdf')->middleware('auth');
Route::get('classes/export/excel', [ClassesController::class, 'exportExcel'])->name('classes.export.excel')->middleware('auth');
Route::resource('command_logs', CommandLogController::class)->middleware('auth');

// Export Routes for CommandLog
Route::get('command_logs/export/pdf', [CommandLogController::class, 'exportPdf'])->name('command_logs.export.pdf')->middleware('auth');
Route::get('command_logs/export/excel', [CommandLogController::class, 'exportExcel'])->name('command_logs.export.excel')->middleware('auth');
Route::resource('dashboard_contents', DashboardContentController::class)->middleware('auth');

// Export Routes for DashboardContent
Route::get('dashboard_contents/export/pdf', [DashboardContentController::class, 'exportPdf'])->name('dashboard_contents.export.pdf')->middleware('auth');
Route::get('dashboard_contents/export/excel', [DashboardContentController::class, 'exportExcel'])->name('dashboard_contents.export.excel')->middleware('auth');

Route::get('dashboard', [ReportController::class, 'dashboard'])->name('dashboard');
Route::resource('expenses', ExpenseController::class)->middleware('auth');

// Export Routes for Expense
Route::get('expenses/export/pdf', [ExpenseController::class, 'exportPdf'])->name('expenses.export.pdf')->middleware('auth');
Route::get('expenses/export/excel', [ExpenseController::class, 'exportExcel'])->name('expenses.export.excel')->middleware('auth');
Route::resource('fees', FeeController::class)->middleware('auth');

// Export Routes for Fee
Route::get('fees/export/pdf', [FeeController::class, 'exportPdf'])->name('fees.export.pdf')->middleware('auth');
Route::get('fees/export/excel', [FeeController::class, 'exportExcel'])->name('fees.export.excel')->middleware('auth');
Route::resource('financial_reports', FinancialReportController::class)->middleware('auth');

// Export Routes for FinancialReport
Route::get('financial_reports/export/pdf', [FinancialReportController::class, 'exportPdf'])->name('financial_reports.export.pdf')->middleware('auth');
Route::get('financial_reports/export/excel', [FinancialReportController::class, 'exportExcel'])->name('financial_reports.export.excel')->middleware('auth');

// Export Routes for Grade
Route::get('grades/export/pdf', [GradeController::class, 'exportPdf'])->name('grades.export.pdf')->middleware('auth');
Route::get('grades/export/excel', [GradeController::class, 'exportExcel'])->name('grades.export.excel')->middleware('auth');
Route::resource('jobs', JobController::class)->middleware('auth');

// Export Routes for Job
Route::get('jobs/export/pdf', [JobController::class, 'exportPdf'])->name('jobs.export.pdf')->middleware('auth');
Route::get('jobs/export/excel', [JobController::class, 'exportExcel'])->name('jobs.export.excel')->middleware('auth');

// Export Routes for Language
Route::get('languages/export/pdf', [LanguageController::class, 'exportPdf'])->name('languages.export.pdf')->middleware('auth');
Route::get('languages/export/excel', [LanguageController::class, 'exportExcel'])->name('languages.export.excel')->middleware('auth');

// Export Routes for Guardian
Route::get('guardians/export/pdf', [GuardianController::class, 'exportPdf'])->name('guardians.export.pdf')->middleware('auth');
Route::get('guardians/export/excel', [GuardianController::class, 'exportExcel'])->name('guardians.export.excel')->middleware('auth');
Route::resource('guardians', GuardianController::class)->middleware('auth');
Route::resource('payments', PaymentController::class)->middleware('auth');

// Export Routes for Payment
Route::get('payments/export/pdf', [PaymentController::class, 'exportPdf'])->name('payments.export.pdf')->middleware('auth');
Route::get('payments/export/excel', [PaymentController::class, 'exportExcel'])->name('payments.export.excel')->middleware('auth');

// Export Routes for Permission
Route::get('permission/export/pdf', [PermissionController::class, 'exportPdf'])->name('permission.export.pdf')->middleware('auth');
Route::get('permission/export/excel', [PermissionController::class, 'exportExcel'])->name('permission.export.excel')->middleware('auth');
Route::resource('teachers', TeacherController::class)->middleware('auth');

// Export Routes for Teacher
Route::get('teachers/export/pdf', [TeacherController::class, 'exportPdf'])->name('teachers.export.pdf')->middleware('auth');
Route::get('teachers/export/excel', [TeacherController::class, 'exportExcel'])->name('teachers.export.excel')->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

// Export Routes for User
Route::get('users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf')->middleware('auth');
Route::get('users/export/excel', [UserController::class, 'exportExcel'])->name('users.export.excel')->middleware('auth');

// Kindergarten Management Routes
Route::resource('curriculum', CurriculumController::class);
Route::resource('activities', ActivitiesController::class);
Route::resource('events', EventsController::class);
