<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use OwenIt\Auditing\Contracts\Auditable;

class Lead extends Model implements Auditable
{
    use Actionable;
    use \OwenIt\Auditing\Auditable;


    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
