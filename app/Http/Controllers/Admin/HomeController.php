<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Major;
use App\Models\Message;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $usersCount    = User::count();
        $adminsCount   = Admin::count();
        $doctorsCount  = Doctor::count();
        $majorsCount   = Major::count();
        $bookingsCount = Booking::count();
        $citiesCount   = City::count();
        $messagesCount = Message::count();

        $bookings = Booking::skip(0)->take(10)->get();

        return view('admin.home.index',compact(
            'usersCount',
            'adminsCount',
            'doctorsCount',
            'majorsCount',
            'bookingsCount',
            'citiesCount',
            'messagesCount',
            'bookings'
        ));
    }
}
