<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stock::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = new Stock();
        $stock->stock = $request->stock;
        $stock->expiration = $request->expiration;
        $stock->product()->associate($request->productId);
        $stock->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $stock = Stock::findOrFail($request->id);
        $stock->stock = $request->stock;
        $stock->expiration = $request->expiration;
        $stock->product()->associate($request->productId);
        $stock->save();
        return $stock;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Stock::destroy($request->id);
    }


    public function userStocks(Request $request, $id)
    {
        $user = User::findOrFail($id);
        return $user->stocks;
    }
}
