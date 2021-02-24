<?php $__env->startSection('content'); ?>
    <div id="frame">
        <h1> Create device </h1>
        <!-- Print out the errors if there are any -->
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>
        <!-- CSRF Token is created automatically with Laravel Collective -->
        <!-- https://laravelcollective.com/docs/6.x/html under the header CSRF Protection -->
        <?php echo Form::open(['route' => 'devices.store', 'method' => 'post']); ?>

            <?php echo Form::label('group', 'Group'); ?> <br>
            <?php echo Form::select('group', $dropdown, old('group')); ?> <br><br>

            <?php echo Form::label('serial_number', 'Serial number'); ?> <br>
            <?php echo Form::number('serial_number', old('serial_number'), ['placeholder' => 'Serial number...']); ?> <br><br>

            <?php echo Form::submit('Submit'); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alflex\resources\views/device/create.blade.php ENDPATH**/ ?>