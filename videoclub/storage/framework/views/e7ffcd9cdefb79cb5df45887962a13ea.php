<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="<?php echo e(url('/catalog')); ?>">🎬 Videoclub</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                
                
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('catalog') ? 'active' : ''); ?>" href="<?php echo e(url('/catalog')); ?>">📋 Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('catalog/create') ? 'active' : ''); ?>" href="<?php echo e(url('/catalog/create')); ?>">➕ Añadir película</a>
                    </li>
                </ul>

                
                <ul class="navbar-nav ms-auto">
                    <?php if(Route::has('login')): ?>
                        <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item">
                                <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin: 0;">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn nav-link text-danger font-weight-bold" style="background: none; border: none;">
                                        ❌ Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>">🔑 Iniciar Sesión</a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>">📝 Registrarse</a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\videoclub\resources\views/layouts/master.blade.php ENDPATH**/ ?>