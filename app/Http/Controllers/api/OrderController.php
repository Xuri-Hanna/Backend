<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Lấy danh sách tất cả đơn hàng.
     */
    public function index()
    {
        return response()->json(Order::all(), 200);
    }

    /**
     * Thêm mới một đơn hàng.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'      => 'required|exists:khach_hangs,id',
            'service_id'   => 'required|integer',
            'service_type' => 'required|string|max:255',
            'total_price'  => 'required|numeric|min:0',
            'discount_id'  => 'nullable|exists:discounts,id',
            'status'       => 'required|in:pending,completed,canceled',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $order = Order::create($request->all());

        return response()->json([
            'message' => 'Đơn hàng được tạo thành công',
            'data'    => $order
        ], 201);
    }

    /**
     * Hiển thị chi tiết đơn hàng theo ID.
     */
    public function show(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        return response()->json($order, 200);
    }

    /**
     * Cập nhật thông tin đơn hàng.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'      => 'sometimes|exists:khach_hangs,id',
            'service_id'   => 'sometimes|integer',
            'service_type' => 'sometimes|string|max:255',
            'total_price'  => 'sometimes|numeric|min:0',
            'discount_id'  => 'sometimes|nullable|exists:discounts,id',
            'status'       => 'sometimes|in:pending,completed,canceled',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $order->update($request->all());

        return response()->json([
            'message' => 'Cập nhật đơn hàng thành công',
            'data'    => $order
        ], 200);
    }

    /**
     * Xóa đơn hàng theo ID.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Xóa đơn hàng thành công'], 200);
    }
}
