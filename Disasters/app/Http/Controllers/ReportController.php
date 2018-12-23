<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reports\IncidentReport;
use App\Reports\RecentReport;
use App\Reports\OverallReport;
use App\Reports\UserReport;

class ReportController extends Controller
{
  public function viewUserReport()
  {
    $user_rep = new UserReport;
    $user_rep->run()->render();
  }

  public function viewIncidentReport()
  {
    $incident_rep = new IncidentReport;
    $incident_rep->run()->render();
  }

  public function viewOverallReport()
  {
    $overall_rep = new OverallReport;
    $overall_rep->run()->render();
  }

  public function viewRecentEventReport()
  {
    $recent_rep = new RecentReport;
    $recent_rep->run()->render();
  }

}
