<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- <link rel="stylesheet" type="text/css" href="../resources/css/login.css"> -->
</head>
<body>
    <div class="login-container">
        <form action="<?php echo e(url('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h2>Iniciar Sesión</h2>
            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo e(isset($old_nombre) ? $old_nombre : ''); ?>">
            <input type="password" name="contraseña" placeholder="Contraseña">
            <button type="submit">Iniciar sesión</button>
        </form>

        <?php if(isset($error)): ?>
            <p class="error"><?php echo e($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/welcome.blade.php ENDPATH**/ ?>