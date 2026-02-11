<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('global.reset_password')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-3 sm:px-8 bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600 h-screen lg:overflow-hidden">
        <div class="container relative z-10 sm:px-10">
            <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                <div class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                    <h2 class="text-center text-2xl font-bold xl:text-left xl:text-3xl">
                        <?php echo e(__('global.reset_password')); ?>

                    </h2>
                    <form method="POST" action="<?php echo e(route('password.update')); ?>" class="mt-6">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'block min-w-full px-4 py-3 xl:min-w-[350px]','type' => 'email','name' => 'email','placeholder' => ''.e(__('global.email')).'','value' => ''.e(old('email', $email ?? '')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block min-w-full px-4 py-3 xl:min-w-[350px]','type' => 'email','name' => 'email','placeholder' => ''.e(__('global.email')).'','value' => ''.e(old('email', $email ?? '')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $attributes = $__attributesOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__attributesOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $component = $__componentOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__componentOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php if (isset($component)) { $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-help.index','data' => ['class' => 'text-danger mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-help'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-danger mt-2']); ?><?php echo e($message); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $attributes = $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $component = $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]','type' => 'password','name' => 'password','placeholder' => ''.e(__('global.new_password')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]','type' => 'password','name' => 'password','placeholder' => ''.e(__('global.new_password')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $attributes = $__attributesOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__attributesOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $component = $__componentOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__componentOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php if (isset($component)) { $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-help.index','data' => ['class' => 'text-danger mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-help'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-danger mt-2']); ?><?php echo e($message); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $attributes = $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $component = $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]','type' => 'password','name' => 'password_confirmation','placeholder' => ''.e(__('global.confirm_new_password')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-4 block min-w-full px-4 py-3 xl:min-w-[350px]','type' => 'password','name' => 'password_confirmation','placeholder' => ''.e(__('global.confirm_new_password')).'','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $attributes = $__attributesOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__attributesOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40054831fd8fc1521987609af4b37cc0)): ?>
<?php $component = $__componentOriginal40054831fd8fc1521987609af4b37cc0; ?>
<?php unset($__componentOriginal40054831fd8fc1521987609af4b37cc0); ?>
<?php endif; ?>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <?php if (isset($component)) { $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-help.index','data' => ['class' => 'text-danger mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-help'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-danger mt-2']); ?><?php echo e($message); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $attributes = $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $component = $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="mt-5 text-center xl:text-left">
                            <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'w-full px-4 py-3 xl:w-40','variant' => 'primary','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full px-4 py-3 xl:w-40','variant' => 'primary','type' => 'submit']); ?>
                                <?php echo e(__('global.reset_password')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                            <a href="<?php echo e(route('auth.login')); ?>" class="inline-block w-full xl:w-32 mt-3 xl:mt-0">
                                <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'w-full px-4 py-3','variant' => 'outline-secondary','as' => 'a']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full px-4 py-3','variant' => 'outline-secondary','as' => 'a']); ?>
                                    <?php echo e(__('global.login')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $attributes = $__attributesOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__attributesOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00eb601fbe667f0da582732d70c41c5)): ?>
<?php $component = $__componentOriginale00eb601fbe667f0da582732d70c41c5; ?>
<?php unset($__componentOriginale00eb601fbe667f0da582732d70c41c5); ?>
<?php endif; ?>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\pages\passwords\reset.blade.php ENDPATH**/ ?>