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
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav z-10 hidden overflow-x-hidden px-5 pb-16 md:block md:w-[100px] xl:w-[250px]">
                <a
                    class="flex items-center pt-4 pl-5 mt-3 intro-x"
                    href=""
                >
                    <img
                        class="w-6"
                        src="<?php echo e(Vite::asset('resources/images/logo.svg')); ?>"
                        alt="Tinker Tailwind HTML Admin Template"
                    />
                    <span class="hidden ml-3 text-lg text-white xl:block">
                        Tinker
                    </span>
                </a>
                <div class="my-6 side-nav__divider"></div>
                <ul>
                    <?php $__currentLoopData = $mainMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuKey => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($menu == 'divider'): ?>
                            <li class="my-6 side-nav__divider"></li>
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
            <!-- END: Side Menu -->
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
                <?php if(session('success')): ?>
                    <?php if (isset($component)) { $__componentOriginalaedd4f8693339056cc3bcfecdf92dacf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaedd4f8693339056cc3bcfecdf92dacf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.alert.index','data' => ['variant' => 'success','class' => 'mb-2 flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'success','class' => 'mb-2 flex items-center']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'CheckCircle','class' => 'w-6 h-6 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'CheckCircle','class' => 'w-6 h-6 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(session('success')); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.alert.index','data' => ['variant' => 'danger','class' => 'mb-2 flex items-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['variant' => 'danger','class' => 'mb-2 flex items-center']); ?>
                        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['icon' => 'AlertOctagon','class' => 'w-6 h-6 mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'AlertOctagon','class' => 'w-6 h-6 mr-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $attributes = $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800)): ?>
<?php $component = $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800; ?>
<?php unset($__componentOriginal16b2e62e74cde9150905c2d0c2cb6800); ?>
<?php endif; ?> <?php echo e(session('error')); ?>

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
                <?php echo $__env->yieldContent('subcontent'); ?>
            </div>
            <!-- END: Content -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('6507bdde-3c0f-4501-8545-bf740f3aec70')): $__env->markAsRenderedOnce('6507bdde-3c0f-4501-8545-bf740f3aec70');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/themes/tinker/side-nav.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('505fc9fc-f697-46a0-858f-73dd30adf0f9')): $__env->markAsRenderedOnce('505fc9fc-f697-46a0-858f-73dd30adf0f9');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3ab4e71b-f82e-4583-84f1-7eb8026265e2')): $__env->markAsRenderedOnce('3ab4e71b-f82e-4583-84f1-7eb8026265e2');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/tinker.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\themes\tinker\side-menu.blade.php ENDPATH**/ ?>