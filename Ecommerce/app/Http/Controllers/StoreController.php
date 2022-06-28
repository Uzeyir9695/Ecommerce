<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::where('user_id', auth()->id())->paginate(21);
        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
       $data = $request->validated();
       $store = Store::create(array_merge(['user_id' => auth()->id()], $data));

        if($request->hasFile('logoImage') && $request->file('logoImage')->isValid()){
            $store->addMediaFromRequest('logoImage')->toMediaCollection('logos');
        }
        if($request->hasFile('coverImage') && $request->file('coverImage')->isValid()){
            $store->addMediaFromRequest('coverImage')->toMediaCollection('covers');
        }
        return response()->json(['message' => 'Store created successfuly']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $products = $store->products()->paginate(12);
        return view('store.show', compact('store', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        $validator = $request->validated();

        $store->update($validator);

        if($request->hasFile('logoImage') && $request->file('logoImage')->isValid()){
            $store->clearMediaCollection('logos');
            $store->addMediaFromRequest('logoImage')->toMediaCollection('logos');
        }
        if($request->hasFile('coverImage') && $request->file('coverImage')->isValid()){
            $store->clearMediaCollection('covers');
            $store->addMediaFromRequest('coverImage')->toMediaCollection('covers');
        }
        return response()->json(['message' => 'Store updated successfuly']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {

        if(request('word') == 'Delete'){
            $store->delete();
            return redirect()->route('stores.index')->with('success','Store named '.$store->name.' deleted successfully.');
        }
        return redirect()->back();
    }
}
