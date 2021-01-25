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
        
        $Profiles->fill($form);
        $Profiles->save();
        return redirect('admin/profile/create');
    }

    public function edit(Request $request){
        $Profiles = profiles::find($request->id);
        if (empty($Profiles)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profiles_form' => $Profiles]);
    }

    public function update(Request $request)
    {
        $this->validate($request, profiles::$rules);
        
        $Profiles = profiles::find($request->id);
        
        $profiles_form = $request->all();
        
        unset($profiles_form['_token']);
        
        $Profiles->fill($profiles_form)->save();
        
        return redirect('admin/profile/create');
    }
    
}
