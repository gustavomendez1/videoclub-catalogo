

<?php $__env->startSection('content'); ?>
<div class="row" style="margin-top: 20px;">
    
    
    <?php if(session()->has('notification')): ?>
        <div class="alert alert-success col-12 mb-4">
            <?php echo e(session('notification')); ?>

        </div>
    <?php endif; ?>

    <div class="col-sm-4 text-center">
        <img src="<?php echo e(\Illuminate\Support\Str::startsWith($pelicula->poster, 'http') ? $pelicula->poster : asset('storage/' . $pelicula->poster)); ?>" style="height:360px;" class="img-fluid rounded shadow"/>
    </div>
    
    <div class="col-sm-8">
        <h1 class="display-5" style="font-weight: bold;"><?php echo e($pelicula->title); ?></h1>
        <p class="lead"><strong>Año:</strong> <?php echo e($pelicula->year); ?> | <strong>Director:</strong> <?php echo e($pelicula->director); ?></p>
        <hr>
        
        <div style="margin-top: 15px;">
            <h5 style="font-weight: bold;">Sinopsis:</h5>
            <p style="text-align: justify;"><?php echo e($pelicula->synopsis); ?></p>
            <p><strong>Estado:</strong> 
                <?php if($pelicula->rented): ?>
                    <span class="badge bg-danger">Película actualmente alquilada</span>
                <?php else: ?>
                    <span class="badge bg-success">Película disponible</span>
                <?php endif; ?>
            </p>
        </div>

        
        <div class="d-flex flex-wrap gap-2" style="margin-top: 30px;">

            <a href="<?php echo e(url('/catalog')); ?>" class="btn btn-secondary">⬅️ Volver al listado</a>

            <?php if($pelicula->rented): ?>
                
                <form action="<?php echo e(action([App\Http\Controllers\CatalogController::class, 'putReturn'], ['id' => $pelicula->id])); ?>" method="POST" style="display:inline">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-info text-white" style="font-weight: 500;">↩️ Devolver película</button>
                </form>
            <?php else: ?>
                
                <form action="<?php echo e(action([App\Http\Controllers\CatalogController::class, 'putRent'], ['id' => $pelicula->id])); ?>" method="POST" style="display:inline">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-success" style="font-weight: 500;">🔑 Alquilar película</button>
                </form>
            <?php endif; ?>

            <a href="<?php echo e(url('/catalog/edit/' . $pelicula->id)); ?>" class="btn btn-warning text-dark" style="font-weight: 500;">✏️ Editar película</a>

            
            <form action="<?php echo e(action([App\Http\Controllers\CatalogController::class, 'deleteMovie'], ['id' => $pelicula->id])); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta película?')" class="btn btn-danger">🗑️ Eliminar película</button>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\videoclub\resources\views/catalog/show.blade.php ENDPATH**/ ?>