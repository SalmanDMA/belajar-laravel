<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        // return view('pelanggan.page.home', ['title' => 'Home']);
    }
    public function shop()
    {
        $data = Product::paginate(6);
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.page.shop', [
            'title' => 'Shop',
            'data' => $data,
            'count' => $count
        ]);
    }
    public function transaksi()
    {
        $carts = Cart::with('product')->where(['user_id' => 'guest123', 'status' => 0])->get();
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        return view(
            'pelanggan.page.transaksi',
            [
                'title' => 'Transaksi',
                'count' => $count,
                'data' => $carts,
            ]
        );
    }
    public function contact()
    {
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        return view('pelanggan.page.contact', [
            'title' => 'Contact Us',
            'count' => $count,
        ]);
    }
    public function checkout()
    {
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        $code = Transaction::count();
        $codeTransaction = date('Ymd') . $code + 1;
        $detailBelanja = DetailTransaction::where(['transaction_id' => $codeTransaction, 'status' => 0])->sum('price');
        $jumlahBelanja = DetailTransaction::where(['transaction_id' => $codeTransaction, 'status' => 0])->count('product_id');
        $qtyOrder = DetailTransaction::where(['transaction_id' => $codeTransaction, 'status' => 0])->sum('qty');
        return view('pelanggan.page.checkout', [
            'title' => 'Checkout',
            'count' => $count,
            'detailBelanja' => $detailBelanja,
            'jumlahBelanja' => $jumlahBelanja,
            'qtyOrder' => $qtyOrder,
            'codeTransaction' => $codeTransaction,
        ]);
    }

    public function prosesCheckout(Request $request, $id)
    {
        $findCart = Cart::find($id);
        $code = Transaction::count();
        $codeTransaction = date('Ymd') . $code + 1;
        $detailTransaction = new DetailTransaction();

        // Save detail transaction
        $fieldDetailTransaction = [
            'transaction_id' => $codeTransaction,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'price' => $request->price,
        ];
        $detailTransaction->create($fieldDetailTransaction);

        // update cart
        $fieldCart = [
            'qty' => $request->qty,
            'price' => $request->price,
            'status' => 1,
        ];
        $findCart->update($fieldCart);

        Alert::toast('Checkout Success', 'success');
        return redirect()->route('checkout');
    }

    public function prosesPembayaran(Request $request)
    {
        $dbTransaction = new Transaction();
        $fieldTransaction = [
            'code_transaction' => $request->code_transaction,
            'total_qty' => $request->totalQty,
            'total_price' => $request->total,
            'name_customer' => $request->recipient_name,
            'address' => $request->recipient_address,
            'phone' => $request->recipient_phone,
            'expedition' => $request->expedition,
        ];

        $dbTransaction->create($fieldTransaction);

        $dbDetailTransaction = DetailTransaction::where('transaction_id', $request->code_transaction)->get();
        foreach ($dbDetailTransaction as $value) {
            $dataUp = DetailTransaction::where('id', $value->id)->first();
            $dataUp->status = 1;
            $dataUp->save();

            $idProduct = Product::where('id', $value->product_id)->first();
            $idProduct->qty = $idProduct->qty - $value->qty;
            $idProduct->qty_out = $idProduct->qty_out + $value->qty;
            $idProduct->save();
        }

        Alert::alert()->success('Transaction Success', 'Please Wait Your Product');
        return redirect()->route('home');




        dd($fieldTransaction);
    }

    public function keranjang()
    {
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        $allTransaction = Transaction::all();
        return view('pelanggan.page.keranjang', [
            'title' => 'Keranjang',
            'name' => 'Keranjang',
            'count' => $count,
            'allTransaction' => $allTransaction
        ]);
    }

    public function keranjangBayar($id)
    {
        $find_data = Transaction::find($id);
        $count = Cart::where(['user_id' => 'guest123', 'status' => 0])->count();
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $find_data->code_transaction,
                'gross_amount' => $find_data->total_price,
            ),
            'customer_details' => array(
                'first_name' => 'Mr',
                'last_name' => $find_data->name_customer,
                // 'email' => 'budi.pra@example.com',
                'phone' => $find_data->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);die;
        return view('pelanggan.page.detailTransaksi', [
            'name' => 'Detail Transaksi',
            'title' => 'Detail Transaksi',
            'count' => $count,
            'token' => $snapToken,
            'data' => $find_data,
        ]);
    }

    public function admin()
    {
        $dummyCard = [
            ['icon' => 'inventory', 'number' => 100, 'footer' => 'Total Products'],
            ['icon' => 'shopping_cart', 'number' => 100, 'footer' => 'Total Transactions'],
            ['icon' => 'people', 'number' => 50, 'footer' => 'Total Employees'],
            ['icon' => 'account_balance_wallet', 'number' => 25, 'footer' => 'Total Income'],
        ];


        return view('admin.page.dashboard', [
            'title' => 'Admin Dashboard',
            'name' => 'Dashboard',
            'dummyCard' => $dummyCard,
        ]);
    }

    public function report()
    {
        return view('admin.page.report', [
            'title' => 'Admin Report',
            'name' => 'Report',
        ]);
    }

    public function login()
    {
        return view('admin.page.login', [
            'title' => 'Admin Login',
            'name' => 'Login to Toko Online Kita',
        ]);
    }

    public function loginProses(Request $request)
    {
        Session::flash('error', $request->email);
        $dataLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = new User();
        $proses = $user->where('email', $request->email)->first();

        if ($proses->is_admin === 0) {
            Session::flash('error', 'You are not admin');
            return back();
        } else {
            if (Auth::attempt($dataLogin)) {
                Alert::toast('Login Success', 'success');
                Session::flash('success', 'Login Success');
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            } else {
                Session::flash('error', 'Wrong email or password');
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout Success!');
    }
}
