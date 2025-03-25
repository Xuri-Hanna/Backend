<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Illuminate\Support\Facades\Validator;

class DiscountController extends Controller
{
    public function index()
    {
        return response()->json(Discount::all(), 200);
    }
    public function findById($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Không tìm thấy mã giảm giá'], 404);
        }

        return response()->json([
            'id' => $discount->id,
            'percentage' => $discount->percentage
        ], 200);
    }
    public function show($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Mã giảm giá không hợp lệ'], 404);
        }

        return response()->json($discount);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'percentage'  => 'required|numeric|min:1|max:100',
            'expiry_date' => 'required|date|',
            'discount_type' => 'required|in:manual,vip'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $id = Discount::generateId($request->discount_type); // Tạo id tự động theo loại

        $discount = Discount::create([
            'id' => $id,
            'percentage' => $request->percentage,
            'expiry_date' => $request->expiry_date,
            'discount_type' => $request->discount_type
        ]);

        return response()->json([
            'message' => 'Mã giảm giá được tạo thành công',
            'data'    => $discount
        ], 201);
    }


    public function update(Request $request, string $id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(['message' => 'Không tìm thấy mã giảm giá'], 404);
        }

        $validator = Validator::make($request->all(), [
            'percentage'  => 'sometimes|numeric|min:1|max:100',
            'expiry_date' => 'sometimes|date|',
            'discount_type' => 'sometimes|in:thường niên,khách vip'
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
