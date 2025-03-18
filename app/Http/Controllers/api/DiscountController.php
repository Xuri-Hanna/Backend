<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    /**
     * Lấy danh sách tất cả mã giảm giá.
     */
    public function index()
    {
        return response()->json(Discount::all(), 200);
    }

    /**
     * Thêm mới một mã giảm giá.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'        => 'required|string|max:50|unique:discounts',
            'percentage'  => 'required|numeric|min:1|max:100',
            'expiry_date' => 'required|date|after:today'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $discount = Discount::create($request->all());

        return response()->json([
            'message' => 'Mã giảm giá được tạo thành công',
            'data'    => $discount
        ], 201);
    }

    /**
     * Hiển thị chi tiết mã giảm giá theo ID.
     */
    public function show(string $id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Không tìm thấy mã giảm giá'], 404);
        }

        return response()->json($discount, 200);
    }

    /**
     * Cập nhật thông tin mã giảm giá.
     */
    public function update(Request $request, string $id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Không tìm thấy mã giảm giá'], 404);
        }

        $validator = Validator::make($request->all(), [
            'code'        => 'sometimes|string|max:50|unique:discounts,code,' . $id,
            'percentage'  => 'sometimes|numeric|min:1|max:100',
            'expiry_date' => 'sometimes|date|after:today'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $discount->update($request->all());

        return response()->json([
            'message' => 'Cập nhật mã giảm giá thành công',
            'data'    => $discount
        ], 200);
    }

    /**
     * Xóa mã giảm giá theo ID.
     */
    public function destroy(string $id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Không tìm thấy mã giảm giá'], 404);
        }

        $discount->delete();

        return response()->json(['message' => 'Xóa mã giảm giá thành công'], 200);
    }
}
