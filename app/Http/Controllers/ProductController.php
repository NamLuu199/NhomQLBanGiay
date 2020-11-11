<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Order;
use App\Product;
use App\Category;
use App\Vendor;
use App\ImageUpLoad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ProductValidate;

class ProductController extends AdminGeneralController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->paginate(20);
        $brandsFilter = Brand::all();
        $vendorsFilter = Vendor::all();
        return view('admin.product.index', [
            'data' => $data,
            'brandsFilter' => $brandsFilter,
            'vendorsFilter' => $vendorsFilter
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        $position = Product::max('position');
        $brands = Brand::all();
        $vendors = Vendor::all();

        return view('admin.product.create', [
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors,
            'position' => $position
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidate $request)
    {


        $product = new Product(); // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = str_slug($request->input('name'));


        //Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/product/';
            // Thực hiện upload file
            $request->file('image')->move($path_upload, $filename); // upload lên thư mục public/uploads/product

            $product->image = $path_upload . $filename;

        }


        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $product->position = $request->input('position');
        if (!empty($request->input('url'))) {
            $product->url = $request->input('url');
            $product->slug = $request->input('url');
        }

        // Trạng thái
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $product->is_active = $request->input('is_active');
        }

        // Sản phẩm Hot
        if ($request->has('is_hot')) {
            $product->is_hot = $request->input('is_active');
        }

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');

        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        $product_id = $product->id;
        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $file) {
                $product_img = new ImageUpLoad();
                if (isset($file)) {
                    $product_img->filename = 'uploads/product/images/' . $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('uploads/product/images', $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }


        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get data from db
        $product = Product::findorFail($id);
        $category_name = Category::where('id', $product->category_id)->first();

        return view('admin.product.show', [
            'product' => $product,
            'category_name' => $category_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorFail($id);
        $categories = Category::where('parent_id', null)->get();
        $brands = Brand::all();
        $vendors = Vendor::all();
        $multi = ImageUpLoad::where('product_id', $id)->get();
        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'vendors' => $vendors,
            'multi' => $multi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,ProductValidate $request)
    {
        $product = Product::findorFail($id);; // khởi tạo model
        $product->name = $request->input('name');
        $product->slug = str_slug($request->input('name'));
        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($product->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time() . '_' . $file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/product/';
            // upload file
            $request->file('new_image')->move($path_upload, $filename);

            $product->image = $path_upload . $filename;
        }

        $product->stock = $request->input('stock'); // số lượng
        $product->price = $request->input('price');
        $product->sale = $request->input('sale');
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');
        $product->vendor_id = $request->input('vendor_id');
        $product->sku = $request->input('sku');
        $product->position = $request->input('position');

        if (!empty($request->input('url'))) {
            $product->url = $request->input('url');
            $product->slug = $request->input('url');
        }


        // Trạng thái
        $product->is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $product->is_active = $request->input('is_active');
        }

        // Sản phẩm Hot

        $product->is_hot = 0;
        if ($request->has('is_hot')) {
            $product->is_hot = $request->input('is_hot');
        }

        $product->summary = $request->input('summary');
        $product->description = $request->input('description');

        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->save();

        $product_id = $product->id;
        if ($request->hasFile('filename')) {
            foreach ($request->file('filename') as $file) {
                $product_img = new ImageUpLoad();
                if (isset($file)) {
                    $product_img->filename = 'uploads/product/images/' . $file->getClientOriginalName();
                    $product_img->product_id = $product_id;
                    $file->move('uploads/product/images', $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }

        // chuyển hướng đến trang
        return redirect()->route('admin.product.index');
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
        Product::destroy($id);
        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }

    public function searchProduct(Request $request)
    {

        $brandsFilter = Brand::all();
        $vendorsFilter = Vendor::all();
        $keyword = $request->input('keyword');
        $brand_id = $request->brand_id;
        $vendor_id = $request->vendor_id;
        $slug = str_slug($keyword);

        $data = new Product; // Khởi tạo đối tượng Product

        if(!empty($brand_id))
        {
            $data = $data->where('brand_id', $brand_id);
        }
        if(!empty($vendor_id))
        {
            $data = $data->where('vendor_id', $vendor_id);
        }
        if(!empty($keyword))
        {
            $data = $data->where('slug','like','%' .$slug.'%');
        }

        $data = $data->paginate(10)->appends(
            ['keyword' => $keyword,
             'brand_id' => $brand_id,
             'vendor_id' => $vendor_id
            ]);

        return view('admin.product.searchProduct', [
            'data' => $data,
            'keyword' => $keyword ? $keyword : '',
            'brandsFilter' => $brandsFilter,
            'vendorsFilter' => $vendorsFilter,
            'brand_id' => $brand_id,
            'vendor_id' => $vendor_id
        ]);
    }
}
