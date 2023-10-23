<?php

namespace App\Http\Controllers\Backend;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;

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
        $item = Item::create([
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'quantity' => 1,
            'sicoin_gl' => $request->sicoin_gl,
            'unit_value' => $request->unit_value,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);
        $item->generateQR();

        $notification = array(
            'message' => __(':model-insert-success', ['model' => __('item')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.item')->with('notification', $notification);
    }

    public function UpdateItem(UpdateItemRequest $request)
    {
        $id = $request->id;

        $item = Item::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'sicoin_gl' => $request->sicoin_gl,
            'unit_value' => $request->unit_value,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);
        $item->generateQR();

        $notification = array(
            'message' => __(':model-update-success', ['model' => __('item')]),
            'alert-type' => 'success'
        );

        return redirect()->route('edit.item', $id)->with('notification', $notification);
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

    public function DownloadItemQr($id)
    {
        $item = Item::findOrFail($id);

        return response()->download(public_path($item->getQRPath()));
    }
}
