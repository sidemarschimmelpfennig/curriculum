<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>dash board admin</h1>
    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>- <?php echo e($job->name); ?></p>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button><a href="/api/newJobVacany">Nova Vaga</a></button>
</body>
</html><?php /**PATH D:\SGBR\ProjetoCurriculum\api\resources\views/adminPage.blade.php ENDPATH**/ ?>