<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBankTransfersRequest;
use App\Models\BankTransfers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankTransferController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'amount' => 'required|numeric',
            'country' => 'required|string',
            'swift_code' => 'required|string|unique:bank_transfers',
            'iban' => 'required|string|unique:bank_transfers',
            'account_number' => 'required|string|unique:bank_transfers',
            'account_holder_name' => 'required|string',
            'address_name' => 'required|string',
            'phone_number' => 'required|string|unique:bank_transfers',
            'seller_id' => 'required|exists:sellers,id',
        ]);
        BankTransfers::create([
            'amount'=> $request->amount,
            'country'=>$request->country,
            'swift_code'=>$request->swift_code,
            'iban'=>$request->iban,
            'account_number'=>$request->account_number,
            'account_holder_name'=>$request->account_holder_name,
            'address'=>$request->address_name,
            'phone_number'=>$request->phone_number,
            'seller_id'=>Auth::guard('seller')->user()->id
        ]);
        return redirect()->route('seller.editBusinessInformation',Auth::guard('seller')->user()->id)->with('success-bank','Bank Transfer Done Successfully');
    }
}
