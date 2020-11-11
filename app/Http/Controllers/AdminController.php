<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Admin;
use App\PasswordReset;
use Notification;
use App\Notifications\ResetPasswordRequest;
use App\Order;
use App\Blog;
use App\Product;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
class AdminController extends AdminGeneralController
{

    public function index()
    {
        $numOrder = Order::count();
        $numBlog = Blog::count();
        $numProduct = Product::count();
        $numUser = Admin::count();
        return view('admin.dashboard', [
            'numOrder' => $numOrder,
            'numBlog' => $numBlog,
            'numProduct' => $numProduct,
            'numUser' => $numUser
        ]);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        //validate du lieu
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            return redirect()->route('admin.dashboard');
        }else
        {
            return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
        }
    }
     public function logout()
    {
        Auth::logout();
        // chuyển về trang đăng nhập
        return redirect()->route('admin.login');
    }
    public function getForgotPassword(Request $request)
    {
        //Tạo token và gửi đường link reset vào email nếu email tồn tại
        $result = Admin::where('email', $request->email)->first();
        $passwordReset = PasswordReset::firstOrCreate(
            ['email'=>$request->email],
            ['token'=>Str::random(60)],
            ['created_at'=>Carbon::now()]);
        if($result){
            $result->notify(new ResetPasswordRequest($passwordReset->token));
            return redirect()->back()->with('success','Gửi email thành công');
        } else {
            return redirect()->back()->with('err','Email không tồn tại');
        }
    }

    public function resetPassword(Request $request,$token)
    {
        // Check token valid or not
        $result = PasswordReset::where('token', $token)->first();
        if($result){
            $data['info'] = $result->token;
            return view('admin/newPass', $data);
        } else {
            echo 'This link is expired';
        }
    }
    public function new()
    {
        return view('admin/newPass');
    }
    public function forgot()
    {
        return view('admin.ForgotPass');
    }
    public function newPass(Request $request)
    {
        // Check password confirm
        if($request->password == $request->confirm){
            // Check email with token
            $result = PasswordReset::where('token', $request->token)->first();
            // Update new password
            Admin::where('email', $result->email)->update(['password'=>bcrypt($request->password)]);

            // Delete token
            PasswordReset::where('token', $request->token)->delete();

            return redirect()->route('admin.login');
        } else {
            return redirect()->back()->with('err','Mật khẩu không khớp nhau');
        }
    }

}
