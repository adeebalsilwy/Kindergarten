<?php if (isset($component)) { $__componentOriginal5920d8a9bee08fbe51a8c3409bc45bab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5920d8a9bee08fbe51a8c3409bc45bab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.base.leaflet-map-loader.index','data' => ['lat' => '-6.2425342','long' => '106.8626478','apiKey' => '1e86fd5a7f60486a8e899411776f60d5','attributes' => $attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes())]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base.leaflet-map-loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['lat' => '-6.2425342','long' => '106.8626478','apiKey' => '1e86fd5a7f60486a8e899411776f60d5','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge($attributes->whereDoesntStartWith('class')->getAttributes()))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5920d8a9bee08fbe51a8c3409bc45bab)): ?>
<?php $attributes = $__attributesOriginal5920d8a9bee08fbe51a8c3409bc45bab; ?>
<?php unset($__attributesOriginal5920d8a9bee08fbe51a8c3409bc45bab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5920d8a9bee08fbe51a8c3409bc45bab)): ?>
<?php $component = $__componentOriginal5920d8a9bee08fbe51a8c3409bc45bab; ?>
<?php unset($__componentOriginal5920d8a9bee08fbe51a8c3409bc45bab); ?>
<?php endif; ?>
<?php /**PATH F:\my project\laravel\contract\Source\resources\views\components\leaflet-map\index.blade.php ENDPATH**/ ?>