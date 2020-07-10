<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevel;
use Illuminate\Support\Facades\Auth;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationLevels = EducationLevel::latest()->paginate(2);  
        return view('interface/education_level/index',["educationLevels"=>$educationLevels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interface/education_level/add');
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
                'slug' => 'required','unique:hsm_education_levels'
            ]);
            $request['created_by'] = Auth::user()->id;
    
            EducationLevel::create($request->all());
       
            return redirect()->route('education_level.index')
                            ->with('success','Education level created successfully.');
                            
        }catch(Exception $exception){
            return response()->json($exception->getMessage());
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function show(EducationLevel $educationLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationLevel $educationLevel)
    {
        return view('interface/education_level/edit',compact('educationLevel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationLevel $educationLevel)
    {
        try{
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                ]); 
               
                $request['updated_by'] = Auth::user()->id;
                $educationLevel->update($request->all());
          
                return redirect()->route('education_level.index')
                                ->with('success','Education level updated successfully');

        }catch(Exception $exception){
            return response()->json($exception->getMessage());
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationLevel  $educationLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationLevel $educationLevel)
    {
        $educationLevel->delete();
  
        return redirect()->route('education_level.index')
                        ->with('success','Education level deleted successfully');
    }
}