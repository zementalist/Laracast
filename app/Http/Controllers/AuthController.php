<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function showRegister() {
        return view("auth.register");
    }
    public function showLogin() {
        return view("auth.login");
    }

    public function register(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            "name" => ["required", "min:3", "max:30"],
            "email" => ["required", "email"],
            "password" => ["required", "confirmed"]
        ]);

        // $user = new User();
        // $user->name = $data["name"];
        // $user->email = $data["email"];
        // $user->password = bcrypt($data["password"]);

        // $user->save();
        $data["password"] = bcrypt($data["password"]);
        User::create($data);

        return redirect("/login")->with("message", "Account is created. Please Login");

        
    }

    public function login(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]
    );
        if(auth()->attempt($data)) {
            session()->regenerate();
            return redirect("/")->with("message", "Logged In Successfully");
        }
        
        return back()->withErrors(["email" => "Invalid Credentials"]);
    }

    public function logout() {
        auth()->logout();
        session()->regenerateToken();
        session()->invalidate();

        return redirect("/")->with("message", "Logged Out.");
    }

}
