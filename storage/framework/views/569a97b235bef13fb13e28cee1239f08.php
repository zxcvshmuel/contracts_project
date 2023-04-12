<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id','label','labelSrOnly','hasNestedRecursiveValidationRules','helperText','hint','hintAction','hintColor','hintIcon','required','statePath']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id','label','labelSrOnly','hasNestedRecursiveValidationRules','helperText','hint','hintAction','hintColor','hintIcon','required','statePath']); ?>
<?php foreach (array_filter((['id','label','labelSrOnly','hasNestedRecursiveValidationRules','helperText','hint','hintAction','hintColor','hintIcon','required','statePath']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'forms::components.field-wrapper.index','data' => ['id' => $id,'label' => $label,'labelSrOnly' => $labelSrOnly,'hasNestedRecursiveValidationRules' => $hasNestedRecursiveValidationRules,'helperText' => $helperText,'hint' => $hint,'hintAction' => $hintAction,'hintColor' => $hintColor,'hintIcon' => $hintIcon,'required' => $required,'statePath' => $statePath]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($label),'label-sr-only' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelSrOnly),'has-nested-recursive-validation-rules' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hasNestedRecursiveValidationRules),'helper-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($helperText),'hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hint),'hint-action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintAction),'hint-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintColor),'hint-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintIcon),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?><?php /**PATH /home/sdevcoi1/public_html/contracts/storage/framework/views/170271171973f164fbacd6910c80549f.blade.php ENDPATH**/ ?>