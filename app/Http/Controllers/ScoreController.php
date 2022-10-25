<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Http\Requests\StoreScoreRequest;
use App\Http\Requests\UpdateScoreRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            $subjects = Subject::all(),
            $scores = Score::all(),
            $acts = Activity::all(),
        ];

        foreach ($acts as $key => $act) {
            $data = [];
            $data['logName'] = $act->log_name;
            $data['desc'] = $act->description;
            // $data['proper'] = $act->properties;
            // $data['old'] = isset($data['proper']['old']) ? $data['proper']['old'] : '[]';
            // $data['new'] = isset($data['proper']['attributes']) ? $data['proper']['attributes'] : '[]';
            $data['old'] = isset($act->properties['old']) ? $act->properties['old'] : '[]';
            $data['new'] = isset($act->properties['attributes']) ? $act->properties['attributes'] : '[]';
            $dt[$key] = $data;
        }
        return view('welcome',[$data, $dt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $scores = Score::all();
        return view('add',compact('scores','subjects','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreScoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'student' => 'required|numeric',
            'subject' => 'required|numeric',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        Score::insert([
            'student_id' => $request->student,
            'subject_id'=> $request->subject,
            'score' => $request->score,
        ]);


        Activity::saving(function (Activity $activity) {
            $activity->properties->put('ip_address', Request::ip());
        });
        return Activity::get()->last();
        return redirect(route('score.index'))->with('success','Data added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scores = Score::where('id',$id)->get();
        return view('show',compact('scores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scores = Score::where('id',$id)->get();
        return view('update',compact('scores')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateScoreRequest  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student' => 'required',
            'subject' => 'required',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        Score::find($id)->update([
            'score' => $request->score,
        ]);

        return redirect(route('score.index'))->with('success','Data changed successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Score::destroy($id);
        return redirect(route('score.index'))->with([
            'success' => 'Data deleted successfully !'
        ]);
    }
}
