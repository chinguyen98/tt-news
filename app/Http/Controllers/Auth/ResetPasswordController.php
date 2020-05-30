<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
     // protected $redirectTo ='/admin/home';

    function resetpassword()
    {
      return view('auth.passwords.reset');
    }
    function newpassword(Request $requests)
    {
      $requests->validate([
       'password'=>'required|confirmed' ,
       'password_confirmation'=>'required|min:8' ,
       'password_cu'=>'required'
     ],
     [
      'password.required'=>'Chưa nhập mật khẩu ', 
      'password_cu.required'=>'Chưa nhập mật khẩu cũ ',
      'password_confirmation.required'=>'Chưa nhập mật khẩu ', 
      'password_confirmation.min'=>'Mật khẩu mới ít nhất 8 kí tự',
      'password.confirmed'=>'Không trùng khớp ',  
    ]);
      
      $mkmoi=Hash::make($requests->password);
      $mkcu=$requests->password_cu; 
      if(Hash::check($mkcu,Auth::user()->password))
      {
         $reset=DB::table('admin')->where('id',Auth::id())->update(['password'=>$mkmoi]);
            return redirect('admin/logout');
      }
      else
      {
         return redirect('admin/reset')->with('message','Mật khẩu cũ không chính xác');
       
      }

    }
  }
