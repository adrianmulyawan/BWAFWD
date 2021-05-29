<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use App\TravelPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // menampilkan halaman checkout beserta transaction, transaction_detail, travel_package, user
    public function index(Request $request, $id) {
        $item = Transaction::with(['transaction_details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.checkout', compact('item'));
    }

    // Membuat data / memasukan data kedalam table transaksi
    // statusmya masih didalam cart (IN CART)
    // Note: dijalankan pada saat menekan tombol Join Now (di detail)
    public function process(Request $request, $id) {
        // cari dulu / ambil id dari data travel packagenya berdasarkan id
        $travelPackage = TravelPackage::findOrFail($id);
        // buat transaksinya
        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            // id user yg sedang login
            'users_id'           => Auth::user()->id, 
            'additional_visa'    => 0,
            // menyesuaikan harga di price $travelPackage
            'transaction_total'  => $travelPackage->price,
            // kita set IN_CART
            'transaction_status' => 'IN_CART'
        ]);
        
        // Membuat 1 data (untuk user yang login/data sendiri) 
        // Tapi disini kita bisa menambahkan sendiri 
        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username'       => Auth::user()->username,
            'nationality'    => 'ID',
            'is_visa'        => false,
            'doe_passport'   => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }
    
    // menambahkan data user yang ingin di ajak travel
    public function create(Request $request, $detail_id) {
        // buat validasi
        $request->validate([
            'username'     => 'required|string|exists:users,username',
            'nationality'  => 'required|string',
            'is_visa'      => 'required|boolean',
            'doe_passport' => 'required'
        ]);
        
        // simpan semua data yang diinputkan user dan dimasukan kedalam transaction_detail
        $data = $request->all();
        $data['transactions_id'] = $detail_id;
        
        // kita create datanya
        TransactionDetail::create($data);

        // ambil data transaction
        $transaction = Transaction::with(['travel_package'])->find($detail_id);

        // update data (update total visa dan total transaksi)
        // pada saat menambahkan user harus bayar berapa
        if ($request->is_visa) {// jika menginputkan visa (30 days/true)
            $transaction->transaction_total += 1500000;
            $transaction->additional_visa += 1500000;
        }

        // tambahkan transaction_total dengan harga dari travel_package
        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $detail_id);
    }

    public function remove(Request $request, $detail_id) {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['transaction_details', 'travel_package'])->findOrFail($item->transactions_id);

        // update data (update total visa dan total transaksi)
        // pada saat menambahkan user harus bayar berapa
        if ($item->is_visa) {// jika menginputkan visa (30 days/true)
            $transaction->transaction_total -= 1500000;
            $transaction->additional_visa -= 1500000;
        }

        // tambahkan transaction_total dengan harga dari travel_package
        $transaction->transaction_total -= $transaction->travel_package->price;

        // simpan
        $transaction->save();

        // hapus itema
        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function success(Request $request, $id) {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';
        $transaction->save();
        return view('pages.success');
    }
}
