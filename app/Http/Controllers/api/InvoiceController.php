<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Validator;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\KhachHang;
use Barryvdh\DomPDF\Facade\Pdf;



class InvoiceController extends Controller
{
    /**
     * Lấy danh sách tất cả hóa đơn.
     */
    public function index()
    {
        return response()->json(Invoice::all(), 200);
    }

    /**
     * Thêm mới một hóa đơn.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id'       => 'required|exists:orders,id',
            'user_id'        => 'required|exists:khach_hang,id',
            'amount'         => 'required|numeric|min:0',
            'status'         => 'required||in:paid,unpaid,overdue',
            'payment_method' => 'nullable|string|max:255',
            'issued_at'      => 'required|date',
            'due_date'       => 'required|date|after_or_equal:issued_at',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $invoice = Invoice::create($request->all());

        return response()->json([
            'message' => 'Hóa đơn được tạo thành công',
            'data'    => $invoice
        ], 201);
    }

    /**
     * Hiển thị chi tiết hóa đơn theo ID.
     */
    public function show(string $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(['message' => 'Không tìm thấy hóa đơn'], 404);
        }

        return response()->json($invoice, 200);
    }

    /**
     * Cập nhật thông tin hóa đơn.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(['message' => 'Không tìm thấy hóa đơn'], 404);
        }

        $validator = Validator::make($request->all(), [
            'order_id'       => 'sometimes|exists:orders,id',
            'user_id'        => 'sometimes|exists:khach_hang,id',
            'amount'         => 'sometimes|numeric|min:0',
            'status'         => 'sometimes|in:paid,unpaid,overdue',
            'payment_method' => 'sometimes|max:255',
            'issued_at'      => 'sometimes|date',
            'due_date'       => 'sometimes|date|after_or_equal:issued_at',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $invoice->update($request->all());

        return response()->json([
            'message' => 'Cập nhật hóa đơn thành công',
            'data'    => $invoice
        ], 200);
    }

    /**
     * Xóa hóa đơn theo ID.
     */
    public function destroy(string $id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json(['message' => 'Không tìm thấy hóa đơn'], 404);
        }

        $invoice->delete();

        return response()->json(['message' => 'Xóa hóa đơn thành công'], 200);
    }

    public function sendEmail($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $customer = KhachHang::findOrFail($invoice->user_id);

        // Tạo file PDF
        $pdf = PDF::loadView('pdf.invoice', compact('invoice', 'customer'));
        $pdfPath = storage_path("app/public/invoices/invoice_{$invoice->id}.pdf");
        $pdf->save($pdfPath);

        // Gửi email
        Mail::to($customer->email)->send(new InvoiceMail($invoice, $pdfPath));

        return response()->json(['message' => 'Hóa đơn đã được gửi qua email!']);
    }
}
