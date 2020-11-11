<?php

namespace App\Http\Controllers;

use App\Order;
use App\Vendor;
use Illuminate\Http\Request;
use App\Http\Requests\VendorValidate;
class VendorController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::latest()->paginate(10);
        return view('admin.vendor.index',[
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Vendor::max('position');
        $data = Vendor::all();
        return view('admin.vendor.create',[
            'data' => $data,
            'position' => $position
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorValidate $request)
    {
        //validate dữ liệu

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = str_slug($request->input('slug')); // slug

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/vendor/'; // uploads/vendor ; uploads/vendor
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename;
        }
        //điện thoại
        $vendor->phone = $request->input('phone');

        //email
        $vendor->email = $request->input('email');

        //địa chỉ
        $vendor->address = $request->input('address');

        // website
        $vendor->website = $request->input('website');
        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $vendor->is_active = $request->input('is_active');
        }
        // Vị trí
        $vendor->position = $request->input('position');
        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.vendor.index');
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
        $data = Vendor::findorFail($id);

        // Gọi tới view
        return view('admin.vendor.show', [
            'data' => $data // truyền dữ liệu sang view show
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Sử dụng hàm findorFail tìm kiếm theo Id, nếu tìm thấy sẽ trả về object , nếu không trả về lỗi
        $vendor = Vendor::findorFail($id);

        return view('admin.vendor.edit', [
            'vendor' => $vendor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorValidate $request, $id)
    {
        //validate dữ liệu

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = str_slug($request->input('name')); // slug

        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($vendor->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/vendor/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }
        $vendor->email = $request->input('email');
        // website
        $vendor->website = $request->input('website');

            // Vị trí
        $vendor->position = $request->input('position');
        // Trạng thái
        $vendor->is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $vendor->is_active = $request->input('is_active');
        }

        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.vendor.index');
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
       Vendor::destroy($id);

       // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
       return response()->json([
           'status' => true
       ], 200);
    }
}
