
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="<?php echo e(asset('css/layout.css')); ?>">
    <title>Gestor de Datos</title>
</head>
<body>
    <div class="header">
        <h2>SiempreColgados. Ascensores Nosecaen S.L.</h2>
        <button>Cerrar sesion</button>

    </div>
    <div class="menu">
        <a href="<?php echo e(url('inicio')); ?>"> ▸ Inicio</a>
        <a href="<?php echo e(url('tarea')); ?>"> ▸ Tareas</a>
        <a href="<?php echo e(url('empleado')); ?>"> ▸ Empleados</a>
        <a href="<?php echo e(url('cliente')); ?>"> ▸ Clientes</a>
        <a href="<?php echo e(url('cuota')); ?>"> ▸ Cuotas</a>

    </div>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- <div class="footer">
        <p>&copy; 2024 Proyecto PHP. Todos los derechos reservados.</p>
    </div> -->
</body>
</html><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/layout/layout.blade.php ENDPATH**/ ?>