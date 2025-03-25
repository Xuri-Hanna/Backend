<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\KhachHang;
use App\Models\Discount;
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
    $validatedData = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'sdt' => 'required|string',
        'dia_chi' => 'required|string',
        'service_id' => 'required|integer',
        'service_type' => 'required|string',
        'total_price' => 'required|numeric',
        'status' => 'required|string',
        'duration_months' => 'required|integer',
        'discount_code' => 'nullable|string',
    ]);

    // Kiểm tra mã giảm giá
    $discount = Discount::where('id', $request->discount_code)->first();

    $order = new Order([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'sdt' => $validatedData['sdt'],
        'dia_chi' => $validatedData['dia_chi'],
        'service_id' => $validatedData['service_id'],
        'service_type' => $validatedData['service_type'],
        'total_price' => $validatedData['total_price'],
        'status' => $validatedData['status'],
        'duration_months' => $validatedData['duration_months'],
        'discount_id' => $discount ? $discount->id : null, // Nếu không có, đặt null
    ]);

    $order->save();

    return response()->json(['message' => 'Đơn hàng đã được tạo thành công'], 201);
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
            'service_id'   => 'sometimes|integer',
            'service_type' => 'sometimes|string|max:255',
            'total_price'  => 'sometimes|numeric|min:0',
            'discount_id'  => 'sometimes|nullable|exists:discounts,id',
            'status'       => 'sometimes|in:pending,paid,cancelled',
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
    public function updateStatus(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Không tìm thấy đơn hàng'], 404);
        }

        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,paid,cancelled'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Nếu trạng thái mới là "paid" thì kiểm tra hoặc tạo tài khoản khách hàng
        if ($request->status === 'paid') {
            $existingCustomer = KhachHang::where('email', $order->email)->first();

            if (!$existingCustomer) {

                // Thêm khách hàng mới vào bảng `khach_hangs`
                $khachHang = KhachHang::create([
                    'name'     => $order->name,
                    'email'    => $order->email,
                    'dia_chi'  => $order->dia_chi,
                    'sdt'      => $order->sdt,
                ]);

                // 📨 (Tuỳ chọn) Gửi email thông báo mật khẩu cho khách hàng
                // Mail::to($order->email)->send(new WelcomeCustomerMail($order->email, $randomPassword));
            }
        }

        // Cập nhật trạng thái đơn hàng
        $order->update(['status' => $request->status]);

        return response()->json([
            'message' => 'Cập nhật trạng thái thành công',
            'data'    => $order
        ], 200);
    }

}
