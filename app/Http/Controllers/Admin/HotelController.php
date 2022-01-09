<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use Hash;

class HotelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', [
            // the view can see the hotels (the green one)
            'hotels' => $hotels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the festival will be stored in the DB
        $request->validate([
            //    'image_name' => 'mimes:jpeg,bmp,png',
                'name' => 'required',
                'address' =>'required|max:500',
                'hotel_image' => 'file|image'
            ]);
    
            $hotel_image = $request->file('hotel_image');
            $filename = $hotel_image->hashName();
    
            $path = $hotel_image->storeAs('public/images', $filename);
    
            // if validation passes create the new book
            $hotel = new Hotel();
            $hotel->name = $request->input('name');
            $hotel->address = $request->input('address');
            $hotel->star_rating = $request->input('star_rating');
            $hotel->phone_number = $request->input('phone_number');
            $hotel->image_location = $filename;
            $hotel->save();
    
    
    
            return redirect()->route('admin.hotels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('admin.hotels.show', [
            'hotel' => $hotel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the hotel by ID from the Database
        $hotel = Hotel::findOrFail($id);

        // Load the edit view and pass the hotel to
        // that view
        return view('admin.hotels.edit', [
            'hotel' => $hotel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // first get the existing festival that the user is update
        $hotel = Hotel::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'address' =>'required|max:500'
        ]);

        // if validation passes then update existing festival
        $hotel->name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->star_rating = $request->input('star_rating');
        $hotel->phone_number = $request->input('phone_number');
        $hotel->save();

        return redirect()->route('admin.hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect()->route('admin.hotels.index');
    }
}
