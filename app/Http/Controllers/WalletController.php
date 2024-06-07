<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Auth::user()->wallet->transactions;
        return view('pages.wallets.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.wallets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWalletRequest $request)
    {
        $request->validated();

        Wallet::create($request->all());

        return redirect()->route('wallets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wallet $wallet)
    {
        return view('pages.wallets.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWalletRequest $request, Wallet $wallet)
    {
        $request->validated();

        $wallet->balance += $request->balance;
        $wallet->save();

        Transaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->balance,
            'type' => 'deposit'
        ]);

        return redirect()->route('wallets.index')->with('success', 'Deposit successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        //
    }
}
