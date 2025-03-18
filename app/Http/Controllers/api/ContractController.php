<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Validator;

class ContractController extends Controller
{
    /**
     * Lấy danh sách tất cả hợp đồng.
     */
    public function index()
    {
        return response()->json(Contract::all(), 200);
    }

    /**
     * Thêm mới một hợp đồng.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'      => 'required|exists:khach_hangs,id',
            'order_id'     => 'required|exists:orders,id',
            'service_type' => 'required|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after:start_date',
            'status'       => 'required|in:active,expired,pending'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $contract = Contract::create($request->all());

        return response()->json([
            'message' => 'Hợp đồng được tạo thành công',
            'data'    => $contract
        ], 201);
    }

    /**
     * Hiển thị chi tiết hợp đồng theo ID.
     */
    public function show(string $id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Không tìm thấy hợp đồng'], 404);
        }

        return response()->json($contract, 200);
    }

    /**
     * Cập nhật thông tin hợp đồng.
     */
    public function update(Request $request, string $id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Không tìm thấy hợp đồng'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'      => 'sometimes|exists:khach_hangs,id',
            'order_id'     => 'sometimes|exists:orders,id',
            'service_type' => 'sometimes|string|max:255',
            'start_date'   => 'sometimes|date',
            'end_date'     => 'sometimes|date|after:start_date',
            'status'       => 'sometimes|in:active,expired,pending'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $contract->update($request->all());

        return response()->json([
            'message' => 'Cập nhật hợp đồng thành công',
            'data'    => $contract
        ], 200);
    }

    /**
     * Xóa hợp đồng theo ID.
     */
    public function destroy(string $id)
    {
        $contract = Contract::find($id);

        if (!$contract) {
            return response()->json(['message' => 'Không tìm thấy hợp đồng'], 404);
        }

        $contract->delete();

        return response()->json(['message' => 'Xóa hợp đồng thành công'], 200);
    }
}
