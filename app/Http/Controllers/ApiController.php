<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Get a list of all the countries.
     *
     * @return array
     */
    public function getCountries()
    {
        return DB::table('countries')->lists('name_pt');
    }
}
