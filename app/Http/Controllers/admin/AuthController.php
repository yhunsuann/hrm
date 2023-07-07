<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\AuthInterface;
class AuthController extends Controller
{
   protected $model;
    
    public function __construct(
      AuthInterface $model,
    ) {
        $this->model = $model;
    }
   public function login()
   {
      if (Auth::guest()){
         return view('admin.login');
      } else {
         return redirect()->route('admin.dashboard');
      }  
   }

   public function loginProcess(Request $request)
   {
      
      if ($request->has('email') && $request->has('password')) {
         $data = [
             'email' => $request->email,
             'password' => $request->password,
         ];

         if (Auth::attempt($data)) {
            if (auth()->user()->role_id == 2 || auth()->user()->role_id == 6) {
               return redirect()->route('admin.dashboard');
            } else {
               return redirect()->route('admin.home');
            }   
         }

         return back()->withErrors('Wrong account or password, please login again!');
     }
   }

   public function logout()
   { 
       Auth::logout();   

       return redirect()->route('admin.login');
   }

   public function forgotPassword()
   {
      return view('admin.authentication.forgot-password');
   }

   public function recoverPass(Request $request)
   {
       $data = $request->all();
       $this->model->recoverPass($data);

       return redirect()->back()->with('message', 'Email sent successfully, please go to email to reset password');
   }

   public function updatePass(){
      return view('admin.authentication.reset_new_pass');
   }

   public function updatePassProcess(Request $request)
   {
      $this->model->updatePass($request->all());

      return redirect()->route('admin.login');
   }
}
