

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all(':message'))); ?>

    <?php endif; ?>

    <p><?php echo e(session()->get('success')); ?></p>

    <?php if($tipo=="nueva"): ?>
        <h2>Nueva cuota</h2>
    <?php else: ?>
        <h2>Modificacion de cuota</h2>
    <?php endif; ?>

    <form <?php if($tipo=="nueva"): ?>
            action="<?php echo e(url('cuota')); ?>" method="post"
          <?php else: ?>
            action="<?php echo e(route('cuota.update', $cuota->id)); ?>" method="post" 
          <?php endif; ?>>
        <?php echo csrf_field(); ?>
        <?php if($tipo!="nueva"): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
 
        <p><b>Cliente</b><br> |
        <select name="cliente">
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->id); ?>" 
                    <?php if($tipo=="nueva"): ?> 
                        <?php if(old('cliente')=="<?php echo e($cliente->id); ?>"): ?>
                            selected 
                        <?php endif; ?> 
                    <?php else: ?> 
                        <?php if("<?php echo e($cuota->cliente); ?>"=="<?php echo e($cliente->id); ?>"): ?>
                            selected
                        <?php endif; ?> 
                    <?php endif; ?> ><?php echo e($cliente->nombre); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </p>
        
        
        
        <p><b>Concepto</b><br> |
        <input type="text" name="concepto" 
                    <?php if($tipo=='nueva'): ?>
                        value= "<?php echo e(old('concepto')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cuota->concepto); ?>"
                    <?php endif; ?>></p>
        
        <p><b>Fecha de emisión</b><br> |
        <input type="date" name="fecha_emision"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('fecha_emision')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cuota->fecha_emision); ?>"
                    <?php endif; ?> > </p>


        <p><b>Importe</b><br> |
        <input type="text" name="importe"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('importe')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cuota->importe); ?>"
                    <?php endif; ?>></p>


        <p><b>Pagada</b><br> |
        <select name="pagada">
            <?php $__currentLoopData = $opciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opcion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($opcion); ?>" 
                    <?php if($tipo=="nueva"): ?> 
                        <?php if(old('pagada')=="<?php echo e($opcion); ?>"): ?>
                            selected 
                        <?php endif; ?> 
                    <?php else: ?> 
                        <?php if("<?php echo e($cuota->pagada); ?>"=="<?php echo e($opcion); ?>"): ?>
                            selected
                        <?php endif; ?> 
                    <?php endif; ?> ><?php echo e($opcion); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </p>
                    

        <p><b>Fecha de pago</b> /Solo si ya ha sido pagada/<br>|
        <input type="date" name="fecha_pago"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('fecha_pago')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($cuota->fecha_pago); ?>"
                    <?php endif; ?> > </p>


        <p><b>Notas</b><br>
        <textarea name="notas"<?php if($tipo=='nueva'): ?>value="<?php echo e(old('notas')); ?>"<?php else: ?> value= "<?php echo e($cuota->notas); ?>"<?php endif; ?>></textarea></p>
        
        <input type="submit" value="Guardar">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/form_cuota.blade.php ENDPATH**/ ?>