<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TheLoai;

class QuanLyTheLoaiController extends Controller
{
    public function index()
    {
        $theloais = TheLoai::orderBy('id', 'desc')->get();
        return view('theloai.index', compact('theloais'));
    }

    public function create()
    {
        return view('theloai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ten_the_loai' => 'required|string|max:255'
        ], [
            'ten_the_loai.required' => 'Vui lòng nhập tên thể loại',
            'ten_the_loai.max' => 'Tên thể loại không được vượt quá 255 ký tự'
        ]);

        TheLoai::create([
            'ten_the_loai' => $request->ten_the_loai
        ]);

        return redirect()->route('quan-ly-the-loai.index')->with('success', 'Thêm thể loại thành công!');
    }

    public function show(string $id)
    {
        // Not used in this scenario
    }

    public function edit(string $id)
    {
        $theloai = TheLoai::findOrFail($id);
        return view('theloai.edit', compact('theloai'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'ten_the_loai' => 'required|string|max:255'
        ], [
            'ten_the_loai.required' => 'Vui lòng nhập tên thể loại',
            'ten_the_loai.max' => 'Tên thể loại không được vượt quá 255 ký tự'
        ]);

        $theloai = TheLoai::findOrFail($id);
        $theloai->update([
            'ten_the_loai' => $request->ten_the_loai
        ]);

        return redirect()->route('quan-ly-the-loai.index')->with('success', 'Cập nhật thể loại thành công!');
    }

    public function destroy(string $id)
    {
        $theloai = TheLoai::findOrFail($id);
        $theloai->delete();

        return redirect()->route('quan-ly-the-loai.index')->with('success', 'Xóa thể loại thành công!');
    }
}
