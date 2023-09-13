<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $doctor_id)
    {

        Rate::create(['rate' => $request->star_rating_value, 'doctor_id' => $doctor_id]);
        return redirect()->route('front.doctors.show', $doctor_id)->with('success_rate' , 'you rate has been sent');

    }

}
