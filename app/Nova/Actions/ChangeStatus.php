<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;

class ChangeStatus extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->status_id = $fields->id;
            $model->save();
        }
        return Action::message('Selected status was changed!');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        $statuses = \App\Status::all()->pluck('name','id');
        return [
            Select::make('Status','id')->options($statuses)
        ];
    }
}
