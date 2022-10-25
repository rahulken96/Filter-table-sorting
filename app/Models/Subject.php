<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class Subject extends Model
{
    use HasFactory, LogsActivity, CausesActivity;

    protected $guarded = ['id'];
    protected $table = 'subjects';

    protected static $logUnguarded = true;
    protected static $logName = 'Score';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Data dari model ini telah di {$eventName} !";
    }
}
