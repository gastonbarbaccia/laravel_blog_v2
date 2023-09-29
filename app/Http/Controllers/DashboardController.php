<?php

namespace App\Http\Controllers;

use App\Models\DashboardUser;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function save_user(Request $request){

        $request->validate([
            'first' => 'required',
            'last' => 'required',
            'handle' => 'required'
        ]);

        $user = new DashboardUser();
        $user->First = $request->input('first');
        $user->Last = $request->input('last');
        $user->Handle = $request->input('handle');
        $user->save();

        return redirect()->route('home');
    }

    public function delete_user($id){
        $user = DashboardUser::findOrfail($id);
        $user->delete();

        return redirect()->route('home');
    }

    public function edit_user($id){
        $user = DashboardUser::findOrfail($id);

        return view('form_editar',compact('user'));
    }

    public function update_user(Request $request , $id){
        $user = DashboardUser::findOrfail($id);
        $user->First = $request->input('first');
        $user->Last = $request->input('last');
        $user->Handle = $request->input('handle');
        $user->save();

        return redirect()->route('home');
    }
}
