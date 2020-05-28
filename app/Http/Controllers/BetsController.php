<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bet;
use Auth;

class BetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Bet::get();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        print_r($request->input());
        $task = new Bet;
        $task->stock_register_id = $request->input('stock_register_id');
        $task->user_id_fn = Auth::user()->id;
        $task->bet_value = $request->input('bet_value');
        $task->closed = false;
        $task->won = false;
        $task->created_at = date("Y-m-d H:i:s");
        $task->updated_at = date("Y-m-d H:i:s");
        $task->save();
       
        return redirect('home');
    }

    public function destroy($id)
    {
        Bet::findOrFail($id)->delete();
        return redirect('/');
    }
}
