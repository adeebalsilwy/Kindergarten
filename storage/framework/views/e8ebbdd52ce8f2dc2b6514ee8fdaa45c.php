<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('global.dashboard')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
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
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-8 w-8 text-primary','icon' => 'Users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-8 text-primary','icon' => 'Users']); ?>
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
                                        <div class="ml-auto">
                                            <?php if (isset($component)) { $__componentOriginaleaefd826d177068d67dd4af24306c055 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaleaefd826d177068d67dd4af24306c055 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.tippy.index','data' => ['class' => 'cursor-pointer bg-primary/10 rounded-full px-2 py-1 text-xs font-medium text-primary','content' => ''.e(__('global.active_students')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.tippy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'cursor-pointer bg-primary/10 rounded-full px-2 py-1 text-xs font-medium text-primary','content' => ''.e(__('global.active_students')).'']); ?>
                                                <?php echo e($enhancedMetrics['active_students'] ?? 0); ?> <?php echo e(__('global.active')); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaleaefd826d177068d67dd4af24306c055)): ?>
<?php $attributes = $__attributesOriginaleaefd826d177068d67dd4af24306c055; ?>
<?php unset($__attributesOriginaleaefd826d177068d67dd4af24306c055); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaleaefd826d177068d67dd4af24306c055)): ?>
<?php $component = $__componentOriginaleaefd826d177068d67dd4af24306c055; ?>
<?php unset($__componentOriginaleaefd826d177068d67dd4af24306c055); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300"><?php echo e(number_format($stats['total_students'] ?? 0)); ?></div>
                                    <div class="mt-1 text-base text-slate-500"><?php echo e(__('global.total_students')); ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Active Attendance -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-8 w-8 text-success','icon' => 'UserCheck']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-8 text-success','icon' => 'UserCheck']); ?>
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
                                        <div class="ml-auto">
                                            <div class="flex items-center text-success">
                                                <?php echo e($attendanceStats['today']['attendance_rate'] ?? 0); ?>%
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'ml-1 h-4 w-4','icon' => 'ChevronUp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-1 h-4 w-4','icon' => 'ChevronUp']); ?>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300"><?php echo e(number_format($stats['active_attendance'] ?? 0)); ?></div>
                                    <div class="mt-1 text-base text-slate-500"><?php echo e(__('global.today_attendance')); ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Teachers -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-8 w-8 text-warning','icon' => 'GraduationCap']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-8 text-warning','icon' => 'GraduationCap']); ?>
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
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300"><?php echo e(number_format($stats['total_teachers'] ?? 0)); ?></div>
                                    <div class="mt-1 text-base text-slate-500"><?php echo e(__('global.total_teachers')); ?></div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Classes -->
                        <div class="intro-y col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="report-box zoom-in before:box before:absolute before:inset-x-3 before:mt-3 before:h-full before:bg-slate-50 before:content-['']">
                                <div class="box p-5">
                                    <div class="flex">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-8 w-8 text-info','icon' => 'Layout']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-8 w-8 text-info','icon' => 'Layout']); ?>
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
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8 text-slate-600 dark:text-slate-300"><?php echo e(number_format($stats['total_classes'] ?? 0)); ?></div>
                                    <div class="mt-1 text-base text-slate-500"><?php echo e(__('global.total_classes')); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Class Utilization -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.class_utilization')); ?></h2>
                    </div>
                    <div class="intro-y box mt-12 p-5 sm:mt-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        <?php echo e($classStats['average_utilization'] ?? 0); ?>%
                                    </div>
                                    <div class="mt-0.5 text-slate-500"><?php echo e(__('global.average_utilization')); ?></div>
                                </div>
                                <div class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5"></div>
                                <div>
                                    <div class="text-lg font-medium text-slate-500 xl:text-xl">
                                        <?php echo e($classStats['total_students'] ?? 0); ?> / <?php echo e($classStats['total_capacity'] ?? 'N/A'); ?>

                                    </div>
                                    <div class="mt-0.5 text-slate-500"><?php echo e(__('global.capacity_usage')); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <?php $__currentLoopData = array_slice($classStats['utilization_rates'] ?? [], 0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mt-4">
                                <div class="flex">
                                    <div class="mr-auto"><?php echo e($class['class_name']); ?></div>
                                    <div><?php echo e($class['utilization_rate']); ?>% (<?php echo e($class['student_count']); ?>/<?php echo e($class['capacity']); ?>)</div>
                                </div>
                                <div class="mt-2 h-1 w-full rounded-full bg-slate-200 dark:bg-darkmode-400">
                                    <div class="h-full rounded-full <?php echo e($class['utilization_rate'] > 90 ? 'bg-danger' : ($class['utilization_rate'] > 75 ? 'bg-warning' : 'bg-primary')); ?>" style="width: <?php echo e($class['utilization_rate']); ?>%"></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <!-- END: Class Utilization -->

                <!-- BEGIN: Attendance Chart -->
                <div class="col-span-12 mt-8 sm:col-span-6 lg:col-span-6">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.attendance_overview')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <div class="w-2 h-2 bg-success rounded-full mr-2"></div>
                                    <span class="text-slate-500"><?php echo e(__('global.present')); ?>: <?php echo e($attendanceStats['today']['present'] ?? 0); ?></span>
                                </div>
                                <div class="flex items-center mr-4">
                                    <div class="w-2 h-2 bg-danger rounded-full mr-2"></div>
                                    <span class="text-slate-500"><?php echo e(__('global.absent')); ?>: <?php echo e($attendanceStats['today']['absent'] ?? 0); ?></span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-2"></div>
                                    <span class="text-slate-500"><?php echo e(__('global.late')); ?>: <?php echo e($attendanceStats['today']['late'] ?? 0); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                             <!-- Using a simple visual representation instead of complex chart for now -->
                             <div class="flex justify-center items-center h-[200px]">
                                <div class="w-48 h-48 rounded-full border-8 border-slate-100 flex items-center justify-center relative">
                                    <div class="absolute inset-0 rounded-full border-8 border-success" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); transform: rotate(<?php echo e(($attendanceStats['today']['attendance_rate'] ?? 0) * 3.6); ?>deg);"></div>
                                    <div class="text-center">
                                        <div class="text-3xl font-bold"><?php echo e($attendanceStats['today']['attendance_rate'] ?? 0); ?>%</div>
                                        <div class="text-slate-500"><?php echo e(__('global.rate')); ?></div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- END: Attendance Chart -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.recent_activities')); ?></h2>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap"><?php echo e(__('global.activity')); ?></th>
                                    <th class="text-center whitespace-nowrap"><?php echo e(__('global.type')); ?></th>
                                    <th class="text-center whitespace-nowrap"><?php echo e(__('global.date')); ?></th>
                                    <th class="text-center whitespace-nowrap"><?php echo e(__('global.status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recentActivities['attendances']->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <div class="rounded-full w-full h-full bg-primary/20 flex items-center justify-center text-primary font-bold">
                                                    <?php echo e(substr($attendance->child->name ?? 'S', 0, 1)); ?>

                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <a href="" class="font-medium whitespace-nowrap"><?php echo e($attendance->child->name ?? 'Student'); ?></a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?php echo e($attendance->child->class->name ?? 'Class'); ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo e(__('global.attendance')); ?></td>
                                    <td class="text-center"><?php echo e($attendance->date); ?></td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center <?php echo e($attendance->status == 'present' ? 'text-success' : 'text-danger'); ?>">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-4 h-4 mr-2','icon' => ''.e($attendance->status == 'present' ? 'CheckSquare' : 'XSquare').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 mr-2','icon' => ''.e($attendance->status == 'present' ? 'CheckSquare' : 'XSquare').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(ucfirst($attendance->status)); ?>

                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php $__currentLoopData = $recentActivities['payments']->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <div class="rounded-full w-full h-full bg-success/20 flex items-center justify-center text-success font-bold">
                                                    $
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <a href="" class="font-medium whitespace-nowrap"><?php echo e($payment->child->name ?? 'Student'); ?></a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"><?php echo e(__('global.payment')); ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center"><?php echo e(__('global.payment')); ?></td>
                                    <td class="text-center"><?php echo e($payment->payment_date); ?></td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-success">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-4 h-4 mr-2','icon' => 'CheckCircle']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 mr-2','icon' => 'CheckCircle']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(number_format($payment->amount)); ?>

                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Recent Activities -->
            </div>
        </div>
        
        <div class="col-span-12 2xl:col-span-3">
            <div class="2xl:border-l -mb-10 pb-10">
                <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Financial Summary -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3 2xl:mt-8">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5"><?php echo e(__('global.financial_summary')); ?></h2>
                        </div>
                        <div class="mt-5">
                            <div class="intro-x box p-5">
                                <div class="flex">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-6 h-6 text-primary','icon' => 'DollarSign']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-primary','icon' => 'DollarSign']); ?>
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
                                    <div class="ml-auto">
                                        <div class="text-success flex items-center">
                                            <?php echo e($financialStats['growth_rate'] ?? 0); ?>% <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-4 h-4 ml-1','icon' => 'ChevronUp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4 ml-1','icon' => 'ChevronUp']); ?>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="text-2xl font-medium mt-5"><?php echo e(number_format($financialStats['current_month'] ?? 0)); ?></div>
                                <div class="text-slate-500"><?php echo e(__('global.monthly_revenue')); ?></div>
                            </div>
                            <div class="intro-x box p-5 mt-5">
                                <div class="flex">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-6 h-6 text-danger','icon' => 'CreditCard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 text-danger','icon' => 'CreditCard']); ?>
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
                                </div>
                                <div class="text-2xl font-medium mt-5"><?php echo e(number_format($financialStats['pending_payments'] ?? 0)); ?></div>
                                <div class="text-slate-500"><?php echo e(__('global.pending_payments')); ?></div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Financial Summary -->

                    <!-- BEGIN: Upcoming Events -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5"><?php echo e(__('global.upcoming_events')); ?></h2>
                        </div>
                        <div class="mt-5">
                            <?php $__empty_1 = true; $__currentLoopData = $recentActivities['events'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <div class="w-full h-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                            <?php echo e(\Carbon\Carbon::parse($event->start_datetime)->format('d')); ?>

                                        </div>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium"><?php echo e($event->title); ?></div>
                                        <div class="text-slate-500 text-xs mt-0.5"><?php echo e(\Carbon\Carbon::parse($event->start_datetime)->format('M d, H:i')); ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="intro-x text-center text-slate-500 py-4">
                                <?php echo e(__('global.no_upcoming_events')); ?>

                            </div>
                            <?php endif; ?>
                            <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                        </div>
                    </div>
                    <!-- END: Upcoming Events -->
                    
                    <!-- BEGIN: Quick Actions -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5"><?php echo e(__('global.quick_actions')); ?></h2>
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-4">
                            <?php $__currentLoopData = $quickActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route($action['route'])); ?>" class="intro-x box p-5 flex items-center transition-all duration-200 hover:scale-[1.01]">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-6 h-6 mr-3 text-'.e($action['color']).'','icon' => ''.e($action['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-6 h-6 mr-3 text-'.e($action['color']).'','icon' => ''.e($action['icon']).'']); ?>
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
                                <div class="font-medium"><?php echo e(__($action['title'])); ?></div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- END: Quick Actions -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/resources/views/pages/dashboard-overview-1.blade.php ENDPATH**/ ?>