<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    
    
    
    /**
     * Function dashboard
     * This method is used for show dashboard page after successfully login
     * 
     * @access public
     * @return dashboard blade view page
     *
     * @last-modified 08/12/18
     */
    public function dashboard(){
        return view('admin/dashboard');
    }
    
    /**
     * Function changePassword
     * This method is used for change admin password
     * 
     * @access public
     * @return change password blade view page
     *
     * @last-modified 08/12/18
     */
    public function changePassword(){
        return view('admin/changePassword');
    }
    
    /**
     * Function updatePassword
     * This method is used for update  password
     * 
     * @access public
     * @return update action status
     *
     * @last-modified 08/12/18
     */
    public function updatePassword(Request $request){
        $niceName =[
            'oldword' => 'Current Password',
            'newword' => 'New Password',
            'newword_confirmation' => 'Re-type password',
        ];
        $rules = [
            'oldword' => 'required',
            'newword' => 'required|min:4|confirmed',
            'newword_confirmation' => 'required',
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'min' => 'Password must be 4 char',
        ];
        $this->validate($request, $rules, $customMessages,$niceName);
        $errors = [];
        //checking current password incorrect or correct
        $profile = Auth::guard('admin')->user();
        if (!Hash::check(Input::get('oldword'), $profile->password)) {
            $errors['oldword'] = "Currernt password incorrect";
        }
        //checking new password is same as old password
        if (Hash::check(Input::get('newword'), $profile->password)) {
            $errors['newword'] = "This password is already used before. Try with a different one";
        }
       //find erros & redirect back with error message
        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors)->with('errorArray', 'Array Error Occured');
        } else {
            //bcrypt passwrod 
            $profile->password = bcrypt(Input::get('oldword'));
            $profile->save();
            return back()->with('success', 'Password updated successfully');
        }
    }

    /**
     * Function updateProfile
     * This method is used for update profile information
     * 
     * @access public
     * @return 
     *
     * @last-modified 08/12/18
     */
    public function updateProfile(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => ['required',
                Rule::unique('admins')->ignore(Auth::guard('admin')->user()->id),'email'
            ],
        ]);

        $profile = Auth::guard('admin')->user();
        $profile->name = $request->get('name');
        $profile->email = $request->get('email');
        $profile->save();

        return back()->with('success', 'Profile updated successfully');
    }
    
    
    /**
     * Function profileView
     * This method is used for view profile information
     * 
     * @access public
     * @return profile view blade page
     *
     * @last-modified 08/12/18
     */
    public function profileView(){
        return view('admin/profile');
    }
}
