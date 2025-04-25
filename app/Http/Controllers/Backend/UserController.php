<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    
   public function __construct()
   {
     $this->returnUrl = "/users";
   } 
 

    /**
     * Display a listing of the resource.
     
     */
    //dokümanda tek tırnak kullanımıtercih ediliyor(videoda bu şekilde idi).
    public function index()
    {
        $users=User::all();
        return view('backend.users.index',["users" =>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.insert_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $name=$request->get("name");
        $email=$request->get("email");
        $password=$request->get("password");
        $is_admin = $request->get('is_admin', 0);
        $is_active = $request->get('is_active', 0);

        //dd($name,$email,$password,$is_admin,$is_active);

        $user = new User();         // Yeni kullanıcı oluştur
        $user->name = $name;        // Adını ekle
        $user->email = $email;      // Email ekle
        $user->password = Hash::make($password); // Şifreyi güvenli şekilde ekle
        $user->is_admin = $is_admin; 
        $user->is_active = $is_active;

        $user->save();              // Veritabanına kaydet
        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     */
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.users.update_form',["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,User $user)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $is_admin = $request->get("is_admin", 0);
        $is_active = $request->get("is_active", 0);
    
       
        $user->name = $name;
        $user->email = $email;
        $user->is_admin = $is_admin;
        $user->is_active = $is_active;
    
        $user->save();
     
        return redirect($this->returnUrl);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
 
        $user->delete();
        //return redirect('/users');
        return response()->json(["message" => "Done", "id" =>$user->user_id]);
    }

    public function passwordForm(User $user)
    {
        return view('backend.users.password_form', ['user' => $user]);
    }

    public function changePassword(User $user, Request $request)
    {
        $password=$request->get("password");
        $user->password =Hash::make($password);
        $user->save();
        return Redirect::to($this->returnUrl);
    }
}
