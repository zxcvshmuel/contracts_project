<?php
    if (! $getAction()) {
        $wireClickAction = null;
    } else {
        $wireClickAction = $getAction();

        if ($getActionArguments()) {
            $wireClickAction .= '(\'';
            $wireClickAction .= \Illuminate\Support\Str::of(json_encode($getActionArguments()))->replace('"', '\\"');
            $wireClickAction .= '\')';
        }
    }
?>

<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'tables::components.button','data' => ['form' => $getForm(),'type' => $canSubmitForm() ? 'submit' : 'button','tag' => $action->getUrl() ? 'a' : 'button','wire:click' => $wireClickAction,'href' => $action->isEnabled() ? $action->getUrl() : null,'target' => $action->shouldOpenUrlInNewTab() ? '_blank' : null,'xOn:click' => $canCancelAction() ? 'close()' : null,'color' => $getColor(),'outlined' => $isOutlined(),'icon' => $getIcon(),'iconPosition' => $getIconPosition(),'size' => $getSize(),'attributes' => $getExtraAttributeBag(),'class' => 'filament-tables-modal-button-action']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['form' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getForm()),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canSubmitForm() ? 'submit' : 'button'),'tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->getUrl() ? 'a' : 'button'),'wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($wireClickAction),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->isEnabled() ? $action->getUrl() : null),'target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->shouldOpenUrlInNewTab() ? '_blank' : null),'x-on:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($canCancelAction() ? 'close()' : null),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColor()),'outlined' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isOutlined()),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIcon()),'icon-position' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getIconPosition()),'size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSize()),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getExtraAttributeBag()),'class' => 'filament-tables-modal-button-action']); ?>
    <?php echo e($getLabel()); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/vendor/filament/tables/src/../resources/views/actions/modal/actions/button-action.blade.php ENDPATH**/ ?>