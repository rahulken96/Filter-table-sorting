<?php

use App\Models\Student;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


function getSubject($id){
    $result = Subject::where([
        'id' => $id
    ])->get();

    return $result[0]->name;
}

function getStudent($id)
{
    $result = Student::where([
        'id' => $id
    ])->get();

    return $result[0]->name;
}
