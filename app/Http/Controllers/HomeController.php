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

        
        $allChada = Chada::first()
        ->join('users', 'chadas.user_id', 'users.id')
        ->where('user_id', '=', Auth::user()->id)
        ->get();


        return view('user.dashboard', compact('allChada'));

     }

    }


}

