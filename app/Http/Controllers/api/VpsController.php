<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VPSProduct;
use Illuminate\Support\Facades\Validator;

class VPSController extends Controller
{
    /**
     * Lấy danh sách tất cả VPS.
     */
    public function index()
    {
        return response()->json(VPSProduct::all(), 200);
    }
    public function getVpsProducts()
    {
        return response()->json(VPSProduct::select('id', 'plan')->get(), 200);
    }

    /**
     * Thêm mới một VPS.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'plan'      => 'required|string|max:50',
            'cpu'       => 'required|string|max:50',
            'ram'       => 'required|string|max:50',
            'storage'   => 'required|string|max:50',
            'bandwidth' => 'required|string|max:50',
            'os'        => 'required|string|max:50',
            'price'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Tạo VPS mới
        $vps = VPSProduct::create($request->all());

        return response()->json(['message' => 'VPS created successfully', 'data' => $vps], 201);
    }

    /**
     * Hiển thị chi tiết một VPS theo ID.
     */
    public function show(string $id)
    {
        $vps = VPSProduct::find($id);

        if (!$vps) {
            return response()->json(['message' => 'VPS not found'], 404);
        }

        return response()->json($vps, 200);
    }

    /**
     * Cập nhật thông tin VPS.
     */
    public function update(Request $request, string $id)
    {
        $vps = VPSProduct::find($id);

        if (!$vps) {
            return response()->json(['message' => 'VPS not found'], 404);
        }

        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'plan'      => 'sometimes|string|max:50',
            'cpu'       => 'sometimes|string|max:50',
            'ram'       => 'sometimes|string|max:50',
            'storage'   => 'sometimes|string|max:50',
            'bandwidth' => 'sometimes|string|max:50',
            'os'        => 'sometimes|string|max:50',
            'price'     => 'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Cập nhật dữ liệu
        $vps->update($request->all());

        return response()->json(['message' => 'VPS updated successfully', 'data' => $vps], 200);
    }

    /**
     * Xóa VPS theo ID.
     */
    public function destroy(string $id)
    {
        $vps = VPSProduct::find($id);

        if (!$vps) {
            return response()->json(['message' => 'VPS not found'], 404);
        }

        $vps->delete();

        return response()->json(['message' => 'VPS deleted successfully'], 200);
    }
}
