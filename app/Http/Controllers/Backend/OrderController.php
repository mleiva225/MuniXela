<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\ResponsibilitySheet;
use App\Models\DetailResponsibilitySheet;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;

class OrderController extends Controller

{
    public function FinalInvoice(Request $request)
    {
        $data = array();
        $data['id_responsible'] = $request->customer_id;
        $data['series'] = 'A' . $request->serie;
        $data['created_by'] = Auth::user()->id;;
        $data['created_at'] = Carbon::now();

        $order_id = ResponsibilitySheet::insertGetId($data);
        $contents = Cart::content();

        $pdata = array();
        foreach ($contents as $content) {
            $pdata['id_responsibilitysheet'] = $order_id;
            $pdata['id_item'] = $content->id;
            $pdata['quantity'] = 1;
            $data['created_at'] = now();
            $data['updated_at'] = now();

            $insert = DetailResponsibilitySheet::insert($pdata);
        } // end foreach

        $notification = array(
            'message' => 'Order Complete Successfully',
            'alert-type' => 'success'
        );

        Cart::destroy();

        return redirect()->route('all.responsibility')->with($notification);
    } // End Method
    

    public function OrderDetails($id){

        $order = ResponsibilitySheet::where('id',$id)->first();
        $order->load('responsibleUser');
        $order->load('Users');
        $orderItem = DetailResponsibilitySheet::where('id_responsibilitysheet',$id)->get();
        $orderItem->load('Items');
        
        return view('backend.order.order_details',compact('order','orderItem'));

    }// End Method

}