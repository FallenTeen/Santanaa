<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public $showCreateForm = false;

    public function showCreateForm()
    {
        $this->showCreateForm = true;
    }
    public function viewHotel(){
        return view('admin.hotel.viewHotels');
    }
}
