<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class BookController extends Controller
{
    public function order(): View
    {
        $cart = [];
        $data = collect();
        $quantity = [];

        if (session()->has('cart')) {
            $cart = session('cart');
            $bookIds = array_keys($cart);

            foreach ($cart as $id => $value) {
                $quantity[$id] = $value;
            }

            if (! empty($bookIds)) {
                $data = DB::table('sach')->whereIn('id', $bookIds)->get();
            }
        }

        return view('order', compact('quantity', 'data'));
    }

    public function cartadd(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
            'num' => ['required', 'numeric', 'min:1'],
        ]);

        $id = (int) $validated['id'];
        $num = (int) $validated['num'];
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id] += $num;
        } else {
            $cart[$id] = $num;
        }

        session()->put('cart', $cart);

        return response()->json(count($cart));
    }

    public function cartdelete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required', 'numeric'],
        ]);

        $id = (int) $request->id;
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('order');
    }

    public function ordercreate(Request $request): RedirectResponse
    {
        $request->validate([
            'hinh_thuc_thanh_toan' => ['required', 'numeric'],
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('order')->with('error', 'Giỏ hàng đang trống.');
        }

        if (
            ! Schema::hasTable('don_hang')
            || ! Schema::hasTable('chi_tiet_don_hang')
            || ! Schema::hasColumns('don_hang', [
                'ngay_dat_hang',
                'tinh_trang',
                'hinh_thuc_thanh_toan',
                'user_id',
            ])
            || ! Schema::hasColumns('chi_tiet_don_hang', [
                'ma_don_hang',
                'sach_id',
                'so_luong',
                'don_gia',
            ])
        ) {
            return redirect()->route('order')->with(
                'error',
                'Khong tim thay dung cau truc bang don_hang / chi_tiet_don_hang trong database.'
            );
        }

        $order = [
            'ngay_dat_hang' => DB::raw('now()'),
            'tinh_trang' => 1,
            'hinh_thuc_thanh_toan' => $request->hinh_thuc_thanh_toan,
            'user_id' => Auth::user()->id,
        ];

        DB::transaction(function () use ($order, $cart) {
            $idDonHang = DB::table('don_hang')->insertGetId($order);
            $bookIds = array_keys($cart);
            $data = DB::table('sach')->whereIn('id', $bookIds)->get();
            $detail = [];

            foreach ($data as $row) {
                $detail[] = [
                    'ma_don_hang' => $idDonHang,
                    'sach_id' => $row->id,
                    'so_luong' => $cart[$row->id] ?? 0,
                    'don_gia' => $row->gia_ban,
                ];
            }

            if (! empty($detail)) {
                DB::table('chi_tiet_don_hang')->insert($detail);
            }

            session()->forget('cart');
        });

        return redirect()->route('order')->with('status', 'Đặt hàng thành công.');
    }
}
