<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Requisition;
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requisition = new Requisition();
        $requisition_no = Requisition::count() + 1;
        $requisition->requisition_no = $requisition_no;
        $requisition->requisition_title = $request->requisition_title;
        $requisition->description = $request->has('description') ? $request['description'] : null;
        $requisition->project_id = $request->project_id;
        $requisition->author_id = auth::user()->id;
        $requisition->save();
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
