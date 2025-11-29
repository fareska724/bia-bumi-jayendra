<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // list semua pesanan
    public function index()
    {
        $orders = Order::with(['customer', 'fleet'])
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // ➕ DETAIL
    public function show(Order $order)
    {
        $order->load(['customer', 'fleet']);

        return view('admin.orders.show', compact('order'));
    }

    // update status pesanan
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()
            ->route('admin.orders.show', $order)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
