<?php

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/ngomonginduit');
});

Route::get('/ngomonginduit', function () {
    return view('welcome');
})->name('ngomonginduit');

Route::post('/register', function (Request $request) {
    $validated = $request->validate(
        [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'whatsapp' => ['required', 'string', 'regex:/^[0-9+\-\s()]{8,30}$/'],
        ],
        [
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal 120 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email maksimal 160 karakter.',
            'whatsapp.required' => 'Nomor Whatsapp wajib diisi.',
            'whatsapp.regex' => 'Nomor Whatsapp harus berisi 8-30 digit atau tanda +.',
        ],
    );

    Registration::create($validated);

    return back()->with('success', 'Terima kasih, data anda berhasil dikirim.');
})->name('registrations.store');

Route::get('/kmm-admin/login', function () {
    if (session('kmm_admin_authenticated')) {
        return redirect()->route('kmm-admin.index');
    }

    return view('kmm-admin.login');
})->name('kmm-admin.login');

Route::post('/kmm-admin/login', function (Request $request) {
    $credentials = $request->validate(
        [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ],
        [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ],
    );

    if ($credentials['email'] !== 'admin@admin.com' || $credentials['password'] !== '123456') {
        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    $request->session()->regenerate();
    $request->session()->put('kmm_admin_authenticated', true);

    return redirect()->route('kmm-admin.index');
})->name('kmm-admin.login.submit');

Route::match(['get', 'post'], '/kmm-admin/logout', function (Request $request) {
    $request->session()->forget('kmm_admin_authenticated');
    $request->session()->regenerateToken();

    return redirect()->route('kmm-admin.login');
})->name('kmm-admin.logout');

Route::get('/kmm-admin', function () {
    if (! session('kmm_admin_authenticated')) {
        return redirect()->route('kmm-admin.login');
    }

    return view('kmm-admin.index', [
        'registrations' => Registration::latest()->get(),
    ]);
})->name('kmm-admin.index');

Route::get('/kmm-admin/export', function () {
    if (! session('kmm_admin_authenticated')) {
        return redirect()->route('kmm-admin.login');
    }

    $registrations = Registration::oldest()->get();
    $filename = 'kmm-registrations-'.now()->format('Ymd-His').'.xls';

    return Response::make(view('kmm-admin.export', compact('registrations')), 200, [
        'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
        'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        'Cache-Control' => 'no-store, no-cache',
    ]);
})->name('kmm-admin.export');
