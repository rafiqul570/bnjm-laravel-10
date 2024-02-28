<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CashController extends Controller
{
    public function index(){

        $allCash = DB::table('cashes')->get();

        return view('bn_cash.index', compact('allCash'));
    }

    public function create(){
       
        return view('bn_cash.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'date' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'description' => ['required'],
            'income' => ['required'],
            'expense' => ['required'],

        ]);

        Cash::create([
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'description' => $request->description,
            'income' => $request->income,
            'expense' => $request->expense,

        ]);

        return back()->with('success', 'Success! data insert Successfully');
    }


    // public function edit($id){

    //     return view('bn_chada.edit');

    // }


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
    
    public function view(){

        $allCash = DB::table('cashes')->get();
        $group = DB::table('cashes')->select('year')->groupBy('year')->get();
        return view('bn_cash.view', compact('allCash', 'group'));
    }

    
    public function search(Request $request){

        if($request->get('year')) {
            $allCash = DB::table('cashes')
            ->where('year', 'LIKE', '%' .$request->year. '%')
            ->get();
            }


        if($request->get('month')) {
            $allCash = DB::table('cashes')
            ->where('month', 'LIKE', '%' .$request->month. '%')
            ->get();
            }

        if($request->get('year') && $request->get('month')) {
            $allCash = DB::table('cashes')
            ->where('year', 'LIKE', '%' .$request->year. '%')
            ->where('month', 'LIKE', '%' .$request->month. '%')
            ->get();
            }
        

          $group = DB::table('cashes')->select('year')->groupBy('year')->get();
          
        return view('bn_cash.search', compact('allCash', 'group'));
        
    }

    public function delete($id){
        Chada::FindOrFail($id)->delete();
        return back()->with('success', 'Success! data delete Successfully');
    }

}
