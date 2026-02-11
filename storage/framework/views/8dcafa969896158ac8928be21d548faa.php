<?php $__env->startSection('head'); ?>
    <?php echo $__env->yieldContent('subhead'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'tinker md:bg-black/[0.15] dark:bg-transparent relative py-5 px-5 md:py-0 sm:px-8 md:px-0',
        "after:content-[''] after:bg-gradient-to-b after:from-theme-1 after:to-theme-2 dark:after:from-darkmode-800 dark:after:to-darkmode-800 after:fixed after:inset-0 after:z-[-2]",
    ]); ?>">
        <?php if (isset($component)) { $__componentOriginal382ffb4e125af6203213609160accaa9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal382ffb4e125af6203213609160accaa9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mobile-menu.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mobile-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal382ffb4e125af6203213609160accaa9)): ?>
<?php $attributes = $__attributesOriginal382ffb4e125af6203213609160accaa9; ?>
<?php unset($__attributesOriginal382ffb4e125af6203213609160accaa9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal382ffb4e125af6203213609160accaa9)): ?>
<?php $component = $__componentOriginal382ffb4e125af6203213609160accaa9; ?>
<?php unset($__componentOriginal382ffb4e125af6203213609160accaa9); ?>
<?php endif; ?>
        <div class="mt-[4.7rem] flex overflow-hidden md:mt-0">
            <!-- BEGIN: Simple Menu -->
            <nav
                class="side-nav side-nav--simple z-10 hidden overflow-x-hidden px-5 pb-16 md:block md:w-[100px] xl:w-[100px]">
                <a
                    class="intro-x mt-3 flex items-center pl-5 pt-4"
                    href=""
                >
                    <img
                        class="w-6"
                        src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>"
                        alt="Tinker Tailwind HTML Admin Template"
                    />
                </a>
                <div class="side-nav__divider my-6"></div>
                <ul>
                    <?php $__currentLoopData = $mainMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuKey => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($menu == 'divider'): ?>
                            <li class="side-nav__divider my-6"></li>
                        <?php else: ?>
                            <li>
                                <a
                                    href="<?php echo e(isset($menu['route_name']) ? route($menu['route_name'], isset($menu['params']) ? $menu['params'] : []) : 'javascript:;'); ?>"
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        $firstLevelActiveIndex == $menuKey
                                            ? 'side-menu side-menu--active'
                                            : 'side-menu',
                                    ]); ?>"
                                >
                                    <div class="side-menu__icon">
                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($menu['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($menu['icon']).'']); ?>
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
                                    <div class="side-menu__title">
                                        <?php echo e($menu['title']); ?>

                                        <?php if(isset($menu['sub_menu'])): ?>
                                            <div
                                                class="side-menu__sub-icon <?php echo e($firstLevelActiveIndex == $menuKey ? 'transform rotate-180' : ''); ?>">
                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ChevronDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ChevronDown']); ?>
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
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <?php if(isset($menu['sub_menu'])): ?>
                                    <ul class="<?php echo e($firstLevelActiveIndex == $menuKey ? 'side-menu__sub-open' : ''); ?>">
                                        <?php $__currentLoopData = $menu['sub_menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenuKey => $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a
                                                    href="<?php echo e(isset($subMenu['route_name']) ? route($subMenu['route_name'], isset($subMenu['params']) ? $subMenu['params'] : []) : 'javascript:;'); ?>"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        $secondLevelActiveIndex == $subMenuKey
                                                            ? 'side-menu side-menu--active'
                                                            : 'side-menu',
                                                    ]); ?>"
                                                >
                                                    <div class="side-menu__icon">
                                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($subMenu['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($subMenu['icon']).'']); ?>
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
                                                    <div class="side-menu__title">
                                                        <?php echo e($subMenu['title']); ?>

                                                        <?php if(isset($subMenu['sub_menu'])): ?>
                                                            <div
                                                                class="side-menu__sub-icon <?php echo e($secondLevelActiveIndex == $subMenuKey ? 'transform rotate-180' : ''); ?>">
                                                                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'ChevronDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ChevronDown']); ?>
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
                                                        <?php endif; ?>
                                                    </div>
                                                </a>
                                                <?php if(isset($subMenu['sub_menu'])): ?>
                                                    <ul
                                                        class="<?php echo e($secondLevelActiveIndex == $subMenuKey ? 'side-menu__sub-open' : ''); ?>">
                                                        <?php $__currentLoopData = $subMenu['sub_menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastSubMenuKey => $lastSubMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a
                                                                    href="<?php echo e(isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name'], isset($lastSubMenu['params']) ? $lastSubMenu['params'] : []) : 'javascript:;'); ?>"
                                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                                        $thirdLevelActiveIndex == $lastSubMenuKey
                                                                            ? 'side-menu side-menu--active'
                                                                            : 'side-menu',
                                                                    ]); ?>"
                                                                >
                                                                    <div class="side-menu__icon">
                                                                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => ''.e($lastSubMenu['icon']).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => ''.e($lastSubMenu['icon']).'']); ?>
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
                                                                    <div class="side-menu__title">
                                                                        <?php echo e($lastSubMenu['title']); ?>

                                                                    </div>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </nav>
            <!-- END: Simple Menu -->
            <!-- BEGIN: Content -->
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'rounded-[30px] md:rounded-[35px/50px_0px_0px_0px] min-w-0 min-h-screen max-w-full md:max-w-none bg-slate-100 flex-1 pb-10 px-4 md:px-6 relative md:ml-4 dark:bg-darkmode-700',
                "before:content-[''] before:w-full before:h-px before:block",
                "after:content-[''] after:z-[-1] after:rounded-[40px_0px_0px_0px] after:w-full after:inset-y-0 after:absolute after:left-0 after:bg-white/10 after:mt-8 after:-ml-4 after:dark:bg-darkmode-400/50 after:hidden md:after:block",
            ]); ?>">
                <?php if (isset($component)) { $__componentOriginal9e157f68e45cc8cf03dd95583af2218c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e157f68e45cc8cf03dd95583af2218c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.themes.tinker.top-bar.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('themes.tinker.top-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e157f68e45cc8cf03dd95583af2218c)): ?>
<?php $attributes = $__attributesOriginal9e157f68e45cc8cf03dd95583af2218c; ?>
<?php unset($__attributesOriginal9e157f68e45cc8cf03dd95583af2218c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e157f68e45cc8cf03dd95583af2218c)): ?>
<?php $component = $__componentOriginal9e157f68e45cc8cf03dd95583af2218c; ?>
<?php unset($__componentOriginal9e157f68e45cc8cf03dd95583af2218c); ?>
<?php endif; ?>
                <?php echo $__env->yieldContent('subcontent'); ?>
            </div>
            <!-- END: Content -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('1dc2b15a-11d4-49fb-b8f4-22e64ffb5d94')): $__env->markAsRenderedOnce('1dc2b15a-11d4-49fb-b8f4-22e64ffb5d94');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/themes/tinker/side-nav.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('771a5949-d6d0-499a-ad69-ed9433d0a5ac')): $__env->markAsRenderedOnce('771a5949-d6d0-499a-ad69-ed9433d0a5ac');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e8c33b30-ad17-4555-bfbc-7e0f6b72f666')): $__env->markAsRenderedOnce('e8c33b30-ad17-4555-bfbc-7e0f6b72f666');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/tinker.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\themes\tinker\simple-menu.blade.php ENDPATH**/ ?>