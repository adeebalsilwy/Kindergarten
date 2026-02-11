

<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('global.dashboard')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="grid grid-cols-12 gap-6">
        <!-- Main Content Area -->
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Metrics -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.general_report')); ?></h2>
                        <a href="<?php echo e(route('dashboard-overview-1')); ?>" class="ml-auto flex items-center text-primary">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'mr-3 h-4 w-4','icon' => 'RefreshCcw']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-3 h-4 w-4','icon' => 'RefreshCcw']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.reload_data')); ?>

                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <!-- Total Students -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.Total_Students')).'','value' => ''.e($enhancedMetrics['total_students']).'','icon' => 'Users','color' => 'primary','route' => 'children.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                        
                        <!-- Active Students -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.Active_Students')).'','value' => ''.e($enhancedMetrics['active_students']).'','icon' => 'UserCheck','color' => 'success','route' => 'children.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                        
                        <!-- Total Teachers -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.Total_Teachers')).'','value' => ''.e($enhancedMetrics['total_teachers']).'','icon' => 'User','color' => 'pending','route' => 'teachers.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                        
                        <!-- Total Classes -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.Total_Classes')).'','value' => ''.e($enhancedMetrics['total_classes']).'','icon' => 'Home','color' => 'warning','route' => 'classes.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                        
                        <!-- Active Attendance Today -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.Active_Attendance')).'','value' => ''.e($enhancedMetrics['active_attendance']).'','description' => 'Today\'s attendance','icon' => 'UserCheck','color' => 'info','route' => 'attendance.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                        
                        <!-- Monthly Revenue -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.Monthly_Revenue')).'','value' => ''.e($enhancedMetrics['monthly_revenue']).'','format' => 'currency','icon' => 'DollarSign','color' => 'success','route' => 'finance.revenue'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\StatCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $attributes = $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4)): ?>
<?php $component = $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4; ?>
<?php unset($__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4); ?>
<?php endif; ?>
                    </div>
                </div>
                <!-- END: General Metrics -->

                <!-- BEGIN: Attendance Stats -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Attendance_Statistics')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div class="text-center">
                                <div class="text-xl font-bold text-primary"><?php echo e($attendanceStats['today']['total_today']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Total_Today')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-success"><?php echo e($attendanceStats['today']['present']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Present')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-warning"><?php echo e($attendanceStats['today']['late']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Late')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-danger"><?php echo e($attendanceStats['today']['absent']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Absent')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-xl font-bold text-info"><?php echo e($attendanceStats['today']['attendance_rate']); ?>%</div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Rate')); ?></div>
                            </div>
                        </div>
                        
                        <!-- Attendance Chart -->
                        <div class="mt-6">
                            <canvas id="attendanceChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Attendance Stats -->

                <!-- BEGIN: Financial Summary -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Financial_Reporting')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        <?php echo e(__('global.currency_symbol', ['amount' => number_format($financialStats['current_month'])])); ?>

                                    </div>
                                    <div class="mt-0.5 text-slate-500"><?php echo e(__('global.this_month_revenue')); ?></div>
                                </div>
                                <div
                                    class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-lg font-medium text-danger xl:text-xl">
                                        <?php echo e(__('global.currency_symbol', ['amount' => number_format($financialStats['pending_payments'])])); ?>

                                    </div>
                                    <div class="mt-0.5 text-slate-500"><?php echo e(__('global.Pending_Payments')); ?></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Financial Chart -->
                        <div class="mt-6">
                            <canvas id="financialChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Financial Summary -->

                <!-- BEGIN: Class Utilization -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Class_Utilization')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary"><?php echo e($classStats['total_classes']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Total_Classes')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-success"><?php echo e($classStats['total_students']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Total_Students')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-warning"><?php echo e($classStats['average_utilization']); ?>%</div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Average_Utilization')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-info"><?php echo e($teacherStats['average_classes_per_teacher']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Classes_Per_Teacher')); ?></div>
                            </div>
                        </div>
                        
                        <!-- Class Utilization Details -->
                        <div class="mt-6">
                            <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Class_Details')); ?></h3>
                            <div class="space-y-2">
                                <?php $__currentLoopData = $classStats['utilization_rates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classStat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center justify-between p-2 bg-slate-50 rounded">
                                        <span class="font-medium"><?php echo e($classStat['class_name']); ?></span>
                                        <div class="flex items-center space-x-4">
                                            <span class="text-sm">
                                                <?php echo e($classStat['student_count']); ?>/<?php echo e($classStat['capacity']); ?>

                                            </span>
                                            <div class="w-24 bg-slate-200 rounded-full h-2">
                                                <div 
                                                    class="bg-<?php echo e($classStat['utilization_rate'] > 80 ? 'danger' : ($classStat['utilization_rate'] > 60 ? 'warning' : 'success')); ?> h-2 rounded-full" 
                                                    style="width: <?php echo e($classStat['utilization_rate']); ?>%">
                                                </div>
                                            </div>
                                            <span class="text-sm w-12 text-right"><?php echo e($classStat['utilization_rate']); ?>%</span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Class Utilization -->

                <!-- BEGIN: Academic Performance -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Academic_Performance')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary"><?php echo e($academicStats['average_score']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Average_Score')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-success"><?php echo e($academicStats['highest_score']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Highest_Score')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-warning"><?php echo e($academicStats['lowest_score']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Lowest_Score')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-info"><?php echo e($academicStats['total_assessments']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.Total_Assessments')); ?></div>
                            </div>
                        </div>
                        
                        <!-- Grade Distribution -->
                        <div class="mt-6">
                            <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Grade_Distribution')); ?></h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="text-center">
                                    <div class="text-xl font-bold text-success"><?php echo e($academicStats['grade_distribution']['excellent']); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e(__('global.Excellent')); ?> (90-100)</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-primary"><?php echo e($academicStats['grade_distribution']['good']); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e(__('global.Good')); ?> (75-89)</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-warning"><?php echo e($academicStats['grade_distribution']['average']); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e(__('global.Average')); ?> (60-74)</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-danger"><?php echo e($academicStats['grade_distribution']['below_average']); ?></div>
                                    <div class="text-sm text-slate-500"><?php echo e(__('global.Below_Average')); ?> (&lt;60)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Academic Performance -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Recent_Activities')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 lg:grid-cols-5 gap-4">
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Attendances')); ?></h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    <?php $__empty_1 = true; $__currentLoopData = $recentActivities['attendances']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate"><?php echo e($activity->child->name ?? 'N/A'); ?></div>
                                            <div class="text-xs text-slate-500"><?php echo e($activity->status); ?> - <?php echo e($activity->date->format('M d')); ?></div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="text-center text-slate-500 py-4"><?php echo e(__('global.No_Recent_Attendances')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Payments')); ?></h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    <?php $__empty_1 = true; $__currentLoopData = $recentActivities['payments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate"><?php echo e($activity->child->name ?? 'N/A'); ?></div>
                                            <div class="text-xs text-slate-500"><?php echo e($activity->amount); ?> - <?php echo e($activity->payment_date->format('M d')); ?></div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="text-center text-slate-500 py-4"><?php echo e(__('global.No_Recent_Payments')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Enrollments')); ?></h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    <?php $__empty_1 = true; $__currentLoopData = $recentActivities['enrollments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate"><?php echo e($activity->name ?? 'N/A'); ?></div>
                                            <div class="text-xs text-slate-500"><?php echo e($activity->created_at->format('M d')); ?></div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="text-center text-slate-500 py-4"><?php echo e(__('global.No_Recent_Enrollments')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Activities')); ?></h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    <?php $__empty_1 = true; $__currentLoopData = $recentActivities['activities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate"><?php echo e($activity->title ?? 'N/A'); ?></div>
                                            <div class="text-xs text-slate-500"><?php echo e($activity->class->name ?? 'N/A'); ?></div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="text-center text-slate-500 py-4"><?php echo e(__('global.No_Recent_Activities')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="lg:col-span-1">
                                <h3 class="text-md font-medium mb-3"><?php echo e(__('global.Events')); ?></h3>
                                <div class="space-y-2 max-h-60 overflow-y-auto">
                                    <?php $__empty_1 = true; $__currentLoopData = $recentActivities['events']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="p-2 bg-slate-50 rounded">
                                            <div class="font-medium truncate"><?php echo e($activity->title ?? 'N/A'); ?></div>
                                            <div class="text-xs text-slate-500"><?php echo e($activity->class->name ?? 'N/A'); ?></div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="text-center text-slate-500 py-4"><?php echo e(__('global.No_Recent_Events')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Recent Activities -->
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                    <!-- BEGIN: Enrollment Stats -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 2xl:mt-8">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Enrollment_Stats')); ?></h2>
                        </div>
                        <div class="intro-y box mt-5 p-5">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-lg font-bold text-primary"><?php echo e($enrollmentStats['this_month']); ?></div>
                                    <div class="text-xs text-slate-500"><?php echo e(__('global.This_Month')); ?></div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-success"><?php echo e($enrollmentStats['last_month']); ?></div>
                                    <div class="text-xs text-slate-500"><?php echo e(__('global.Last_Month')); ?></div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-warning"><?php echo e($enrollmentStats['growth_rate']); ?>%</div>
                                    <div class="text-xs text-slate-500"><?php echo e(__('global.Growth_Rate')); ?></div>
                                </div>
                                <div class="text-center">
                                    <div class="text-lg font-bold text-info"><?php echo e($enrollmentStats['by_status']['active']); ?></div>
                                    <div class="text-xs text-slate-500"><?php echo e(__('global.Active')); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Enrollment Stats -->

                    <!-- BEGIN: Quick Actions -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.Quick_Actions')); ?></h2>
                        </div>
                        <div class="mt-5 space-y-3">
                            <a href="<?php echo e(route('children.create')); ?>" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'UserPlus','class' => 'w-5 h-5 text-primary mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'UserPlus','class' => 'w-5 h-5 text-primary mr-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                    <span class="truncate"><?php echo e(__('global.Add_New_Child')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('attendance.index')); ?>" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Calendar','class' => 'w-5 h-5 text-success mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Calendar','class' => 'w-5 h-5 text-success mr-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                    <span class="truncate"><?php echo e(__('global.Record_Attendance')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('payments.create')); ?>" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CreditCard','class' => 'w-5 h-5 text-warning mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CreditCard','class' => 'w-5 h-5 text-warning mr-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                    <span class="truncate"><?php echo e(__('global.Process_Payment')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('activities.create')); ?>" class="block">
                                <div class="box p-4 flex items-center hover:bg-slate-100 dark:hover:bg-darkmode-400">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Activity','class' => 'w-5 h-5 text-info mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Activity','class' => 'w-5 h-5 text-info mr-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
                                    <span class="truncate"><?php echo e(__('global.Add_New_Activity')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END: Quick Actions -->
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Attendance Chart
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(attendanceCtx, {
            type: 'bar',
            data: {
                labels: [
                    <?php $__currentLoopData = $chartData['attendance_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($day['date']); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    label: 'Attendance Rate',
                    data: [
                        <?php $__currentLoopData = $chartData['attendance_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($day['attendance_rate']); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        // Financial Chart
        const financialCtx = document.getElementById('financialChart').getContext('2d');
        new Chart(financialCtx, {
            type: 'line',
            data: {
                labels: [
                    <?php $__currentLoopData = $chartData['revenue_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($month['month']); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                datasets: [{
                    label: 'Monthly Revenue',
                    data: [
                        <?php $__currentLoopData = $chartData['revenue_chart']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($month['revenue']); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\dashboard-enhanced.blade.php ENDPATH**/ ?>