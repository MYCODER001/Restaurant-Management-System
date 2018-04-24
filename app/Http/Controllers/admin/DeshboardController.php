<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Contact;
use App\Item;
use App\Reservation;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeshboardController extends Controller
{

    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Item::count();
        $sliderCount = Slider::count();
        $reservations = Reservation::where('status',false)->get();
        $contactCount = Contact::count();
        return view('/admin/deshboard',compact('categoryCount','itemCount','sliderCount','reservations','contactCount'));
    }


}
