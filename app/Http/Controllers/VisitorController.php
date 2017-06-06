<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Jenssegers\Agent\Agent;
use DB;
use Log;
use App\Link;
use App\Click;
use App\Visitor;
use Carbon\Carbon;

class VisitorController extends Controller
{
    protected $stringsPerPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()   //Защита авторизацией.
    {
        $this->middleware('auth');
    }

    public function viewUsers($id = '0')
    {
        //
        $visitors = Visitor::orderBy('created_at', 'desc')->paginate($this->stringsPerPage);
    
        return view('visitors.index',[ 'visitors' => $visitors, 'visitor_id' => $id ] );
    }

    public function viewUserStat($id = '0')
    {
        //
        if ($id != '0'){
            $curent_visitor = Visitor::where('token', $id)->first();
            $clicks = Click::where('visitor_id', $curent_visitor->id)->orderBy('created_at', 'desc')
            ->paginate($this->stringsPerPage);
            $num_link = Click::where('visitor_id', $curent_visitor->id)->count();
        }else{
            $curent_visitor = null;
            $clicks = null;
            $num_link = 0;
        }
        $visitors = Visitor::orderBy('created_at', 'desc')->get(['id', 'token']);
        return view('visitors.statistic', [ 'visitors' => $visitors, 'curent_visitor' => $curent_visitor, 'clicks' => $clicks, 'num_link' => $num_link ] );
    }

}
