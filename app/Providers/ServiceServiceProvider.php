<?php

namespace App\Providers;

use App\Services\ActivityEventService;
use App\Services\AttendanceService;
use App\Services\ChildrenService;
use App\Services\CommunicationService;
use App\Services\DashboardAnalyticsService;
use App\Services\FeePaymentService;
use App\Services\GuardianService;
use App\Services\ReportService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Bind services to the container
        $this->app->singleton(ChildrenService::class, function ($app) {
            return new ChildrenService;
        });

        $this->app->singleton(GuardianService::class, function ($app) {
            return new GuardianService;
        });

        $this->app->singleton(AttendanceService::class, function ($app) {
            return new AttendanceService;
        });

        $this->app->singleton(FeePaymentService::class, function ($app) {
            return new FeePaymentService;
        });

        $this->app->singleton(ActivityEventService::class, function ($app) {
            return new ActivityEventService;
        });

        $this->app->singleton(ReportService::class, function ($app) {
            return new ReportService;
        });

        $this->app->singleton(CommunicationService::class, function ($app) {
            return new CommunicationService;
        });

        $this->app->singleton(DashboardAnalyticsService::class, function ($app) {
            return new DashboardAnalyticsService;
        });

        // Alias the services for easier access if needed
        $this->app->alias(ChildrenService::class, 'children.service');
        $this->app->alias(GuardianService::class, 'guardian.service');
        $this->app->alias(AttendanceService::class, 'attendance.service');
        $this->app->alias(FeePaymentService::class, 'fee.payment.service');
        $this->app->alias(ActivityEventService::class, 'activity.event.service');
        $this->app->alias(ReportService::class, 'report.service');
        $this->app->alias(CommunicationService::class, 'communication.service');
        $this->app->alias(DashboardAnalyticsService::class, 'dashboard.analytics.service');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
