<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DomainProduct;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{
    /**
     * Lấy danh sách tất cả domain.
     */
    public function index()
    {
        return response()->json(DomainProduct::all(), 200);
    }
    public function getDomainProducts()
    {
        return response()->json(DomainProduct::select('id', 'domain_name', 'price')->get(), 200);
    }
    /**
     * Thêm mới một domain.
     */
    public function store(Request $request)
    {
        $request->validate([
            'domain_name' => 'required|string|max:255|unique:domain_product',
            'price_start' => 'required|integer',
            'price'       => 'required|integer',
            'domain_type' => 'required|in:international,vietnamese',
        ]);

        $domain = DomainProduct::create($request->all());

        return response()->json([
            'message' => 'Domain created successfully',
            'data' => $domain
        ], 201);
    }


    /**
     * Hiển thị chi tiết một domain theo ID.
     */
    public function show(string $id)
    {
        $domain = DomainProduct::find($id);

        if (!$domain) {
            return response()->json(['message' => 'Không tìm thấy domain'], 404);
        }

        return response()->json($domain, 200);
    }

    /**
     * Cập nhật thông tin domain.
     */
    public function update(Request $request, string $id)
    {
        $domain = DomainProduct::find($id);

        if (!$domain) {
            return response()->json(['message' => 'Không tìm thấy domain'], 404);
        }

        $validator = Validator::make($request->all(), [
            'domain_name' => 'sometimes|string|max:255|unique:domain_product,domain_name,' . $id,
            'price_start' => 'sometimes|integer',
            'price'       => 'sometimes|integer',
            'domain_type' => 'sometimes|in:international,vietnamese',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $domain->update($request->all());

        return response()->json(['message' => 'Cập nhật domain thành công', 'data' => $domain], 200);
    }

    /**
     * Xóa domain theo ID.
     */
    public function destroy(string $id)
    {
        $domain = DomainProduct::find($id);

        if (!$domain) {
            return response()->json(['message' => 'Không tìm thấy domain'], 404);
        }

        $domain->delete();

        return response()->json(['message' => 'Xóa domain thành công'], 200);
    }
}
