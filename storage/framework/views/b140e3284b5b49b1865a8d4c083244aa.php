<?php if(filled($brand = config('filament.brand'))): ?>
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'filament-brand text-xl font-bold tracking-tight',
        'dark:text-white' => config('filament.dark_mode'),
    ]) ?>">
        <img class=" h-16 m-auto" src="<?php echo e(\Illuminate\Support\Facades\Storage::url('/') . \App\Models\User::find(1)->logo_url); ?>" alt="">
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/resources/views/vendor/filament/components/brand.blade.php ENDPATH**/ ?>