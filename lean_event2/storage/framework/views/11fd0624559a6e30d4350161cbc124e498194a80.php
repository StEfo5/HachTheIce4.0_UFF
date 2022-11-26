

<?php $__env->startSection('content'); ?>
    <?php echo e($team); ?> <br>
    <form action="<?php echo e($team_id); ?>/expertise" method="POST">
        <?php echo csrf_field(); ?>
        <?php $__currentLoopData = $criterias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($item->name); ?>

            <?php
                $options = DB::table('options')
                    ->where('criteria_id', $item->id)
                    ->get();
            ?>
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="radio" name="<?php echo e($item->id); ?>" value="<?php echo e($item2->score); ?>"><?php echo e($item2->name); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
        <button>Оценить</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\HachTheIce4.0_UFF\lean_event2\resources\views/checkpoints/team.blade.php ENDPATH**/ ?>