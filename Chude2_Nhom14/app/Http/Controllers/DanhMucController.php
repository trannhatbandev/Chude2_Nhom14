<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id!=null){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index()
    {
        $this->AuthLogin();
        $danhmucsanpham = DanhMucSanPham::orderBy('category_id','DESC')->get();
        return view('admincp.danhmucsanpham.index')->with(compact('danhmucsanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->AuthLogin();
        $danhmucsanpham =  DanhMucSanPham::orderBy('category_id','DESC')->get();
        return view('admincp.danhmucsanpham.create')->with(compact('danhmucsanpham',$danhmucsanpham));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->AuthLogin();
            $data = $request->validate(
                [
                'category_name' => 'required|unique:tbl_category|max:255',
                'category_slug' => 'required|unique:tbl_category|max:255',
                'category_desc' => 'required',
                'category_status' => 'required',
                'category_parent' => 'required',
                ],
                [
                    'category_name.unique' => 'Tên danh mục đã có xin điền tên khác',
                    'category_slug.unique' => 'Slug danh mục đã có xin điền tên khác',
                    'category_name.required' => 'Tên danh mục phải có',
                    'category_slug.required' => 'Slug danh mục phải có',
                    'category_desc.required' => 'Mô tả phải có',
                    
                ]
            );
            $danhmucsanpham = new DanhMucSanPham();

            $danhmucsanpham->category_name = $data['category_name'];
            $danhmucsanpham->category_slug = $data['category_slug'];
            $danhmucsanpham->category_parent = $data['category_parent'];
            $danhmucsanpham->category_description = $data['category_desc'];
            $danhmucsanpham->category_status = $data['category_status'];

            $danhmucsanpham->save();

            return redirect()->back()->with('message','Thêm danh mục sản phẩm thành công!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->AuthLogin();
        $danhmucsanpham = DanhMucSanPham::all();
        $danhmuc = DanhMucSanPham::find($id);
        return view('admincp.danhmucsanpham.edit')->with(compact('danhmuc','danhmucsanpham'));
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
        $this->AuthLogin();
        $data = $request->validate(
            [
            'category_name' => 'required|max:255',
            'category_slug' => 'required|max:255',
            'category_desc' => 'required|max:255',
            'category_status' => 'required',
            'category_parent' => 'required',
            ],
            [
                'category_name.required' => 'Tên danh mục phải có',
                'category_slug.required' => 'Slug danh mục phải có',
                'category_desc.required' => 'Mô tả phải có',
                
            ]
        );
        $danhmucsanpham = DanhMucSanPham::find($id);

        $danhmucsanpham->category_name = $data['category_name'];
        $danhmucsanpham->category_slug = $data['category_slug'];
        $danhmucsanpham->category_parent = $data['category_parent'];
        $danhmucsanpham->category_description = $data['category_desc'];
        $danhmucsanpham->category_status = $data['category_status'];

        $danhmucsanpham->save();

        return redirect()->back()->with('message','Cập nhật danh mục sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->AuthLogin();
        $sanpham = SanPham::where('category_id',$id)->first();
        if($sanpham!=null){
            return redirect()->back()->with('message','Danh mục sản phẩm này đã có sản phẩm không thể xóa!');
        }else{
            DanhMucSanPham::find($id)->delete();
            return redirect()->back()->with('message','Xóa danh mục sản phẩm thành công!');
        }
       
    }
}
