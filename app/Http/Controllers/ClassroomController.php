<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $payload = DB::table('hsm_classrooms')
        ->join('hsm_education_levels', 'hsm_education_levels.id', '=', 'hsm_classrooms.education_level_id')
        ->join('hsm_subjects', 'hsm_subjects.id', '=', 'hsm_classrooms.subject_id')
        ->join('hsm_users', 'hsm_users.id', '=', 'hsm_classrooms.assigned_teacher_id')
        ->select('hsm_classrooms.*', 'hsm_education_levels.name as educationLevel', 'hsm_subjects.name as subject', 'hsm_users.name as teacher')
        ->paginate(2);

        $classrooms = Classroom::latest()->paginate(2);  
        return view('interface/classroom/index',["classrooms"=>$payload]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        return view('interface/classroom/view'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationLevels = EducationLevel::all();
        $subjects = Subject::all();
        $users = User::all();
        return view('interface/classroom/add',compact('educationLevels','subjects','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'slug' => 'required','unique:hsm_classrooms',
                'education_level_id'=>'required', 
                'subject_id'=>'required', 
                'assigned_teacher_id'=>'required'
            ]);
            $request['created_by'] = Auth::user()->id;
    
            Classroom::create($request->all());
       
            return redirect()->route('classroom.index')
                            ->with('success','Classroom created successfully.');
                            
        }catch(Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view('interface/classroom/show',compact('classroom')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $educationLevels = EducationLevel::all();
        $subjects = Subject::all();
        $users = User::all();
        return view('interface/classroom/edit',compact('educationLevels','classroom','subjects','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        try{
            $request->validate([
                'name' => 'required',
                'slug' => 'required','unique:hsm_classrooms',
                'education_level_id'=>'required', 
                'subject_id'=>'required', 
                'assigned_teacher_id'=>'required'
            ]);
            $request['updated_by'] = Auth::user()->id;
            $classroom->update($request->all());
        
            return redirect()->route('classroom.index')
                            ->with('success','Classroom updated successfully');

        }catch(Exception $exception){
            return response()->json($exception->getMessage());
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
  
        return redirect()->route('classroom.index')
                        ->with('success','Classroom deleted successfully');
    }
}
