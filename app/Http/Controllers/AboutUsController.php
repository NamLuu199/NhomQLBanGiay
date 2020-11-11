<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\AboutUs;
class AboutUsController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AboutUs::latest()->paginate(10); // sắp sếp theo thứ tự mới nhất && phân trang

        // gọi đến view
        return view('admin.AboutUs.index', [
            'data' => $data // truyền dữ liệu sang view Index
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = AboutUs::all(); // lấy toàn bộ dữ liệu
        // gọi đến view create
        return view('admin.AboutUs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate dữ liệu
         $validatedData = $request->validate([
            'title' => 'required|max:255'

        ]);

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $aboutus = new AboutUs();
        $aboutus->title = $request->input('title');



        // icon
        $aboutus->icon = $request->input('icon');


        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $aboutus->is_active = $request->input('is_active');
        }
        // Vị trí
        $aboutus->position = $request->input('position');
        // Mô tả
        $aboutus->description = $request->input('description');
        // Lưu
        $aboutus->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.AboutUs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Sử dụng hàm findorFail tìm kiếm theo Id, nếu tìm thấy sẽ trả về object , nếu không trả về lỗi
        $data = AboutUs::findorFail($id);

        // Gọi tới view
        return view('admin.AboutUs.show', [
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
        $aboutus = AboutUs::findorFail($id);

        return view('admin.AboutUs.edit', [
            'aboutus' => $aboutus
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
        //validate dữ liệu
        $validatedData = $request->validate([
            'title' => 'required|max:255'

        ]);

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $aboutus = AboutUs::findorFail($id);
        $aboutus->title = $request->input('title');



        // icon
        $aboutus->icon = $request->input('icon');

        // Trạng thái
        $aboutus->is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $aboutus->is_active = $request->input('is_active');
        }
        // Vị trí
        $aboutus->position = $request->input('position');
        // Mô tả
        $aboutus->description = $request->input('description');
        // Lưu
        $aboutus->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.AboutUs.index');
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
        AboutUs::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
