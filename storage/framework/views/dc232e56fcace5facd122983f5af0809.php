

<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all(':message'))); ?>

    <?php endif; ?>

    <p><?php echo e(session()->get('success')); ?></p>

    <?php if($tipo=="nueva"): ?>
        <h2>Formulario de Alta de Tarea</h2>
    <?php else: ?>
        <h2>Modificacion de Tarea</h2>
    <?php endif; ?>

    <form <?php if($tipo=="nueva"): ?>
            action="<?php echo e(url('tarea')); ?>" method="post"
          <?php else: ?>
            action="<?php echo e(route('tarea.update', $tarea->id)); ?>" method="post" 
          <?php endif; ?>>
        <?php echo csrf_field(); ?>
        <?php if($tipo!="nueva"): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <p><b>Cliente</b> <br>Cliente que encarga el trabajo |
        <!-- select de la tabla bd cliente -->        
        <select name="cliente">
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cliente->id); ?>"  
                    <?php if($tipo=="nueva"): ?> 
                        <?php if(old("cliente")=="<?php echo e($cliente->id); ?>"): ?> 
                            selected 
                        <?php endif; ?> 
                    <?php else: ?> 
                        <?php if("<?php echo e($tarea->cliente); ?>"=="<?php echo e($cliente->id); ?>"): ?>
                            selected
                        <?php endif; ?> 
                    <?php endif; ?> > <?php echo e($cliente->nombre); ?> </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select></p>
            
        <p><b>Persona de contacto</b> <br>Nombre y apellidos de la persona |
        <input type="text" name="nombre_cliente" 
                    <?php if($tipo=='nueva'): ?>
                        value= "<?php echo e(old('nombre_cliente')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->nombre_cliente); ?>"
                    <?php endif; ?>></p>
        
        
        <p><b>Teléfono de contacto</b><br>
        Nº de telefono de contacto de la persona de contacto |
        <input type="text" name="tel_s_contacto" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('tel_s_contacto')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->tel_contacto); ?>"
                    <?php endif; ?>></p>
        
        <p><b>Correo electrónico</b><br>
        Correo electrónico de la persona de contacto |
        <input type="email" name="correo" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('correo')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->correo); ?>"
                    <?php endif; ?>></p>

        <p><b>Descripción</b><br>
        Texto descriptivo identificativo de la tarea |
        <input type="text" name="descripcion" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('descripcion')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->descripcion); ?>"
                    <?php endif; ?>></p>
        
        <p><b>Provincia</b> |
        <select name="provincia">
            <?php $__currentLoopData = $provincias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provincia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($provincia->codigo); ?>" 
                    <?php if($tipo=="nueva"): ?> 
                        <?php if(old('provincia->codigo')=="<?php echo e($provincia->codigo); ?>"): ?>
                            selected 
                        <?php endif; ?> 
                    <?php else: ?> 
                        <?php if("<?php echo e($tarea->provincia); ?>"=="<?php echo e($provincia->codigo); ?>"): ?>
                            selected
                        <?php endif; ?> 
                    <?php endif; ?> ><?php echo e($provincia->codigo); ?> | <?php echo e($provincia->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </p>

        <p><b>Población</b> | 
        <input type="text" name="poblacion" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('poblacion')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->poblacion); ?>"
                    <?php endif; ?>></p>
       
        <p><b>Código postal</b> |
        <input type="text" name="codigo_postal" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('codigo_postal')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->codigo_postal); ?>"
                    <?php endif; ?>></p>

        <p><b>Dirección</b><br>Dirección donde debemos ir a realizar la tarea |
        <input type="text" name="direccion"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('direccion')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->direccion); ?>"
                    <?php endif; ?>></p>
        
        <p><b>Estado</b> |
        <select name="estado">
            <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($estado->clave); ?>" 
                    <?php if($tipo=="nueva"): ?> 
                        <?php if(old('estado->clave')=="<?php echo e($estado->clave); ?>"): ?>
                            selected 
                        <?php endif; ?> 
                    <?php else: ?> 
                        <?php if("<?php echo e($estado->clave); ?>"=="<?php echo e($tarea->estado); ?>"): ?>
                            selected
                        <?php endif; ?> 
                    <?php endif; ?> ><?php echo e($estado->estado); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </p>

        <p><b>Operario Encargado</b><br>
        Nombre o identificación del operario encargado de la realización de la tarea |
        <select name="empleado">
            <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($empleado->id); ?>" <?php if(old('operario')=="<?php echo e($empleado->id); ?>"): ?> selected <?php endif; ?> ><?php echo e($empleado->nombre); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select> </p>

        <p><b>Fecha Realización</b><br>
        Fecha en la que se realizará la tarea |
        <input type="date" name="fecha_realizacion"
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('fecha_realizacion')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->fecha_realizacion); ?>"
                    <?php endif; ?> > </p>
        
        <p>Anotaciones Anteriores</p>
        <textarea name="anotaciones_anteriores"><?php if($tipo=='nueva'): ?><?php echo e(old('anotaciones_anteriores')); ?><?php else: ?><?php echo e($tarea->anotaciones_anteriores); ?><?php endif; ?> </textarea>
        
        <p>Anotaciones Posteriores</p>
        <textarea name="anotaciones_posteriores"><?php if($tipo=='nueva'): ?><?php echo e(old('anotaciones_posteriores')); ?><?php else: ?><?php echo e($tarea->anotaciones_posteriores); ?><?php endif; ?></textarea>
        
        <p>Ficheros</p>
        <input type="file" name="ficheros" 
                    <?php if($tipo=='nueva'): ?>
                        value="<?php echo e(old('ficheros')); ?>"
                    <?php else: ?> 
                        value= "<?php echo e($tarea->ficheros); ?>"
                    <?php endif; ?> >

        <input type="submit" value="Guardar">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/form_tarea.blade.php ENDPATH**/ ?>