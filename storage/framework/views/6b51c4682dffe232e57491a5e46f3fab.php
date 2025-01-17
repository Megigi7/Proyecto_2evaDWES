<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>
</head>
<body>

    <?php if(isset($tabla)): ?>
        <table>
            <?php echo e($itera = 1); ?>

            <?php echo e($num = $tabla[0]); ?>

            <?php $__currentLoopData = $tabla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($num); ?> * <?php echo e($itera); ?> = <?php echo e($linea); ?></td>
                </tr>
                <?php echo e($itera++); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php else: ?>
        <p>No has introducido ningún número 👻👻</p>
    <?php endif; ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\laravel-ejercicios\resources\views/tabla.blade.php ENDPATH**/ ?>