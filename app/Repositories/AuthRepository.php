<?php

namespace App\Repositories;

use App\Models\Employees;
use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Database\Query\Expression;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPUnit\TextUI\Output\NullPrinter;

class AuthRepository implements AuthInterface
{   
    protected $model;
    
    public function __construct(Employees $model) {
        $this->model = $model;
    }

    public function recoverPass($data)
    {
        $email = $data['email'];
        $now = Carbon::now()->format('d-m-Y');
        $title_mail = "Forget Password". ' ' .$now;
        $customer =   $this->model->where('email', '=', $data['email'])->get();
        $customer_id = $customer[0]->getoriginal('id');

        if($customer){
            $count_customer = $customer->count();

            if ( $count_customer == 0) {
                return redirect()->back();
            } else {
                $token_random = bin2hex(Str::random(20));
                $data = array();
                $data['token'] = $token_random;
                $this->model->Where('id', $customer_id)->update($data);

                $link_reset_pass = url('/admin/update-pass?token='.$token_random);
                $data = array(
                    "name" => $title_mail,
                    "body" => $link_reset_pass,
                    'email' => $email
                );

                Mail::send('admin.authentication.forget_pass_notify',['data' => $data],function($message) use($title_mail, $data){
                    $message->to($data['email'])->subject($title_mail);
                    $message->from('mienphi221@gmail.com', $title_mail);
                }); 
            }     
        }
    }

    public function updatePass($data)
    {
        $new_pass = $data['new_pass'];
        $token = $data['token'];
        $data = array();
        $data['password'] = HASH::make($new_pass);
        $data['token'] = null;

        $this->model->Where('token', $token)->update($data);
    } 

}    