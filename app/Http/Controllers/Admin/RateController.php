<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{


    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        DB::statement("SET SQL_MODE=''"); // solve this error 'vcare_with_laravel.rates.id' isn't in GROUP BY
        $rates = DB::table('rates')
            ->join('doctors', 'doctors.id', '=', 'rates.doctor_id')
            ->join('majors', 'majors.id', '=', 'doctors.major_id')
            ->select('rates.*', 'majors.title AS major_title', 'doctors.name As doctor_name',  DB::raw('SUM(rate) as sum_of_rate'))
            ->orderByDesc('sum_of_rate')
            ->groupBy('doctors.id')
            ->paginate(1);
        return view('admin.rates.ratings_list', compact('rates'));
    }


}
