<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $sysSetting = Setting::first();

        return view('admin/settings/show',compact('sysSetting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/settings/store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Setting $setting)
    {
       
       $request->validate([
            'name' => 'required|max:50',
            'title'=> 'max:100',
            'address'=> 'max:100',
            'logo' => 'image|mimes:jpeg,png,jpg|max:5120',
            'phone'=> 'numeric'
        ]);


        $data = $request->all();

        //if image upload store image & unlink previous image
        if($request->hasFile('logo')){

            $data['logo'] = $request->logo->store('admin/img');

        }

        $setting->create($data);
        

        return back()->with('success', 'System setting added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin/settings/edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //form validation
        $request->validate([
            'name' => 'required|max:50',
            'title'=> 'max:100',
            'address'=> 'max:100',
            'logo' => 'image|mimes:jpeg,png,jpg|max:5120',
            'phone'=> 'numeric'
        ]);

        $data = $request->all();
       
       //if image upload store image & unlink previous image
        if($request->hasFile('logo')){
            if(!is_null($setting->logo)){
                Storage::delete($setting->logo);
            }

            $data['logo'] = $request->logo->store('admin/img');
        }
        

        $setting->update($data);

        return back()->with('success', 'System setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
