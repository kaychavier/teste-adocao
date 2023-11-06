<?php

namespace App\Http\Controllers\Panel\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class PasswordResetController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = DB::table('password_reset_tokens');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.auth.password-reset.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => [
                'required', 'email', Rule::exists('users')
                    ->whereNull('deleted_at')->where('is_active', true)
            ]
        ]);
        $token = Uuid::uuid4()->toString();
        $this->model->insert([
            'email' => $data['email'],
            'token' => $token,
            'created_at' => now()
        ]);
        Mail::to($data['email'])->send(new PasswordResetMail($token));
        return redirect()->back()->with('success', 'Verifique sua caixa de email!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $token)
    {
        $this->model->where('token', $token)->existsOr(fn() => abort(404));
        return view('panel.auth.password-reset.show', ['token' => $token]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $token)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'max:255', 'confirmed']
        ]);
        $model = $this->model->where('token', $token)->first();
        abort_if(!$model, 404);
        User::firstWhere(['email' => $model->email])?->update($data);
        $this->model->where('token', $token)->delete();
        return redirect()->route('panel.login.index')->with('success', 'Sua senha foi alterada com sucesso!');
    }
}
