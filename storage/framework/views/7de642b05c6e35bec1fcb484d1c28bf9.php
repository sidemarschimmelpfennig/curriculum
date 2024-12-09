<html>
    <form action="http://127.0.0.1:8000/api/v1/admin/add-job" method="post"
    style="margin: 5px;" >
        <input type="text" name="name" style="display: block; margin: 5px;">

        <select name="department_id" style="display: block; ">
            <?php $__currentLoopData = $departaments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departament): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($departament->id); ?>"><?php echo e($departament->departament); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <a href=""><button type="button">Criar novo departamento</button></a>

        <select name="department_categories_id" style="display: block; margin: 5px;">
            <?php $__currentLoopData = $departament_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departament_categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($departament_categorie->id); ?>"><?php echo e($departament_categorie->departament_categorie); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <a href=""><button type="button">Criar nova categoria</button></a>

        <select name="status_id" style="display: block; margin: 5px;">
            <?php $__currentLoopData = $statuss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($status->id); ?>"><?php echo e($status->status); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
        <a href=""><button type="button">Criar novo status</button></a>

        <button type="submit">Criar vaga</button>
    </form>

</html><?php /**PATH D:\SGBR\ProjetoCurriculum\api\resources\views/newJobVacany.blade.php ENDPATH**/ ?>