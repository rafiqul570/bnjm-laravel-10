<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Chada;

class HomeController extends Controller
{
    public function index(){
        $role = Auth::user()->role;
        if($role == '1'){
            return view('admin.dashboard');
        }

        $role = Auth::user()->role;
        if($role == '0'){

        $allChada = DB::table('chadas')->join('users', 'chadas.user_id', 'users.id')
        ->where('user_id', '=', Auth::user()->id)
        ->get();


        $group = DB::table('chadas')->select('year')->groupBy('year')->get();


        return view('user.dashboard', compact('allChada', 'group'));

     }

    }

    public function search(Request $request){

        if($request->get('year')) {
            $allChada = DB::table('chadas')->join('users', 'chadas.user_id', 'users.id')
            ->where('user_id', '=', Auth::user()->id)
            ->where('year', 'LIKE', '%' .$request->year. '%')
            ->get();
            }


          $group = DB::table('chadas')->select('year')->groupBy('year')->get();


        return view('bn_chada.search', compact('allChada', 'group'));
    }

}

