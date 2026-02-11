

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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.total_students')).'','value' => ''.e($generalMetrics['total_students']).'','icon' => 'Users','color' => 'primary','route' => 'children.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.total_teachers')).'','value' => ''.e($generalMetrics['total_teachers']).'','icon' => 'User','color' => 'pending','route' => 'teachers.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.monthly_revenue')).'','value' => ''.e($financialSummary['current_month_revenue']).'','format' => 'currency','icon' => 'TrendingUp','color' => 'success','route' => 'finance.revenue'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.total_classes')).'','value' => ''.e($generalMetrics['total_classes']).'','icon' => 'Home','color' => 'warning','route' => 'classes.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => ''.e(__('global.active_attendance')).'','value' => ''.e($generalMetrics['active_attendance_today']).'','description' => 'Today\'s attendance','icon' => 'UserCheck','color' => 'info','route' => 'attendance.index'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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
                        
                        <!-- Outstanding Balances -->
                        <?php if (isset($component)) { $__componentOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalccd8d5facfdecf9beccbc6e23c9f0eb4 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\StatCard::resolve(['title' => 'Outstanding Fees','value' => ''.e($outstandingBalances['total_outstanding']).'','format' => 'currency','description' => ''.e($outstandingBalances['count']).' students','icon' => 'DollarSign','color' => 'danger','route' => 'finance.outstanding-balances'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

                <!-- BEGIN: Financial Summary -->
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="intro-y block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.financial_reporting')); ?></h2>
                        <div class="relative mt-3 text-slate-500 sm:ml-auto sm:mt-0">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4','icon' => 'Calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4','icon' => 'Calendar']); ?>
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
                            <?php if (isset($component)) { $__componentOriginal398ab4cd6da012e7fa913c6582e9e7a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal398ab4cd6da012e7fa913c6582e9e7a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.litepicker.index','data' => ['class' => 'datepicker !box pl-10 sm:w-56','type' => 'text','options' => [
                                    'format' => 'YYYY-MM-DD',
                                    'singleMode' => false,
                                ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.litepicker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'datepicker !box pl-10 sm:w-56','type' => 'text','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
                                    'format' => 'YYYY-MM-DD',
                                    'singleMode' => false,
                                ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal398ab4cd6da012e7fa913c6582e9e7a1)): ?>
<?php $attributes = $__attributesOriginal398ab4cd6da012e7fa913c6582e9e7a1; ?>
<?php unset($__attributesOriginal398ab4cd6da012e7fa913c6582e9e7a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal398ab4cd6da012e7fa913c6582e9e7a1)): ?>
<?php $component = $__componentOriginal398ab4cd6da012e7fa913c6582e9e7a1; ?>
<?php unset($__componentOriginal398ab4cd6da012e7fa913c6582e9e7a1); ?>
<?php endif; ?>
                        </div>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="flex">
                                <div>
                                    <div class="text-lg font-medium text-primary dark:text-slate-300 xl:text-xl">
                                        <?php echo e(__('global.currency_symbol', ['amount' => number_format($financialSummary['current_month_revenue'])])); ?>

                                    </div>
                                    <div class="mt-0.5 text-slate-500"><?php echo e(__('global.this_month_revenue')); ?></div>
                                </div>
                                <div
                                    class="mx-4 h-12 w-px border border-r border-dashed border-slate-200 dark:border-darkmode-300 xl:mx-5">
                                </div>
                                <div>
                                    <div class="text-lg font-medium text-danger xl:text-xl">
                                        <?php echo e(__('global.currency_symbol', ['amount' => number_format($financialSummary['current_month_expenses'])])); ?>

                                    </div>
                                    <div class="mt-0.5 text-slate-500"><?php echo e(__('global.total_expenses')); ?></div>
                                </div>
                            </div>
                            <?php if (isset($component)) { $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.index','data' => ['class' => 'mt-5 md:ml-auto md:mt-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-5 md:ml-auto md:mt-0']); ?>
                                <?php if (isset($component)) { $__componentOriginalee790a68fb753a38af981253b3b3ce0d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee790a68fb753a38af981253b3b3ce0d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.button','data' => ['class' => 'font-normal','as' => 'x-base.button','variant' => 'outline-secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-normal','as' => 'x-base.button','variant' => 'outline-secondary']); ?>
                                    <?php echo e(__('global.filter_by_category')); ?>

                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'ml-2 h-4 w-4','icon' => 'ChevronDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-2 h-4 w-4','icon' => 'ChevronDown']); ?>
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
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $attributes = $__attributesOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__attributesOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee790a68fb753a38af981253b3b3ce0d)): ?>
<?php $component = $__componentOriginalee790a68fb753a38af981253b3b3ce0d; ?>
<?php unset($__componentOriginalee790a68fb753a38af981253b3b3ce0d); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginalc2c5cf34ff0736adab9e02c67429c492 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.items','data' => ['class' => 'h-32 w-40 overflow-y-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.items'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-32 w-40 overflow-y-auto']); ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('global.tuition_fees')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('global.activity_fees')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('global.material_fees')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalebbcd783000cea0f80b377611a7f2faa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalebbcd783000cea0f80b377611a7f2faa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.menu.item','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.menu.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('global.other_fees')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $attributes = $__attributesOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__attributesOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalebbcd783000cea0f80b377611a7f2faa)): ?>
<?php $component = $__componentOriginalebbcd783000cea0f80b377611a7f2faa; ?>
<?php unset($__componentOriginalebbcd783000cea0f80b377611a7f2faa); ?>
<?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $attributes = $__attributesOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__attributesOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492)): ?>
<?php $component = $__componentOriginalc2c5cf34ff0736adab9e02c67429c492; ?>
<?php unset($__componentOriginalc2c5cf34ff0736adab9e02c67429c492); ?>
<?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $attributes = $__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__attributesOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3)): ?>
<?php $component = $__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3; ?>
<?php unset($__componentOriginal2d0351d0177fb7c133a6e2bbc4d48de3); ?>
<?php endif; ?>
                        </div>
                        
                        <!-- Revenue vs Expenses Chart -->
                        <div class="mt-6">
                            <canvas id="revenueChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: Financial Summary -->

                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 mt-8 sm:col-span-6 lg:col-span-6">
                    <?php if (isset($component)) { $__componentOriginalf71747139989dd29bf9c7fe186e92e5c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf71747139989dd29bf9c7fe186e92e5c = $attributes; } ?>
<?php $component = App\View\Components\Widgets\ListCard::resolve(['title' => ''.e(__('global.recent_activities')).'','items' => $recentActivities,'icon' => 'Activity','color' => 'primary','route' => 'dashboard-overview-1','showViewAll' => true,'emptyMessage' => ''.e(__('global.no_recent_activities')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.list-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\ListCard::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf71747139989dd29bf9c7fe186e92e5c)): ?>
<?php $attributes = $__attributesOriginalf71747139989dd29bf9c7fe186e92e5c; ?>
<?php unset($__attributesOriginalf71747139989dd29bf9c7fe186e92e5c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf71747139989dd29bf9c7fe186e92e5c)): ?>
<?php $component = $__componentOriginalf71747139989dd29bf9c7fe186e92e5c; ?>
<?php unset($__componentOriginalf71747139989dd29bf9c7fe186e92e5c); ?>
<?php endif; ?>
                </div>
                <!-- END: Recent Activities -->

                <!-- BEGIN: Quick Actions -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.quick_actions')); ?></h2>
                    </div>
                    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php $__currentLoopData = $quickActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginaldfc9132c28d6bba63a75aefa88d51f82 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldfc9132c28d6bba63a75aefa88d51f82 = $attributes; } ?>
<?php $component = App\View\Components\Widgets\QuickAction::resolve(['title' => $action['title'],'description' => $action['description'],'icon' => $action['icon'],'route' => $action['route'],'color' => $action['color'],'permission' => $action['permission'] ?? null] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('widgets.quick-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Widgets\QuickAction::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldfc9132c28d6bba63a75aefa88d51f82)): ?>
<?php $attributes = $__attributesOriginaldfc9132c28d6bba63a75aefa88d51f82; ?>
<?php unset($__attributesOriginaldfc9132c28d6bba63a75aefa88d51f82); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldfc9132c28d6bba63a75aefa88d51f82)): ?>
<?php $component = $__componentOriginaldfc9132c28d6bba63a75aefa88d51f82; ?>
<?php unset($__componentOriginaldfc9132c28d6bba63a75aefa88d51f82); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- END: Quick Actions -->

                <!-- BEGIN: Enrollment Statistics -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.enrollment_statistics')); ?></h2>
                    </div>
                    <div class="intro-y box mt-5 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-primary"><?php echo e($enrollmentStats['total_enrolled']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.total_enrolled')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-success"><?php echo e($enrollmentStats['total_capacity']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.total_capacity')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-warning"><?php echo e($enrollmentStats['total_available']); ?></div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.available_spots')); ?></div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-info"><?php echo e($enrollmentStats['overall_occupancy']); ?>%</div>
                                <div class="text-sm text-slate-500"><?php echo e(__('global.occupancy_rate')); ?></div>
                            </div>
                        </div>
                        
                        <!-- Class-wise enrollment -->
                        <div class="mt-6">
                            <h3 class="text-md font-medium mb-3"><?php echo e(__('global.by_class')); ?></h3>
                            <div class="space-y-2">
                                <?php $__currentLoopData = $enrollmentStats['by_class']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classStat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="flex items-center justify-between p-2 bg-slate-50 rounded">
                                        <span class="font-medium"><?php echo e($classStat['class_name']); ?></span>
                                        <div class="flex items-center space-x-4">
                                            <span class="text-sm">
                                                <?php echo e($classStat['enrolled']); ?>/<?php echo e($classStat['capacity']); ?>

                                            </span>
                                            <div class="w-24 bg-slate-200 rounded-full h-2">
                                                <div 
                                                    class="bg-<?php echo e($classStat['occupancy_rate'] > 80 ? 'danger' : ($classStat['occupancy_rate'] > 60 ? 'warning' : 'success')); ?> h-2 rounded-full" 
                                                    style="width: <?php echo e($classStat['occupancy_rate']); ?>%">
                                                </div>
                                            </div>
                                            <span class="text-sm w-12 text-right"><?php echo e($classStat['occupancy_rate']); ?>%</span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Enrollment Statistics -->
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 pb-10 2xl:border-l">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                    <!-- BEGIN: Upcoming Events -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 2xl:mt-8">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.upcoming_events')); ?></h2>
                        </div>
                        <div class="mt-5">
                            <?php if(count($upcomingEvents) > 0): ?>
                                <?php $__currentLoopData = array_slice($upcomingEvents, 0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="intro-y">
                                        <div class="box zoom-in mb-3 p-4">
                                            <div class="font-medium truncate"><?php echo e($event['title']); ?></div>
                                            <div class="mt-1 text-xs text-slate-500">
                                                <?php echo e(\Carbon\Carbon::parse($event['start_date'])->format('M d, Y')); ?>

                                            </div>
                                            <div class="mt-2 text-xs text-slate-400">
                                                <?php echo e($event['days_until']); ?> <?php echo e(__('global.days_until')); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <a
                                    class="intro-y block w-full rounded-md border border-dotted border-slate-400 py-3 text-center text-slate-500 dark:border-darkmode-300"
                                    href="<?php echo e(route('events.index')); ?>"
                                >
                                    <?php echo e(__('global.view_all_events')); ?>

                                </a>
                            <?php else: ?>
                                <div class="text-center py-8 text-slate-500">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-12 w-12 mx-auto mb-3 text-slate-300','icon' => 'Calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-12 w-12 mx-auto mb-3 text-slate-300','icon' => 'Calendar']); ?>
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
                                    <p><?php echo e(__('global.no_upcoming_events')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- END: Upcoming Events -->

                    <!-- BEGIN: Recent Payments -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12">
                        <div class="intro-y flex h-10 items-center">
                            <h2 class="mr-5 truncate text-lg font-medium"><?php echo e(__('global.recent_payments')); ?></h2>
                        </div>
                        <div class="mt-5">
                            <?php if(isset($financialSummary['recent_payments']) && count($financialSummary['recent_payments']) > 0): ?>
                                <?php $__currentLoopData = array_slice($financialSummary['recent_payments'], 0, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="intro-y">
                                        <div class="box zoom-in mb-3 flex items-center px-4 py-3">
                                            <div class="image-fit h-10 w-10 flex-none overflow-hidden rounded-full">
                                                <img
                                                    src="<?php echo e($payment['child_photo'] ?? 'https://via.placeholder.com/150'); ?>"
                                                    alt="Student"
                                                />
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium"><?php echo e($payment['child_name']); ?></div>
                                                <div class="mt-0.5 text-xs text-slate-500">
                                                    <?php echo e($payment['date']); ?>

                                                </div>
                                            </div>
                                            <div class="text-success font-medium">
                                                +$<?php echo e(number_format($payment['amount'], 2)); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="text-center py-8 text-slate-500">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-12 w-12 mx-auto mb-3 text-slate-300','icon' => 'DollarSign']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-12 w-12 mx-auto mb-3 text-slate-300','icon' => 'DollarSign']); ?>
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
                                    <p><?php echo e(__('global.no_recent_payments')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- END: Recent Payments -->
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php $__currentLoopData = $financialSummary['monthly_revenue']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>'<?php echo e($revenue->month); ?>',<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
                datasets: [{
                    label: 'Revenue',
                    data: [<?php $__currentLoopData = $financialSummary['monthly_revenue']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $revenue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($revenue->total); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1
                }, {
                    label: 'Expenses',
                    data: [<?php $__currentLoopData = $financialSummary['monthly_expenses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($expense->total); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
                    borderColor: 'rgb(255, 99, 132)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
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
<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\dashboard-improved.blade.php ENDPATH**/ ?>