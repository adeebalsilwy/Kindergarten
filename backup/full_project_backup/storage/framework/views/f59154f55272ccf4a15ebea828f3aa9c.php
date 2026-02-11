<div>
    <?php if (isset($component)) { $__componentOriginal7b984b2f83e0e1ed46be48207486a493 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b984b2f83e0e1ed46be48207486a493 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.slideover.index','data' => ['id' => 'theme-switcher']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.slideover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'theme-switcher']); ?>
        <?php if (isset($component)) { $__componentOriginalbf24d1b6c00bc08aa4e052383ee60570 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf24d1b6c00bc08aa4e052383ee60570 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.slideover.panel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.slideover.panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <a
                class="absolute inset-y-0 left-0 right-auto my-auto -ml-[60px] flex h-8 w-8 items-center justify-center rounded-full border border-white/90 bg-white/5 text-white/90 transition-all hover:rotate-180 hover:scale-105 hover:bg-white/10 focus:outline-none sm:-ml-[105px] sm:h-14 sm:w-14"
                data-tw-dismiss="modal"
                href="javascript:;"
            >
                <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'h-3 w-3 stroke-[1] sm:h-8 sm:w-8','icon' => 'X']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-3 w-3 stroke-[1] sm:h-8 sm:w-8','icon' => 'X']); ?>
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
            <?php if (isset($component)) { $__componentOriginal52a8e2b085d6c4797e2849447438b96c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52a8e2b085d6c4797e2849447438b96c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.slideover.description','data' => ['class' => 'p-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.slideover.description'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'p-0']); ?>
                <div class="flex flex-col">
                    <div class="px-8 pt-6 pb-8">
                        <div class="text-base font-medium">Themes</div>
                        <div class="mt-0.5 text-slate-500">Choose your theme</div>
                        <div class="mt-5 grid grid-cols-2 gap-x-5 gap-y-3.5">
                            <?php $__currentLoopData = ['rubick', 'icewall', 'tinker', 'enigma', 'kindergarten']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $themeKey => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <a
                                        href="<?php echo e(route('theme-switcher', ['activeTheme' => $theme])); ?>"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'h-28 cursor-pointer bg-slate-50 box p-1 block',
                                            'border-2 border-theme-1/60' => $activeTheme == $theme,
                                        ]); ?>"
                                    >
                                        <div class="w-full h-full overflow-hidden rounded-md image-fit">
                                            <?php
                                                $imgPath = 'resources/images/themes/' . $theme . '.png';
                                                $fallback = $theme === 'kindergarten' ? 'resources/images/logo.svg' : $imgPath;
                                                $imgToUse = file_exists(base_path($imgPath)) ? $imgPath : $fallback;
                                            ?>
                                            <img class="w-full h-full" src="<?php echo e(Vite::asset($imgToUse)); ?>" alt="Theme Preview">
                                        </div>
                                    </a>
                                    <div class="mt-2.5 text-center text-xs capitalize">
                                        <?php echo e($theme); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="border-b border-dashed"></div>
                    <div class="px-8 pt-6 pb-8">
                        <div class="text-base font-medium">Layouts</div>
                        <div class="mt-0.5 text-slate-500">Choose your layout</div>
                        <div class="mt-5 grid grid-cols-3 gap-x-5 gap-y-3.5">
                            <?php $__currentLoopData = ['side-menu', 'simple-menu', 'top-menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layoutKey => $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <a
                                        href="<?php echo e(route('layout-switcher', ['activeLayout' => $layout])); ?>"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'h-24 cursor-pointer bg-slate-50 box p-1 block',
                                            'border-2 border-theme-1/60' => $activeLayout == $layout,
                                        ]); ?>"
                                    >
                                        <div class="w-full h-full overflow-hidden rounded-md">
                                            <img
                                                class="w-full h-full"
                                                src="<?php echo e(Vite::asset('resources/images/layouts/' . $layout . '.png')); ?>"
                                                alt="Midone - Admin Dashboard Template"
                                            >
                                        </div>
                                    </a>
                                    <div class="mt-2.5 text-center text-xs capitalize">
                                        <?php echo e(str_replace('-', ' ', $layout)); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="border-b border-dashed"></div>
                    <div class="px-8 pt-6 pb-8">
                        <div class="text-base font-medium">Accent Colors</div>
                        <div class="mt-0.5 text-slate-500">
                            Choose your accent color
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-3.5">
                            <?php $__currentLoopData = ['default', 'theme-1', 'theme-2', 'theme-3', 'theme-4']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colorKey => $colorScheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                    <a
                                        data-theme-color="<?php echo e($colorScheme); ?>"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'h-14 cursor-pointer bg-slate-50 box p-1 border-slate-300/80 block',
                                            '[&.active]:border-2 [&.active]:border-theme-1/60',
                                        ]); ?>"
                                    >
                                        <div class="h-full overflow-hidden rounded-md">
                                            <div class="flex items-center h-full gap-1 -mx-2">
                                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['w-1/2 h-[200%] bg-theme-1 rotate-12', $colorScheme]); ?>"></div>
                                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['w-1/2 h-[200%] bg-theme-2 rotate-12', $colorScheme]); ?>"></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="border-b border-dashed"></div>
                    <div class="px-8 pt-6 pb-8">
                        <div class="text-base font-medium">Appearance</div>
                        <div class="mt-0.5 text-slate-500">
                            Choose your appearance
                        </div>
                        <div class="mt-5 grid grid-cols-2 gap-3.5">
                            <div>
                                <a
                                    data-appearance-mode="light"
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'h-12 cursor-pointer bg-slate-50 box p-1 border-slate-300/80 block',
                                        '[&.active]:border-2 [&.active]:border-theme-1/60',
                                    ]); ?>"
                                >
                                    <div class="h-full overflow-hidden rounded-md bg-slate-200"></div>
                                </a>
                                <div class="mt-2.5 text-center text-xs capitalize">
                                    Light
                                </div>
                            </div>
                            <div>
                                <a
                                    data-appearance-mode="dark"
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'h-12 cursor-pointer bg-slate-50 box p-1 border-slate-300/80 block',
                                        '[&.active]:border-2 [&.active]:border-theme-1/60',
                                    ]); ?>"
                                >
                                    <div class="h-full overflow-hidden rounded-md bg-slate-900"></div>
                                </a>
                                <div class="mt-2.5 text-center text-xs capitalize">
                                    Dark
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52a8e2b085d6c4797e2849447438b96c)): ?>
<?php $attributes = $__attributesOriginal52a8e2b085d6c4797e2849447438b96c; ?>
<?php unset($__attributesOriginal52a8e2b085d6c4797e2849447438b96c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52a8e2b085d6c4797e2849447438b96c)): ?>
<?php $component = $__componentOriginal52a8e2b085d6c4797e2849447438b96c; ?>
<?php unset($__componentOriginal52a8e2b085d6c4797e2849447438b96c); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf24d1b6c00bc08aa4e052383ee60570)): ?>
<?php $attributes = $__attributesOriginalbf24d1b6c00bc08aa4e052383ee60570; ?>
<?php unset($__attributesOriginalbf24d1b6c00bc08aa4e052383ee60570); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf24d1b6c00bc08aa4e052383ee60570)): ?>
<?php $component = $__componentOriginalbf24d1b6c00bc08aa4e052383ee60570; ?>
<?php unset($__componentOriginalbf24d1b6c00bc08aa4e052383ee60570); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b984b2f83e0e1ed46be48207486a493)): ?>
<?php $attributes = $__attributesOriginal7b984b2f83e0e1ed46be48207486a493; ?>
<?php unset($__attributesOriginal7b984b2f83e0e1ed46be48207486a493); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b984b2f83e0e1ed46be48207486a493)): ?>
<?php $component = $__componentOriginal7b984b2f83e0e1ed46be48207486a493; ?>
<?php unset($__componentOriginal7b984b2f83e0e1ed46be48207486a493); ?>
<?php endif; ?>
    <div
        class="fixed bottom-0 right-0 z-50 flex items-center justify-center mb-5 mr-5 text-white rounded-full shadow-lg cursor-pointer h-14 w-14 bg-theme-1"
        data-tw-toggle="modal"
        data-tw-target="#theme-switcher"
    >
        <?php if (isset($component)) { $__componentOriginal16b2e62e74cde9150905c2d0c2cb6800 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal16b2e62e74cde9150905c2d0c2cb6800 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.lucide.index','data' => ['class' => 'w-5 h-5 animate-spin','icon' => 'Settings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.lucide'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 animate-spin','icon' => 'Settings']); ?>
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
<?php /**PATH D:\xampp\htdocs\deebo\Source\resources\views\components\theme-switcher\index.blade.php ENDPATH**/ ?>