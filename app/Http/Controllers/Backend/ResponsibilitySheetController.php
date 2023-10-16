<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Responsibility\StoreSheetRequest;
use App\Models\ResponsibilitySheet;
use Illuminate\Http\Request;

class ResponsibilitySheetController extends Controller
{
    /** ============================== VISTAS ============================== */

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

        return view('backend.responsibility.edit_responsibility', compact('sheet'));
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
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'quantity' => $request->quantity,
            'sicoin_gl' => $request->sicoin_gl,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);

        $notification = array(
            'message' => __(':model-update-success', ['model' => __('responsibility')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.responsibility')->with('notification', $notification);
    }

    public function DeleteResponsibility($id)
    {
        ResponsibilitySheet::findOrFail($id)->delete();

        $notification = array(
            'message' => __(':model-delete-success', ['model' => __('responsibility')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.responsibility')->with('notification', $notification);
    }
}
