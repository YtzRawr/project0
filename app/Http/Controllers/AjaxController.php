<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\State;
use App\Models\Country;




class AjaxController extends Controller
{

    public function state($country_id){
        $country = Country::find($country_id);
        // obtener los estados del pais
        return $country->states->toJson();
    }

    public function city($state_id){
        $state = State::find($state_id);
        // obtener los estados de las ciudades
        return $state->cities->toJson();
    }

}
