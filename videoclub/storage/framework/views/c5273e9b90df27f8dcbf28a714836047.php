

<?php $__env->startSection('content'); ?>
<div class="row">

   <div class="row g-4">
        <?php $__currentLoopData = $arrayPeliculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelicula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-6 col-sm-4 col-md-3 text-center">
            <div class="card h-100 bg-dark border-secondary shadow-sm text-white" style="transition: transform 0.2s; cursor: pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                
                <a href="<?php echo e(url('/catalog/show/' . $pelicula->id )); ?>" class="text-decoration-none text-white">
                    
                    <img src="<?php echo e($pelicula->poster); ?>" class="card-img-top img-fluid" style="width: 100%; height: 260px; object-fit: cover; border-top-left-radius: 4px; border-top-right-radius: 4px;" alt="<?php echo e($pelicula->title); ?>"/>
                    
                    <div class="card-body p-2 d-flex flex-column justify-content-center" style="min-height: 65px;">
                        <h5 class="card-title m-0 font-weight-bold" style="font-size: 1rem; line-height: 1.2; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            <?php echo e($pelicula->title); ?>

                        </h5>
                    </div>
                </a>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\videoclub\resources\views/catalog/index.blade.php ENDPATH**/ ?>