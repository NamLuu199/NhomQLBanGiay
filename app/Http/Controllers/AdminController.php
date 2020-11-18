<?php

namespace App\Http\Controllers;


use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Admin;
use App\PasswordReset;
use Notification;
use App\Notifications\ResetPasswordRequest;
use App\Order;
use App\Blog;
use App\Product;
use App\OrderDetail;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends AdminGeneralController
{

    public function index()
    {

        $today = Carbon::now();
        $dates = [];
        $datesNow=[];
        $allPrice = [];
        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('d-m-Y'); // get all days in month
        }
        for($i=1; $i < $today->day + 1; ++$i) {
            $datesNow[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d'); // get days in nows
        }
        foreach ($datesNow as $date)
        {
            $allPrice[] = OrderDetail::whereDate('created_at','=',$date)->sum('price') ;

        }
//        $topSellers = DB::table('order_detail')
//                    ->select('name','image',DB::raw('count(quanty) as quanty'))
//                    ->groupby('name')
//                    ->orderBy('quanty','DESC')->limit(5)->toSql();
//                $topSellers = DB::table('order_detail')
//                    ->select('name','image','quanty')
//                    ->groupby('name')
//                    ->sum('quanty')
//                    ->orderBy('quanty','DESC')
//                    ->limit(5)
//                    ;
        $topSellers = OrderDetail::selectRaw('name,image,SUM(quanty) as quanty')
                                ->groupby('name')
                                ->orderBy('quanty','DESC')
                                ->limit(7)->get();

        $numOrder = Order::count();
        $numBlog = Blog::count();
        $numProduct = Product::count();
        $numUser = Admin::count();
        return view('admin.dashboard', [
            'numOrder' => $numOrder,
            'numBlog' => $numBlog,
            'numProduct' => $numProduct,
            'numUser' => $numUser,
            'dates' =>  json_encode($dates),
            'allPrice' => json_encode($allPrice),
            'topSellers' => $topSellers
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
