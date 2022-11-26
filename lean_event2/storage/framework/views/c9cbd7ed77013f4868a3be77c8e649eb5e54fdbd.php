

<?php $__env->startSection('content'); ?>
    Выступления команд <br>
    <?php $__currentLoopData = $performances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="
            <?php if(Auth::user()->role>0): ?>
                <?php echo e($checkpoint_id); ?>/team/<?php echo e($item->team_id); ?>

            <?php endif; ?>
        "><?php echo e(DB::table('users')->where('id', $item->team_id)->value('name')); ?></a>- <?php echo e($item->start); ?> - <?php echo e($item->readiness); ?> - <?php echo e($item->score); ?> - <?php echo e($item->comment); ?>

        <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    Критерии <br>
    <?php $__currentLoopData = $criterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($item->name); ?>:
        <?php
            $options = DB::table('options')
                ->where('criteria_id', $item->id)
                ->get();
        ?>
        <?php if(count($options)==0): ?>
            Нет вариантов
        <?php else: ?>
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($item2->name); ?> - <?php echo e($item2->score); ?>, 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <form action="<?php echo e($checkpoint_id); ?>/criteria/<?php echo e($item->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="name">
            <input type="number" name="score">
            <button>Добавить вариант</button>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <br>
    <?php if(Auth::user()->role>0): ?>
        Создать критерий:
        <form action="<?php echo e($checkpoint_id); ?>/criteria/create" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="name">
            <button>Создать</button>
        </form>

        <?php if(!$ended): ?>
        <form action="<?php echo e($checkpoint_id); ?>/end" method="GET">
            <button>Завершить чекпоинт</button>
        </form>    
        <?php endif; ?>
        <form action="<?php echo e($checkpoint_id); ?>/notification" method="GET">
            <button>Оповестить всех о чекпоинте</button>
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\HachTheIce4.0_UFF\lean_event2\resources\views/checkpoints/checkpoint.blade.php ENDPATH**/ ?>