<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use App\Models\Schools;
use Illuminate\Http\Request;

class voterssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(request()->ajax()) {
            return datatables()->of(Voters::select('*'))
            ->addColumn('action', 'admins.voters.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $schools = Schools::all();
        return view('admins.voters.index',compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $voterId = $request->id;

        $voter  =Voters::updateOrCreate(
                    [
                     'id' => $voterId
                    ],
                    [
                    'name' => $request->name, 
                    'regNo' => $request->regNo, 
                    'gender' => $request->gender, 
                    'phone' => $request->phone, 
                    'year_of_study' => $request->year_of_study, 
                    'school_id' => $request->school_id
            
                    ]);    
                        
        return Response()->json($voter);
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
        $voter =Voters::where($where)->first();
      
        return Response()->json($voter);
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
        
        $voter = Voters::where('id',$request->id)->delete();
      
        return Response()->json($voter);
    }
}

