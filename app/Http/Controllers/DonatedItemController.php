<?php

namespace App\Http\Controllers;

use App\Models\DonatedItem;
use App\Http\Requests\StoreDonatedItemRequest;
use App\Http\Requests\UpdateDonatedItemRequest;

class DonatedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDonatedItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonatedItem $donatedItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonatedItem $donatedItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonatedItemRequest $request, DonatedItem $donatedItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonatedItem $donatedItem)
    {
        //
    }
}
