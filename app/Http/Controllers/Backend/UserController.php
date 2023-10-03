<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class UserController extends Controller
{

    public function mostrarFormulario()
    {
        $jsonFile = public_path('/guatemala.json'); // Ruta al archivo JSON, ajusta la ubicación según corresponda

        if (file_exists($jsonFile)) {
            $datosGuatemala = json_decode(file_get_contents($jsonFile), true);
        } else {
            // Manejar la situación si el archivo JSON no existe
            $datosGuatemala = [];
        }
        $user = User::latest()->get();

        return view('admin_profile_view', compact('datosGuatemala', 'usuario'));
    }


    public function AllUser()
    {
        $user = User::latest()->get();

        // Calcula la edad de cada usuario
        $currentYear = Carbon::now()->year;
        $user->each(function ($user) use ($currentYear) {
            $birthdate = Carbon::parse($user->birthdate);
            $user->age = $currentYear - $birthdate->year;
        });

        return view('backend.user.all_user', compact('user'));
    }

    public function Adduser()
    {
        $jsonFile = public_path('/guatemala.json'); // Ruta al archivo JSON, ajusta la ubicación según corresponda

        if (file_exists($jsonFile)) {
            $datosGuatemala = json_decode(file_get_contents($jsonFile), true);
        } else {
            // Manejar la situación si el archivo JSON no existe
            $datosGuatemala = [];
        }
        return view('backend.user.add_user', compact('datosGuatemala'));
    } // End Method 

    public function Storeuser(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => ['required', 'string', 'max:50'],
                'lastname' => ['required', 'string', 'max:50'],
                'phone' => ['required', 'string', 'max:20'],
                'email' => ['required', 'string', 'email', 'max:75', 'unique:' . User::class],
                'gender' => ['required', 'string', 'max:50'],
                'birthdate' => ['required', 'date', 'date_format:Y-m-d'],
                'ethnicity' => ['required', 'string', 'max:50'],
                'address' => ['required', 'string', 'max:50'],
                'state' => ['required', 'string', 'max:50'],
                'city' => ['required', 'string', 'max:50'],
            ]
        );

        $image = $request->file('image');
        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/admin_image/' . $name_gen);
            $save_url = $name_gen;
        } else {
            $save_url = null;
        }
        user::insert([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'ethnicity' => $request->ethnicity,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'photo' => $save_url,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'user Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.user')->with($notification);
    }

    public function Edituser($id)
    {

        $jsonFile = public_path('/guatemala.json'); // Ruta al archivo JSON, ajusta la ubicación según corresponda

        if (file_exists($jsonFile)) {
            $datosGuatemala = json_decode(file_get_contents($jsonFile), true);
        } else {
            // Manejar la situación si el archivo JSON no existe
            $datosGuatemala = [];
        }

        $user = user::findOrFail($id);
        return view('backend.user.edit_user', compact('datosGuatemala','user'));
    }

    public function Updateuser(Request $request)
    {
        $user_id = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/admin_image/' . $name_gen);
            $save_url = 'upload/user/' . $name_gen;
            user::findOrFail($user_id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'address' => $request->address,
                'ethnicity' => $request->ethnicity,
                'state' => $request->state,
                'city' => $request->city,
                'photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'user Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.user')->with($notification);
        } else {
            user::findOrFail($user_id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'ethnicity' => $request->ethnicity,
                'address' => $request->address,
                'state' => $request->state,
                'city' => $request->city,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'user Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.user')->with($notification);
        } // End else Condition  
    } // End Method 
    

    public function Deleteuser($id)
    {
        $user = User::latest()->get();
        $userCount = count($user);
        Log::error('El número de usuarios es: ' . $userCount);
        if ($userCount > 1) {

            $user_img = user::findOrFail($id);
            $img = public_path('upload/admin_image/' . $user_img->photo);
            if ($user_img->photo !=null || $user_img->photo !='') {

            unlink($img);

            }
            user::findOrFail($id)->delete();
            $notification = array(
                'message' => 'Usuario eliminado correctamente',
                'alert-type' => 'success'
            );
            return redirect()->route('all.user')->with($notification);
        } else {
            $notification = array(
                'message' => 'Solo queda un usuario no puede ser eliminado',
                'alert-type' => 'warning'
            );
            Session::flash('notification', $notification);
            return redirect()->route('all.user');
        }
    } // End Method

    public function Viewuser($id)
    {
        $user = user::findOrFail($id);
        return view('backend.user.view_user', compact('user'));
    } // End Method 

}
