

<?php $__env->startSection('content'); ?>
    <form action="profile/update" method="POST">
        <?php echo csrf_field(); ?>
        Команда
        <input type="text" name="name" value="<?php echo e($user->name); ?>">
        Регион
        <input type="text" name="region" value="<?php echo e($user->region); ?>">
        <button>Обновить</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\HachTheIce4.0_UFF\lean_event2\resources\views/profile/index.blade.php ENDPATH**/ ?>