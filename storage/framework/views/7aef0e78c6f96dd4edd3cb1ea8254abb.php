<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-action' => $getHintAction(),'hint-color' => $getHintColor(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <div
        x-data="dateTimePickerFormComponent({
            displayFormat: '<?php echo e(convert_date_format($getDisplayFormat())->to('day.js')); ?>',
            firstDayOfWeek: <?php echo e($getFirstDayOfWeek()); ?>,
            isAutofocused: <?php echo \Illuminate\Support\Js::from($isAutofocused())->toHtml() ?>,
            locale: <?php echo \Illuminate\Support\Js::from(app()->getLocale())->toHtml() ?>,
            shouldCloseOnDateSelection: <?php echo \Illuminate\Support\Js::from($shouldCloseOnDateSelection())->toHtml() ?>,
            state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
        })"
        x-on:keydown.esc="isOpen() && $event.stopPropagation()"
        <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-forms-date-time-picker-component relative'])); ?>

        <?php echo e($getExtraAlpineAttributeBag()); ?>

    >
        <input x-ref="maxDate" type="hidden" value="<?php echo e($getMaxDate()); ?>" />
        <input x-ref="minDate" type="hidden" value="<?php echo e($getMinDate()); ?>" />
        <input x-ref="disabledDates" type="hidden" value="<?php echo e(json_encode($getDisabledDates())); ?>" />

        <button
            x-ref="button"
            x-on:click="togglePanelVisibility()"
            x-on:keydown.enter.stop.prevent="if (! $el.disabled) { isOpen() ? selectDate() : togglePanelVisibility() }"
            x-on:keydown.arrow-left.stop.prevent="if (! $el.disabled) focusPreviousDay()"
            x-on:keydown.arrow-right.stop.prevent="if (! $el.disabled) focusNextDay()"
            x-on:keydown.arrow-up.stop.prevent="if (! $el.disabled) focusPreviousWeek()"
            x-on:keydown.arrow-down.stop.prevent="if (! $el.disabled) focusNextWeek()"
            x-on:keydown.backspace.stop.prevent="if (! $el.disabled) clearState()"
            x-on:keydown.clear.stop.prevent="if (! $el.disabled) clearState()"
            x-on:keydown.delete.stop.prevent="if (! $el.disabled) clearState()"
            aria-label="<?php echo e($getPlaceholder()); ?>"
            dusk="filament.forms.<?php echo e($getStatePath()); ?>.open"
            type="button"
            tabindex="-1"
            <?php if($isDisabled()): ?> disabled <?php endif; ?>
            <?php echo e($getExtraTriggerAttributeBag()->class([
                'bg-white relative w-full border py-2 pl-3 pr-10 rtl:pl-10 rtl:pr-3 text-start cursor-default rounded-lg shadow-sm outline-none',
                'focus-within:ring-1 focus-within:border-primary-500 focus-within:ring-inset focus-within:ring-primary-500' => ! $isDisabled(),
                'dark:bg-gray-700' => config('forms.dark_mode'),
                'border-gray-300' => ! $errors->has($getStatePath()),
                'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                'border-danger-600' => $errors->has($getStatePath()),
                'dark:border-danger-400' => $errors->has($getStatePath()) && config('forms.dark_mode'),
                'opacity-70' => $isDisabled(),
                'dark:text-gray-300' => $isDisabled() && config('forms.dark_mode'),
            ])); ?>

        >
            <input
                readonly
                placeholder="<?php echo e($getPlaceholder()); ?>"
                wire:key="<?php echo e($this->id); ?>.<?php echo e($getStatePath()); ?>.<?php echo e($field::class); ?>.display-text"
                x-model="displayText"
                <?php echo ($id = $getId()) ? "id=\"{$id}\"" : null; ?>

                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'w-full h-full p-0 placeholder-gray-400 bg-transparent border-0 outline-none focus:placeholder-gray-500 focus:ring-0',
                    'dark:bg-gray-700 dark:placeholder-gray-400' => config('forms.dark_mode'),
                    'cursor-default' => $isDisabled(),
                ]) ?>"
            />

            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none rtl:right-auto rtl:left-0 rtl:pl-2">
                <svg class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'w-5 h-5 text-gray-400',
                    'dark:text-gray-400' => config('forms.dark_mode'),
                ]) ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </span>
        </button>

        <div
            x-ref="panel"
            x-cloak
            x-float.placement.bottom-start.offset.flip.shift="{ offset: 8 }"
            wire:ignore.self
            wire:key="<?php echo e($this->id); ?>.<?php echo e($getStatePath()); ?>.<?php echo e($field::class); ?>.panel"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'absolute hidden z-10 my-1 bg-white border border-gray-300 rounded-lg shadow-md',
                'dark:bg-gray-700 dark:border-gray-600' => config('forms.dark_mode'),
                'p-4 min-w-[16rem] w-fit' => $hasDate(),
            ]) ?>"
        >
            <div class="space-y-3">
                <?php if($hasDate()): ?>
                    <div class="flex items-center justify-between space-x-1 rtl:space-x-reverse">
                        <select
                            x-model="focusedMonth"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'grow px-1 py-0 text-lg font-medium text-gray-800 border-0 cursor-pointer outline-none focus:ring-0',
                                'dark:bg-gray-700 dark:text-gray-200' => config('forms.dark_mode'),
                            ]) ?>"
                            dusk="filament.forms.<?php echo e($getStatePath()); ?>.focusedMonth"
                        >
                            <template x-for="(month, index) in months">
                                <option x-bind:value="index" x-text="month"></option>
                            </template>
                        </select>

                        <input
                            type="number"
                            inputmode="numeric"
                            x-model.debounce="focusedYear"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'w-20 p-0 text-lg text-end border-0 outline-none focus:ring-0',
                                'dark:bg-gray-700 dark:text-gray-200' => config('forms.dark_mode'),
                            ]) ?>"
                            dusk="filament.forms.<?php echo e($getStatePath()); ?>.focusedYear"
                        />
                    </div>

                    <div class="grid grid-cols-7 gap-1">
                        <template x-for="(day, index) in dayLabels" :key="index">
                            <div
                                x-text="day"
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'text-xs font-medium text-center text-gray-800',
                                    'dark:text-gray-200' => config('forms.dark_mode'),
                                ]) ?>"
                            ></div>
                        </template>
                    </div>

                    <div role="grid" class="grid grid-cols-7 gap-1">
                        <template x-for="day in emptyDaysInFocusedMonth" x-bind:key="day">
                            <div class="text-sm text-center border border-transparent"></div>
                        </template>

                        <template x-for="day in daysInFocusedMonth" x-bind:key="day">
                            <div
                                x-text="day"
                                x-on:click="dayIsDisabled(day) || selectDate(day)"
                                x-on:mouseenter="setFocusedDay(day)"
                                role="option"
                                x-bind:aria-selected="focusedDate.date() === day"
                                x-bind:class="{
                                    'text-gray-700 <?php if(config('forms.dark_mode')): ?> dark:text-gray-300 <?php endif; ?>': ! dayIsSelected(day),
                                    'cursor-pointer': ! dayIsDisabled(day),
                                    'bg-primary-50 <?php if(config('forms.dark_mode')): ?> dark:bg-primary-100 dark:text-gray-600 <?php endif; ?>': dayIsToday(day) && ! dayIsSelected(day) && focusedDate.date() !== day && ! dayIsDisabled(day),
                                    'bg-primary-200 <?php if(config('forms.dark_mode')): ?> dark:text-gray-600 <?php endif; ?>': focusedDate.date() === day && ! dayIsSelected(day),
                                    'bg-primary-500 text-white': dayIsSelected(day),
                                    'cursor-not-allowed pointer-events-none': dayIsDisabled(day),
                                    'opacity-50': focusedDate.date() !== day && dayIsDisabled(day),
                                }"
                                x-bind:dusk="'filament.forms.<?php echo e($getStatePath()); ?>' + '.focusedDate.' + day"
                                class="text-sm leading-loose text-center transition duration-100 ease-in-out rounded-full"
                            ></div>
                        </template>
                    </div>
                <?php endif; ?>

                <?php if($hasTime()): ?>
                    <div
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'flex items-center justify-center bg-gray-50 py-2 rounded-lg rtl:flex-row-reverse',
                            'dark:bg-gray-800' => config('forms.dark_mode'),
                        ]) ?>"
                    >
                        <input
                            max="23"
                            min="0"
                            step="<?php echo e($getHoursStep()); ?>"
                            type="number"
                            inputmode="numeric"
                            x-model.debounce="hour"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'w-16 p-0 pr-1 text-xl bg-gray-50 text-center text-gray-700 border-0 outline-none focus:ring-0',
                                'dark:text-gray-200 dark:bg-gray-800' => config('forms.dark_mode'),
                            ]) ?>"
                            dusk="filament.forms.<?php echo e($getStatePath()); ?>.hour"
                        />

                        <span
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'text-xl font-medium bg-gray-50 text-gray-700',
                                'dark:text-gray-200 dark:bg-gray-800' => config('forms.dark_mode'),
                            ]) ?>"
                        >:</span>

                        <input
                            max="59"
                            min="0"
                            step="<?php echo e($getMinutesStep()); ?>"
                            type="number"
                            inputmode="numeric"
                            x-model.debounce="minute"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'w-16 p-0 pr-1 text-xl text-center bg-gray-50 text-gray-700 border-0 outline-none focus:ring-0',
                                'dark:text-gray-200 dark:bg-gray-800' => config('forms.dark_mode'),
                            ]) ?>"
                            dusk="filament.forms.<?php echo e($getStatePath()); ?>.minute"
                        />

                        <?php if($hasSeconds()): ?>
                            <span
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'text-xl font-medium text-gray-700 bg-gray-50',
                                    'dark:text-gray-200 dark:bg-gray-800' => config('forms.dark_mode'),
                                ]) ?>"
                            >:</span>


                            <input
                                max="59"
                                min="0"
                                step="<?php echo e($getSecondsStep()); ?>"
                                type="number"
                                inputmode="numeric"
                                x-model.debounce="second"
                                dusk="filament.forms.<?php echo e($getStatePath()); ?>.second"
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'w-16 p-0 pr-1 text-xl text-center bg-gray-50 text-gray-700 border-0 outline-none focus:ring-0',
                                    'dark:text-gray-200 dark:bg-gray-800' => config('forms.dark_mode'),
                                ]) ?>"
                            />
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/vendor/filament/forms/src/../resources/views/components/date-time-picker.blade.php ENDPATH**/ ?>