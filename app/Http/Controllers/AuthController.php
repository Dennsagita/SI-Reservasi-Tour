<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrasiPengemudiRequest;
use App\Http\Requests\RegistrasiRequest;
use App\Models\User;
use App\Models\Admin;
use App\Models\Pengemudi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    public function index()
    {
        return view('post/login');
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('post/registrasi', $data);
    }

    public function processregistrasi(RegistrasiRequest $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'no_telp' => 'required|numeric',
        //     'alamat' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required',
        //     'password_confirm' => 'required|same:password',
        // ]);

        $user = new User([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();
        return redirect()->route('login')->with('registrasiBerhasil', true);
    }

    public function registerpengemudi()
    {
        $data['title'] = 'Register';
        return view('post/registrasi-pengemudi', $data);
    }

    public function processregistrasipengemudi(RegistrasiPengemudiRequest $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'no_telp' => 'required|numeric',
        //     'alamat' => 'required',
        //     'email' => 'required|unique:users',
        //     'password' => 'required',
        //     'password_confirm' => 'required|same:password',
        // ]);

        $pengemudi = new Pengemudi([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);

        $pengemudi->save();

        return redirect()->route('registrasimobil', $pengemudi->id);
    }
    
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('loginBerhasil', true);
            return redirect()->intended(route('dashboard'));
        }
        else if (Auth::guard('pengemudi')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('loginBerhasil', true);
            return redirect()->intended(route('dashboardPengemudi'));
        }
        else if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('loginBerhasil', true);
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'gagal-login' => 'Email atau password Tidak Sesuai',
        ])->onlyInput('email');
    
    }

    public function password()
    {
        $data['title'] = 'Register';
        return view('post/resetpassword', $data);
    }

    public function password_action(Request $request)
    {

        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required',
            'new_password_confirm'=>'required|same:new_password',
        ]);


        if(Str::length(Auth::guard('user')->user()) > 0){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->save();
             // Logout pengguna setelah berhasil update password
            Auth::guard('user')->logout();
            $request->session()->regenerate();
            return redirect()->intended(route('login'))->with('ubahPassword', 'Password Berhasil Diubah');
        }elseif(Str::length(Auth::guard('admin')->user()) > 0){
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->new_password);
            $admin->save();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }elseif(Str::length(Auth::guard('pengemudi')->user()) > 0){
            $pengemudi = Pengemudi::find(Auth::id());
            $pengemudi->password = Hash::make($request->new_password);
            $pengemudi->save();
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    }

    public function lupaPassword()
    {
        return view('post.lupa-password');
    }

    // public function processLupaPassword(Request $request)
    // {
    //     $request->validate(['email' => ' required|email']);
    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );
    //     return $status === Password::RESET_LINK_SENT
    //         ? back()->with(['status' => __($status)])
    //         : back()->withErrors(['email' => __($status)]);
    // }
    public function processLupaPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        // Cek apakah email ada pada tabel User
        $user = User::where('email', $request->email)->first();
    
        // Cek apakah email ada pada tabel Pengemudi jika belum ada di tabel User
        if (!$user) {
            $pengemudi = Pengemudi::where('email', $request->email)->first();
        }
    
        // Cek apakah email ada pada tabel Admin jika belum ada di tabel User atau Pengemudi
        if (!$user && !$pengemudi) {
            $admin = Admin::where('email', $request->email)->first();
        }
    
        // Jika email ada pada tabel User, gunakan metode sendResetLink untuk tabel User
        if ($user) {
            $status = Password::sendResetLink(
                $request->only('email')
            );
        } elseif ($pengemudi) {
            // Jika email ada pada tabel Pengemudi, gunakan metode sendResetLink untuk tabel Pengemudi
            $status = Password::broker('pengemudi')->sendResetLink(
                $request->only('email')
            );
        } elseif ($admin) {
            // Jika email ada pada tabel Admin, gunakan metode sendResetLink untuk tabel Admin
            $status = Password::broker('admin')->sendResetLink(
                $request->only('email')
            );
        } else {
            // Jika email tidak ada di semua tabel, kembalikan dengan pesan error
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }
    
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token)
    {
        return view('post.reset-password', ['token' => $token]);
    }

    public function processResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $pengemudi = Pengemudi::where('email', $request->email)->first();
        $admin = Admin::where('email', $request->email)->first();

        if ($user) {
            $status = Password::broker('users')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new \Illuminate\Auth\Events\PasswordReset($user));
                }
            );
        } elseif ($pengemudi) {
            $status = Password::broker('pengemudi')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($pengemudi, $password) {
                    $pengemudi->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $pengemudi->save();

                    event(new \Illuminate\Auth\Events\PasswordReset($pengemudi));
                }
            );
        } elseif ($admin) {
            $status = Password::broker('admin')->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($admin, $password) {
                    $admin->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $admin->save();

                    event(new \Illuminate\Auth\Events\PasswordReset($admin));
                }
            );
        } else {
            // Jika email tidak ditemukan dalam ketiga tabel, tampilkan pesan error
            return back()->withErrors(['email' => 'Email not found']);
        }

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');

    
    }
}
