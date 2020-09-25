<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function index() {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('customer.index', compact('customers'));
    }
    //tambahkan fungsi create

    public function create() {
        return view('customer.create');
        //lalu kita buat viewnya
    }

    public function save(Request $request)
    {
    //VALIDASI DATA
    $this->validate($request, [
        'name' => 'required|string',
        'phone' => 'required|max:13', //maximum karakter 13 digit
        'address' => 'required|string',
        //unique berarti email ditable customers tidak boleh sama
        'email' => 'required|email|string|unique:customers,email' // format yag diterima harus email
    ]);

    try {
        $customer = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email
        ]);
        return redirect('/customer')->with(['success' => 'Data telah disimpan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|max:13',
            'address' => 'required|string',
            'email' => 'required|email|string|exists:customers,email'
        ]);

        try {
            $customer = Customer::find($id);
            $customer->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            return redirect('/customer')->with(['success' => 'Data telah diperbaharui']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
    $customer = Customer::find($id); //QUERY KEDATABASE UNTUK MENGAMBIL DATA BERDASARKAN ID
    $customer->delete(); // MENGHAPUS DATA YANG ADA DIDATABASE
    return redirect()->back()->with(['success' => '</strong>' . $customer->name . '</strong>Telah Dihapus']); // DIARAHKAN KEMBALI KEHALAMAN /product
    }
}
