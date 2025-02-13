<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/login.css')); ?>">
</head>
<body>
    <div class="login-container">
        
    <h3>Wazaaaaaaaaaaaaaaaaaaaa 🗣🗣🗣</h3>
    <p>Si te mueve te metemo el guevo</p>
        <form action="<?php echo e(url('login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h2>Iniciar Sesión</h2>
            <input type="text" name="user" placeholder="Usuario" value="<?php echo e(isset($old_nombre) ? $old_nombre : ''); ?>">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Iniciar sesión</button>
        </form>

        <?php if(isset($error)): ?>
            <p class="error"><?php echo e($error); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\pro-proyecto\resources\views/login.blade.php ENDPATH**/ ?>