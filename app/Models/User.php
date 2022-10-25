<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity,CausesActivity;

    protected $fillable = ['name','email'];

    protected static $logUnguarded = true;
    protected static $logName = 'Score';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Data dari model ini telah di {$eventName} !";
    }

    // protected static $logAttributes = ['*'];

    // \Auth::user()->actions;

}
