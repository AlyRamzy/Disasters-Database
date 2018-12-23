<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisibilityController extends Controller
{
    public function Toggle()
    {
      $eco_loss = request('eco_loss');
      $year = request('year');
      $month = request('month');
      $day = request('day');
      $description = request('description');
      $location = request('location');

      $vis_arr = array("eco_loss"=>$eco_loss, "year"=>$year, "month"=>$month, "day"=>$day, "description"=>$description, "location"=>$location);

      setcookie('visibility', $vis_arr, time() + (86400 * 30), "/");
    }
}
