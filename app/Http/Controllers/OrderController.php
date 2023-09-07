<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi permintaan input sesuai kebutuhan
        $request->validate([
            'customer_id' => 'required',
            'customer_address_id' => 'required',
            'order_date' => 'required',
            // Validasi lainnya
        ]);

        // Simpan data transaksi ke dalam basis data
        $order = new Order($request->all());
        $order->save();

        // Simpan produk dan metode pembayaran terkait dengan transaksi
        $order->products()->createMany($request->input('products'));
        $order->paymentMethods()->createMany($request->input('payment_methods'));

        // Anda dapat mengembalikan respons JSON yang sesuai di sini
        return response()->json(['message' => 'Data transaksi berhasil dibuat'], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
