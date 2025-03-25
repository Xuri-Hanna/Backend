<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    /**
     * Lấy danh sách tất cả khách hàng.
     */
    public function index()
    {
        return response()->json(KhachHang::all(), 200);
    }

    /**
     * Thêm mới một khách hàng.
     */
    public function checkCustomer(Request $request) {
        $exists = KhachHang::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:khach_hang,email',
            'dia_chi'  => 'nullable|string|max:255',
            'sdt'      => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Mã hóa mật khẩu trước khi lưu
        $data = $request->all();
        $khachHang = KhachHang::create($data);

        return response()->json([
            'message' => 'Khách hàng được tạo thành công',
            'data'    => $khachHang
        ], 201);
    }

    /**
     * Hiển thị chi tiết khách hàng theo ID.
     */
    public function show(string $id)
    {
        $khachHang = KhachHang::find($id);

        if (!$khachHang) {
            return response()->json(['message' => 'Không tìm thấy khách hàng'], 404);
        }

        return response()->json($khachHang, 200);
    }

    /**
     * Cập nhật thông tin khách hàng.
     */
    public function update(Request $request, string $id)
    {
        $khachHang = KhachHang::find($id);

        if (!$khachHang) {
            return response()->json(['message' => 'Không tìm thấy khách hàng'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'     => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:khach_hang,email,' . $id,
            'dia_chi'  => 'sometimes|string|max:255',
            'sdt'      => 'sometimes|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $data = $request->all();
        $khachHang->update($data);

        return response()->json([
            'message' => 'Cập nhật khách hàng thành công',
            'data'    => $khachHang
        ], 200);
    }

    /**
     * Xóa khách hàng theo ID.
     */
    public function destroy(string $id)
    {
        $khachHang = KhachHang::find($id);

        if (!$khachHang) {
            return response()->json(['message' => 'Không tìm thấy khách hàng'], 404);
        }

        $khachHang->delete();

        return response()->json(['message' => 'Xóa khách hàng thành công'], 200);
    }
}
