<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use App\Models\Depanneur;
use App\Models\Metier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AuthController extends Controller
{
    public function RegisterPage() {
        return view('Auth.register');
    }

    public function Login() {
        return view('Auth.login');
    }



    public function RegisterForm(RegisterRequest $registerRequest) {
        $data = $registerRequest->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if($user){
            if($data['role'] == 'Client'){
                Client::create([
                    'user_id' => $user->id,
                ]);
            }
            elseif($data['role'] == 'Depanneur'){
                Depanneur::create([
                    'user_id' => $user->id,
                ]);
            }
        }

        session()->flash('status', 'Registration completed successfully.');
        return redirect()->route('login');
    }


    public function LoginForm(LoginRequest $loginRequest) {
        $data = $loginRequest->validated();

        $user = User::where('email' , $loginRequest->email)->first();

        if($user && password_verify($loginRequest->password , $user->password)){
            Auth::login($user);
           return redirect()->route('HOME');
        }


        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials.']);
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }



    public function profile () {
        $user = User::where('id' , Auth::id())->with(['image' , 'client', 'depanneur.metiers'])->first();
        $metiers = Metier::get();
        if($user->image) {
            $imageData = $user->image->image;
            $base64Image = base64_encode($imageData);
            $user->image->base64 = $base64Image;
        }
            return view ('Auth.profile' , compact('user' , 'metiers'));
    }


}
