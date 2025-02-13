

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('cuota/create')); ?>">
        <input type="submit" value="Añadir cuota">
    </form>    

    <h1>Gestión de Cuotas</h1>
    

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>Cliente</th>
                <th>Concepto</th>
                <th>Fecha de emisión</th>
                <th>Importe</th>
                <th>Pagada</th>
                <th>Fecha de pago</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $cuotas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuota): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(url('cuota/' . $cuota->id . '/edit')); ?>">✍</a>
                    <a href="<?php echo e(url('confirmar_cuota/'. $cuota->id)); ?>">❌</a>
                </td>
                <td><?php echo e($cuota->id); ?></td>
                <td><?php echo e($cuota->cliente); ?></td>
                <td><?php echo e($cuota->concepto); ?></td>
                <td><?php echo e($cuota->fecha_emision); ?></td>
                <td><?php echo e($cuota->importe); ?></td>
                <td><?php echo e($cuota->pagada); ?></td>
                <td><?php echo e($cuota->fecha_pago); ?></td>
                <td><?php echo e($cuota->notas); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/cuotas.blade.php ENDPATH**/ ?>