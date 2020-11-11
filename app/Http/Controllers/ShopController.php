<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cart;
use App\Category;
use App\Product;
use App\ImageUpLoad;
use App\Brand;
use App\Blog;
use App\Comment;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Page;
use App\Order;
use App\AboutUs;

class ShopController extends GeneralController
{
    public function __construct()
    {
        parent::__construct();

    }

    // trang chủ
    public function index()
    {
        $categories = $this->categories;

        // 3. Lấy danh sách phẩm theo thể loại
        $list = []; // chứa danh sách sản phẩm  theo thể loại
        foreach ($categories as $key => $category) {
            if (empty($category->parent_id)) { // check danh mục cha
                $ids = [$category->id]; // $ids = array($category->id);
                foreach ($categories as $child) {
                    if ($child->parent_id == $category->id) {
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                }

                $list[$key]['category'] = $category;

                $list[$key]['products'] = Product::where(['is_active' => 1, 'is_hot' => 1])
                    ->whereIn('category_id', $ids)
                    ->limit(10)->orderBy('id', 'desc')
                    ->get();
            }
        }
        $aboutus = AboutUs::all();
        return view('shop.home', [
            'list' => $list,
            'aboutus' => $aboutus
        ]);
    }

    public function newArrival()
    {


        return view('shop.home', [
            'product' => $products
        ]);
    }

    public function getProduct($slug, $id)
    {

        // get chi tiet sp
        $product = Product::find($id);

        if (!$product) {
            return $this->notfound();
        }

        $category = Category::find($product->category_id);

        $tags = Category::where([
            ['id', '<>', 0],
            ['is_active', '=', 1]
        ])->get();

        $product_img = Product::where('id', $id)->first();

        $image = ImageUpLoad::select('id', 'filename')->where('product_id', $product_img->id)->get();

        // step 2 : lấy list SP liên quan
        $relatedProducts = Product::where([
            ['is_active', '=', 1],
            ['category_id', '=', $category->id],
            ['id', '<>', $id]
        ])->paginate(10);

        return view('shop.product', [
            'category' => $category,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'image' => $image
        ]);
    }

    // Get san phan theo the loai
    public function getProductsByCategory($slug)
    {

        // Lấy chi tiết thể loại
        $cate = Category::where(['slug' => $slug])->first();

        if ($cate) {
            $categories = $this->categories;
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = [];
            foreach ($categories as $key => $category) {
                if ($category->id == $cate->id) {
                    $ids[] = $cate->id;
                    foreach ($categories as $child) {
                        if ($child->parent_id == $cate->id) {
                            $ids[] = $child->id; // thêm phần tử vào mảng
                        }
                    }
                }
            }

            $products = Product::where(['is_active' => 1])
                ->whereIn('category_id', $ids)
                ->orderBy('id', 'desc')
                ->paginate(9);
            $brandsFilter = DB::table('products') // filter Brand
                ->select('brand_id', 'brands.name')
                ->distinct()
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->whereIn('category_id', $ids)
                ->get();


            return view('shop.products-by-category', [
                'category' => $category,
                'products' => $products,
                'brandsFilter' => $brandsFilter,
                'cate' => $cate
            ]);
        } else {
            return $this->notfound();
        }
    }


    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $slug = str_slug($keyword);
        $totalResult = 0;
        $products = [];
        $products = Product::where([
            ['name', 'like', '%' . $keyword . '%'],
            ['is_active', '=', 1]
        ])->orWhere([
            ['slug', 'like', '%' . $slug . '%'],
            ['is_active', '=', 1]
        ])->orWhere([
            ['summary', 'like', '%' . $keyword . '%'],
            ['is_active', '=', 1]
        ])->paginate(8);

        $products->appends(['tu-khoa' => $keyword]);

        $totalResult = $products->total();
        return view('shop.search', [
            'products' => $products,
            'totalResult' => $totalResult,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }

    public function filter(Request $request, $slug)
    {
        $i = 0;
        $priceCount = $request->input('price');
        $sort = $request->sortby;
        $brand_id = [];
        if ($request->has('brand_id')) {
            $brand_id = $request->input('brand_id');
        }

        // Lấy chi tiết thể loại
        $cate = Category::where(['slug' => $slug])->first();

        if ($cate) {
            $categories = $this->categories;
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = [];
            foreach ($categories as $key => $category) {
                if ($category->id == $cate->id) {
                    $ids[] = $cate->id;
                    foreach ($categories as $child) {
                        if ($child->parent_id == $cate->id) {
                            $ids[] = $child->id; // thêm phần tử vào mảng
                            // thêm phần tử vào mảng

                        }
                    }
                }
            }

            $product = Product::whereIn('category_id', $ids)
                ->where('is_active', '=', 1);
            if (!empty($priceCount)) {
                if ($priceCount === "9000000") // Nếu price == 9tr
                {

                    $products = $product->where(function($q) use ($priceCount) {
                                $q->where('sale', '>', $priceCount)
                                ->orWhere('price', '>', $priceCount);
                    });
                } else {
                    $price = explode("-", $priceCount);
                    $start = $price[0]; // Lấy giá phía bên trái
                    $end = $price[1]; // Lấy giá phía bên phải
                    // step 2 : lấy list sản phẩm theo thể loại
                    $products = $product->where(function($q) use ($start,$end){
                                        $q->where([
                                                ['sale', ">=", $start],
                                                ['sale', "<=", $end]
                                         ])->orWhere([
                                                ['price', ">=", $start],
                                                ['price', "<=", $end]
                                         ]);
                    });
                }
            }
            if (!empty($brand_id)) {
                $product = $product->whereIn('brand_id', $brand_id);
            }
            if(!empty($sort))
            {
                $product = $product->orderby('sale', $sort)->orderby('price', $sort);
            }

            $products = $product->paginate(9)->appends([
                'brand_id' => $brand_id,
                'price' => $priceCount
            ]);

            $brandsFilter = DB::table('products')
                ->select('brand_id', 'brands.name')
                ->distinct()
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->whereIn('category_id', $ids)
                ->get();

            return view('shop.filterProduct', [
                'category' => $category,
                'products' => $products,
                'i' => $i,
                'cate' => $cate,
                'brandsFilter' => $brandsFilter,
                'priceCount' => $priceCount,
                'brand_id' => $brand_id,
                'sort' => $sort
            ]);

        } else {
            return $this->notfound();
        }
    }

    public function ViewBlog($slug, $id)
    {
        $blogs = Blog::findorFail($id);
        return view('shop.blog', ['blogs' => $blogs]);
    }

    public function BlogDetails()
    {
        $blogs = Blog::where('is_active', 1)
            ->latest()
            ->paginate(2);
        return view('shop.blog-detalis', ['blogs' => $blogs]);
    }

    public function getpage($slug, $id)
    {

        $page = Page::find($id);

        if (!$page) {
            return $this->notfound();
        } else {
            return view('shop.viewpage', [
                'page' => $page
            ]);
        }

    }

    public function sorder()
    {
        return view('shop.sorder');
    }

    public function viewsearchorder(Request $request)
    {
        $keyword = $request->input('tim-kiem');
        $slug = str_slug($keyword);
        $totalOrder = '';
        $searchorder = Order::where('code', $keyword)
            ->orWhereNull('code')
            ->first();
        if ($searchorder) {
            $order_id = $searchorder->id;
            $totalOrder = OrderDetail::where('order_id', $searchorder->id)->sum('price');
        }

        return view('shop.viewsearchorder', [
            'searchorder' => $searchorder,
            'keyword' => $keyword ? $keyword : '',
            'totalOrder' => $totalOrder
        ]);
    }


}
