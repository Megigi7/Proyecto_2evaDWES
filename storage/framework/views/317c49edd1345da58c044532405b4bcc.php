

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(url('cliente/create')); ?>">
        <input type="submit" value="Añadir cliente">
    </form>    

    <h1>Gestión de Clientes</h1>
    

    <table border="2">
        <thead>
            <tr>
                <th>Acciones</th>
                <th>Id</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Cuenta Corriente</th>
                <th>Pais</th>
                <th>Moneda</th>
                <th>Importe de Cuota Mensual</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(url('cliente/' . $cliente->id . '/edit')); ?>">✍</a>
                    <a href="<?php echo e(url('confirmar_cliente/'. $cliente->id)); ?>">❌</a>
                </td>
                <td><?php echo e($cliente->id); ?></td>
                <td><?php echo e($cliente->cif); ?></td>
                <td><?php echo e($cliente->nombre); ?></td>
                <td><?php echo e($cliente->correo); ?></td>
                <td><?php echo e($cliente->telefono); ?></td>
                <td><?php echo e($cliente->cuenta_corriente); ?></td>
                <td><?php echo e($cliente->pais); ?></td>
                <td><?php echo e($cliente->moneda); ?></td>
                <td><?php echo e($cliente->importe_cuota_mensual); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/clientes.blade.php ENDPATH**/ ?>