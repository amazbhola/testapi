<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tender = Tender::all();
            return $this->sendResponse($tender, "Tender List");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tender $tender)
    {
       try {
        $tender = Tender::find($tender->id);

        return $this->sendResponse($tender, "Tender Details");
       } catch (\Throwable $th) {
        //throw $th;
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tender $tender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tender $tender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tender $tender)
    {
        try {
            $tender->delete();
            return $this->sendResponse($tender, "Tender Deleted");
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }
}
