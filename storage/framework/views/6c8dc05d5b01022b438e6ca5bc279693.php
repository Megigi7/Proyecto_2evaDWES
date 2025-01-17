<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>linganguliguliguli</h1>
    <a href="hola">Hola Mundo</a>
    <a href="adios">Adiós Mundo</a>

    <p>Cuenta numeros</p>
    <a href="cuenta/5">5</a>
    <a href="cuenta">10</a>
    <a href="cuenta/100">100</a>
    
    <br>
    <form action="<?php echo e(url('multi')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="number" id="num" name="num" class="num">
        <button type="submit">Mostrar tabla de multiplicar</button>
    </form>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\xampp_DWES\UT9\laravel-ejercicios\resources\views/welcome.blade.php ENDPATH**/ ?>