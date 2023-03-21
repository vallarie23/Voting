<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use App\Models\Voters;
use App\Models\Positions;
use Datatables;


use Illuminate\Http\Request;

class candidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(request()->ajax()) {
            return datatables()->of(Candidates::select('*'))
            ->addColumn('action', 'admins.candidate.action')
            ->addColumn('voter', function($row){
                return $row->voter->name;
            })
            ->addColumn('position', function($row){
                return $row->position->name;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $voters = Voters::all();
        $positions = Positions::all();
        return view('admins.candidate.index',compact('voters','positions'));
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
        $candidateId = $request->id;

        $candidate   =Candidates::updateOrCreate(
                    [
                     'id' => $candidateId
                    ],
                    [
                    'name' => $request->name, 
                    'position_id' => $request->position_id,
                    'voter_id' => $request->voter_id
            
                    ]);    
                        
        return Response()->json($candidate);
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
        $candidate  =Candidates::where($where)->first();
      
        return Response()->json($candidate);
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
        
        $candidate = Candidates::where('id',$request->id)->delete();
      
        return Response()->json($candidate);
    }
}
