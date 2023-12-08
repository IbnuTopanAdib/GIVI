<?php

namespace App\Http\Controllers;

use App\Models\DonatedItem;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\StoreDonatedItemRequest;
use App\Http\Requests\UpdateDonatedItemRequest;
use Illuminate\Support\Facades\Auth;
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
        return view('items.item', compact('donatedItem'));
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

        $user = Auth::user();
        $favoriteItems = DonatedItem::whereIn('id', $user->favoriteItems);

        $donatedItems = DonatedItem::latest()->filter(request(['search', 'category', 'user']))->paginate(10)->withQueryString();
        return view('items.items', compact('donatedItems','favoriteItems'));
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

    public function addFavorite($donatedItemId)
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();

        $favorite = array_unique(array_merge($user->favoriteItems ?? [], [$donatedItemId]));

        $user->update(['favoriteItems' => $favorite]);

        return redirect()->back();
    }

    public function deleteFavorite($donatedItemId)
    {
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->favoriteItems = array_values(array_diff($user->favoriteItems ?? [], [$donatedItemId]));
        $user->update(['favoriteItems' => $user->favoriteItems]);


        return redirect()->back();
    }

    public function showFavorite()
    {
        $user = Auth::user();
        $favoriteItems = DonatedItem::whereIn('id', $user->favoriteItems)->paginate(10);

        // If you need to convert it to a collection, you can do this

        return view('items.favoriteItem', compact('favoriteItems'));
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
