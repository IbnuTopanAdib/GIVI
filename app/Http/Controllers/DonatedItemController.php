<?php

namespace App\Http\Controllers;

use App\Models\DonatedItem;
use App\Models\Category;
use App\Http\Requests\StoreDonatedItemRequest;
use App\Http\Requests\UpdateDonatedItemRequest;
use Illuminate\Support\Str;


class DonatedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donatedItems = DonatedItem::all();
        $categories = Category::all();
        
        return view('donations.index', compact('donatedItems', 'categories', ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($selectedCategoryId = null)
    {
        $categories = Category::all();
        return view('donations.create', compact('selectedCategoryId', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDonatedItemRequest $request,)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $validatedData['image'] = $request->file('image');
            $ext = $validatedData['image']->getClientOriginalExtension();
            $filename= "item-" . time() . "." .$ext;
            request()->image->move(public_path('storage/'), $filename);
            $validatedData['image'] = $filename;

        }

        $userId = auth()->user()->id;
        $validatedData['user_id'] = $userId;
        // Check if a file has been uploaded
        DonatedItem::create($validatedData);
        return redirect('donation')->with('success', 'Donasi berhasil dibuat');

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
