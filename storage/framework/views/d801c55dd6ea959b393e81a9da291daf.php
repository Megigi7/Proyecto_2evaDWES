

<?php $__env->startSection('content'); ?>
    <h2>Detalles de la tarea <?php echo e($tarea->id); ?></h2>

        <p><b>Estado:</b> <?php echo e($estado->estado); ?></p>

        <h3>Datos del cliente</h3>
        <p><b>Cliente: </b> <?php echo e($cliente->nombre); ?> </p>
        <p><b>Nombre del cliente: </b> <?php echo e($tarea->nombre_cliente); ?> </p>
        <p><b>Teléfono de contacto: </b> <?php echo e($tarea->tel_contacto); ?> </p>
        <p><b>Correo electrónico: </b> <?php echo e($tarea->correo); ?> </p>
        <p><b>Dirección: </b> <?php echo e($tarea->direccion); ?> </p>
        <p><b>Provincia: </b> <?php echo e($provincia->nombre); ?> </p>
        <p><b>Población: </b> <?php echo e($tarea->poblacion); ?> </p>
        <p><b>Código Postal: </b> <?php echo e($tarea->codigo_postal); ?> </p>
        
        <h3>Especificaciones de la tarea</h3>
        <p><b>Descripción: </b> <?php echo e($tarea->descripcion); ?> </p>
        <p><b>Fecha de creación: </b> <?php echo e($tarea->fecha_creacion); ?> </p>
        <p><b>Fecha de realización: </b> <?php echo e($tarea->fecha_realizacion); ?> </p>
        <p><b>Empleado encargado: </b> <?php echo e($empleado->nombre); ?> </p>
        <p><b>Anotaciones anteriores: </b> <?php echo e($tarea->anotaciones_anteriores); ?> </p>
        <p><b>Anotaciones posteriores: </b> <?php echo e($tarea->anotaciones_posteriores); ?> </p>
        <p><b>Ficheros: </b> <?php echo e($tarea->ficheros); ?> </p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/detalles.blade.php ENDPATH**/ ?>