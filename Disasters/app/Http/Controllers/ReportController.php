<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reports\Incident;
use App\Reports\Recent;
use App\Reports\Overall;
use App\Reports\User;

class ReportController extends Controller
{
  public function viewUserReport()
  {
    $user_rep = new User;
    $user_rep->run()->render();
  }

  public function viewIncidentReport()
  {
    $incident_rep = new Incident;
    $incident_rep->run()->render();
  }

  public function viewOverallReport()
  {
    $overall_rep = new Overall;
    $overall_rep->run()->render();
  }

  public function viewRecentEventReport()
  {
    $recent_rep = new Recent;
    $recent_rep->run()->render();
  }

}
