<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use Illuminate\Http\Request;

class positionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
            if(request()->ajax()) {
                return datatables()->of(Positions::select('*'))
                ->addColumn('action', 'admins.positions.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
            }
            return view('admins.positions.index');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $positionsId = $request->id;

	    $positions   =Positions::updateOrCreate(
	    	        [
	    	         'id' => $positionsId
	    	        ],
	                [
	                'name' => $request->name, 
            
	                ]);    
	                    
	    return Response()->json($positions);
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
        $positions  =Positions::where($where)->first();
      
        return Response()->json($positions);
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
        
        $positions = Positions::where('id',$request->id)->delete();
      
        return Response()->json($positions);
    }
}
