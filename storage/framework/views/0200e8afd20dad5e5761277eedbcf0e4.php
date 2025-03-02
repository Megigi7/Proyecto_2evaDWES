

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('tarea/create')); ?>">
        <input type="submit" value="Crear nueva tarea">
    </form>    

    <h1>Gestión de Tareas</h1>

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Descripcion</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Población</th>
                <th>Estado</th>
                <th>Encargado</th>
                <th>Fecha de realización</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(url('tarea/' . $tarea->id . '/edit')); ?>">✍</a>
                    <?php if($role == 'admin'): ?>
                        <a href="<?php echo e(url('tarea/' . $tarea->id)); ?>">🔍</a>
                        <a href="<?php echo e(url('confirmar_tarea/'. $tarea->id)); ?>">❌</a>
                    <?php endif; ?>
                </td>
                <td><?php echo e($tarea->id); ?></td>
                <td><?php echo e($tarea->cliente); ?></td>
                <td><?php echo e($tarea->tel_contacto); ?></td>
                <td><?php echo e($tarea->descripcion); ?></td>
                <td><?php echo e($tarea->correo); ?></td>
                <td><?php echo e($tarea->direccion); ?></td>
                <td><?php echo e($tarea->poblacion); ?></td>
                <td><?php echo e($tarea->estado); ?></td>
                <td><?php echo e($tarea->empleado); ?></td>
                <td><?php echo e($tarea->fecha_realizacion); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/tareas.blade.php ENDPATH**/ ?>