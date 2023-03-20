<?php

namespace App\Http\Controllers;

use App\Models\SchoolAdmin;
use Illuminate\Http\Request;
use Datatables;


class schoolAdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(SchoolAdmin::select('*'))
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
        
        return view("admins.schoolAdmins.create");// ////
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schooladminsId = $request->id;

	    $schooladmin   =SchoolAdmin::updateOrCreate(
	    	        [
	    	         'id' => $schooladminsId
	    	        ],
	                [
	                'name' => $request->name, 
            
	                ]);    
	                    
	    return Response()->json($schooladmin);
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
        $schooladmin  =SchoolAdmin::where($where)->first();
      
        return Response()->json($schooladmin);
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
        $schooladmin = SchoolAdmin::where('id',$request->id)->delete();
      
        return Response()->json($schooladmin);
    }
}