<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\StudyMaterial;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Shared\FileManagerController;

class StudyMaterialController extends FileManagerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($classroom_id)
    {
        $studyMaterials = StudyMaterial::where('classroom_id', $classroom_id)
        ->leftJoin('hsm_classrooms', 'hsm_study_materials.classroom_id', '=', 'hsm_classrooms.id')
        ->select('hsm_study_materials.*','hsm_classrooms.name as classroom')->paginate(2);

        return view('interface/study_material/index',compact('studyMaterials','classroom_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($classroom_id)
    {
        return view('interface/study_material/add',compact('classroom_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$classroom_id)
    {
        try{
            $request->validate([
                'name' => 'required',
                'classroom_id' => 'required',
                'file'=>'required'
            ]);

            $classroom = Classroom::find($request["classroom_id"],"name");
           
            $isUploaded =  $this->upload($request,$classroom->name);

            $request['type']= $isUploaded['extension'];
            $request['size']=$isUploaded['size'];
            $request['location']=$isUploaded['location'];
            $request['created_by'] = Auth::user()->id;
    
            StudyMaterial::create($request->all());       
            
            return response()->json(["status"=>"success","message"=>"Study material added successfully."]);
                            
        }catch(Exception $exception){                        
            return response()->json(["status"=>"error","message"=>$exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(StudyMaterial $studyMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(StudyMaterial $studyMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyMaterial $studyMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudyMaterial  $studyMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudyMaterial $studyMaterial)
    {
        //
    }
}