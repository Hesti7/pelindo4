<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;
use Auth;
use Alert;
class LoginController extends Controller
{
    public function cekLogin(Request $req){

        $email = $req->email;
        $pass =$req->password;

        if(Auth::attempt(['email'=> $email, 'password'=> $pass])){
            if (Auth::user()->role==2){
                Alert::success('Berhasil Login','');
                return redirect ('admin/dashboardview');
            } else if (Auth::user()->role==1){
                Alert::success('Berhasil Login','');
                return redirect ('user/dashboardview');
            } else {
                Alert::error('Gagal Login','');
                // return redirect('/')->with('alert', 'Role error');
                return redirect('/');
            }
        }else {
            Alert::success('Gagal Login','');
            return redirect('/');        }
    }

    public function logOut(){
        Auth::logout();
        return redirect ('/');
    }

}
