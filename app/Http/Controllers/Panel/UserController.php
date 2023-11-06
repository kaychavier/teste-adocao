<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->search(request()->all())->paginate();
        return view('panel.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User();
        return view('panel.user.form', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['is_superadmin'] = $request->has('is_superadmin');
        $data['is_active'] = $request->has('is_active');
        User::create($data);
        return redirect()->route('panel.user.index')->with('success', 'Registro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('panel.user.form', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['is_superadmin'] = $request->has('is_superadmin');
        $data['is_active'] = $request->has('is_active');
        if ($data['password'] == null) {
            unset($data['password']);
        }
        $user->update($data);
        return redirect()->route('panel.user.index')->with('success', 'Registro editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('panel.user.index')->with('success', 'Registro deletado com sucesso!');
    }
}
