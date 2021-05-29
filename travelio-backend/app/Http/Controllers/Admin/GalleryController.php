<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\TravelPackage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['travel_package'])->get();

        return view('pages.admin.gallery.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Digunakan untuk upload gallery/taruh dimana gambarnya
        $travel_packages = TravelPackage::all();
        return view('pages.admin.gallery.create', compact('travel_packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();

        // upload gambar
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        // Save data
        $gallery = Gallery::create($data);

        if ($gallery) {
            //  buat flash message 
            session()->flash('createSuccess', 'Data Travel Gallery Added Successfully');

            // Jika berhasil kita redirect / teruskan kehalaman travel-packege.index 
            return redirect()->route('gallery.index');
        } else {
            session()->flash('createFailed', 'Data Travel Gallery Failed to Add');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        $travel_packages = TravelPackage::all();

        return view('pages.admin.gallery.edit', compact('item', 'travel_packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();

        // update image
        $data['image'] = $request->file('image')->store('assets/gallery', 'public');

        $item = Gallery::findOrFail($id)->update($data);

        if ($item) {
            //  buat flash message 
            session()->flash('editSuccess', 'Data Travel Gallery Update Successfully');

            // Jika berhasil kita redirect / teruskan kehalaman travel-packege.index 
            return redirect()->route('gallery.index');
        } else {
            session()->flash('editFailed', 'Data Travel Gallery Failed to Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();

        if ($item) {
            //  buat flash message 
            session()->flash('deleteSuccess', 'Data Travel Gallery Delete Successfully');

            // Jika berhasil kita redirect / teruskan kehalaman travel-packege.index 
            return redirect()->route('gallery.index');
        } else {
            session()->flash('deleteFailed', 'Data Travel Gallery Failed to Delete');
        }
    }
}
