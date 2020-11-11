<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Page;
use App\Http\Requests\PageValidate;

class PageController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Page::latest()
            ->paginate(10);
        return view('admin.page.index', [
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
        $data = Page::all();
        return view('admin.page.create', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageValidate $request)
    {
        //validate dữ liệu


        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = str_slug($request->input('slug'));
        if (!empty($request->input('url'))) {
            $product->url = $request->input('url');
            $product->slug = str_slug($request->input('url'));
        }

        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $page->is_active = $request->input('is_active');
        }

        // Nội dung
        $page->description = $request->input('description');
        // Lưu
        $page->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Sử dụng hàm findorFail tìm kiếm theo Id, nếu tìm thấy sẽ trả về object , nếu không trả về lỗi
        $page = Page::findorFail($id);
        return view('admin.page.edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageValidate $request, $id)
    {
        //validate dữ liệu
        $validatedData = $request->validate([
            'title' => 'required|max:255',

        ]);

        //Lấy đối tượng  và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $page = Page::findorFail($id);
        $page->title = $request->input('title');
        if (!empty($request->input('slug'))) {
            $page->slug = str_slug($request->input('slug'));
        } else {
            $page->slug = str_slug($request->input('title'));
        }
        // Trạng thái
        $page->is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $page->is_active = $request->input('is_active');
        }
        //
        $page->description = $request->input('description');
        // Lưu
        $page->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        Page::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}
