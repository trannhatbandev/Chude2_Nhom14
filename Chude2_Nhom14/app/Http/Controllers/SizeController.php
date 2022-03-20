<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Size;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::orderBy('size_id','DESC')->get();
        return view('admincp.size.index')->with(compact('size'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.size.create');
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
            'size_name' => 'required|unique:tbl_size|max:255',
            'size_desc' => 'required',
            'size_status' => 'required',
            ],
            [
                'size_name.unique' => 'Tên danh mục đã có xin điền tên khác',
                'size_name.required' => 'Tên danh mục phải có',
                'size_desc.required' => 'Mô tả phải có',
                
            ]
        );
        $size = new Size();

        $size->size_name = $data['size_name'];
        $size->size_description = $data['size_desc'];
        $size->size_status = $data['size_status'];

        $size->save();

        return redirect()->back()->with('message','Thêm size thành công!');
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
        $size = Size::find($id);
        return view('admincp.size.edit')->with(compact('size'));
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
            'size_name' => 'required|max:255',
            'size_desc' => 'required',
            'size_status' => 'required',
            ],
            [
                'size_name.required' => 'Tên danh mục phải có',
                'size_desc.required' => 'Mô tả phải có',
                
            ]
        );
        $size = Size::find($id);

        $size->size_name = $data['size_name'];
        $size->size_description = $data['size_desc'];
        $size->size_status = $data['size_status'];

        $size->save();

        return redirect()->back()->with('message','Cập nhật size thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            Size::find($id)->delete();
            return redirect()->back()->with('message','Xóa size thành công!');
        
    }
}
