<?php $__env->startSection('head'); ?>
    <title><?php echo e(__('global.login')); ?> - <?php echo e(config('app.name')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'p-3 sm:px-8 relative h-screen lg:overflow-hidden bg-primary xl:bg-white dark:bg-darkmode-800 xl:dark:bg-darkmode-600',
        'before:hidden before:xl:block before:content-[\'\'] before:w-[57%] before:-mt-[28%] before:-mb-[16%] before:-ml-[13%] before:absolute before:inset-y-0 before:left-0 before:transform before:rotate-[-4.5deg] before:bg-primary/20 before:rounded-[100%] before:dark:bg-darkmode-400',
        'after:hidden after:xl:block after:content-[\'\'] after:w-[57%] after:-mt-[20%] after:-mb-[13%] after:-ml-[13%] after:absolute after:inset-y-0 after:left-0 after:transform after:rotate-[-4.5deg] after:bg-primary after:rounded-[100%] after:dark:bg-darkmode-700',
    ]); ?>">
        <div class="container relative z-10 sm:px-10">
            <div class="block grid-cols-2 gap-4 xl:grid">
                <!-- BEGIN: Login Info -->
                <div class="hidden min-h-screen flex-col xl:flex">
                    <a
                        class="-intro-x flex items-center pt-5"
                        href=""
                    >
                        <img
                            class="w-10"
                            src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>"
                            alt="<?php echo e(config('app.name')); ?>"
                        />
                        <span class="ml-3 text-2xl font-bold text-white"> <?php echo e(config('app.name')); ?> </span>
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
                <div class="my-10 flex h-screen py-5 xl:my-0 xl:h-auto xl:py-0">
                    <div
                        class="mx-auto my-auto w-full rounded-md bg-white px-5 py-8 shadow-md dark:bg-darkmode-600 sm:w-3/4 sm:px-8 lg:w-2/4 xl:ml-20 xl:w-auto xl:bg-transparent xl:p-0 xl:shadow-none">
                        
                        <?php
                            $activeLangs = \App\Models\Language::where('is_active', true)->get();
                            $currentLocale = app()->getLocale();
                            $currentLang = $activeLangs->where('code', $currentLocale)->first();
                            $nextLang = $activeLangs->where('code', '!=', $currentLocale)->first() ?? $activeLangs->first();
                        ?>
                        
                        <div class="intro-x flex justify-between items-center mb-10">
                            <div class="flex items-center">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Globe','class' => 'w-5 h-5 text-slate-600 dark:text-slate-400 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Globe','class' => 'w-5 h-5 text-slate-600 dark:text-slate-400 mr-2']); ?>
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
                            <a href="<?php echo e(route('locale.switch', $nextLang->code)); ?>" class="flex items-center text-slate-600 dark:text-slate-400 hover:text-primary transition-colors">
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'RefreshCw','class' => 'w-5 h-5 mr-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'RefreshCw','class' => 'w-5 h-5 mr-1']); ?>
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
                        </div>

                        <h2 class="intro-x text-center text-2xl font-bold xl:text-left xl:text-3xl">
                            <?php echo e(__('global.login')); ?>

                        </h2>
                        <div class="intro-x mt-2 text-center text-slate-400 xl:hidden">
                            <?php echo e(__('global.auth_intro_sign_in')); ?> <?php echo e(__('global.manage_accounts_one_place')); ?>

                        </div>

                        <div class="intro-x mt-8">
                            <form method="POST" action="<?php echo e(route('auth.login.post')); ?>" id="login-form">
                                <?php echo csrf_field(); ?>
                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'intro-x block min-w-full px-4 py-3 xl:min-w-[400px]','type' => 'email','name' => 'email','id' => 'email','placeholder' => ''.e(__('global.email')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x block min-w-full px-4 py-3 xl:min-w-[400px]','type' => 'email','name' => 'email','id' => 'email','placeholder' => ''.e(__('global.email')).'','required' => true]); ?>
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
                                
                                <?php if (isset($component)) { $__componentOriginal40054831fd8fc1521987609af4b37cc0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal40054831fd8fc1521987609af4b37cc0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-input.index','data' => ['class' => 'intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[400px]','type' => 'password','name' => 'password','id' => 'password','placeholder' => ''.e(__('global.password')).'','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'intro-x mt-4 block min-w-full px-4 py-3 xl:min-w-[400px]','type' => 'password','name' => 'password','id' => 'password','placeholder' => ''.e(__('global.password')).'','required' => true]); ?>
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

                                <div class="intro-x mt-4 flex text-xs text-slate-600 dark:text-slate-500 sm:text-sm">
                                    <div class="mr-auto flex items-center">
                                        <?php if (isset($component)) { $__componentOriginal45dc70583f76c3df9e7383efd567b5fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal45dc70583f76c3df9e7383efd567b5fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.form-check.input','data' => ['class' => 'mr-2 border','id' => 'remember-me','type' => 'checkbox','name' => 'remember']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.form-check.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mr-2 border','id' => 'remember-me','type' => 'checkbox','name' => 'remember']); ?>
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
                                            class="cursor-pointer select-none ml-2"
                                            for="remember-me"
                                        >
                                            <?php echo e(__('global.remember_me')); ?>

                                        </label>
                                    </div>
                                    <a href="<?php echo e(route('password.request')); ?>" class="text-primary hover:underline"><?php echo e(__('global.forgot_password')); ?></a>
                                </div>

                                <div class="intro-x mt-5 text-center xl:mt-8 xl:text-left">
                                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['class' => 'w-full px-4 py-3 align-top xl:mr-3 xl:w-40','variant' => 'primary','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full px-4 py-3 align-top xl:mr-3 xl:w-40','variant' => 'primary','type' => 'submit']); ?>
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
                                <div class="intro-x mt-10">
                                    <div class="flex items-center mb-4">
                                        <div class="h-[1px] flex-1 bg-slate-200 dark:bg-darkmode-400"></div>
                                        <span class="px-3 text-slate-500 text-xs uppercase font-semibold">حسابات تجريبية / Demo Accounts</span>
                                        <div class="h-[1px] flex-1 bg-slate-200 dark:bg-darkmode-400"></div>
                                    </div>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                        <?php $__currentLoopData = $demoAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="relative group">
                                                <button
                                                    type="button"
                                                    class="w-full p-3 rounded-lg border border-slate-200 dark:border-darkmode-400 bg-slate-50 dark:bg-darkmode-700 hover:bg-primary hover:border-primary transition-all duration-200 text-left"
                                                    onclick="fillDemoData('<?php echo e($acc['email']); ?>', '<?php echo e($acc['password']); ?>')"
                                                    title="Click to fill or use Copy icon"
                                                >
                                                    <div class="text-xs font-bold text-slate-700 dark:text-slate-300 group-hover:text-white truncate">
                                                        <?php echo e(__($acc['role_key'])); ?>

                                                    </div>
                                                    <div class="text-[10px] text-slate-500 dark:text-slate-400 group-hover:text-white/80 truncate mt-1">
                                                        <?php echo e($acc['email']); ?>

                                                    </div>
                                                </button>
                                                <button 
                                                    type="button"
                                                    class="absolute top-2 right-2 p-1 text-slate-400 hover:text-primary dark:hover:text-white group-hover:text-white transition-colors"
                                                    onclick="copyToClipboard('<?php echo e($acc['email']); ?>', '<?php echo e($acc['password']); ?>', this); event.stopPropagation();"
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

                        <div class="intro-x mt-10 text-center text-slate-600 dark:text-slate-500 xl:mt-24 xl:text-left">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CheckCircle','class' => 'w-5 h-5 mr-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CheckCircle','class' => 'w-5 h-5 mr-3']); ?>
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

<?php if (! $__env->hasRenderedOnce('135ab9be-c80c-4438-b1a6-644359c84573')): $__env->markAsRenderedOnce('135ab9be-c80c-4438-b1a6-644359c84573');
$__env->startPush('scripts'); ?>
    <script>
        function fillDemoData(email, password) {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            if (emailInput && passwordInput) {
                emailInput.value = email;
                passwordInput.value = password;
                
                // Add some visual feedback
                emailInput.classList.add('ring-2', 'ring-primary/50');
                passwordInput.classList.add('ring-2', 'ring-primary/50');
                
                setTimeout(() => {
                    emailInput.classList.remove('ring-2', 'ring-primary/50');
                    passwordInput.classList.remove('ring-2', 'ring-primary/50');
                    document.getElementById('login-form').submit();
                }, 500);
            }
        }

        function copyToClipboard(email, password, btn) {
            const text = `Email: ${email}\nPassword: ${password}`;
            
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification();
                });
            } else {
                // Fallback
                const textArea = document.createElement("textarea");
                textArea.value = text;
                document.body.appendChild(textArea);
                textArea.select();
                try {
                    document.execCommand('copy');
                    showNotification();
                } catch (err) {
                    console.error('Fallback: Oops, unable to copy', err);
                }
                document.body.removeChild(textArea);
            }
        }

        function showNotification() {
            const notification = document.getElementById('copy-notification');
            notification.classList.remove('translate-y-20');
            notification.classList.add('translate-y-0');
            
            setTimeout(() => {
                notification.classList.remove('translate-y-0');
                notification.classList.add('translate-y-20');
            }, 3000);
        }
    </script>
<?php $__env->stopPush(); endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views/pages/login.blade.php ENDPATH**/ ?>