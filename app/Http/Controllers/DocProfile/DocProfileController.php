<?php

namespace App\Http\Controllers\DocProfile;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocProfileController extends Controller
{
    public function index(){
        //$bookings = Booking::paginate(2);
        $bookings = DB::table('bookings')
            ->join('doctors', 'doctors.id', '=', 'bookings.doctor_id')
            ->join('majors', 'majors.id', '=', 'doctors.major_id')
            ->select('bookings.*', 'majors.title AS major_title', 'doctors.img AS doctor_img', 'doctors.id As doctor_id')
            ->get();
        return view('clinic.doctorProfile.index', ['bookings' => $bookings]);
    }
}
