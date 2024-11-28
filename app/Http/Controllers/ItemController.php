<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\ItemHistory;

use App\Models\PurchaseOrderItem;
use App\Models\SalesOrderItem;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_pcs = ['pcs', 'box', 'pack', 'set', 'dozen', 'meter', 'liter', 'gram', 'kilogram', 'ton', 'other'];
        $items = Item::all();

        return view('pages.item.index', [
            'list_pcs' => $list_pcs,

            'items' => $items,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $item = Item::find($id);
        $histories = ItemHistory::where('item_id', $id)->orderBy('created_at', 'desc')->get();

        return view('pages.item.show', [
            'item' => $item,
            'histories' => $histories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['stock'] = 0;

        Item::create($data);

        return redirect()->route('item.index')->with('success', 'Successfully added item');
    }

    /**
     * Update a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Item::find($id);
        $item->update($data);

        return redirect()->route('item.index')->with('success', 'Successfully edit item');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // check if item is used in purchase order
        $purchase_order_item = PurchaseOrderItem::where('item_id', $id)->first();
        if ($purchase_order_item) {
            return redirect()->route('item.index')->with('error', 'Item is used in purchase order');
        }

        // check if item is used in sales order
        $sales_order_item = SalesOrderItem::where('item_id', $id)->first();
        if ($sales_order_item) {
            return redirect()->route('item.index')->with('error', 'Item is used in sales order');
        }

        $item = Item::find($id);
        $item->delete();

        return redirect()->route('item.index')->with('success', 'Successfully delete item');
    }
}
