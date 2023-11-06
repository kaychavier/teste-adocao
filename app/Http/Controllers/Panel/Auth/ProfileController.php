<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Auth\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Display the resource.
     */
    public function show()
    {
        return view('panel.auth.profile.show', ['user' => auth()->user()]);
    }

    /**
     * Update the resource in storage.
     */
    public function update(ProfileRequest $request)
    {
        $data = $request->validated();
        if ($data['password'] == null) {
            unset($data['password']);
        }
        auth()->user()->update($data);
        return redirect()->back()->with('success', 'Seus dados foram alterados com sucesso!');
    }
}
