<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Requests\BrandValidate;
class BrandController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::latest()->paginate(10); // sắp sếp theo thứ tự mới nhất && phân trang

        return view('admin.brand.index',[
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
        $data =  Brand::all();
        // gọi đến view create
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandValidate $request)
    {

        //validate dữ liệu

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = str_slug($request->input('name')); // slug

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/brand/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename;
        }

        // website
        $brand->website = $request->input('website');
        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $brand->is_active = $request->input('is_active');
        }
        // Vị trí
        $brand->position = $request->input('position');
        // Lưu
        $brand->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Brand::findorFail($id);

        // Gọi tới view
        return view('admin.brand.show', [
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
        $brand = Brand::findorFail($id);

        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandValidate $request, $id)
    {

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $brand = Brand::findorFail($id);
        $brand->name = $request->input('name');
        $brand->slug = str_slug($request->input('name')); // slug

        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($brand->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/brand/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

        // website
        $brand->website = $request->input('website');

            // Vị trí
            $brand->position = $request->input('position');
        // Trạng thái
        $brand->is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $brand->is_active = $request->input('is_active');
        }

        // Lưu
        $brand->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.brand.index');
    }

    public function searchBrand(Request $request)
    {
        $keyword = $request->input('keyword');
        $slug = str_slug($keyword);
            $data = [];
            $data = Brand::where([
                ['name', 'like', '%' . $keyword . '%'],
                ['is_active', '=', 1]
            ])->orWhere([
                ['slug', 'like', '%' . str_slug($keyword) . '%'],
                ['is_active', '=', 1]
            ])->paginate(10);
            $data->appends(['keyword'=>$keyword]);
            return view('admin.brand.searchBrand', [
                'data' => $data,
                'keyword' => $keyword ? $keyword : ''
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // gọi tới hàm destroy của laravel để xóa 1 object
       Brand::destroy($id);

       // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
       return response()->json([
           'status' => true
       ], 200);
    }
}
