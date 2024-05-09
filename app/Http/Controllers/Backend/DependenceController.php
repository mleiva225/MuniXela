<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dependence;

class DependenceController extends Controller
{
    /** ============================== VISTAS ============================== */

    public function AllDependence()
    {
        $dependences = Dependence::all();

        return view('backend.dependence.all_dependence', compact('dependences'));
    }

    public function AddDependence()
    {
        return view('backend.dependence.add_dependence');
    }

    public function EditDependence($id)
    {
        $dependence = Dependence::findOrFail($id);
        return view('backend.dependence.edit_dependence', compact('dependence'));
    }

    /** ============================== ACCIONES ============================== */

    public function StoreDependence(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Dependence::create([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => __(':model-insert-success', ['model' => __('Dependence')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.dependence')->with('notification', $notification);
    }

    public function UpdateDependence(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $dependence = Dependence::findOrFail($request->id);

        $dependence->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => __(':model-update-success', ['model' => __('Dependence')]),
            'alert-type' => 'success'
        );

        return redirect()->route('edit.dependence', $request->id)->with('notification', $notification);
    }

    public function DeleteDependence($id)
    {
        Dependence::findOrFail($id)->delete();

        $notification = array(
            'message' => __(':model-delete-success', ['model' => __('Dependence')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.dependence')->with('notification', $notification);
    }
}
