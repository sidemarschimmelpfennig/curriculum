<html>
    <form action="http://127.0.0.1:8000/api/v1/admin/add-job" method="post">
        <input type="text" name="name">

        <select name="department_id">
            <?php $__currentLoopData = $departaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departament): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($departament->id); ?>"><?php echo e($departament->departament); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
     
        <select name="department_categories_id">
            <?php $__currentLoopData = $departament_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departament_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($departament_categorie->id); ?>"><?php echo e($departament_categorie->departament_categorie); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="status_id">
            <?php $__currentLoopData = $statuss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status->id); ?>"><?php echo e($status->status); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>

        <button type="submit">Criar vaga</button>
    </form>

</html><?php /**PATH D:\SGBR\ProjetoCurriculum\api\resources\views/newJobVacany.blade.php ENDPATH**/ ?>