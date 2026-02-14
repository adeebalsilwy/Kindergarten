<!DOCTYPE html>
<!--
Template Name: Midone - Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<?php
    $currentLang = \App\Models\Language::where('code', app()->getLocale())->first();
    $isRtl = $currentLang ? $currentLang->is_rtl : (app()->getLocale() == 'ar');
?>
<html
    class="opacity-0"
    lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    <?php if($isRtl): ?> dir="rtl" <?php endif; ?>
>
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <meta
        name="csrf-token"
        content="<?php echo e(csrf_token()); ?>"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="description"
        content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities."
    >
    <meta
        name="keywords"
        content="admin template, midone Admin Template, dashboard template, flat admin template, responsive admin template, web app"
    >
    <meta
        name="author"
        content="LEFT4CODE"
    >

    <?php echo $__env->yieldContent('head'); ?>

    <!-- BEGIN: CSS Assets-->
    <?php echo $__env->yieldPushContent('styles'); ?>
    <!-- END: CSS Assets-->

    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<!-- END: Head -->

<body>
    <?php if (isset($component)) { $__componentOriginal785aa89cb5e4b7a0bdd2387b4230b4ed = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal785aa89cb5e4b7a0bdd2387b4230b4ed = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.theme-switcher.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('theme-switcher'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal785aa89cb5e4b7a0bdd2387b4230b4ed)): ?>
<?php $attributes = $__attributesOriginal785aa89cb5e4b7a0bdd2387b4230b4ed; ?>
<?php unset($__attributesOriginal785aa89cb5e4b7a0bdd2387b4230b4ed); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal785aa89cb5e4b7a0bdd2387b4230b4ed)): ?>
<?php $component = $__componentOriginal785aa89cb5e4b7a0bdd2387b4230b4ed; ?>
<?php unset($__componentOriginal785aa89cb5e4b7a0bdd2387b4230b4ed); ?>
<?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- BEGIN: Vendor JS Assets-->
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/dom.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/tailwind-merge.js'); ?>
    <?php echo $__env->yieldPushContent('vendors'); ?>
    <!-- END: Vendor JS Assets-->

    <!-- BEGIN: Pages, layouts, components JS Assets-->
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/components/base/theme-color.js'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!-- END: Pages, layouts, components JS Assets-->
</body>

</html>
<?php /**PATH /app/resources/views////themes/base.blade.php ENDPATH**/ ?>