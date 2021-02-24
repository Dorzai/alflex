<?php $__env->startSection('content'); ?>
    <div id="frame">
        <h1> Device data </h1>
        <a href="<?php echo e(route('devices.create')); ?>"> Create device</a> <br><br>

        <?php if(session()->has('message')): ?> <p> <?php echo e(session()->get('message')); ?> </p> <?php endif; ?>
        <?php if($user): ?> <p> Showing devices from the same group as <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></p> <?php endif; ?>

        <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <b> <?php echo e($device->serial_number); ?> </b> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p> Page <?php echo e($devices->currentPage()); ?> of <?php echo e($devices->lastPage()); ?> (<?php echo e($devices->total()); ?> total records) </p>
    </div>

    <div id="pagination">
        <?php echo e($devices->appends(request()->query())->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\alflex\resources\views/device/index.blade.php ENDPATH**/ ?>