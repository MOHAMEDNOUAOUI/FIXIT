<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\metier_user;
use App\Models\Sous_metier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function profileupdate(Request $request , $id)
    {   
            
            $requestData = $request->all();



            
            $rules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'Phone' => 'required|string|max:20',
            ];


            $imagedatavalidation = $request->validate([
                'profile' => 'image|mimes:jpeg,png,jpg,gif|max:20048',
            ]);
            

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $binaryData = file_get_contents($file);


                $userimage = images::where('user_id' , Auth::id())->first();

                if(isset($userimage)) {
                    $userimage->image = $binaryData;
                    $userimage->save();
                }
                else {
                    images::create([
                        'user_id' => Auth::id(),
                        'image' => $binaryData,
                    ]);

                }


            }





            if (array_key_exists('oldpassword', $requestData) && $requestData['oldpassword'] !== null) {
                $rules['oldpassword'] = 'required|string'; 
                $rules['newpassword'] = 'required|string|min:6|confirmed';
            }


            $validator = Validator::make($request->all(), $rules);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $user = User::where('id' , $id)->with('image',  'client' , 'depanneur')->first();


            if(isset($requestData['oldpassword']) && password_verify($requestData['oldpassword'] , $user->password)){

                if ($requestData['newpassword'] === $requestData['confirmpassword']) {
                    $user->password = bcrypt($requestData['newpassword']);
                    $user->save();
                } else {
                    return redirect()->back()->with('error', 'New password does not match confirmation password')->withInput();
                }

            }


            if(isset($requestData['metier'])) {

                    if(isset($user->depanneur)){

                        $metierdepanneur = metier_user::where('depanneur_id' , $user->depanneur->id)->first();

                        if(isset($metierdepanneur)){
                            if($metierdepanneur->metier_id != $requestData['metier']){
                                $metierdepanneur->metier_id = $requestData['metier'];

                                $metierdepanneur->save();
                            }
                        }
                        else{
                            metier_user::create([
                                'depanneur_id' => $user->depanneur->id,
                                'metier_id' => $requestData['metier'],
                            ]);
                        }

                            
                        }


            }










            $user->update($requestData);

            return redirect()->back()->with('success', 'Profile updated successfully');
            

    }



    public function searchBanned(Request $request)
    {
        $username = $request->input('username');
        
        $user = User::where('name', 'like', $username . '%')->get();

        return response()->json($user);
    }



}
