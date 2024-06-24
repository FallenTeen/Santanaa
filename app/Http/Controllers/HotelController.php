<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function viewHotel(){
        return view('admin.hotel.viewHotels');
    }
}
