<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\profiles;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request){
        $this->validate($request, profiles::$rules);
        
        $Profiles = new profiles;
        $form = $request->all();
        
        unset($form['_token']);
        unset($form['image']);
        
        $Profiles->fill($form);
        $Profiles->save();
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
}