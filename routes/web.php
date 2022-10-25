<?php

use App\Http\Controllers\ScoreController;
use App\Models\Score;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request as ClientRequest;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', function () {
    $subjects = Subject::all();
    $scores = Score::all();
    return view('welcome',compact('scores','subjects'));
});

Route::resource('score', ScoreController::class);
