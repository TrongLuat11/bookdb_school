<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    function sach()
    {
        $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
        return view("index", compact("data"));
    }

    function theloai($id)
    {
        $data = DB::select("select * from sach where the_loai = ?",[$id]);
        return view("index", compact("data"));
    }

    public function chitietsach($id) 
    {
        $sach = DB::table('sach')->where('id', $id)->first(); 
        return view('chitietsach', compact('sach'));
    }
}