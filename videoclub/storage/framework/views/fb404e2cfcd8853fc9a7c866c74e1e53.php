

<?php $__env->startSection('content'); ?>
<div class="tailwind-scope">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { corePlugins: { preflight: false } }
    </script>

    <div class="max-w-2xl mx-auto my-10 p-4">
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden" style="background-color: #fff; border-radius: 0.75rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); border: 1px solid #f3f4f6; overflow: hidden;">
            
            <div class="bg-gray-900 px-6 py-4 text-center" style="background-color: #111827; padding: 1rem 1.5rem; text-align: center;">
                <h3 class="text-xl font-bold text-white tracking-wide" style="color: #fff; font-size: 1.25rem; font-weight: 700; margin: 0;">➕ Añadir Nueva Película</h3>
            </div>

            <div class="p-6 bg-gray-50/50" style="padding: 1.5rem;">
                <form action="<?php echo e(url('/catalog/create')); ?>" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <?php echo csrf_field(); ?>

                    <div>
                        <label for="title" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.25rem;">Título de la película</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Ej: Pulp Fiction" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;" required>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem;">
                        <div>
                            <label for="year" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.25rem;">Año</label>
                            <input type="text" name="year" id="year" class="form-control" placeholder="Ej: 1994" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; text-align: center;" required>
                        </div>
                        <div>
                            <label for="director" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.25rem;">Director</label>
                            <input type="text" name="director" id="director" class="form-control" placeholder="Nombre del director" style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem;" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="poster" class="control-label font-weight-bold">🎬 URL del Póster / Imagen</label>
                       <input type="url" name="poster" id="poster" class="form-control" placeholder="https://ejemplo.com/imagen.jpg" required>
                        <small class="form-text text-muted">Pega el enlace directo de la imagen de la película de internet.</small>
                    </div>

                    <div>
                        <label for="synopsis" style="display: block; font-size: 0.875rem; font-weight: 600; color: #374151; margin-bottom: 0.25rem;">Resumen (Sinopsis)</label>
                        <textarea name="synopsis" id="synopsis" rows="4" class="form-control" placeholder="Escribe una breve sinopsis..." style="width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; resize: none;" required></textarea>
                    </div>

                    <div style="border-top: 1px solid #e5e7eb; padding-top: 1rem; display: flex; justify-content: space-between; align-items: center;">
                        <a href="<?php echo e(url('/catalog')); ?>" style="text-decoration: none; color: #4b5563; font-weight: 500; font-size: 0.875rem;">❌ Cancelar</a>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold rounded-lg shadow" style="background-color: #059669; color: #fff; border: none; padding: 0.5rem 1.5rem; border-radius: 0.5rem; font-weight: 700; cursor: pointer;">
                            🚀 Añadir Película
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\videoclub\resources\views/catalog/create.blade.php ENDPATH**/ ?>