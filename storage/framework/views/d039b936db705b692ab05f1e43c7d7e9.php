

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all(':message'))); ?>

    <?php endif; ?>

    <p><?php echo e(session()->get('success')); ?></p>

    <?php if($tipo=="nueva"): ?>
        <h2>Formulario de Alta de Cliente</h2>
    <?php else: ?>
        <h2>Modificacion de Cliente</h2>
    <?php endif; ?>

    <form <?php if($tipo=="nueva"): ?>
            action="<?php echo e(url('cliente')); ?>" method="post"
          <?php else: ?>
            action="<?php echo e(route('cliente.update', $cliente->id)); ?>" method="post" 
          <?php endif; ?>>
        <?php echo csrf_field(); ?>
        <?php if($tipo!="nueva"): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
 
        <p><b>DNI</b><br> |
        <input type="text" name="dni" 
                    <?php if($tipo=='nueva'): ?>
                        value= "<?php echo e(old('dni')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->cif); ?>"
                    <?php endif; ?>></p>
        
        
        
        <p><b>Nombre y apellidos</b><br> |
        <input type="text" name="nombre" 
                    <?php if($tipo=='nueva'): ?>
                        value= "<?php echo e(old('nombre')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->nombre); ?>"
                    <?php endif; ?>></p>
        
        <p><b>Correo electrónico</b><br> |
        <input type="email" name="correo" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('correo')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->correo); ?>"
                    <?php endif; ?>></p>


        <p><b>Teléfono</b><br> |
        <input type="text" name="telefono" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('telefono')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->telefono); ?>"
                    <?php endif; ?>></p>

        <p><b>Cuenta corriente</b><br> | 
        <input type="text" name="cuenta_corriente" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('cuenta_corriente')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->cuenta_corriente); ?>"
                    <?php endif; ?>></p>
                    

               
        <p><b>Pais</b><br> |
        <input type="text" name="pais" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('pais')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->pais); ?>"
                    <?php endif; ?>></p>


        <p><b>Moneda</b><br> |
        <input type="text" name="moneda" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('moneda')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->moneda); ?>"
                    <?php endif; ?>></p>



        <p><b>Importe cuota mensual</b><br> |
        <input type="text" name="importe"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('importe')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cliente->importe_cuota_mensual); ?>"
                    <?php endif; ?>></p>
        
        <input type="submit" value="Guardar">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/form_cliente.blade.php ENDPATH**/ ?>