

<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $checkpoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($item->name); ?> - <?php echo e($item->description); ?> - <?php echo e($item->start); ?> - <?php echo e($item->time); ?>min - <?php echo e($item->role); ?>

        <form action="checkpoints/<?php echo e($item->id); ?>" method="GET">
            <button>Перейти</button>
        </form> <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(Auth::user()->role>0): ?>
        Добавить чекпоинт<br>
        <form action="checkpoints/create" method="POST">
            <?php echo csrf_field(); ?>
            Название
            <input type="text" name="name"><br>
            Описание
            <textarea name="description" id="" cols="30" rows="10"></textarea><br>
            Время начала
            <input type="datetime-local" name="start"><br> 
            Регламентированное время выступления каждой команды в минутах
            <input type="number" name="time"><br>
            Для какой роли
            <select name="role" id="">
                <option value="ceo">CEO</option>
                <option value="cdo">CDO</option>
                <option value="cto">CTO</option>
            </select>
            <button>Саздать</button>
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\HachTheIce4.0_UFF\lean_event2\resources\views/checkpoints/index.blade.php ENDPATH**/ ?>