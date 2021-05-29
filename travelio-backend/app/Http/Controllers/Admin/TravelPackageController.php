<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;
use App\TravelPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackage::all();

        return view('pages.admin.travel-package.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $data = $request->all();

        // buat slug dari title
        $data['slug'] = Str::slug($request->title);

        // buat data Travel Package
        if (TravelPackage::create($data)) {
            //  buat flash message 
            session()->flash('createSuccess', 'Data Travel Added Successfully');

            // Jika berhasil kita redirect / teruskan kehalaman travel-packege.index 
            return redirect()->route('travel-package.index');
        } else {
            session()->flash('createFailed', 'Data Travel Failed to Add');
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
        // cara data berdasarkan id
        $item = TravelPackage::findOrFail($id);

        return view('pages.admin.travel-package.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {
        $data = $request->all();

        // buat slug dari title
        $data['slug'] = Str::slug($request->title);

        $item = TravelPackage::findOrFail($id)->update($data);

        // buat data Travel Package
        if ($item) {
            //  buat flash message 
            session()->flash('editSuccess', 'Data Travel Update Successfully');

            // Jika berhasil kita redirect / teruskan kehalaman travel-packege.index 
            return redirect()->route('travel-package.index');
        } else {
            session()->flash('editFailed', 'Data Travel Failed to Update');
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
        $item = TravelPackage::findOrFail($id);
        $item->delete();
        if ($item) {
            //  buat flash message 
            session()->flash('deleteSuccess', 'Data Travel Delete Successfully');

            // Jika berhasil kita redirect / teruskan kehalaman travel-packege.index 
            return redirect()->route('travel-package.index');
        } else {
            session()->flash('deleteFailed', 'Data Travel Failed to Delete');
        }
    }
}
