<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    function sach(Request $request)
    {
        $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
        if ($request->ajax()) {
            return view("partials.book_grid", compact("data"))->render();
        }
        return view("index", compact("data"));
    }

    function theloai(Request $request, $id)
    {
        $data = DB::select("select * from sach where the_loai = ?",[$id]);
        if ($request->ajax()) {
            return view("partials.book_grid", compact("data"))->render();
        }
        return view("index", compact("data"));
    }

    public function chitietsach($id) 
    {
        $sach = DB::table('sach')->where('id', $id)->first(); 
        return view('chitietsach', compact('sach'));
    }
}