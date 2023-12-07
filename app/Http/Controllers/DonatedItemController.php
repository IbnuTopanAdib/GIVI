<?php

namespace App\Http\Controllers;

use App\Models\DonatedItem;
use App\Models\Category;
use App\Models\User;
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

        return view('donations.index', compact('donatedItems', 'categories',));
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
            'category_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image');
            $ext = $validatedData['image']->getClientOriginalExtension();
            $filename = "item-" . time() . "." . $ext;
            request()->image->move(public_path('storage/'), $filename);
            $validatedData['image'] = $filename;
        }

        $userId = auth()->user()->id;
        $validatedData['user_id'] = $userId;
        DonatedItem::create($validatedData);
        return redirect('donation')->with('success', 'Donasi berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */

    public function showItem($donatedItemId)
    {
        $donatedItem = DonatedItem::find($donatedItemId);
        return view('items.item', compact( 'donatedItem'));
    }
    public function showAllItems(DonatedItem $donatedItem)
    {

        if (request('category')) {
            $category = Category::firstWhere('category_name', request('category'));
            $title = ' in ' . $category->nama;
        }
        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = ' by ' . $user->name;
        }

        $donatedItems = DonatedItem::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString();
        return view('items.items', compact('donatedItems'));
    }


    public function showAllCategory()
    {
        $categories = Category::all();
        return view('items.category', compact('categories'));
    }

    public function showBasedOnCategory($category_id)
    {
        $donatedItems = DonatedItem::where('category_id', $category_id)->latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString();
        return view('items.items', compact('donatedItems'));
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
