<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DanhMucSanPham;
use App\Models\ThuongHieu;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham = SanPham::orderBy('product_id','DESC')->get();
        return view('admincp.sanpham.index')->with(compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        $danhmucsanpham = DanhMucSanPham::all();
        return view('admincp.sanpham.create')->with(compact('danhmucsanpham','thuonghieu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate(
            [
            'product_name' => 'required|unique:tbl_product|max:255',
            'product_slug' => 'required|unique:tbl_product|max:255',
            'product_desc' => 'required',
            'product_price' => 'required|min:1',
            'product_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'product_status' => 'required',
            'category' => 'required',
            'brand'=>'required',
            ],
            [
                'product_slug.unique' => 'Slug sản phẩm đã có xin điền tên khác',
                'product_name.unique' => 'Tên sản phẩm đã có xin điền tên khác',
                'product_slug.required' => 'Slug sản phẩm phải có',
                'product_price.required' => 'Giá sản phẩm phải có',
                'product_img.required' => 'Hình ảnh sản phẩm phải có',
                'product_name.required' => 'Tên sản phẩm phải có',
                'product_desc.required' => 'Mô tả sản phẩm phải có',
                'product_desc.required' => 'Thương hiệu sản phẩm phải có',
                
            ]
        );
        $sanpham = new SanPham();

        $sanpham->product_name = $data['product_name'];
        $sanpham->product_slug = $data['product_slug'];
        $sanpham->product_price = $data['product_price'];
        $sanpham->product_description = $data['product_desc'];
        $sanpham->product_status = $data['product_status'];
        $sanpham->category_id = $data['category'];
        $sanpham->brand_id = $data['brand'];

        $get_image = $request->product_img;
        $path = 'public/uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $sanpham->product_image = $new_image;

        $sanpham->save();

        return redirect()->back()->with('message','Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->get();
        $sanpham_detail = SanPham::find($id);
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        return view('pages.product.product_detail')->with(compact('danhmuc','thuonghieu','sanpham_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        $danhmucsanpham = DanhMucSanPham::all();
        $sanpham = SanPham::find($id);
        return view('admincp.sanpham.edit')->with(compact('sanpham','danhmucsanpham','thuonghieu'));
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
        $data = $request->validate(
            [
            'product_name' => 'required|max:255',
            'product_slug' => 'required|max:255',
            'product_desc' => 'required|max:255',
            'product_price' => 'required|min:1',
            'product_status' => 'required',
            'category' => 'required',
            'brand' => 'required',

            ],
            [
                'product_slug.required' => 'Slug sản phẩm phải có',
                'product_price.required' => 'Giá sản phẩm phải có',
                'product_name.required' => 'Tên sản phẩm phải có',
                'product_status.required'=> 'Trạng thái sản phẩm phải có',
                'product_desc.required' => 'Mô tả sản phẩm phải có',
                
            ]
        );
        $sanpham = SanPham::find($id);

        $sanpham->product_name = $data['product_name'];
        $sanpham->product_slug = $data['product_slug'];
        $sanpham->product_price = $data['product_price'];
        $sanpham->product_description = $data['product_desc'];
        $sanpham->product_status = $data['product_status'];
        $sanpham->category_id = $data['category'];
        $sanpham->brand_id = $data['brand'];

        $get_image = $request->product_img;
        if($get_image){
            $path = 'public/uploads/product/'.$sanpham->product_img;
            if(file_exists($path))
            {
                unlink($path);
            }
            $path = 'public/uploads/product/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $sanpham->product_image = $new_image;
        }
        $sanpham->save();

        return redirect()->back()->with('message','Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = SanPham::find($id);
        $path = 'public/uploads/product/'.$sanpham->product_image;
        if(file_exists($path))
        {
            unlink($path);
        }
        SanPham::find($id)->delete();
        return redirect()->back()->with('message','Xóa sản phẩm thành công!');
    }
   
}
