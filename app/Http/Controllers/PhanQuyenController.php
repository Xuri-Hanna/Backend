<?php
namespace App\Http\Controllers;

use App\Models\PhanQuyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function index()
    {
        $phanQuyen = PhanQuyen::with(['taikhoan', 'quyen'])->get();

        return response()->json($phanQuyen->map(function ($item) {
            return [
                'ma_phan_quyen' => $item->ma_phan_quyen,
                'ma_nhan_vien' => $item->ma_nhan_vien,
                'chuc_vu' => $item->taikhoan->chuc_vu ?? 'Không có',
                'ma_quyen' => $item->ma_quyen,
                'ten_quyen' => $item->quyen->ten_quyen ?? 'Không có',
            ];
        }));

    }

    public function store(Request $request)
    {
        $request->validate([
            'ma_nhan_vien' => 'required|exists:tai_khoan,ma_nhan_vien',
            'ma_quyen' => 'required|exists:quyen,ma_quyen'
        ]);
        $phanQuyen = PhanQuyen::create([
            'ma_nhan_vien' => $request->ma_nhan_vien,
            'ma_quyen' => $request->ma_quyen
        ]);

        return response()->json($phanQuyen, 201);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'ma_nhan_vien' => 'required|exists:tai_khoan,ma_nhan_vien',
            'ma_quyen' => 'required|exists:quyen,ma_quyen'
        ]);

        $phanQuyen = PhanQuyen::findOrFail($id);
        $phanQuyen->update([
            'ma_nhan_vien' => $request->ma_nhan_vien,
            'ma_quyen' => $request->ma_quyen
        ]);

        return response()->json($phanQuyen);
    }



    public function show($id)
    {
        return response()->json(PhanQuyen::findOrFail($id));
    }

    public function destroy($id)
    {
        PhanQuyen::destroy($id);
        return response()->json(null, 204);
    }
}
