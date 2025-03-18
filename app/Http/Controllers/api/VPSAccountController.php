<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VpsAccount;
use Illuminate\Support\Facades\Validator;

class VpsAccountController extends Controller
{
    /**
     * Lấy danh sách tất cả VPS accounts.
     */
    public function index()
    {
        return response()->json(VpsAccount::all(), 200);
    }

    /**
     * Thêm mới một VPS account.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vps_id'    => 'required|exists:vps_product,id',
            'ip_address' => 'required|ip',
            'username'  => 'required|string|max:255',
            'password'  => 'required|string|max:255',
            'os'        => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $vpsAccount = VpsAccount::create($request->all());

        return response()->json([
            'message' => 'VPS account created successfully',
            'data'    => $vpsAccount
        ], 201);
    }

    /**
     * Hiển thị chi tiết một VPS account theo ID.
     */
    public function show(string $id)
    {
        $vpsAccount = VpsAccount::find($id);

        if (!$vpsAccount) {
            return response()->json(['message' => 'Không tìm thấy VPS account'], 404);
        }

        return response()->json($vpsAccount, 200);
    }

    /**
     * Cập nhật thông tin VPS account.
     */
    public function update(Request $request, string $id)
    {
        $vpsAccount = VpsAccount::find($id);

        if (!$vpsAccount) {
            return response()->json(['message' => 'Không tìm thấy VPS account'], 404);
        }

        $validator = Validator::make($request->all(), [
            'vps_id'    => 'sometimes|exists:vps_product,id',
            'ip_address' => 'sometimes|ip',
            'username'  => 'sometimes|string|max:255',
            'password'  => 'sometimes|string|max:255',
            'os'        => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $vpsAccount->update($request->all());

        return response()->json([
            'message' => 'Cập nhật VPS account thành công',
            'data'    => $vpsAccount
        ], 200);
    }

    /**
     * Xóa VPS account theo ID.
     */
    public function destroy(string $id)
    {
        $vpsAccount = VpsAccount::find($id);

        if (!$vpsAccount) {
            return response()->json(['message' => 'Không tìm thấy VPS account'], 404);
        }

        $vpsAccount->delete();

        return response()->json(['message' => 'Xóa VPS account thành công'], 200);
    }
}
