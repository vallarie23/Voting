<?php

namespace App\Http\Controllers;

use App\Models\Schools;
use Illuminate\Http\Request;
use Datatables;

class schoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(request()->ajax()) {
            return datatables()->of(Schools::select('*'))
            ->addColumn('action', 'admins.school.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admins.school.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("admins.school.create");// ////
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schoolId = $request->id;

	    $school   =Schools::updateOrCreate(
	    	        [
	    	         'id' => $schoolId
	    	        ],
	                [
	                'name' => $request->name, 
            
	                ]);    
	                    
	    return Response()->json($school);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $school  =Schools::where($where)->first();
      
        return Response()->json($school);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        $school = Schools::where('id',$request->id)->delete();
      
        return Response()->json($school);
    }
}
