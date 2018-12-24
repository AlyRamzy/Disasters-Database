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

      setcookie('eco_loss', $eco_loss, time() + (86400 * 30), "/");
      setcookie('year', $year, time() + (86400 * 30), "/");
      setcookie('month', $month, time() + (86400 * 30), "/");
      setcookie('day', $day, time() + (86400 * 30), "/");
      setcookie('description', $description, time() + (86400 * 30), "/");
      setcookie('location', $location, time() + (86400 * 30), "/");

      return view('/Visibility');
    }
}
