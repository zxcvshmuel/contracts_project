<?php ($locale = strtolower(str_replace('_', '-', $this->config('locale', config('app.locale'))))); ?>

<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.widget','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.card.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <video class="sm:hiden" id="fullCalendarVideo" style="position: absolute; width: -webkit-fill-available; height: auto; opacity: 0.15" autoplay muted loop>
            <source src="<?php echo e(\Illuminate\Support\Facades\Storage::url('/') . 'time-management-5536231-4629529.mp4'); ?>" type="video/mp4">
        </video>
        <script>
            document.querySelector('#fullCalendarVideo').playbackRate = 0.1;
        </script>
        <div
            wire:ignore
            x-ref="calendar"
            x-data="calendarComponent({
                key: <?php echo \Illuminate\Support\Js::from($this->getKey())->toHtml() ?>,
                config: <?php echo e(json_encode($this->getConfig(), JSON_PRETTY_PRINT)); ?>,
                locale: '<?php echo e($locale); ?>',
                events: <?php echo e(json_encode($events)); ?>,
                initialView: <?php echo \Illuminate\Support\Js::from($this->config('initialView'))->toHtml() ?>,
                initialDate: <?php echo \Illuminate\Support\Js::from($this->config('initialDate'))->toHtml() ?>,
                shouldSaveState: <?php echo \Illuminate\Support\Js::from($this->config('saveState', false))->toHtml() ?>,
                handleEventClickUsing: async ({ event, jsEvent }) => {
                    if( event.url ) {
                        jsEvent.preventDefault();
                        window.open(event.url, event.extendedProps.shouldOpenInNewTab ? '_blank' : '_self');
                        return false;
                    }

                    <?php if($this::isListeningClickEvent()): ?>
                        $wire.onEventClick(event)
                    <?php endif; ?>
                },
                handleEventDropUsing: async ({ event, oldEvent, relatedEvents }) => {
                    <?php if($this::isListeningDropEvent()): ?>
                        $wire.onEventDrop(event, oldEvent, relatedEvents)
                    <?php endif; ?>
                },
                handleEventResizeUsing: async ({ event, oldEvent, relatedEvents }) => {
                    <?php if($this::isListeningResizeEvent()): ?>
                        $wire.onEventResize(event, oldEvent, relatedEvents)
                    <?php endif; ?>
                },
                handleDateClickUsing: async ({ date, allDay }) => {
                    <?php if($this::canCreate()): ?>
                        $wire.onCreateEventClick({ date, allDay })
                    <?php endif; ?>
                },
                handleSelectUsing: async ({ start, end, allDay }) => {
                    <?php if($this->config('selectable', false)): ?>
                        $wire.onCreateEventClick({ start, end, allDay })
                    <?php endif; ?>
                },
                fetchEventsUsing: async ({ start, end, allDay }, successCallback, failureCallback) => {
                    <?php if( $this::canFetchEvents() ): ?>
                        return $wire.fetchEvents({ start, end, allDay })
                            .then(events => {
                                if(events.length == 0) return Object.values($data.cachedEvents)
                                if(events[0].id) {
                                    events.forEach((event) => $data.cachedEvents[event.id] = event)
                                    successCallback(Object.values($data.cachedEvents))
                                } else{
                                    successCallback(events)
                                }
                            })
                            .catch( failureCallback );
                    <?php else: ?>
                        return successCallback([]);
                    <?php endif; ?>
                },
            })"
            x-on:filament-fullcalendar--refresh.window="
                <?php if( $this::canFetchEvents() ): ?>
                    $data.calendar.refetchEvents();
                <?php else: ?>
                    $data.calendar.removeAllEvents();
                    event.detail.data.map(event => $data.calendar.addEvent(event));
                <?php endif; ?>
            "
            class="filament-fullcalendar--calendar"
        ></div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

    <?php if($this::canCreate()): ?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-fullcalendar::components.create-event-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-fullcalendar::create-event-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if($this::canView()): ?>
        <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-fullcalendar::components.edit-event-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-fullcalendar::edit-event-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/vendor/saade/filament-fullcalendar/src/../resources/views/fullcalendar.blade.php ENDPATH**/ ?>