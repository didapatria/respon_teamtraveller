<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.brands.index', [
            'title' => 'All Brands',
            'brands' => Brand::paginate(6)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.brands.create', [
            'title' => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:brands',
            'image' => 'image|file|max:4096'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('brand-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Brand::create($validateData);

        return redirect('/dashboard/brands')->with('success', 'New brand has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.brands.edit', [
            'title' => 'Edit',
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $rules = [
            'name' => 'required|max:255',
            'slug' => 'required|unique:brands',
            'image' => 'image|file|max:4096'
        ];

        if ($request->slug != $brand->slug) {
            $rules['slug'] = 'required|unique:brands';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('brand-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Brand::where('id', $brand->id)
            ->update($validateData);

        return redirect('/dashboard/brands')->with('success', 'Brand has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->image) {
            Storage::delete($brand->image);
        }
        Brand::destroy($brand->id);
        return redirect('/dashboard/brands')->with('success', 'Brand has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Brand::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
