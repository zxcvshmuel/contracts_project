<div>
    <?php if(!$formSubmitted): ?>
        <h2><?php echo e($formTitle); ?></h2>
    <form wire:submit.prevent="submit" class="form">
        <div class="mb-6 mt-1">
            <label class="block" for="name"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </label>
            <input type="text" id="name" wire:model="name" name="name" placeholder="שם פרטי:"
                   class="input">
        </div>

        <div class="mb-6">
            <label class="block" for="email"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </label>
            <input type="text" id="email" wire:model="email" name="email" placeholder='דוא"ל:'
                   class="input">
        </div>

        <div class="mb-6">
            <label class="block" for="phone"><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </label>
            <input type="text" id="phone" wire:model="phone" name="phone" placeholder="טלפון:"
                   class="input">

        </div>

        <div class="">
            <button type="submit"
                    class="button">
                לשליחה
            </button>
        </div>
    </form>
    <?php else: ?>
        <h2><?php echo e($formTitle); ?></h2>
    <?php endif; ?>
</div>
<?php /**PATH /home/sdevcoi1/public_html/contracts/resources/views/livewire/welcome-form.blade.php ENDPATH**/ ?>