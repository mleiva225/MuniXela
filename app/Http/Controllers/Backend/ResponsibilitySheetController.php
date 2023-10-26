<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use App\Http\Requests\Responsibility\StoreSheetRequest;
use App\Models\ResponsibilitySheet;
use App\Models\DetailResponsibilitySheet;
use App\Models\Product;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;

class ResponsibilitySheetController extends Controller
{
    /** ============================== VISTAS ============================== */

    //add_responsibility.blade.php

    public function Pos()
    {
        $item = Item::latest()->get();
        $user = User::latest()->get();
        return view('backend.responsibility.add_responsibility', compact('item', 'user'));
    } // End Method 

    public function AddCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'qty' => $request->qty,
            'price' => 1,
            'weight' => 20,
            'options' => ['size' => 'large']
        ]);
        $notification = array(
            'message' => 'Item Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method 

    public function AllItem()
    {
        $item_item = Cart::content();
        return view('backend.responsibility.text_item', compact('item_item'));
    } // End Method 

    public function CartUpdate(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);

        $notification = array(
            'message' => 'Cart Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method 

    public function CartRemove($rowId)
    {

        Cart::remove($rowId);

        $notification = array(
            'message' => 'Cart Remove Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function CreateInvoice(Request $request)
    {

        $contents = Cart::content();
        $cust_id = $request->user_id;
        $product_id = $contents->pluck('id')->toArray();
        $user = User::where('id', $cust_id)->first();
        $products = Item::whereIn('id', $product_id)->get();
        return view('backend.invoice.item_invoice', compact('contents', 'user', 'products'));
    } // End Method


    public function AllResponsibility()
    {
        $sheets = ResponsibilitySheet::all();

        return view('backend.responsibility.all_responsibility', compact('sheets'));
    }

    public function ViewResponsibility($id)
    {
        $sheet = ResponsibilitySheet::findOrFail($id);

        return view('backend.responsibility.view_responsibility', compact('sheet'));
    }

    public function AddResponsibility()
    {
        $date = date('Y-m-d');

        return view('backend.responsibility.add_responsibility', compact('date'));
    }

    public function EditResponsibility($id)
    {
        $sheet = ResponsibilitySheet::findOrFail($id);
        $sheet->load('responsibleUser');
        $users = User::all();

        return view('backend.responsibility.edit_responsibility', compact('sheet', 'users'));
    }


    /** ============================== ACCIONES ============================== */

    public function StoreResponsibility(StoreSheetRequest $request)
    {
        $sheet = ResponsibilitySheet::create([
            'series' => $request->series ?? 'linda serie',
            'lastname' => $request->lastname ?? 'Lasti name :3',
            'created_by' => auth()->id(),
            'id_responsible' => auth()->id(),
        ]);

        $notification = array(
            'message' => __('insert-success'),
            'alert-type' => 'success'
        );

        return redirect()->route('edit.responsibility', $sheet->id)->with('notification', $notification);
    }

    public function UpdateResponsibility(StoreSheetRequest $request)
    {
        $responsibility_id = $request->id;

        ResponsibilitySheet::findOrFail($responsibility_id)->update([
            'series' => $request->series,
            'id_responsible' => $request->id_responsible
        ]);

        $notification = array(
            'message' => __(':model-update-success', ['model' => __('responsibility')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.responsibility')->with('notification', $notification);
    }


    public function DeleteResponsibility($id)
    {
        DetailResponsibilitySheet::where('id_responsibilitysheet', $id)->delete();
    
        ResponsibilitySheet::findOrFail($id)->delete();
    
        $notification = array(
            'message' => __(':model-delete-success', ['model' => __('responsibility')]),
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.responsibility')->with('notification', $notification);
    }
}
