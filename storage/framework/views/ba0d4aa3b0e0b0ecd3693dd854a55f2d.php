

<?php $__env->startSection('subhead'); ?>
    <title><?php echo e(__('global.kindergarten_management_system')); ?> - <?php echo e(__('global.kindergarten_management_system')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subcontent'); ?>
<div class="intro-y">
    <!-- Navigation Bar -->
    <div class="box p-5 md:p-6 sticky top-0 z-50 shadow-lg">
        <div class="flex items-center justify-between">
            <a class="flex items-center" href="<?php echo e(route('home')); ?>">
                <img class="w-6" src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>" alt="<?php echo e(config('app.name')); ?>" />
                <span class="ml-3 text-lg font-semibold"><?php echo e(config('app.name')); ?></span>
            </a>
            
            <!-- Navigation Links and Authentication -->
            <div class="flex items-center gap-3">
                <button id="mobile-nav-toggle" class="md:hidden p-2 rounded-md border border-slate-200">
                    <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Menu','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Menu','class' => 'w-5 h-5']); ?>
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
                <div id="nav-links" class="hidden md:flex items-center gap-3">
                    <a class="text-slate-600 hover:text-primary transition-all duration-300" href="#features"><?php echo e(__('global.features')); ?></a>
                    <a class="text-slate-600 hover:text-primary transition-all duration-300" href="#testimonials"><?php echo e(__('global.testimonials')); ?></a>
                    <a class="text-slate-600 hover:text-primary transition-all duration-300" href="#footer"><?php echo e(__('global.contact_us')); ?></a>
                </div>
                
                <!-- Language Selector -->
                <?php if (isset($component)) { $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.index','data' => ['class' => 'ml-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-2']); ?>
                    <?php if (isset($component)) { $__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.button','data' => ['as' => 'a','class' => 'flex items-center gap-2 hover:bg-slate-100 rounded-lg px-3 py-2 transition-all duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','class' => 'flex items-center gap-2 hover:bg-slate-100 rounded-lg px-3 py-2 transition-all duration-300']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Globe','class' => 'w-4 h-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Globe','class' => 'w-4 h-4']); ?>
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
                        <?php
                            $activeLangs = \App\Models\Language::where('is_active', true)->get();
                            $currentLang = $activeLangs->where('code', app()->getLocale())->first() ?? $activeLangs->first();
                        ?>
                        <span>
                            <span class="font-semibold text-primary"><?php echo e($currentLang->name ?? 'Language'); ?></span>
                        </span>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f)): ?>
<?php $attributes = $__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f; ?>
<?php unset($__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f)): ?>
<?php $component = $__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f; ?>
<?php unset($__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.menu','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php $__currentLoopData = $activeLangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('locale.switch', ['locale' => $lang->code])).'','class' => 'transition-all duration-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('locale.switch', ['locale' => $lang->code])).'','class' => 'transition-all duration-200']); ?>
                                <?php echo e($lang->name); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f)): ?>
<?php $attributes = $__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f; ?>
<?php unset($__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f)): ?>
<?php $component = $__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f; ?>
<?php unset($__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc)): ?>
<?php $attributes = $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc; ?>
<?php unset($__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc)): ?>
<?php $component = $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc; ?>
<?php unset($__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc); ?>
<?php endif; ?>
                
                <!-- User Profile or Auth Buttons -->
                <?php if(auth()->guard()->check()): ?>
                    <!-- User Profile Dropdown when logged in -->
                    <?php if (isset($component)) { $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.button','data' => ['as' => 'a','class' => 'flex items-center gap-2 hover:bg-slate-100 rounded-lg px-3 py-2 transition-all duration-300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','class' => 'flex items-center gap-2 hover:bg-slate-100 rounded-lg px-3 py-2 transition-all duration-300']); ?>
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white font-medium text-sm">
                                <?php echo e(strtoupper(substr(Auth::user()->name ?? 'U', 0, 1))); ?>

                            </div>
                            <span class="hidden md:inline text-slate-700"><?php echo e(Str::limit(Auth::user()->name ?? 'User', 10)); ?></span>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f)): ?>
<?php $attributes = $__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f; ?>
<?php unset($__attributesOriginalba58e9a4a9c2e9003cffbe68273c0c5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f)): ?>
<?php $component = $__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f; ?>
<?php unset($__componentOriginalba58e9a4a9c2e9003cffbe68273c0c5f); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.menu','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('profile.index')).'','class' => 'transition-all duration-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('profile.index')).'','class' => 'transition-all duration-200']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'User','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'User','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.profile')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('profile.edit')).'','class' => 'transition-all duration-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('profile.edit')).'','class' => 'transition-all duration-200']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Settings','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Settings','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.settings')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('dashboard-overview-1')).'','class' => 'transition-all duration-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('dashboard-overview-1')).'','class' => 'transition-all duration-200']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Layout','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Layout','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.dashboard')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal501929cc5a4f686396047841c7c6d22a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal501929cc5a4f686396047841c7c6d22a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.divider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal501929cc5a4f686396047841c7c6d22a)): ?>
<?php $attributes = $__attributesOriginal501929cc5a4f686396047841c7c6d22a; ?>
<?php unset($__attributesOriginal501929cc5a4f686396047841c7c6d22a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal501929cc5a4f686396047841c7c6d22a)): ?>
<?php $component = $__componentOriginal501929cc5a4f686396047841c7c6d22a; ?>
<?php unset($__componentOriginal501929cc5a4f686396047841c7c6d22a); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.dropdown.item','data' => ['as' => 'a','href' => ''.e(route('auth.logout')).'','onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();','class' => 'text-red-600 hover:bg-red-50 transition-all duration-200']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('auth.logout')).'','onclick' => 'event.preventDefault(); document.getElementById(\'logout-form\').submit();','class' => 'text-red-600 hover:bg-red-50 transition-all duration-200']); ?>
                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'LogOut','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'LogOut','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.sign_out')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $attributes = $__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__attributesOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0)): ?>
<?php $component = $__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0; ?>
<?php unset($__componentOriginal94c7f5da0e5ac8d371ca91de24cd83b0); ?>
<?php endif; ?>
                            <form id="logout-form" action="<?php echo e(route('auth.logout')); ?>" method="POST" class="hidden">
                                <?php echo csrf_field(); ?>
                            </form>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f)): ?>
<?php $attributes = $__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f; ?>
<?php unset($__attributesOriginal49e4d5b30f37c24695afd5f914cb6d2f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f)): ?>
<?php $component = $__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f; ?>
<?php unset($__componentOriginal49e4d5b30f37c24695afd5f914cb6d2f); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc)): ?>
<?php $attributes = $__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc; ?>
<?php unset($__attributesOriginal7f18f43b3d2bacb563c64f2b49c801bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc)): ?>
<?php $component = $__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc; ?>
<?php unset($__componentOriginal7f18f43b3d2bacb563c64f2b49c801bc); ?>
<?php endif; ?>
                <?php else: ?>
                    <div id="auth-buttons" class="hidden md:flex items-center gap-2">
                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('auth.login')).'','variant' => 'outline-primary','class' => 'transition-all duration-300 hover:scale-105']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('auth.login')).'','variant' => 'outline-primary','class' => 'transition-all duration-300 hover:scale-105']); ?>
                            <?php echo e(__('global.sign_in')); ?>

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
                        <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('auth.register')).'','variant' => 'primary','class' => 'transition-all duration-300 hover:scale-105']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('auth.register')).'','variant' => 'primary','class' => 'transition-all duration-300 hover:scale-105']); ?>
                            <?php echo e(__('global.get_started')); ?>

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
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Hero Section with Animations -->
    <div class="box mt-5 p-6 md:p-8 overflow-hidden">
        <div class="grid grid-cols-12 gap-6 items-center">
            <div class="col-span-12 md:col-span-6 animate__animated animate__fadeInLeft">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-primary to-theme-1 bg-clip-text text-transparent">
                    <?php echo e(__('global.kindergarten_management_system')); ?>

                </h2>
                <p class="mt-4 text-base md:text-lg text-slate-600 dark:text-slate-400 animate__animated animate__fadeInLeft animate__delay-1s">
                    <?php echo e(__('global.kindergarten_landing_subtitle')); ?>

                </p>
                <div class="mt-6 md:mt-8 flex flex-wrap gap-3 md:gap-4 animate__animated animate__fadeInLeft animate__delay-2s">
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('auth.register')).'','variant' => 'primary','class' => 'px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('auth.register')).'','variant' => 'primary','class' => 'px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Rocket','class' => 'w-4 h-4 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Rocket','class' => 'w-4 h-4 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(__('global.get_started')); ?>

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
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => '#features','variant' => 'outline-primary','class' => 'px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => '#features','variant' => 'outline-primary','class' => 'px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105 hover:shadow-lg']); ?>
                        <?php echo e(__('global.learn_more')); ?>

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
            </div>
            <div class="col-span-12 md:col-span-6 animate__animated animate__fadeInRight animate__delay-1s">
                <div class="tilt-card perspective-1000 relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-theme-1/10 rounded-2xl blur-xl"></div>
                    <img class="w-full max-w-full h-auto will-change-transform rounded-2xl shadow-2xl relative z-10 transform transition-transform duration-500 hover:scale-105" 
                         src="<?php echo e(Vite::asset('resources/images/illustration.svg')); ?>" 
                         alt="<?php echo e(config('app.name')); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Section -->
    <div class="intro-y mt-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 animate__animated animate__fadeInUp">
                    <div class="text-4xl font-bold text-blue-600 mb-2"><?php echo e($statistics['total_users'] ?? 0); ?></div>
                    <div class="text-blue-800 font-medium"><?php echo e(__('global.total_users')); ?></div>
                    <div class="text-sm text-blue-600 mt-1"><?php echo e(__('global.across_the_platform')); ?></div>
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="text-4xl font-bold text-green-600 mb-2"><?php echo e($statistics['active_users'] ?? 0); ?></div>
                    <div class="text-green-800 font-medium"><?php echo e(__('global.active_users')); ?></div>
                    <div class="text-sm text-green-600 mt-1"><?php echo e(__('global.currently_online')); ?></div>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="text-4xl font-bold text-purple-600 mb-2"><?php echo e($statistics['recent_registrations'] ?? 0); ?></div>
                    <div class="text-purple-800 font-medium"><?php echo e(__('global.new_users')); ?></div>
                    <div class="text-sm text-purple-600 mt-1"><?php echo e(__('global.last_30_days')); ?></div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Features Section -->
    <div class="intro-y mt-8" id="features">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate__animated animate__fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4"><?php echo e(__('global.why_choose_kindergarten_system')); ?></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo e(__('global.kindergarten_features_description')); ?></p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e(__('global.student_management')); ?></h3>
                    <p class="text-gray-600"><?php echo e(__('global.student_management_description')); ?></p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e(__('global.attendance_tracking')); ?></h3>
                    <p class="text-gray-600"><?php echo e(__('global.attendance_tracking_description')); ?></p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e(__('global.finance_reporting')); ?></h3>
                    <p class="text-gray-600"><?php echo e(__('global.finance_reporting_description')); ?></p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-4s">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e(__('global.parent_communication')); ?></h3>
                    <p class="text-gray-600"><?php echo e(__('global.parent_communication_description')); ?></p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-5s">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e(__('global.security')); ?></h3>
                    <p class="text-gray-600"><?php echo e(__('global.security_description')); ?></p>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 animate__animated animate__fadeInUp animate__delay-6s">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2"><?php echo e(__('global.multilingual_support')); ?></h3>
                    <p class="text-gray-600"><?php echo e(__('global.multilingual_support_description')); ?></p>
                </div>
            </div>
        </div>
    </div>

<!-- Testimonials Section -->
    <div class="intro-y mt-16" id="testimonials">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate__animated animate__fadeInUp animate__delay-7s">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4"><?php echo e(__('global.what_our_users_say')); ?></h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto"><?php echo e(__('global.kindergarten_testimonials_description')); ?></p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-500 animate__animated animate__fadeInUp animate__delay-8s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 font-bold text-lg">JD</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">John Doe</h4>
                            <p class="text-gray-600 text-sm"><?php echo e(__('global.principal')); ?></p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"<?php echo e(__('global.testimonial_principal')); ?>"</p>
                    <div class="flex text-yellow-400 mt-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-500 animate__animated animate__fadeInUp animate__delay-9s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-800 font-bold text-lg">AS</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Ahmad Smith</h4>
                            <p class="text-gray-600 text-sm"><?php echo e(__('global.teacher')); ?></p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"<?php echo e(__('global.testimonial_teacher')); ?>"</p>
                    <div class="flex text-yellow-400 mt-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-white to-slate-50 rounded-2xl p-6 shadow-md hover:shadow-xl transition-all duration-500 animate__animated animate__fadeInUp animate__delay-10s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center text-purple-800 font-bold text-lg">MJ</div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-gray-800">Maria Johnson</h4>
                            <p class="text-gray-600 text-sm"><?php echo e(__('global.administrator')); ?></p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">"<?php echo e(__('global.testimonial_admin')); ?>"</p>
                    <div class="flex text-yellow-400 mt-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="intro-y mt-16">
        <div class="box p-8 bg-gradient-to-r from-theme-1 to-theme-2 text-white rounded-2xl overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10 text-center">
                <h2 class="text-3xl md:text-4xl font-bold animate__animated animate__fadeInDown"><?php echo e(__('global.ready_to_get_started')); ?></h2>
                <p class="mt-3 text-lg animate__animated animate__fadeInDown animate__delay-1s"><?php echo e(__('global.landing_cta_description')); ?></p>
                <div class="mt-6 flex justify-center gap-3 animate__animated animate__fadeInDown animate__delay-2s">
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('auth.register')).'','class' => 'bg-white text-primary hover:bg-slate-100 px-8 py-3 rounded-lg transition-all duration-300 hover:scale-105','variant' => 'secondary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('auth.register')).'','class' => 'bg-white text-primary hover:bg-slate-100 px-8 py-3 rounded-lg transition-all duration-300 hover:scale-105','variant' => 'secondary']); ?>
                        <?php echo e(__('global.start_free_trial')); ?>

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
                    <?php if (isset($component)) { $__componentOriginale00eb601fbe667f0da582732d70c41c5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00eb601fbe667f0da582732d70c41c5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.button.index','data' => ['as' => 'a','href' => ''.e(route('auth.login')).'','variant' => 'outline-secondary','class' => 'border-white text-white hover:bg-white hover:text-theme-1 px-8 py-3 rounded-lg transition-all duration-300 hover:scale-105']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['as' => 'a','href' => ''.e(route('auth.login')).'','variant' => 'outline-secondary','class' => 'border-white text-white hover:bg-white hover:text-theme-1 px-8 py-3 rounded-lg transition-all duration-300 hover:scale-105']); ?>
                        <?php echo e(__('global.sign_in')); ?>

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
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="intro-y mt-16" id="footer">
        <div class="box p-8">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-4">
                    <h3 class="text-lg font-semibold"><?php echo e(__('global.company')); ?></h3>
                    <ul class="mt-3 space-y-2 text-slate-600">
                        <li><a class="hover:text-primary transition-all duration-300" href="#features"><?php echo e(__('global.features')); ?></a></li>
                        <li><a class="hover:text-primary transition-all duration-300" href="#testimonials"><?php echo e(__('global.testimonials')); ?></a></li>
                        <li><a class="hover:text-primary transition-all duration-300" href="#footer"><?php echo e(__('global.contact_us')); ?></a></li>
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <h3 class="text-lg font-semibold"><?php echo e(__('global.resources')); ?></h3>
                    <ul class="mt-3 space-y-2 text-slate-600">
                        <?php if(auth()->guard()->check()): ?>
                            <li><a class="hover:text-primary transition-all duration-300" href="<?php echo e(route('dashboard-overview-1')); ?>"><?php echo e(__('global.dashboard')); ?></a></li>
                            <li><a class="hover:text-primary transition-all duration-300" href="<?php echo e(route('profile.index')); ?>"><?php echo e(__('global.profile')); ?></a></li>
                        <?php else: ?>
                            <li><a class="hover:text-primary transition-all duration-300" href="<?php echo e(route('auth.login')); ?>"><?php echo e(__('global.sign_in')); ?></a></li>
                            <li><a class="hover:text-primary transition-all duration-300" href="<?php echo e(route('auth.register')); ?>"><?php echo e(__('global.get_started')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <h3 class="text-lg font-semibold"><?php echo e(__('global.follow_us')); ?></h3>
                    <div class="mt-3 flex gap-3 text-slate-600">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Twitter','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Twitter','class' => 'w-5 h-5']); ?>
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
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Facebook','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Facebook','class' => 'w-5 h-5']); ?>
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
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center hover:bg-primary hover:text-white transition-all duration-300">
                            <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'Instagram','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'Instagram','class' => 'w-5 h-5']); ?>
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
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t pt-5 text-center text-slate-500">
                © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. <?php echo e(__('global.all_rights_reserved')); ?>

            </div>
        </div>
    </div>
</div>
<?php if (! $__env->hasRenderedOnce('f1fc1af1-c503-45b1-9563-4943106e2697')): $__env->markAsRenderedOnce('f1fc1af1-c503-45b1-9563-4943106e2697');
$__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('mobile-nav-toggle');
    const links = document.getElementById('nav-links');
    const auth = document.getElementById('auth-buttons');
    if (toggle) {
        toggle.addEventListener('click', function() {
            const isHidden = links.classList.contains('hidden');
            if (isHidden) {
                links.classList.remove('hidden');
                links.classList.add('flex', 'flex-col', 'gap-2', 'absolute', 'right-4', 'top-14', 'bg-white', 'rounded-lg', 'shadow-md', 'p-3');
                if (auth) {
                    auth.classList.remove('hidden');
                    auth.classList.add('flex', 'flex-col', 'gap-2', 'absolute', 'right-4', 'top-36', 'bg-white', 'rounded-lg', 'shadow-md', 'p-3');
                }
            } else {
                links.classList.add('hidden');
                links.classList.remove('flex');
                if (auth) {
                    auth.classList.add('hidden');
                    auth.classList.remove('flex');
                }
            }
        });
    }
});
</script>
<?php $__env->stopPush(); endif; ?>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('3ddc7aff-4df5-4b13-a82e-acaafd38cf87')): $__env->markAsRenderedOnce('3ddc7aff-4df5-4b13-a82e-acaafd38cf87');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tiny-slider.js'); ?>
    <!-- Animate.css for animations -->
    <?php echo app('Illuminate\Foundation\Vite')('node_modules/animate.css/animate.min.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('bc6083aa-8795-4cbd-b20a-f5c6e2c105a2')): $__env->markAsRenderedOnce('bc6083aa-8795-4cbd-b20a-f5c6e2c105a2');
$__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tilt card effect
            var cards = document.querySelectorAll('.tilt-card');
            cards.forEach(function(card) {
                var img = card.querySelector('img');
                card.style.perspective = '1000px';
                card.addEventListener('mousemove', function(e) {
                    var rect = card.getBoundingClientRect();
                    var x = e.clientX - rect.left;
                    var y = e.clientY - rect.top;
                    var centerX = rect.width / 2;
                    var centerY = rect.height / 2;
                    var rotateY = (x - centerX) / centerX * 10; // Reduced rotation amount
                    var rotateX = (centerY - y) / centerY * 10; // Reduced rotation amount
                    img.style.transform = 'rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg) translateZ(20px)';
                });
                card.addEventListener('mouseleave', function() {
                    img.style.transform = 'rotateX(0) rotateY(0) translateZ(0)';
                });
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/' . $activeTheme . '/' . $activeLayout, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views/pages/landing.blade.php ENDPATH**/ ?>