<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all account
        $account = Account::all();
        //return JSON response with the account
        return response()->json($account);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
        ]);

        $account = Account::create($validatedData);

        return response()->json($account, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        // return JSON response with the player
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
        ]);

        $account->update($validatedData);

        return response()->json($account, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $player)
    {
        $account->delete();

        return response()->json(null, 204);
    }

}
