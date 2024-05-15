<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ItemHistory;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ItemHistory::orderBy('created_at', 'desc')->get();

        return view('pages.history.index', [
            'items' => $items,
        ]);
    }
}
