<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    

    
    
    

    
    

    


    <h1>participation entre 2010 et 2020 : </h1>
    <ul>
    <?php $__currentLoopData = $participation_entre_date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li> <?php echo e($ac->nom); ?>  <?php echo e($ac->prenom); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    
</body>
</html><?php /**PATH C:\wamp64\www\projet-laravel\resources\views/affTpBuilder.blade.php ENDPATH**/ ?>