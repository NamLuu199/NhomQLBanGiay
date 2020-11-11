<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Coupon;
class CouponController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Coupon::paginate(10);
        return view('admin.coupon.index',[
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'type' => 'required',
            'percent' => 'numeric|max:100'
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        if($request->type == 1)
        {
            $coupon->type = $request->type;
            $coupon->value = $request->value;
        }else{
            $coupon->type = $request->type;
            $coupon->percent = $request->percent;
        }
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $coupon->is_active = $is_active;
        $coupon->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.coupon.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit', [
            'coupon' =>$coupon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //luu vào csdl
        $validatedData = $request->validate([
            'code' => 'required|max:255',
            'type' => 'required',
            'percent' => 'numeric|max:100'
        ]);
        $coupon = Coupon::findorFail($id);
        $coupon->code = $request->code;
        if($request->type == 1)
        {
            $coupon->type = $request->type;
            $coupon->value = $request->value;
            $coupon->percent = null;

        }
        if($request->type == 2){
            $coupon->type = $request->type;
            $coupon->percent = $request->percent;
            $coupon->value = null;
        }
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $coupon->is_active = $is_active;
        $coupon->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
       Coupon::destroy($id);

       // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
       return response()->json([
           'status' => true
       ], 200);
    }
    public function searchCoupon(Request $request)
    {

        $keyword = $request->input('keyword');
            $data = Coupon::where('code', 'like', '%' . $keyword . '%')
            ->paginate(10);
            $data->appends(['keyword'=>$keyword]);
        return view('admin.coupon.searchCoupon', [
                'data' => $data,
                'keyword' => $keyword ? $keyword : ''
            ]);
    }
}
