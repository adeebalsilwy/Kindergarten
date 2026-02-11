

<?php $__env->startSection('subhead'); ?>
    <title>Log Details - Deebo</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Command Log: #<?php echo e($log->id); ?></h2>
        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('monitoring.index')).'','class' => 'w-24 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'outline-secondary','as' => 'a','href' => ''.e(route('monitoring.index')).'','class' => 'w-24 mr-2']); ?>Back <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <div class="box p-5">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Command</div>
                        <div class="mt-1 font-medium text-lg"><?php echo e($log->command); ?></div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Execution Date</div>
                        <div class="mt-1 font-medium"><?php echo e($log->created_at->format('Y-m-d H:i:s')); ?></div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Status</div>
                        <div class="mt-1 inline-flex items-center <?php echo e($log->status == 'success' ? 'text-success' : ($log->status == 'failed' ? 'text-danger' : 'text-warning')); ?>">
                             <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($log->status == 'success' ? 'CheckCircle' : ($log->status == 'failed' ? 'XCircle' : 'RefreshCcw')).'','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($log->status == 'success' ? 'CheckCircle' : ($log->status == 'failed' ? 'XCircle' : 'RefreshCcw')).'','class' => 'w-4 h-4 mr-2']); ?>
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
                            <?php echo e(ucfirst($log->status)); ?>

                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        <div class="text-slate-500">Duration</div>
                        <div class="mt-1 font-medium"><?php echo e($log->updated_at->diffForHumans($log->created_at, true)); ?></div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-base font-medium border-b pb-2 mb-4">Parameters</h3>
                    <pre class="bg-slate-100 p-4 rounded dark:bg-darkmode-400 overflow-x-auto"><code><?php echo e(json_encode($log->parameters, JSON_PRETTY_PRINT)); ?></code></pre>
                </div>

                <?php if($log->output): ?>
                <div class="mt-10">
                    <h3 class="text-base font-medium border-b pb-2 mb-4">Output</h3>
                    <div class="bg-slate-800 text-slate-100 p-4 rounded font-mono text-sm overflow-x-auto whitespace-pre-wrap"><?php echo e($log->output); ?></div>
                </div>
                <?php endif; ?>

                <?php if($log->error_message): ?>
                <div class="mt-10">
                    <h3 class="text-base font-medium border-b pb-2 mb-4 text-danger">Error Message</h3>
                    <div class="bg-danger/10 text-danger p-4 rounded font-mono text-sm overflow-x-auto whitespace-pre-wrap"><?php echo e($log->error_message); ?></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\monitoring\show.blade.php ENDPATH**/ ?>