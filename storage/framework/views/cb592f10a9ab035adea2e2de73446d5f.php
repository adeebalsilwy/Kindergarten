<?php $__env->startSection('head'); ?>
    <?php echo $__env->yieldContent('subhead'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'icewall px-5 sm:px-8 py-5 relative',
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
        <?php if (isset($component)) { $__componentOriginal82de7fc60d11de0dd4f4e5513eebed76 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82de7fc60d11de0dd4f4e5513eebed76 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.themes.icewall.top-bar.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('themes.icewall.top-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82de7fc60d11de0dd4f4e5513eebed76)): ?>
<?php $attributes = $__attributesOriginal82de7fc60d11de0dd4f4e5513eebed76; ?>
<?php unset($__attributesOriginal82de7fc60d11de0dd4f4e5513eebed76); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82de7fc60d11de0dd4f4e5513eebed76)): ?>
<?php $component = $__componentOriginal82de7fc60d11de0dd4f4e5513eebed76; ?>
<?php unset($__componentOriginal82de7fc60d11de0dd4f4e5513eebed76); ?>
<?php endif; ?>
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'wrapper relative',
            "before:content-[''] before:z-[-1] before:translate-y-[35px] before:opacity-0 before:w-[95%] before:rounded-[1.3rem] before:bg-white/10 before:h-full before:-mt-4 before:absolute before:mx-auto before:inset-x-0 before:dark:bg-darkmode-400/50",
        ]); ?>">
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'wrapper-box bg-gradient-to-b from-theme-1 to-theme-2 flex rounded-[1.3rem] -mt-[7px] md:mt-0 dark:from-darkmode-400 dark:to-darkmode-400 translate-y-[35px]',
                'before:block before:absolute before:inset-0 before:bg-black/[0.15] before:rounded-[1.3rem] before:z-[-1]',
            ]); ?>">
                <!-- BEGIN: Side Menu -->
                <nav class="side-nav hidden w-[100px] overflow-x-hidden px-5 pb-16 pt-8 md:block xl:w-[250px]">
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
                <!-- END: Side Menu -->
                <!-- BEGIN: Content -->
                <div
                    class="md:max-w-auto min-h-screen min-w-0 max-w-full flex-1 rounded-[1.3rem] bg-slate-100 px-4 pb-10 shadow-sm before:block before:h-px before:w-full before:content-[''] dark:bg-darkmode-700 md:px-[22px]">
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
    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('9b6c75ca-376a-42cf-a391-fe17430c8e30')): $__env->markAsRenderedOnce('9b6c75ca-376a-42cf-a391-fe17430c8e30');
$__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/tippy.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/themes/icewall/side-nav.css'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('30b935fb-0c4a-49dc-891f-cf532be6f654')): $__env->markAsRenderedOnce('30b935fb-0c4a-49dc-891f-cf532be6f654');
$__env->startPush('vendors'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tippy.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('03c74871-5c13-469a-91c9-e5be1035f622')): $__env->markAsRenderedOnce('03c74871-5c13-469a-91c9-e5be1035f622');
$__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/themes/icewall.js'); ?>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make('../themes/base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH F:\my project\laravel\contract\Source\resources\views\themes\icewall\side-menu.blade.php ENDPATH**/ ?>