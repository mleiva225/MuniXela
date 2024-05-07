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

    public function ViewDependence($id)
    {
        $dependence = Dependence::findOrFail($id);

        return view('backend.Dependence.view_Dependence', compact('dependence'));
    }

    public function AddDependence()
    {
        return view('backend.Dependence.add_dependence');
    }

    public function EditDependence($id)
    {
        $Dependence = Dependence::findOrFail($id);
        $Dependence->load('sheetsdetail');
        $users = User::all();
        $responsibility_sheets = ResponsibilitySheet::all();
        return view('backend.Dependence.edit_Dependence', compact('Dependence', 'users', 'responsibility_sheets'));
    }

    /** ============================== ACCIONES ============================== */

    public function StoreDependence(StoreDependenceRequest $request)
    {
        $Dependence = Dependence::create([
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'quantity' => 1,
            'sicoin_gl' => $request->sicoin_gl,
            'unit_value' => $request->unit_value,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);
        $Dependence->generateQR();

        $notification = array(
            'message' => __(':model-insert-success', ['model' => __('Dependence')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.Dependence')->with('notification', $notification);
    }

    public function UpdateDependence(UpdateDependenceRequest $request)
    {
        $id = $request->id;

        $Dependence = Dependence::findOrFail($id);

        $Dependence->update([
            'name' => $request->name,
            'code' => $request->code,
            'series' => $request->series,
            'sicoin_gl' => $request->sicoin_gl,
            'unit_value' => $request->unit_value,
            'description' => $request->description,
            'observations' => $request->observations,
        ]);

        $detailResponsibilitySheet = $Dependence->detail;

        $detailsheet = DetailResponsibilitySheet::findOrFail($detailResponsibilitySheet->id);
        $detailsheet->update([
            'id_responsibilitysheet' => $request->sheet_series,
        ]);


        $Dependence->generateQR();

        $notification = array(
            'message' => __(':model-update-success', ['model' => __('Dependence')]),
            'alert-type' => 'success'
        );

        return redirect()->route('edit.Dependence', $id)->with('notification', $notification);
    }

    public function DeleteDependence($id)
    {
        Dependence::findOrFail($id)->delete();

        $notification = array(
            'message' => __(':model-delete-success', ['model' => __('Dependence')]),
            'alert-type' => 'success'
        );

        return redirect()->route('all.Dependence')->with('notification', $notification);
    }

    public function DownloadDependenceQr($id)
    {
        $Dependence = Dependence::findOrFail($id);

        return response()->download(public_path($Dependence->getQRPath()));
    }
}
