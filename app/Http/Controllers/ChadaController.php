<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chada;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChadaController extends Controller
{
    public function index(){

        $allChada = DB::table('chadas')->join('users', 'chadas.user_id', 'users.id')
        ->whereNot('user_id',[1])
        ->get();

        return view('bn_chada.index', compact('allChada'));
    }

    public function create(){
        $allSubscriber = User::first()->get();
        return view('bn_chada.create', compact('allSubscriber'));
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => ['required'],
            'date' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'amount' => ['required'],

        ]);

        Chada::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'amount' => $request->amount,

        ]);

        return back()->with('success', 'Success! data insert Successfully');
    }


    public function edit($id){

        return view('bn_chada.edit');

    }


    // public function update(Request $request){
    //     $id = $request->id;

    //     $request->validate([
    //         'name' => ['required'],
    //         'amount' => ['required'],
    //         'phone' => ['required', 'unique:'.User::class],

    //     ]);

    //     User::FindOrFail($id)->update([
    //         'name' => $request->name,
    //         'amount' => $request->amount,
    //         'phone' => $request->phone,
    //     ]);


    //     return redirect()->route('bn_subscriber.index')->with('success', 'Success! data update Successfully');

    // }


    public function delete($id){
        Chada::FindOrFail($id)->delete();
        return back()->with('success', 'Success! data delete Successfully');
    }




}
