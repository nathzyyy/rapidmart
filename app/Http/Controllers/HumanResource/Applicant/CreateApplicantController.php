<?php

namespace App\Http\Controllers\HumanResource\Applicant;

use App\Models\HumanResource\Position;
use App\Http\Controllers\Controller;
use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Models\HumanResource\Applicant;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CreateApplicantController extends Controller
{
    public function index()
    {
        return View::make('layouts.hr.partials.applicant.create',[
            'positions' => Position::all(),
        ]);
    }


    public function store(CreateApplicantRequest $request)
    {
        $file_name = null;
        if($request->hasFile('resume')){
            $file_name = time().$request->first_name.$request->last_name.'.'.$request->file('resume')->extension();
            $request->file('resume')->storeAs('public/resumes', $file_name);
        }

        Applicant::create([
            'first_name' => Str::title($request->first_name),
            'middle_name' => Str::title($request->middle_name),
            'last_name' => Str::title($request->last_name),
            'gender' => Str::title($request->gender),
            'age' => $request->age,
            'birthday' => Carbon::createFromFormat('m-d-Y', $request->birthday),
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'resume' => $file_name,
            'position_id' => $request->position_id,
            'department_id' => Position::find($request->position_id)->department_id,
            'notes' => $request->notes
        ]);
        return Redirect::route('applicant.index')->with(['created' => 'Successfully added applicant']);
    }
}