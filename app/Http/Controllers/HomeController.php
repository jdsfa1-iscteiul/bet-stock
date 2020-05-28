<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\StockRegister;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $stock_registers = DB::select("
            select
                sr.id, sr.stock_id, sr.open, sr.high, sr.low,
                sr.current, sr.previous_close, s.logo_url, s.stock_code 
            from 
                stock_registers sr, stocks s
            where
                sr.stock_id = s.id AND  
                DAY(sr.created_at) = DAY(NOW()) AND
                NOT EXISTS (SELECT *
                    FROM  bets b
                    WHERE  sr.id = b.stock_register_id AND
                    b.user_id_fn = ".$userId.")" 
        );

        $open_bets = DB::select("
            select
                sr.id, sr.stock_id, sr.open, sr.high, sr.low,
                sr.current, sr.previous_close, s.logo_url, s.stock_code, b.bet_value 
            from 
                stock_registers sr, stocks s, bets b
            where
                sr.stock_id = s.id AND  
                DAY(sr.created_at) = DAY(NOW()) AND
                b.stock_register_id = sr.id AND
                b.closed = false AND
                b.user_id_fn = ".$userId
        );

        return view('home', ['stock_registers' => $stock_registers, 
                            'open_bets'=> $open_bets]);
    }
}
