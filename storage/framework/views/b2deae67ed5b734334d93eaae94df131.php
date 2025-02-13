

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('empleado/create')); ?>">
        <input type="submit" value="Dar de alta">
    </form>    

    <h1>Gestión de Empleados</h1>
    

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Fecha de alta</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(url('empleado/' . $empleado->id . '/edit')); ?>">✍</a>
                    <a href="<?php echo e(url('confirmar_empleado/'. $empleado->id)); ?>">❌</a>
                </td>
                <td><?php echo e($empleado->id); ?></td>
                <td><?php echo e($empleado->dni); ?></td>
                <td><?php echo e($empleado->nombre); ?></td>
                <td><?php echo e($empleado->correo); ?></td>
                <td><?php echo e($empleado->telefono); ?></td>
                <td><?php echo e($empleado->usuario); ?></td>
                <td><?php echo e($empleado->clave); ?></td>
                <td><?php echo e($empleado->tipo); ?></td>
                <td><?php echo e($empleado->direccion); ?></td>
                <td><?php echo e($empleado->fecha_alta); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/empleados.blade.php ENDPATH**/ ?>