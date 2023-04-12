<?php

namespace App\Filament\Widgets;

use App\Models\Events;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    /**
     * Return events that should be rendered statically on calendar.
     */
    public function getViewData(): array
    {

        /*$user = auth()->user();
        $events = $user->events()->get();

        $results = [];

        foreach ($events as $event){
            $results[] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->date,
                    'end'   => $event->end_at
                    //'url' => 'https://some-url.com',
                ];
        }


        return $results;*/

        /*return [
            [
                'id' => 1,
                'title' => 'Breakfast!',
                'start' => now()
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'start' => now()->addDay(),
                'url' => 'https://some-url.com',
                'shouldOpenInNewTab' => true,
            ]
        ];*/

        return [];
    }

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {

        $user = auth()->user();
        $events = $user->events()->get();

        $results = [];

        foreach ($events as $event){
            $results[] = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->date,
                'end'   => $event->end_at
                //'url' => 'https://some-url.com',
            ];
        }


        return $results;
//        $this->refreshEvents();
        // You can use $fetchInfo to filter events by date.
        //return [];
    }

    public function getEditEventModalCloseButtonLabel(): string
    {
        return $this->editEventForm->isDisabled()
            ? __('filament-support::actions/view.single.modal.actions.close.label')
            : __('filament::resources/pages/edit-record.form.actions.cancel.label');
    }

    public function editEvent(array $data): void
    {
        $updateData = [
            'title' => $data['title'],
            'date' => $data['start'],
            'end_at' => $data['end'],
        ];


        // Edit the event with the provided $data.

        /**
         * here you can access to 2 properties to perform update
         * 1. $this->event_id
         * 2. $this->event
         */

        # $this->event_id
        // the value is retrieved from event's id key
        // eg: Appointment::find($this->event);

        $event = Events::find($this->event_id);
        $event->title = $data['title'];
        $event->date = $data['start'];
        $event->end_at = $data['end'];
        $event->save();
        $this->refreshEvents();

        # $this->event
        // model instance is resolved by user defined resolveEventRecord() funtion. See example below
        // eg: $this->event->update($data);

    }

}

