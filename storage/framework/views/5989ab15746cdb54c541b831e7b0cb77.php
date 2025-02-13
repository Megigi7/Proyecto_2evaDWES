

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all(':message'))); ?>

    <?php endif; ?>

    <p><?php echo e(session()->get('success')); ?></p>

    <?php if($tipo=="nueva"): ?>
        <h2>Formulario de Alta de Empleado</h2>
    <?php else: ?>
        <h2>Modificacion de Empleado</h2>
    <?php endif; ?>
    <form <?php if($tipo=="nueva"): ?>
            action="<?php echo e(url('empleado')); ?>" method="post"
          <?php else: ?>
            action="<?php echo e(route('empleado.update', $empleado->id)); ?>" method="post" 
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
                        value= "<?php echo e($empleado->dni); ?>"
                    <?php endif; ?>></p>
        
        
        
        <p><b>Nombre y apellidos</b><br> |
        <input type="text" name="nombre" 
                    <?php if($tipo=='nueva'): ?>
                        value= "<?php echo e(old('nombre')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($empleado->nombre); ?>"
                    <?php endif; ?>></p>
        
        <p><b>Correo electrónico</b><br> |
        <input type="email" name="correo" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('correo')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($empleado->correo); ?>"
                    <?php endif; ?>></p>


        <p><b>Teléfono</b><br> |
        <input type="text" name="telefono" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('telefono')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($empleado->telefono); ?>"
                    <?php endif; ?>></p>

        <p><b>Usuario</b><br> | 
        <input type="text" name="usuario" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('usuario')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($empleado->usuario); ?>"
                    <?php endif; ?>></p>
                    

               
        <p><b>Clave</b><br> |
        <input type="text" name="clave" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('clave')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($empleado->clave); ?>"
                    <?php endif; ?>></p>


        <p><b>Tipo</b><br> |
        <select name="tipo_user">
            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tipo_user); ?>" 
                    <?php if($tipo=="nueva"): ?> 
                        <?php if(old('tipo_user')=="<?php echo e($tipo_user); ?>"): ?>
                            selected 
                        <?php endif; ?> 
                    <?php else: ?> 
                        <?php if("<?php echo e($empleado->tipo); ?>"=="<?php echo e($tipo_user); ?>"): ?>
                            selected
                        <?php endif; ?> 
                    <?php endif; ?> ><?php echo e($tipo_user); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </p>



        <p><b>Dirección</b><br> |
        <input type="text" name="direccion"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('direccion')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($empleado->direccion); ?>"
                    <?php endif; ?>></p>
        
        <input type="submit" value="Guardar">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/form_empleado.blade.php ENDPATH**/ ?>