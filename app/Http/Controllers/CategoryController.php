<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CategoryValidate;
use App\Order;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Http\Request;



class CategoryController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::where('parent_id',null)
                          ->orderby('position')
                          ->get();

        return view('admin.category.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Category::max('position');
        $data = Category::where('parent_id',null)->get();
        return view('admin.category.create', compact('data','position'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidate $request)
    {

        //luu vào csdl
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name'));
        if($request->input('parent_id') == 0)
        {
             $category->parent_id = null;
        }
        else
        {
            $category->parent_id = $request->input('parent_id');
        }
        $category->position = $request->position;
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;

        $category->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id); // lấy tất cả dữ liệu bảng Category
        return view('admin.category.show', [
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
        $data = Category::where('parent_id',null)->get();
        $category = Category::find($id);
        return view('admin.category.edit', [
            'data' => $data,
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,CategoryValidate $request)
    {


        //luu vào csdl
        $category = Category::findorFail($id);
        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name'));
        if($request->input('parent_id') == 0)
        {
             $category->parent_id = null;
        }
        else
        {
            $category->parent_id = $request->input('parent_id');
        }
        $category->position = $request->input('position');
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;

        $category->update();
        // chuyen dieu huong trang
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect(route('admin.category.index'));
    }
}
