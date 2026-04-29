<?php if(session('success') || session('error') || session('warning') || session('info')): ?>
    <?php if (! $__env->hasRenderedOnce('ad5f9553-a631-4d52-9215-b5614eebdb38')): $__env->markAsRenderedOnce('ad5f9553-a631-4d52-9215-b5614eebdb38');
$__env->startPush('styles'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/vendors/toastify.css'); ?>
    <?php $__env->stopPush(); endif; ?>

    <?php if (! $__env->hasRenderedOnce('a83e53c5-541f-4ea3-a8b0-08d59b000153')): $__env->markAsRenderedOnce('a83e53c5-541f-4ea3-a8b0-08d59b000153');
$__env->startPush('vendors'); ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/vendors/toastify.js'); ?>
    <?php $__env->stopPush(); endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const config = {
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    borderRadius: "1rem",
                    padding: "1rem 1.5rem",
                    fontWeight: "bold",
                    fontSize: "0.9rem",
                    boxShadow: "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
                    display: "flex",
                    alignItems: "center"
                }
            };

            <?php if(session('success')): ?>
                Toastify({
                    ...config,
                    text: "<?php echo e(session('success')); ?>",
                    style: { ...config.style, background: "linear-gradient(to right, #00b09b, #96c93d)" }
                }).showToast();
            <?php endif; ?>

            <?php if(session('error')): ?>
                Toastify({
                    ...config,
                    text: "<?php echo e(session('error')); ?>",
                    style: { ...config.style, background: "linear-gradient(to right, #ff5f6d, #ffc371)" }
                }).showToast();
            <?php endif; ?>

            <?php if(session('warning')): ?>
                Toastify({
                    ...config,
                    text: "<?php echo e(session('warning')); ?>",
                    style: { ...config.style, background: "linear-gradient(to right, #f12711, #f5af19)" }
                }).showToast();
            <?php endif; ?>

            <?php if(session('info')): ?>
                Toastify({
                    ...config,
                    text: "<?php echo e(session('info')); ?>",
                    style: { ...config.style, background: "linear-gradient(to right, #2193b0, #6dd5ed)" }
                }).showToast();
            <?php endif; ?>
        });
    </script>
<?php endif; ?>
<?php /**PATH E:\backup\Source\resources\views/components/base/toast-handler.blade.php ENDPATH**/ ?>