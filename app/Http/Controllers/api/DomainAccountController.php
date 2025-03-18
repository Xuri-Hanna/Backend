<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DomainAccount;
use Illuminate\Support\Facades\Validator;

class DomainAccountController extends Controller
{
    /**
     * Lấy danh sách tất cả domain accounts.
     */
    public function index()
    {
        return response()->json(DomainAccount::all(), 200);
    }

    /**
     * Thêm mới một domain account.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'domain_id'       => 'required|exists:domain_product,id',
            'registrar_panel' => 'required|string|max:255',
            'username'        => 'required|string|max:255',
            'password'        => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $domainAccount = DomainAccount::create($request->all());

        return response()->json([
            'message' => 'Domain account created successfully',
            'data'    => $domainAccount
        ], 201);
    }

    /**
     * Hiển thị chi tiết một domain account theo ID.
     */
    public function show(string $id)
    {
        $domainAccount = DomainAccount::find($id);

        if (!$domainAccount) {
            return response()->json(['message' => 'Không tìm thấy domain account'], 404);
        }

        return response()->json($domainAccount, 200);
    }

    /**
     * Cập nhật thông tin domain account.
     */
    public function update(Request $request, string $id)
    {
        $domainAccount = DomainAccount::find($id);

        if (!$domainAccount) {
            return response()->json(['message' => 'Không tìm thấy domain account'], 404);
        }

        $validator = Validator::make($request->all(), [
            'domain_id'       => 'sometimes|exists:domain_product,id',
            'registrar_panel' => 'sometimes|string|max:255',
            'username'        => 'sometimes|string|max:255',
            'password'        => 'sometimes|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $domainAccount->update($request->all());

        return response()->json([
            'message' => 'Cập nhật domain account thành công',
            'data'    => $domainAccount
        ], 200);
    }

    /**
     * Xóa domain account theo ID.
     */
    public function destroy(string $id)
    {
        $domainAccount = DomainAccount::find($id);

        if (!$domainAccount) {
            return response()->json(['message' => 'Không tìm thấy domain account'], 404);
        }

        $domainAccount->delete();

        return response()->json(['message' => 'Xóa domain account thành công'], 200);
    }
}
