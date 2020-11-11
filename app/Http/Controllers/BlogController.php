<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\BlogValidate;
class BlogController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::latest()->paginate(10); // sắp sếp theo thứ tự mới nhất && phân trang

        // gọi đến view
        return view('admin.blog.index', [
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
        $position = Blog::max('position');
        $data = Blog::all(); // lấy toàn bộ dữ liệu
        // gọi đến view create
        return view('admin.blog.create',compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogValidate $request)
    {
        //
        //validate dữ liệu

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $blog = new Blog();
        $blog->title = $request->input('title');// tiêu đề
        $blog->slug = str_slug($request->input('title'));

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/blog/'; // uploads/brand ; uploads/blog
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename);

            $blog->image = $path_upload.$filename;
        }

        //user_id
        $blog->admin_id = Auth::user()->id;
        // link bài viết
        if(!empty($request->input('url')))
        {
            $product->url = $request->input('url');
            $product->slug = str_slug($request->input('url'));
        }
         // vị trí
        $blog->position = $request->input('position');


        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $blog->is_active = $request->input('is_active');
        }
        // nội dung
        $blog->description = $request->input('description');

        // Lưu
        $blog->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.blog.index');
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
                // get data from db
                $data = Blog::findorFail($id);

                return view('admin.blog.show', [
                    'data' => $data
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
        $blog = Blog::findorFail($id);

        return view('admin.blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogValidate $request, $id)
    {

        $blog = Blog::findorFail($id);; // khởi tạo model
        $blog->title = $request->input('title');
        $blog->slug = str_slug($request->input('title'));
        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($blog->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/blog/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $blog->image = $path_upload.$filename;
        }

        $blog->admin_id = Auth::user()->id;

        if(!empty($request->input('url')))
        {
            $product->url = $request->input('url');
            $product->slug = str_slug($request->input('url'));
        }

        $blog->position = $request->input('position');

        // Trạng thái
        $blog->is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $blog->is_active = $is_active;
        $blog->description = $request->input('description');


        $blog->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.blog.index');
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
        Blog::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
    public function searchBlog(Request $request)
    {
        $keyword = $request->input('keyword');
        $slug = str_slug($keyword);
            $data = [];
            $data = Blog::where([
                ['title', 'like', '%' . $keyword . '%']
            ])->orWhere([
                ['slug', 'like', '%' . str_slug($keyword) . '%']
            ])->paginate(10);
            $data->appends(['keyword'=>$keyword]);
            return view('admin.blog.searchBlog', [
                'data' => $data,
                'keyword' => $keyword ? $keyword : ''
            ]);
    }

}

