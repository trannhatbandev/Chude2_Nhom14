<?php

namespace App\Http\Controllers;
use App\Models\ThuongHieu;
use App\Models\SanPham;
use Illuminate\Http\Request;

class ThuongHieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        return view('admincp.thuonghieu.index')->with(compact('thuonghieu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.thuonghieu.create');
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
            'brand_name' => 'required|unique:tbl_brand|max:255',
            'brand_slug' => 'required|unique:tbl_brand|max:255',
            'brand_desc' => 'required',
            'brand_status' => 'required',
            ],
            [
                'brand_name.unique' => 'Tên danh mục đã có xin điền tên khác',
                'brand_slug.unique' => 'Slug danh mục đã có xin điền tên khác',
                'brand_name.required' => 'Tên danh mục phải có',
                'brand_slug.required' => 'Slug danh mục phải có',
                'brand_desc.required' => 'Mô tả phải có',
                
            ]
        );
        $thuonghieu = new ThuongHieu();

        $thuonghieu->brand_name = $data['brand_name'];
        $thuonghieu->brand_slug = $data['brand_slug'];
        $thuonghieu->brand_description = $data['brand_desc'];
        $thuonghieu->brand_status = $data['brand_status'];

        $thuonghieu->save();

        return redirect()->back()->with('message','Thêm thương hiệu thành công!');
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
        $thuonghieu = ThuongHieu::find($id);
        return view('admincp.thuonghieu.edit')->with(compact('thuonghieu'));
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
            'brand_name' => 'required|max:255',
            'brand_slug' => 'required|max:255',
            'brand_desc' => 'required',
            'brand_status' => 'required',
            ],
            [
                'brand_name.required' => 'Tên danh mục phải có',
                'brand_slug.required' => 'Slug danh mục phải có',
                'brand_desc.required' => 'Mô tả phải có',
                
            ]
        );
        $thuonghieu = ThuongHieu::find($id);

        $thuonghieu->brand_name = $data['brand_name'];
        $thuonghieu->brand_slug = $data['brand_slug'];
        $thuonghieu->brand_description = $data['brand_desc'];
        $thuonghieu->brand_status = $data['brand_status'];

        $thuonghieu->save();

        return redirect()->back()->with('message','Cập nhật thương hiệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = SanPham::where('brand_id',$id)->first();
        if($sanpham!=null){
            return redirect()->back()->with('message','Thương hiệu này đã có sản phẩm không được xóa!');
        }else{
            ThuongHieu::find($id)->delete();
            return redirect()->back()->with('message','Xóa thương hiệu thành công!');
        }
        
    }
  
}
