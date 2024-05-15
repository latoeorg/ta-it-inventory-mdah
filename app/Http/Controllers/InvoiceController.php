<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SalesOrder;
use App\Models\SalesOrderItem;
use App\Models\Item;
use App\Models\ItemHistory;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = SalesOrder::where('status', 'DONE')->orderBy('created_at', 'desc')->get();

        return view('pages.invoice.index', [
            'items' => $items,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $salesOrder = SalesOrder::where('id', $id)->first();

        return view('pages.invoice.detail', [
            'salesOrder' => $salesOrder,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function print($id)
    {
        $salesOrder = SalesOrder::where('id', $id)->first();

        return view('pages.invoice.print', [
            'salesOrder' => $salesOrder,
        ]);
    }
}
