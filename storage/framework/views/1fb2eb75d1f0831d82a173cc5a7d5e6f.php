

<?php $__env->startSection('content'); ?>
    <h2>¡Atención! ¿Está seguro que desea dar de baja al cliente <?php echo e($id); ?>?</h2>
    <h3>Esta acción no puede revertirse</h3>
    <form action="<?php echo e(route('cliente.destroy', $id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    
    <button type="submit" onclick="return confirm('¿Estás seguro de dar de baja a este cliente?')">
        Sí, eliminar
    </button>
    <a href="<?php echo e(url('cliente')); ?>">No, cancelar</a>

</form>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/confirmacion_cliente.blade.php ENDPATH**/ ?>