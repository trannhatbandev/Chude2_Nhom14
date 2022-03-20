<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\MauSac;

class MauSacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mausac = MauSac::orderBy('color_id','DESC')->get();
        return view('admincp.mausac.index')->with(compact('mausac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.mausac.create');
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
            'color_name' => 'required|unique:tbl_color|max:255',
            'color_code' => 'required|unique:tbl_color|max:255',
            'color_status' => 'required',
            ],
            [
                'color_name.unique' => 'Tên danh mục đã có xin điền tên khác',
                'color_name.required' => 'Tên danh mục phải có',
                'color_code.unique' => 'Mã màu đã có xin điền mã màu khác',
                'color_code.required' => 'Tên mã màu phải có',
                
                
            ]
        );
        $color = new MauSac();

        $color->color_name = $data['color_name'];
        $color->color_code = $data['color_code'];
        $color->color_status = $data['color_status'];

        $color->save();

        return redirect()->back()->with('message','Thêm màu sắc thành công!');
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
        $mausac = MauSac::find($id);
        return view('admincp.mausac.edit')->with(compact('mausac'));
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
            'color_name' => 'required|max:255',
            'color_code' => 'required|max:255',
            'color_status' => 'required',
            ],
            [
                'color_name.required' => 'Tên danh mục phải có',
                'color_code.required' => 'Mã màu phải có',
                'color_desc.required' => 'Mô tả phải có',
                
            ]
        );
        $color = MauSac::find($id);

        $color->color_name = $data['color_name'];
        $color->color_code = $data['color_code'];
        $color->color_status = $data['color_status'];

        $color->save();

        return redirect()->back()->with('message','Cập nhật màu sắc thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        MauSac::find($id)->delete();
        return redirect()->back()->with('message','Xóa màu sắc thành công!');
    }
}
