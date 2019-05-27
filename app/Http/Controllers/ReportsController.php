<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Activity;

class ReportsController extends BaseController
{
    
    public function getReportSales($app_id, $option = null)
    {

       $contacts = DB::table('contacts');
       
       /*
            if ($from && $to) {
                $contacts = $contacts->where('contacts.created_at', '>', \Carbon\Carbon::createFromFormat($format, $from));
                $contacts = $contacts->where('contacts.created_at', '<=', \Carbon\Carbon::createFromFormat($format, $to));
            }
        */

       $contacts = $contacts->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as contacts'))
          ->where('contacts.created_at', '>=', \Carbon\Carbon::createFromFormat('Y/m/d', '2018/04/25'))
          ->where('contacts.app_id', $app_id)
          ->groupBy('date')
          ->get();

        
        
        $json = null;
        foreach ($contacts as $contact) {
                $json['date'][] = $contact->date;
                $json['Contacts'][] = $contact->contacts;
                $json['sales'][] = ($contact->contacts*20)/100;
                 
        }
        return $json;
    }

    public function getReportSalesTotal($app_id, $option = null)
    {
      

       $contacts = DB::table('contacts')
          ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as contacts'))
          ->where('contacts.created_at', '>=', \Carbon\Carbon::createFromFormat('Y/m/d', '2018/04/01'))
          ->where('contacts.app_id', $app_id)
          ->groupBy('date')
          ->get();
 
        $json['contacts'] = count($contacts);
        $json['sales'] = (count($contacts)*20)/100;
        
        return $json;
    }

    
    
}
