<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class SubscriberController extends Controller
{
    public function index(){
        $allSubscriber = DB::table('users')->whereNot('id',[1])->get();
        return view('bn_subscriber.index', compact('allSubscriber'));
    }

    public function create(){
        return view('bn_subscriber.create');
    }


 public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'amount' => ['required'],
            'phone' => ['required', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'amount' => $request->amount,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Success! data insert Successfully');
    }


    public function edit($id){
        $editUser = User::FindOrFail($id);

        return view('bn_subscriber.edit', compact('editUser'));

    }

    public function update(Request $request){
        $id = $request->id;

        $request->validate([
            'name' => ['required'],
            'amount' => ['required'],
            'phone' => ['required', 'unique:'.User::class],

        ]);

        User::FindOrFail($id)->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'phone' => $request->phone,
        ]);


        return redirect()->route('bn_subscriber.index')->with('success', 'Success! data update Successfully');

    }

    public function delete($id){
        User::FindOrFail($id)->delete();
        return back()->with('success', 'Success! data delete Successfully');
    }
}
