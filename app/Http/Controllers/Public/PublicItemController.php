<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DetailResponsibilitySheet;
use App\Models\Item;
use App\Models\ResponsibilitySheet;
use App\Models\User;
use Illuminate\Http\Request;

class PublicItemController extends Controller
{
    public function ViewItem($id)
    {
        $item = Item::findOrFail($id);
        $item->load('sheetsdetail');
        $users = User::all();
        $responsibility_sheets = ResponsibilitySheet::all();

        return view('public.item.view_item', compact('item', 'users', 'responsibility_sheets'));
    }
}
