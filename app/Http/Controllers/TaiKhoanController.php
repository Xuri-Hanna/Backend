<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TaiKhoanController extends Controller
{
    public function index()
{
    $taiKhoans = TaiKhoan::all(['ma_nhan_vien', 'hoten', 'email', 'password', 'chuc_vu', 'status']);

    // Chuyển đổi giá trị "active" -> "Kích hoạt", "none" -> "Khóa"
    $taiKhoans->transform(function ($user) {
        $user->status = $user->status === 'active' ? 'Kích hoạt' : 'Khóa';
        return $user;
    });

    return response()->json($taiKhoans);
}


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:tai_khoan,email',
            'password' => 'required',
            'chuc_vu' => 'required',
            'hoten' => 'required',
            'status' => 'in:active,none', // Chỉ cho phép "active" hoặc "none"
        ]);

        $user = TaiKhoan::create([
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status ?? 'active', // Mặc định là "active"
            'chuc_vu' => $request->chuc_vu,
            'hoten' => $request->hoten
        ]);

        return response()->json($user, 201);
    }


    public function show($id)
    {
        return response()->json(TaiKhoan::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'in:active,none',
        ]);

        $user = TaiKhoan::findOrFail($id);
        $user->update([
            'email' => $request->email,
            'password' => $request->password,
            'status' => $request->status,
            'chuc_vu' => $request->chuc_vu,
            'hoten' => $request->hoten
        ]);

        return response()->json($user);
    }


    public function destroy($id)
    {
        TaiKhoan::destroy($id);
        return response()->json(null, 204);
    }
}


