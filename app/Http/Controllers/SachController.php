<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SachController extends Controller
{
    public function index()
    {
        $books = DB::table('sach')->get();
        return view('account.sach.index', compact('books'));
    }

    public function create()
    {
        $theloai = DB::table('theloai')->get();
        return view('account.sach.create', compact('theloai'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token', 'photo']);
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('hinh/image'), $filename);
            $data['file_anh_bia'] = $filename;
        }

        DB::table('sach')->insert($data);

        return redirect()->route('sach.index')->with('status', 'Thêm sách mới thành công');
    }

    public function edit($id)
    {
        $sach = DB::table('sach')->where('id', $id)->first();
        $theloai = DB::table('theloai')->get();
        return view('account.sach.edit', compact('sach', 'theloai'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method', 'photo']);
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('hinh/image'), $filename);
            $data['file_anh_bia'] = $filename;
        }

        DB::table('sach')->where('id', $id)->update($data);

        return redirect()->route('sach.index')->with('status', 'Cập nhật sách thành công');
    }

    public function destroy($id)
    {
        DB::table('sach')->where('id', $id)->delete();
        return redirect()->route('sach.index')->with('status', 'Xóa sách thành công');
    }
}
