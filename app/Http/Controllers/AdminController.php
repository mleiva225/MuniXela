<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Spatie\LaravelIgnition\Solutions\SolutionProviders\ViewNotFoundSolutionProvider;

class AdminController extends Controller
{
    public function Admindestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Cierre de sesion exitoso',
            'alert-type' => 'info'
        );

        return redirect('/logout')->with($notification);
    } // End Method 

    public function AdminLogoutPage()
    {
        return view('admin.admin_logout');
    } // End Method 

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        $jsonFile = public_path('/guatemala.json'); // Ruta al archivo JSON, ajusta la ubicación según corresponda
       

        if (file_exists($jsonFile)) {
            $datosGuatemala = json_decode(file_get_contents($jsonFile), true);
        } else {
            // Manejar la situación si el archivo JSON no existe
            $datosGuatemala = [];
        }
        return view('admin.admin_profile_view', compact('datosGuatemala', 'adminData'));
    } // End Method 
    
    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->lastname = $request->lastname;
        $data->birthdate = $request->birthdate;
        $data-> address = $request->address;
        $data-> state = $request->state;
        $data-> city = $request->city;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_image/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'), $filename);
            $data['photo'] = $filename;
        }

        if ($request->interruptor==null){

            $theme = "dark";
        }else{
            $theme = "light";
        }
        $data-> theme = $theme;


        $data->save();

        $notification = array(
            'message' => 'Perfil actualizado correctamente',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 

    public function ChangePassword()
    {
        return view('admin.change_password');
    } // End Method 

    public function UpdatePassword(Request $request)
    {

        /// Validation 
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',

        ]);

        /// Match The Old Password 
        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Dones not Match!!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        //// Update The New Password 

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    } // End Method 
}
