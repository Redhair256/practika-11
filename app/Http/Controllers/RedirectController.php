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

class RedirectController extends Controller
{
    protected $stringsPerPage = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function redirect(Request $request, $link_token)
    {
        $curent_ip = $request ->ip();
        $agent = new Agent();
        $agent->setUserAgent($request->header('User-Agent')); 
        $curent_link = Link::where('token', $link_token)->first();
        if($agent->isRobot()){
            return redirect($curent_link->target_url);
        }

        $visitor_token = Cookie::get('uid');

        if($visitor_token != null){
            $visitor = Visitor::where('token', $visitor_token)->first();
        }else{
            $visitor = null;
        }
        if($visitor == null){

            $visitor_token = str_random(20);
            $visitor= new Visitor;
            $visitor ->token = $visitor_token;
            $visitor ->browser = $agent->browser();
            $visitor ->os = $agent->platform();;
            $visitor ->link_id = $curent_link ->id;
            $visitor ->save();
        }
        $curent_click = new Click;
        $curent_click ->link_id = $curent_link ->id;
        $curent_click ->link_url = $curent_link ->target_url;
        $curent_click ->visitor_id = $visitor ->id;
        if ($curent_ip == '::1'){
            $curent_click ->ip = '127.0.0.1';
        }else{
            $curent_click ->ip = $curent_ip;
        }
        $curent_click ->visitor_token = $visitor ->token;
        $curent_click ->visitor_ua = $request->header('User-Agent');
        $curent_click ->save();
        return redirect($curent_link->target_url)->withCookie(cookie('uid', $visitor_token));
    }
}
