<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
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
            ->addColumn('action', 'company-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
       
        return view("admins.candidate.index");// //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("admins.candidate.create");////
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
	    $candidate  =Candidates::updateOrCreate(
            [
             'id' => $candidateid
            ],
            [
            'name' => $request->name, 
    
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
        
        $candidate =Candidates::where('id',$request->id)->delete();
      
        return Response()->json($candidate);
    }
}
