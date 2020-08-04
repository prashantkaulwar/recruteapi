<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct() {
//        $this->middleware('auth');
    }
    public function showAllCandidate()
    {
        return response()->json(Candidate::all());
    }

    public function showOneCandidate($id)
    {
        return response()->json(Candidate::find($id));
    }

    public function create(Request $request)
    {
        $valid = $this->validate($request, [
            'first_name' => 'required|string|max:40',
            'last_name' => 'string|max:40',
            'email' => 'email|unique:candidate',
            'contact_number' => 'min:11|regex:/[0-9]{9}/',
            'gender' => 'string',
            'specialization' => 'string',
            'work_ex_year' => 'numeric',
            'candidate_dob' => 'numeric',
            'address' => 'alpha_num',
            'resume' => 'file'
        ]);
        if( $request->file('resume')){
            $file = $request->file('resume')->getClientOriginalName();
            $date = strtotime("now");
            $resume_name = $date.$file;
            
            $request->file('resume')->move("resumes/", $resume_name);
        } else {
            $resume_name = '';
        }

        if(strtolower($request->input('gender') == 'male')){
            $gender = 1;
        }else if(strtolower($request->input('gender') == 'female')){
            $gender = 2;
        }else{
            $gender = 0;
        }
        if($resume_name != ''){
            $candidate = Candidate::create([      
                'first_name' => $request->input('first_name'),    
                'last_name' => $request->input('last_name'),    
                'email' => $request->input('email'),    
                'contact_number' => $request->input('contact_number'),    
                'gender' => $gender,    
                'specialization' => $request->input('specialization'),    
                'work_ex_year' => $request->input('work_ex_year'),    
                'candidate_dob' => strtotime($request->input('candidate_dob')),    
                'address' => strip_tags($request->input('address')),    
                'resume'=>$resume_name,
                    ]);

            return response()->json($candidate, 201);
        }
    }

    public function update($id, Request $request)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->update($request->all());

        return response()->json($candidate, 200);
    }

    public function delete($id)
    {
        Candidate::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}