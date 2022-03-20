<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucSanPham;
use App\Models\ThuongHieu;
use App\Models\SanPham;
use App\Models\MauSac;
use App\Models\Size;

class HomeController extends Controller
{
    public function index()
    {
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        $sanphammoi = SanPham::orderBy('product_id','DESC')->where('product_status','1')->take(10)->get();
        $sanphamnoibat = SanPham::all()->random(3);
        return view('pages.home')->with(compact('danhmuc','sanphammoi','sanphamnoibat','thuonghieu'));
    }
    public function danhMucCon($slug)
    {

        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        $danhmuc_id = DanhMucSanPham::where('category_slug',$slug)->first();
        $sanpham = SanPham::orderBy('product_id','DESC')->where('category_id',$danhmuc_id->category_id)->where('product_status','1')->get();
        return view('pages.category.category')->with(compact('danhmuc','sanpham','danhmuc_id','thuonghieu'));
    }
    public function showBrand($slug)
    {
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        $brand_id = ThuongHieu::where('brand_slug',$slug)->first();
        $sanpham_brand = SanPham::orderBy('product_id','DESC')->where('brand_id',$brand_id->brand_id)->get();
        return view('pages.brand.brand')->with(compact('danhmuc','sanpham_brand','brand_id','thuonghieu'));
    }
    public function showProductDetail($slug)
    {
        $mausac = MauSac::orderBy('color_id','DESC')->where('color_status','1')->get();
        $size = Size::orderBy('size_id','ASC')->where('size_status','1')->get();
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        $sanpham_detail = SanPham::where('product_slug',$slug)->first();
        return view('pages.product.product_detail')->with(compact('danhmuc','thuonghieu','sanpham_detail','mausac','size'));
    }
    public function showDangNhap()
    {
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        return view('pages.customer.customer_login')->with(compact('danhmuc','thuonghieu'));
    }
    public function showDangKy()
    {
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        return view('pages.customer.customer_register')->with(compact('danhmuc','thuonghieu'));
    }
    
    public function searchProduct(Request $request)
    {
        $keyword = $request->search_keyword;
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        $sanphamtimkiem = SanPham::where('product_name','like','%'.$keyword.'%')->get();
        return view('pages.product.search')->with(compact('danhmuc','thuonghieu','sanphamtimkiem','keyword'));
    }
    public function updateBrandStatusAn($id)
    {
        ThuongHieu::where('brand_id',$id)->update(['brand_status'=>0]);
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        return view('admincp.thuonghieu.index')->with(compact('thuonghieu'));
    }
    public function updateBrandStatusHienThi($id)
    {
        ThuongHieu::where('brand_id',$id)->update(['brand_status'=>1]);
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        return view('admincp.thuonghieu.index')->with(compact('thuonghieu'));
    }
    public function updateCategoryStatusAn($id)
    {
        DanhMucSanPham::where('category_id',$id)->update(['category_status'=>0]);
        $danhmucsanpham = DanhMucSanPham::orderBy('category_id','DESC')->get();
        return view('admincp.danhmucsanpham.index')->with(compact('danhmucsanpham'));
    }
    public function updatecategoryStatusHienThi($id)
    {
        DanhMucSanPham::where('category_id',$id)->update(['category_status'=>1]);
        $danhmucsanpham = DanhMucSanPham::orderBy('category_id','DESC')->get();
        return view('admincp.danhmucsanpham.index')->with(compact('danhmucsanpham'));
    }
    public function updateProductStatusAn($id)
    {
        SanPham::where('product_id',$id)->update(['product_status'=>0]);
        $sanpham = SanPham::orderBy('product_id','DESC')->get();
        return view('admincp.sanpham.index')->with(compact('sanpham'));
    }
    public function updateProductStatusHienThi($id)
    {
        SanPham::where('product_id',$id)->update(['product_status'=>1]);
        $sanpham = SanPham::orderBy('product_id','DESC')->get();
        return view('admincp.sanpham.index')->with(compact('sanpham'));
    }
    public function updateColorStatusAn($id)
    {
        MauSac::where('color_id',$id)->update(['color_status'=>0]);
        $mausac= MauSac::orderBy('color_id','DESC')->get();
        return view('admincp.mausac.index')->with(compact('mausac'));
    }
    public function updateColorStatusHienThi($id)
    {
        MauSac::where('color_id',$id)->update(['color_status'=>1]);
        $mausac = MauSac::orderBy('color_id','DESC')->get();
        return view('admincp.mausac.index')->with(compact('mausac'));
    }
    public function updateSizeStatusAn($id)
    {
        Size::where('size_id',$id)->update(['size_status'=>0]);
        $size= Size::orderBy('size_id','DESC')->get();
        return view('admincp.size.index')->with(compact('size'));
    }
    public function updateSizeStatusHienThi($id)
    {
        Size::where('size_id',$id)->update(['size_status'=>1]);
        $size = Size::orderBy('size_id','DESC')->get();
        return view('admincp.size.index')->with(compact('size'));
    }
    public function contact()
    {
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->where('category_status','1')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->where('brand_status','1')->get();
        return view('pages.contact')->with(compact('danhmuc','thuonghieu'));
    }
}
