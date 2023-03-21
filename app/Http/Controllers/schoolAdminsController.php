<?php

namespace App\Http\Controllers;

use App\Models\SchoolAdmin;
use App\Models\Schools;
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
            ->addColumn('action', 'admins.schoolAdmins.action')
            ->addColumn('school', function($row){
                return $row->school->name;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $schools = Schools::all();
        return view('admins.schoolAdmins.index',compact('schools'));
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
        $schooladminId = $request->id;

        $schooladmin   =SchoolAdmin::updateOrCreate(
                    [
                     'id' => $schooladminId
                    ],
                    [
                    'name' => $request->name, 
                    'school_id' => $request->school_id
            
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
