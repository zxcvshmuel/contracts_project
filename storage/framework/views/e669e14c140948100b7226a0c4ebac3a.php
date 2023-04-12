<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-breezy::components.grid-section','data' => ['class' => 'mt-8']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-breezy::grid-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-8']); ?>

     <?php $__env->slot('title', null, []); ?> 
        <?php echo e(__('default.profile.2fa.title')); ?>

     <?php $__env->endSlot(); ?>

     <?php $__env->slot('description', null, []); ?> 
        <?php echo e(__('default.profile.2fa.description')); ?>

     <?php $__env->endSlot(); ?>


    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.card.index','data' => ['class' => 'col-span-2 sm:col-span-1 mt-5 md:mt-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'col-span-2 sm:col-span-1 mt-5 md:mt-0']); ?>
        <?php if($this->user->has_enabled_two_factor): ?>

            <?php if($this->user->has_confirmed_two_factor): ?>
                <p class="text-lg font-medium text-gray-900 dark:text-white"><?php echo e(__('default.profile.2fa.enabled.title')); ?></p>
                <?php echo e(__('default.profile.2fa.enabled.description') ?? __('filament-breezy::default.profile.2fa.enabled.store_codes')); ?>

            <?php else: ?>
                <p class="text-lg font-medium text-gray-900 dark:text-white"><?php echo e(__('default.profile.2fa.finish_enabling.title')); ?></p>
                <?php echo e(__('default.profile.2fa.finish_enabling.description')); ?>

            <?php endif; ?>

            <div class="mt-2">
                <?php echo $this->twoFactorQrCode(); ?>

                <p><?php echo e(__('default.profile.2fa.setup_key')); ?> <?php echo e(decrypt($this->user->two_factor_secret)); ?></p>
            </div>

            <?php if($this->showing_two_factor_recovery_codes): ?>
                <hr class="my-3"/>
                <p><?php echo e(__('default.profile.2fa.enabled.store_codes')); ?></p>
                <div class="space-y-2">
                    <?php $__currentLoopData = json_decode(decrypt($this->user->two_factor_recovery_codes), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="inline-flex items-center p-2 rounded-full text-xs font-medium bg-gray-100 text-gray-800"><?php echo e($code); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php echo e($this->getCachedAction('regenerate2fa')); ?>


            <?php endif; ?>

        <?php else: ?>

            <p class="text-lg font-medium text-gray-900 dark:text-white"><?php echo e(__('default.profile.2fa.not_enabled.title')); ?></p>
            <?php echo e(__('default.profile.2fa.not_enabled.description')); ?>


        <?php endif; ?>
         <?php $__env->slot('footer', null, []); ?> 
            <?php if($this->user->has_enabled_two_factor && $this->user->has_confirmed_two_factor): ?>
                <div class="flex items-center justify-between">
                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button','data' => ['color' => 'secondary','wire:click' => 'toggleRecoveryCodes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'secondary','wire:click' => 'toggleRecoveryCodes']); ?>
                        <?php echo e($this->showing_two_factor_recovery_codes ? __('filament-breezy::default.profile.2fa.enabled.hide_codes') :__('filament-breezy::default.profile.2fa.enabled.show_codes')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                    <?php echo e($this->getCachedAction('disable2fa')); ?>

                </div>
            <?php elseif($this->user->has_enabled_two_factor): ?>
                <form wire:submit.prevent="confirmTwoFactor">
                    <div class="flex items-center justify-between">
                        <div><?php echo e($this->confirmTwoFactorForm); ?></div>
                        <div class="mt-5">
                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?>
                                <?php echo e(__('default.profile.2fa.actions.confirm_finish')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button','data' => ['color' => 'secondary','wire:click' => 'disableTwoFactor']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'secondary','wire:click' => 'disableTwoFactor']); ?>
                                <?php echo e(__('default.profile.2fa.actions.cancel_setup')); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                        </div>
                    </div>
                </form>
            <?php else: ?>
                <div class="text-right">
                    <?php echo e($this->getCachedAction('enable2fa')); ?>

                </div>
            <?php endif; ?>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/resources/views/vendor/filament-breezy/components/sections/2fa.blade.php ENDPATH**/ ?>