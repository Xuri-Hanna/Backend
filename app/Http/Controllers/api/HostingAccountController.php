<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HostingAccount;
use Illuminate\Support\Facades\Validator;

class HostingAccountController extends Controller
{
    /**
     * Lấy danh sách tất cả hosting accounts.
     */
    public function index()
    {
        return response()->json(HostingAccount::all(), 200);
    }

    /**
     * Thêm mới một hosting account.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hosting_id'    => 'required|exists:hosting_product,id',
            'username'      => 'required|string|max:255',
            'password'      => 'required|string|max:255',
            'control_panel' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $hostingAccount = HostingAccount::create($request->all());

        return response()->json([
            'message' => 'Hosting account created successfully',
            'data'    => $hostingAccount
        ], 201);
    }

    /**
     * Hiển thị chi tiết một hosting account theo ID.
     */
    public function show(string $id)
    {
        $hostingAccount = HostingAccount::find($id);

        if (!$hostingAccount) {
            return response()->json(['message' => 'Không tìm thấy hosting account'], 404);
        }

        return response()->json($hostingAccount, 200);
    }

    /**
     * Cập nhật thông tin hosting account.
     */
    public function update(Request $request, string $id)
    {
        $hostingAccount = HostingAccount::find($id);

        if (!$hostingAccount) {
            return response()->json(['message' => 'Không tìm thấy hosting account'], 404);
        }

        $validator = Validator::make($request->all(), [
            'hosting_id'    => 'sometimes|exists:hosting_product,id',
            'username'      => 'sometimes|string|max:255',
            'password'      => 'sometimes|string|max:255',
            'control_panel' => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $hostingAccount->update($request->all());

        return response()->json([
            'message' => 'Cập nhật hosting account thành công',
            'data'    => $hostingAccount
        ], 200);
    }

    /**
     * Xóa hosting account theo ID.
     */
    public function destroy(string $id)
    {
        $hostingAccount = HostingAccount::find($id);

        if (!$hostingAccount) {
            return response()->json(['message' => 'Không tìm thấy hosting account'], 404);
        }

        $hostingAccount->delete();

        return response()->json(['message' => 'Xóa hosting account thành công'], 200);
    }
}
