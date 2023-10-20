<?php

namespace App\Http\Controllers\Backend;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreItemRequest;

class ItemController extends Controller
{
    /** ============================== VISTAS ============================== */

    public function AllItem()
    {
        $items = Item::all();

        return view('backend.item.all_item', compact('items'));
    }

    public function ViewItem($id)
    {
        $item = Item::findOrFail($id);

        return view('backend.item.view_item', compact('item'));
    }

    public function AddItem()
    {
        $fecha_actual = date('Y-m-d');

        return view('backend.item.add_item', compact('fecha_actual'));
    }

    public function EditItem($id)
    {
        $item = Item::findOrFail($id);
        return view('backend.item.edit_item', compact('item'));
    }

    /** ============================== ACCIONES ============================== */

    public function StoreItem(StoreItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'quantity' => $request->quantity,
            'sicoin_gl' => $request->sicoin_gl,
            'unit_value' => $request->unit_value,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);

        $notification = array(
            'message' => __(':model-insert-success', ['model' => __('item')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with('notification', $notification);
    }

    public function UpdateItem(StoreItemRequest $request)
    {
        $item_id = $request->id;

        Item::findOrFail($item_id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'quantity' => $request->quantity,
            'sicoin_gl' => $request->sicoin_gl,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);

        $notification = array(
            'message' => __(':model-update-success', ['model' => __('item')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with('notification', $notification);
    }

    public function DeleteItem($id)
    {
        Item::findOrFail($id)->delete();

        $notification = array(
            'message' => __(':model-delete-success', ['model' => __('item')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with('notification', $notification);
    }
}
