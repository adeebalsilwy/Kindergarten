<?php

use Illuminate\Support\Facades\Route;

// Removed demo API resources

Route::apiResource('accounting_entries', App\Http\Controllers\Api\AccountingEntryApiController::class);
Route::apiResource('attendances', App\Http\Controllers\Api\AttendanceApiController::class);
Route::apiResource('cache', App\Http\Controllers\Api\CacheApiController::class);
Route::apiResource('children', App\Http\Controllers\Api\ChildrenApiController::class);
Route::apiResource('classes', App\Http\Controllers\Api\ClassesApiController::class);
Route::apiResource('command_logs', App\Http\Controllers\Api\CommandLogApiController::class);
Route::apiResource('dashboard_contents', App\Http\Controllers\Api\DashboardContentApiController::class);
Route::apiResource('expenses', App\Http\Controllers\Api\ExpenseApiController::class);
Route::apiResource('fees', App\Http\Controllers\Api\FeeApiController::class);
Route::apiResource('financial_reports', App\Http\Controllers\Api\FinancialReportApiController::class);
Route::apiResource('grades', App\Http\Controllers\Api\GradeApiController::class);
Route::apiResource('jobs', App\Http\Controllers\Api\JobApiController::class);
Route::apiResource('languages', App\Http\Controllers\Api\LanguageApiController::class);
Route::apiResource('parents', App\Http\Controllers\Api\ParentApiController::class);
Route::apiResource('guardians', App\Http\Controllers\Api\GuardianApiController::class);
Route::apiResource('payments', App\Http\Controllers\Api\PaymentApiController::class);
Route::apiResource('permission', App\Http\Controllers\Api\PermissionApiController::class);
Route::apiResource('teachers', App\Http\Controllers\Api\TeacherApiController::class);
Route::apiResource('users', App\Http\Controllers\Api\UserApiController::class);

Route::apiResource('curricula', App\Http\Controllers\Api\CurriculumApiController::class);
Route::apiResource('activities', App\Http\Controllers\Api\ActivityApiController::class);
Route::apiResource('events', App\Http\Controllers\Api\EventApiController::class);
Route::apiResource('reports', App\Http\Controllers\Api\ReportApiController::class);
Route::apiResource('test_models', App\Http\Controllers\Api\TestModelApiController::class);
