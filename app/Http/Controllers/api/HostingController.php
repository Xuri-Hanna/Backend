<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HostingProduct;
use Illuminate\Support\Facades\Validator;

class HostingController extends Controller
{
    /**
     * Lấy danh sách tất cả hosting.
     */
    public function index()
    {
        return response()->json(HostingProduct::all(), 200);
    }

    /**
     * Lấy tên dựa trên id
     */
    public function getHostingProducts()
    {
        return response()->json(HostingProduct::select('id', 'plan', 'price')->get(), 200);
    }


    /**
     * Thêm mới một hosting.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'plan'          => 'required|string|max:50',
            'price'         => 'required',
            'disk_space'    => 'required|string|max:50',
            'bandwidth'     => 'required|string|max:50',
            'accounts_ftp'  => 'required|integer',
            'addon_domains' => 'required|integer',
            'sub_domains'   => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Tạo hosting mới
        $hosting = HostingProduct::create($request->all());

        return response()->json(['message' => 'Hosting created successfully', 'data' => $hosting], 201);
    }

    /**
     * Hiển thị chi tiết một hosting theo ID.
     */
    public function show(string $id)
    {
        $hosting = HostingProduct::find($id);

        if (!$hosting) {
            return response()->json(['message' => 'Hosting not found'], 404);
        }

        return response()->json($hosting, 200);
    }

    /**
     * Cập nhật thông tin hosting.
     */
    public function update(Request $request, string $id)
    {
        $hosting = HostingProduct::find($id);

        if (!$hosting) {
            return response()->json(['message' => 'Hosting not found'], 404);
        }

        // Validate dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'plan'          => 'sometimes|string|max:50',
            'disk_space'    => 'sometimes|string|max:50',
            'bandwidth'     => 'sometimes|string|max:50',
            'accounts_ftp'  => 'sometimes|integer',
            'addon_domains' => 'sometimes|integer',
            'sub_domains'   => 'sometimes|integer',
            'price'         => 'sometimes',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Cập nhật dữ liệu
        $hosting->update($request->all());

        return response()->json(['message' => 'Hosting updated successfully', 'data' => $hosting], 200);
    }

    /**
     * Xóa hosting theo ID.
     */
    public function destroy(string $id)
    {
        $hosting = HostingProduct::find($id);

        if (!$hosting) {
            return response()->json(['message' => 'Hosting not found'], 404);
        }

        $hosting->delete();

        return response()->json(['message' => 'Hosting deleted successfully'], 200);
    }
}
