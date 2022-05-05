<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {

        //récuper l'id du district
        $ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    } // end method


    public function StateGetAjax($district_id)
    {

        //récuperer l'id du state
        $ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    } // end method

}