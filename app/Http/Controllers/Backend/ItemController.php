<?php

namespace App\Http\Controllers\Backend;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function AllItem()
    {
        $items = Item::all();

        return view('backend.item.all_item', compact('items'));
    }

    /** =============== NUEVO ITEM =============== */
    public function AddItem()
    {
        return view('backend.item.add_item');
    } // End Method 

    /** =============== NUEVO ITEM =============== */
    public function StoreItem(Request $request)
    {
        $request->validate(['name' => ['required', 'string', 'max:50'],]);

        Item::insert([
            'nombre' => $request->name,
        ]);

        $notification = array(
            'message' => 'user Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with($notification);
    }

    /** =============== EDICIÓN DE ITEM =============== */
    public function Edituser($id)
    {
        $item = Item::findOrFail($id);
        return view('backend.item.edit_item', compact('item'));
    }

    public function Updateuser(Request $request)
    {
        $item_id = $request->id;

        Item::findOrFail($item_id)->update([
            'nombre' => $request->name
        ]);

        $notification = array(
            'message' => 'item Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.item')->with($notification);
    } // End Method 
}
