<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('global.login')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'p-3 sm:px-8 relative min-h-screen overflow-y-auto bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ]); ?>">
        <div class="container relative z-10 sm:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- BEGIN: Login Info -->
                <div class="hidden lg:flex min-h-full flex-col">
                    <a
                        class="-intro-x flex items-center pt-5"
                        href=""
                    >
                        <img
                            class="w-10"
                            src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>"
                            alt="<?php echo e(config('app.name')); ?>"
                        />
                        <span class="ms-3 text-2xl font-bold text-white"> <?php echo e(config('app.name')); ?> </span>
                    </a>
                    <div class="my-auto">
                        <img
                            class="-intro-x -mt-16 w-1/2"
                            src="<?php echo e(Vite::asset('resources/images/illustration.svg')); ?>"
                            alt="<?php echo e(config('app.name')); ?>"
                        />
                        <div class="-intro-x mt-10 text-4xl font-medium leading-tight text-white">
                            <?php echo e(__('global.auth_intro_sign_in')); ?>

                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                            <?php echo e(__('global.manage_accounts_one_place')); ?>

                        </div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="my-10 flex min-h-screen py-5 xl:my-0 xl:min-h-0 xl:h-auto xl:py-0 overflow-y-auto w-full">
                    <div
                        class="mx-auto my-auto w-full max-w-xl rounded-2xl bg-white/90 backdrop-blur px-6 py-8 shadow-xl ring-1 ring-slate-200 dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/3 xl:w-auto xl:bg-white xl:p-8">
                        
                        <?php
                            $currentLocale = app()->getLocale();
                            // Ensure activeLangs is defined and is a collection
                            $activeLangs = $activeLangs ?? collect([]);
                            
                            $currentLang = $activeLangs->where('code', $currentLocale)->first();
                            $nextLang = $activeLangs->where('code', '!=', $currentLocale)->first() ?? $activeLangs->first();
                        ?>
                        
                        <?php
                            $demoAccounts = isset($demoAccounts) && !empty($demoAccounts) ? $demoAccounts : [
                                ['role_key' => 'administrator', 'email' => 'admin@kindergarten.ye', 'password' => 'admin123'],
                                ['role_key' => 'principal', 'email' => 'principal@kindergarten.ye', 'password' => 'principal123'],
                                ['role_key' => 'accountant', 'email' => 'accountant@kindergarten.ye', 'password' => 'accountant123'],
                                ['role_key' => 'teacher', 'email' => 'teacher@kindergarten.ye', 'password' => 'teacher123'],
                                ['role_key' => 'staff', 'email' => 'staff@kindergarten.ye', 'password' => 'staff123'],
                                ['role_key' => 'parent_user', 'email' => 'parent@kindergarten.ye', 'password' => 'parent123'],
                            ];
                            $roleIcons = [
                                'administrator' => 'Shield',
                                'principal'    => 'UserCog',
                                'accountant'   => 'Calculator',
                                'teacher'      => 'GraduationCap',
                                'staff'        => 'Users',
                                'parent_user'  => 'User',
                                '1'            => 'User', // Fallback for numeric keys if any
                            ];
                        ?>
                        
                        <div class="intro-x flex justify-between items-center mb-10">
                            <div class="flex items-center">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Globe','class' => 'w-5 h-5 text-slate-600 dark:text-slate-400 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Globe','class' => 'w-5 h-5 text-slate-600 dark:text-slate-400 me-2']); ?>
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
                                <span class="text-slate-600 dark:text-slate-400 text-sm">
                                    <?php echo e($currentLang ? $currentLang->name : app()->getLocale()); ?>

                                </span>
                            </div>
                            <?php if($nextLang): ?>
                            <a href="<?php echo e(route('locale.switch', $nextLang->code)); ?>" class="flex items-center text-slate-600 dark:text-slate-400 hover:text-primary transition-colors">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'RefreshCw','class' => 'w-5 h-5 me-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'RefreshCw','class' => 'w-5 h-5 me-1']); ?>
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
                                <span class="font-medium text-xs"><?php echo e(__('global.change_language')); ?></span>
                            </a>
                            <?php endif; ?>
                        </div>

                        <h2 class="intro-x text-center text-2xl font-bold xl:text-start xl:text-3xl">
                            <?php echo e(__('global.login')); ?>

                        </h2>
                        <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                            <?php echo e(__('global.auth_intro_sign_in')); ?> <?php echo e(__('global.manage_accounts_one_place')); ?>

                        </div>

                        <div class="intro-x mt-8">
                            <!-- Security Indicator -->
                            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                                <div class="flex items-center">
                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Shield','class' => 'w-5 h-5 text-blue-500 me-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Shield','class' => 'w-5 h-5 text-blue-500 me-3']); ?>
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
                                    <div>
                                        <div class="font-medium text-blue-800"><?php echo e(__('global.secure_login')); ?></div>
                                        <div class="text-sm text-blue-600 mt-1">
                                            <?php echo e(__('global.login_attempts_remaining', ['attempts' => $remainingAttempts ?? 5])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if($errors->any()): ?>
                                <?php if (isset($component)) { $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.alert.index','data' => ['variant' => 'danger','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'danger','class' => 'mb-6']); ?>
                                    <div class="font-medium"><?php echo e(__('global.validation_errors')); ?></div>
                                    <ul class="mt-2 text-sm">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf)): ?>
<?php $attributes = $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf; ?>
<?php unset($__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaedd4f8693339056cc3bcfecdf92dacf)): ?>
<?php $component = $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf; ?>
<?php unset($__componentOriginalaedd4f8693339056cc3bcfecdf92dacf); ?>
<?php endif; ?>
                            <?php endif; ?>
                            
                            <?php if(session('success')): ?>
                                <?php if (isset($component)) { $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.alert.index','data' => ['variant' => 'success','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'success','class' => 'mb-6']); ?>
                                    <?php echo e(session('success')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf)): ?>
<?php $attributes = $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf; ?>
<?php unset($__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaedd4f8693339056cc3bcfecdf92dacf)): ?>
<?php $component = $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf; ?>
<?php unset($__componentOriginalaedd4f8693339056cc3bcfecdf92dacf); ?>
<?php endif; ?>
                            <?php endif; ?>
                            <?php if(session('error')): ?>
                                <?php if (isset($component)) { $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.alert.index','data' => ['variant' => 'danger','class' => 'mb-6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'danger','class' => 'mb-6']); ?>
                                    <?php echo e(session('error')); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf)): ?>
<?php $attributes = $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf; ?>
<?php unset($__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaedd4f8693339056cc3bcfecdf92dacf)): ?>
<?php $component = $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf; ?>
<?php unset($__componentOriginalaedd4f8693339056cc3bcfecdf92dacf); ?>
<?php endif; ?>
                            <?php endif; ?>
                            
                            <form method="POST" action="<?php echo e(route('auth.login.post')); ?>" id="login-form">
                                <?php echo csrf_field(); ?>
                                <div class="mb-4">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>
                                        <?php echo e(__('global.email_address')); ?> *
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'intro-x block min-w-full px-4 py-3 xl:min-w-[400px] border-slate-300 focus:border-primary focus:ring-primary','type' => 'email','name' => 'email','id' => 'email','placeholder' => ''.e(__('global.enter_your_email')).'','value' => ''.e(old('email')).'','required' => true,'autocomplete' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x block min-w-full px-4 py-3 xl:min-w-[400px] border-slate-300 focus:border-primary focus:ring-primary','type' => 'email','name' => 'email','id' => 'email','placeholder' => ''.e(__('global.enter_your_email')).'','value' => ''.e(old('email')).'','required' => true,'autocomplete' => 'email']); ?>
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
                                    <?php if($errors->has('email')): ?>
                                        <?php if (isset($component)) { $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-help.index','data' => ['class' => 'text-danger mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-help'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-danger mt-2']); ?><?php echo e($errors->first('email')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $attributes = $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $component = $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-4">
                                    <?php if (isset($component)) { $__componentOriginal0b5a207e31917d1ae3d42744188acbdf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-label.index','data' => ['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-medium text-slate-700 dark:text-slate-300 mb-2']); ?>
                                        <?php echo e(__('global.password')); ?> *
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $attributes = $__attributesOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__attributesOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf)): ?>
<?php $component = $__componentOriginal0b5a207e31917d1ae3d42744188acbdf; ?>
<?php unset($__componentOriginal0b5a207e31917d1ae3d42744188acbdf); ?>
<?php endif; ?>
                                    <div class="relative">
                                        <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'intro-x block min-w-full px-4 py-3 xl:min-w-[400px] border-slate-300 focus:border-primary focus:ring-primary pe-12','type' => 'password','name' => 'password','id' => 'password','placeholder' => ''.e(__('global.enter_your_password')).'','required' => true,'autocomplete' => 'current-password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x block min-w-full px-4 py-3 xl:min-w-[400px] border-slate-300 focus:border-primary focus:ring-primary pe-12','type' => 'password','name' => 'password','id' => 'password','placeholder' => ''.e(__('global.enter_your_password')).'','required' => true,'autocomplete' => 'current-password']); ?>
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
                                        <button type="button" class="absolute inset-y-0 right-0 pe-3 flex items-center" onclick="togglePasswordVisibility()">
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Eye','class' => 'w-5 h-5 text-slate-400 hover:text-slate-600','id' => 'eye-icon']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Eye','class' => 'w-5 h-5 text-slate-400 hover:text-slate-600','id' => 'eye-icon']); ?>
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
                                        </button>
                                    </div>
                                    <?php if($errors->has('password')): ?>
                                        <?php if (isset($component)) { $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-help.index','data' => ['class' => 'text-danger mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-help'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-danger mt-2']); ?><?php echo e($errors->first('password')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $attributes = $__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__attributesOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de)): ?>
<?php $component = $__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de; ?>
<?php unset($__componentOriginal1dd8ac463ddec31bf1a4b0eb4904d7de); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="intro-x mt-4 flex text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                    <div class="me-auto flex items-center">
                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['class' => 'me-2 border','id' => 'remember-me','type' => 'checkbox','name' => 'remember']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'me-2 border','id' => 'remember-me','type' => 'checkbox','name' => 'remember']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $attributes = $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__attributesOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd)): ?>
<?php $component = $__componentOriginal45dc70583f76c3df9e7383efd567b5fd; ?>
<?php unset($__componentOriginal45dc70583f76c3df9e7383efd567b5fd); ?>
<?php endif; ?>
                                        <label
                                            class="cursor-pointer select-none ms-2"
                                            for="remember-me"
                                        >
                                            <?php echo e(__('global.remember_me')); ?>

                                        </label>
                                    </div>
                                    <a href="<?php echo e(route('password.request')); ?>" class="text-primary hover:underline"><?php echo e(__('global.forgot_password')); ?></a>
                                </div>

                                <div class="intro-x mt-5 text-center xl:mt-8 xl:text-start">
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'w-full px-4 py-3 align-top xl:me-3 xl:w-40 flex items-center justify-center','variant' => 'primary','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full px-4 py-3 align-top xl:me-3 xl:w-40 flex items-center justify-center','variant' => 'primary','type' => 'submit']); ?>
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'LogIn','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'LogIn','class' => 'w-4 h-4 me-2']); ?>
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
                                </div>
                            </form>

                            <?php if(!empty($demoAccounts)): ?>
                                <div class="intro-x mt-10" id="demo-section">
                                    <div class="flex items-center mb-4">
                                        <div class="h-[1px] flex-1 bg-slate-200 dark:bg-darkmode-400"></div>
                                        <span class="px-3 text-slate-500 text-xs uppercase font-semibold"><?php echo e(__('global.demo_accounts')); ?></span>
                                        <div class="h-[1px] flex-1 bg-slate-200 dark:bg-darkmode-400"></div>
                                    </div>
                                    <div class="mb-3">
                                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['id' => 'demo-toggle','variant' => 'outline-secondary','class' => 'w-full sm:w-auto px-3 py-2 flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'demo-toggle','variant' => 'outline-secondary','class' => 'w-full sm:w-auto px-3 py-2 flex items-center']); ?>
                                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ChevronUp','class' => 'w-4 h-4 me-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ChevronUp','class' => 'w-4 h-4 me-2']); ?>
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
                                            <span class="text-xs font-medium"><?php echo e(__('global.quick_login')); ?></span>
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
                                    </div>
                                    <div id="demo-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                        <?php $__currentLoopData = $demoAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="relative group">
                                                <button
                                                    type="button"
                                                    class="demo-account w-full p-3 rounded-lg border border-slate-200 dark:border-darkmode-400 bg-slate-50 dark:bg-darkmode-700 hover:bg-primary hover:border-primary focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-200 text-start"
                                                    data-email="<?php echo e($acc['email']); ?>"
                                                    data-password="<?php echo e($acc['password']); ?>"
                                                    title="<?php echo e(__('global.click_to_fill')); ?>"
                                                >
                                                    <div class="flex items-center">
                                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($roleIcons[$acc['role_key']] ?? 'User').'','class' => 'w-4 h-4 me-2 text-slate-500 group-hover:text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($roleIcons[$acc['role_key']] ?? 'User').'','class' => 'w-4 h-4 me-2 text-slate-500 group-hover:text-white']); ?>
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
                                                        <div>
                                                            <div class="text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-white truncate">
                                                                <?php echo e(__($acc['role_key'])); ?>

                                                            </div>
                                                            <div class="text-[10px] text-slate-500 dark:text-slate-400 group-hover:text-white/80 truncate mt-1">
                                                                <?php echo e($acc['email']); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </button>
                                                <button 
                                                    type="button"
                                                    class="demo-copy absolute top-2 right-2 p-1 text-slate-400 hover:text-primary dark:hover:text-white group-hover:text-white transition-colors"
                                                    data-email="<?php echo e($acc['email']); ?>"
                                                    data-password="<?php echo e($acc['password']); ?>"
                                                    aria-label="<?php echo e(__('global.copy')); ?>"
                                                >
                                                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Copy','class' => 'w-3 h-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Copy','class' => 'w-3 h-3']); ?>
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
                                                </button>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="intro-x mt-10 text-center text-slate-600 dark:text-slate-500 xl:mt-24 xl:text-start">
                            <?php echo e(__('global.agree_terms_prefix')); ?>

                            <a
                                class="text-primary dark:text-slate-200 underline"
                                href=""
                            >
                                <?php echo e(__('global.terms_and_conditions')); ?>

                            </a>
                            &
                            <a
                                class="text-primary dark:text-slate-200 underline"
                                href=""
                            >
                                <?php echo e(__('global.privacy_policy')); ?>

                            </a>
                        </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
    </div>

    <!-- Notification Container -->
    <div id="copy-notification" class="fixed bottom-5 right-5 z-[100] transform translate-y-20 transition-transform duration-300">
        <div class="bg-success text-white px-4 py-3 rounded-lg shadow-lg flex items-center">
            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CheckCircle','class' => 'w-5 h-5 me-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CheckCircle','class' => 'w-5 h-5 me-3']); ?>
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
            <span id="notification-message"><?php echo e(__('global.copied_to_clipboard')); ?></span>
        </div>
    </div>

<?php if (! $__env->hasRenderedOnce('a80f7e2e-26da-44d4-abc7-791689fb3111')): $__env->markAsRenderedOnce('a80f7e2e-26da-44d4-abc7-791689fb3111');
$__env->startPush('scripts'); ?>
    <script>
        // Password visibility toggle
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('icon', 'EyeOff');
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('icon', 'Eye');
            }
        }
        
        // Demo account functionality
        function fillDemoData(email, password) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            if (emailInput && passwordInput) {
                emailInput.value = email;
                passwordInput.value = password;
                emailInput.focus();
                emailInput.classList.add('ring-2', 'ring-green-500');
                passwordInput.classList.add('ring-2', 'ring-green-500');
                setTimeout(() => {
                    emailInput.classList.remove('ring-2', 'ring-green-500');
                    passwordInput.classList.remove('ring-2', 'ring-green-500');
                }, 800);
            }
        }

        function copyToClipboard(email, password, btn) {
            const text = `Email: ${email}\nPassword: ${password}`;
            
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification('success', '<?php echo e(__('global.copied_to_clipboard')); ?>');
                });
            } else {
                // Fallback
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    showNotification('success', '<?php echo e(__('global.copied_to_clipboard')); ?>');
                } catch (err) {
                    console.error('Fallback: Oops, unable to copy', err);
                    showNotification('error', '<?php echo e(__('global.copy_failed')); ?>');
                }
                document.body.removeChild(textArea);
            }
        }

        function showNotification(type, message) {
            const notification = document.getElementById('copy-notification');
            const messageElement = document.getElementById('notification-message');
            const iconElement = notification.querySelector('svg');
            
            messageElement.textContent = message;
            
            if (type === 'success') {
                notification.className = 'fixed bottom-5 right-5 z-[100] transform translate-y-20 transition-transform duration-300';
                notification.querySelector('div').className = 'bg-success text-white px-4 py-3 rounded-lg shadow-lg flex items-center';
                iconElement.setAttribute('icon', 'CheckCircle');
            } else {
                notification.className = 'fixed bottom-5 right-5 z-[100] transform translate-y-20 transition-transform duration-300';
                notification.querySelector('div').className = 'bg-danger text-white px-4 py-3 rounded-lg shadow-lg flex items-center';
                iconElement.setAttribute('icon', 'XCircle');
            }
            
            notification.classList.remove('translate-y-20');
            notification.classList.add('translate-y-0');
            
            setTimeout(() => {
                notification.classList.remove('translate-y-0');
                notification.classList.add('translate-y-20');
            }, 3000);
        }
        
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('login-form');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const demoButtons = document.querySelectorAll('.demo-account');
            const copyButtons = document.querySelectorAll('.demo-copy');
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.dataset.original = submitButton.innerHTML;
            
            // Add input validation classes
            emailInput.addEventListener('input', function() {
                if (this.value && this.checkValidity()) {
                    this.classList.add('border-green-500');
                    this.classList.remove('border-red-500');
                } else if (this.value) {
                    this.classList.add('border-red-500');
                    this.classList.remove('border-green-500');
                } else {
                    this.classList.remove('border-green-500', 'border-red-500');
                }
            });
            
            // Bind demo account events
            demoButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const email = this.dataset.email;
                    const password = this.dataset.password;
                    
                    fillDemoData(email, password);
                    
                    // Add visual feedback
                    this.classList.add('ring-2', 'ring-primary');
                    
                    // Trigger input events to ensure any other listeners update state
                    if(emailInput) emailInput.dispatchEvent(new Event('input'));
                    if(passwordInput) passwordInput.dispatchEvent(new Event('input'));

                    // Submit form
                    setTimeout(() => {
                        this.classList.remove('ring-2', 'ring-primary');
                        if (submitButton) {
                            submitButton.click();
                        } else if(form) {
                            form.submit();
                        }
                    }, 100);
                });
            });
            
            // Copy buttons logic
            copyButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (this.disabled) return;
                    
                    const email = this.dataset.email;
                    const password = this.dataset.password;
                    copyToClipboard(email, password, this);
                    
                    // Visual feedback
                    this.disabled = true;
                    const originalHtml = this.innerHTML;
                    this.innerHTML = '<i data-lucide="check" class="w-3 h-3 text-success"></i>';
                    lucide.createIcons();
                    
                    setTimeout(() => { 
                        this.disabled = false;
                        this.innerHTML = originalHtml;
                        lucide.createIcons();
                    }, 1000);
                });
            });
            
            // Form submission enhancement
            form.addEventListener('submit', function(e) {
                if (submitButton.disabled) {
                    e.preventDefault();
                    return;
                }
                
                // Show loading state
                const originalContent = submitButton.innerHTML;
                submitButton.dataset.original = originalContent;
                submitButton.innerHTML = '<i data-lucide="loader" class="w-4 h-4 me-2 animate-spin"></i> <?php echo e(__('global.signing_in')); ?>';
                lucide.createIcons();
                submitButton.disabled = true;
                
                // Revert after 5 seconds if no response (fallback)
                setTimeout(() => {
                    submitButton.innerHTML = originalContent;
                    submitButton.disabled = false;
                    lucide.createIcons();
                }, 8000);
            });
            
            const demoGrid = document.getElementById('demo-grid');
            const demoToggle = document.getElementById('demo-toggle');
            if (demoGrid && demoToggle) {
                demoToggle.addEventListener('click', function() {
                    demoGrid.classList.toggle('hidden');
                    const icon = this.querySelector('svg');
                    if (icon) {
                        icon.setAttribute('icon', demoGrid.classList.contains('hidden') ? 'ChevronDown' : 'ChevronUp');
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views/pages/login.blade.php ENDPATH**/ ?>