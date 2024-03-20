<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $best = Product::where('qty_out', '>=', 5)->take(4)->get();
        $data = Product::orderBy('created_at', 'desc')->take(4)->get();
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.page.home', [
            'title' => 'Home',
            'data' => $data,
            'best' => $best,
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addToCart(Request $request)
    {
        $idProduct = $request->input('productId');

        $db = new Cart;

        $product = Product::find($idProduct);

        $fields = [
            'product_id' => $product->id,
            'user_id' => 'guest123',
            'qty' => 1,
            'price' => $product->price,
        ];

        $db->create($fields);
        Alert::toast('Product added to cart!', 'success');
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
