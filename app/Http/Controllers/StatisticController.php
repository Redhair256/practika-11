<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Jenssegers\Agent\Agent;
use DB;
use Log;
use App\Link;
use App\Click;
use App\Visitor_id;
use Carbon\Carbon;

class StatisticController extends Controller
{
    protected $stringsPerPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
//      !!! При использовании groupBy обязательно установить
//      'strict' => false, в настройках mysql (database.php)
//
        $numLinks = Link::all()->count();
        $numClicks = Click::all()->count();
        if ($numLinks != null){
            $averClicks = $numClicks/$numLinks;
        }else{
            $averClicks = '0';
        }

        $uniqClicks = Click::groupBy('visitor_id', 'link_id')->select('id')->get();
        $numUniqClicks = $uniqClicks->count();
        $today = Carbon::now();
        $startOfDay = $today->copy()->startOfDay();
        $endOfDay = $today->copy()->endOfDay();
        $tdClicks = Click::whereBetween('created_at', array($startOfDay, $endOfDay))->count();
        $tdLinks = Link::whereBetween('created_at', array($startOfDay, $endOfDay))->count();
        $tdUniqClicks = Click::whereBetween('created_at', array($startOfDay, $endOfDay))->groupBy('visitor_id', 'link_id')->select('id')->get();
        $tdNumUniqClicks = $tdUniqClicks->count();
        if($numLinks != null){
            $tdAverClicks = $tdClicks/$numLinks;
        }else{
            $tdAverClicks = '0';
        }

        return view('links.index', [ 'numLinks' => $numLinks, 
                                     'numClicks' => $numClicks,
                                     'averClicks' => $averClicks, 
                                     'numUniqClicks' => $numUniqClicks, 
                                     'tdClicks' => $tdClicks, 
                                     'tdLinks' => $tdLinks, 
                                     'tdNumUniqClicks' => $tdNumUniqClicks, 
                                     'tdAverClicks' => $tdAverClicks
                                     ]);
    }

    public function viewStat($id = '123')
    {
        //
        $curent_link = Link::where('token', $id)->first();
        $links = Link::orderBy('created_at', 'desc')->get();
        if ($curent_link == null) {
            $id = '';
            return view('links.statistics',[ 'links' => $links, 'curent_link' => $curent_link]);
        }

        $clicks = Click::where('link_id', $curent_link->id)->orderBy('created_at', 'desc')->paginate($this->stringsPerPage);
        $num_click = Click::where('link_id', $curent_link->id)->orderBy('created_at', 'desc')->get()->count();
        return view('links.statistics',[ 'links' => $links, 'clicks' => $clicks, 'curent_link' => $curent_link, 'num_click' => $num_click ]);   
    }
}
