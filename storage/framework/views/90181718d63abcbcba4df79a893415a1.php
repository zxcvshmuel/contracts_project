<?php
    $isAside = $isAside();
    $isCollapsed = $isCollapsed();
    $isCollapsible = $isCollapsible() && (! $isAside);
    $isCompact = $isCompact();
?>

<div
    <?php if($isCollapsible): ?>
        x-data="{
            isCollapsed: <?php echo \Illuminate\Support\Js::from($isCollapsed)->toHtml() ?>,
        }"
        x-on:open-form-section.window="if ($event.detail.id == $el.id) isCollapsed = false"
        x-on:collapse-form-section.window="if ($event.detail.id == $el.id) isCollapsed = true"
        x-on:toggle-form-section.window="if ($event.detail.id == $el.id) isCollapsed = ! isCollapsed"
        x-on:expand-concealing-component.window="
            error = $el.querySelector('[data-validation-error]')

            if (! error) {
                return
            }

            isCollapsed = false

            if (document.body.querySelector('[data-validation-error]') !== error) {
                return
            }

            setTimeout(() => $el.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'start' }), 200)
        "
    <?php endif; ?>
    id="<?php echo e($getId()); ?>"
    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-forms-section-component',
        'rounded-xl border border-gray-300 bg-white' => ! $isAside,
        'grid grid-cols-1 md:grid-cols-2' => $isAside,
        'dark:border-gray-600 dark:bg-gray-800' => config('forms.dark_mode')  && ! $isAside,
    ])); ?>

    <?php echo e($getExtraAlpineAttributeBag()); ?>

>
    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-forms-section-header-wrapper flex rtl:space-x-reverse overflow-hidden rounded-t-xl',
            'min-h-[40px]' => $isCompact,
            'min-h-[56px]' => ! $isCompact,
            'pr-6 pb-4' => $isAside,
            'px-4 py-2 items-center bg-gray-100' => ! $isAside,
            'dark:bg-gray-900' => config('forms.dark_mode') && (! $isAside),
        ]) ?>"
        <?php if($isCollapsible): ?>
            x-bind:class="{ 'rounded-b-xl': isCollapsed }"
            x-on:click="isCollapsed = ! isCollapsed"
        <?php endif; ?>
    >
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-forms-section-header flex-1 space-y-1',
            'cursor-pointer' => $isCollapsible,
        ]) ?>">
            <h3 class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'font-bold tracking-tight pointer-events-none',
                'text-xl font-bold' => ! $isCompact,
            ]) ?>">
                <?php echo e($getHeading()); ?>

            </h3>

            <?php if($description = $getDescription()): ?>
                <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'text-gray-500',
                    'text-sm' => $isCompact,
                    'text-base' => ! $isCompact,
                ]) ?>">
                    <?php echo e($description); ?>

                </p>
            <?php endif; ?>
        </div>

        <?php if($isCollapsible): ?>
            <button
                x-on:click.stop="isCollapsed = ! isCollapsed"
                x-bind:class="{
                    '-rotate-180': !isCollapsed,
                }" type="button"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'flex items-center justify-center transform rounded-full text-primary-500 outline-none hover:bg-gray-500/5 focus:bg-primary-500/10',
                    'w-10 h-10' => ! $isCompact,
                    'w-8 h-8 -my-1' => $isCompact,
                    '-rotate-180' => ! $isCollapsed,
                ]) ?>"
            >
                <svg class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'w-7 h-7' => ! $isCompact,
                    'w-5 h-5' => $isCompact,
                ]) ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        <?php endif; ?>
    </div>

    <div
        <?php if($isCollapsible): ?>
            x-bind:class="{ 'invisible h-0 !m-0 overflow-y-hidden': isCollapsed }"
            x-bind:aria-expanded="(! isCollapsed).toString()"
            <?php if($isCollapsed): ?> x-cloak <?php endif; ?>
        <?php endif; ?>
        class="filament-forms-section-content-wrapper"
    >
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-forms-section-content',
            'rounded-xl border border-gray-300 bg-white' => $isAside,
            'dark:border-gray-600 dark:bg-gray-800' => config('forms.dark_mode') && $isAside,
            'p-6' => ! $isCompact,
            'p-4' => $isCompact,
        ]) ?>">
            <?php echo e($getChildComponentContainer()); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/contracts/vendor/filament/forms/src/../resources/views/components/section.blade.php ENDPATH**/ ?>