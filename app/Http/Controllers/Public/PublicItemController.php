<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class PublicItemController extends Controller
{
    public function ViewItem($id)
    {
        $item = Item::findOrFail($id);

        return view('public.item.view_item', compact('item'));
    }
}
