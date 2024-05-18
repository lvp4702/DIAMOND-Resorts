<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword\ChangePasswordRequest;
use App\Http\Requests\ForgotPassword\ForgotPasswordRequest;
use App\Http\Requests\Register\RegisterRequest;
use App\Http\Requests\ResetPassword\ResetPasswordRequest;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use App\Mail\VerifyAccount;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('login_page.index');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->email_verified_at != null)
            {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.index')->with('login', 'Welcome ');
                } else {
                    return redirect()->route('client.index');
                }
            }
            return redirect()->back()->with('error', 'Bạn cần xác nhận email trước khi đăng nhập !');
        }
        // Xác thực thất bại
        return redirect()->back()->with('error', 'Đăng nhập thất bại !');
    }

    public function formRegister()
    {
        return view('register_page.index');
    }

    public function register(RegisterRequest $request)
    {
        $account = User::create($request->all());
        if ($account) {
            Mail::to($account->email)->send(new VerifyAccount($account));
            return redirect()->route('formLogin')->with('message', 'Xác thực Email để xác nhận đăng ký thành công!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Đăng xuất thành công !');
    }

    public function change_password()
    {
        return view('change_password.index');
    }

    public function check_change_password(ChangePasswordRequest $request, User $user)
    {
        $password = ['password' => bcrypt($request->new_password)];
        if ($user->update($password))
        {
            Auth::logout();
            return redirect()->route('formLogin')->with('message', 'Đổi mật khẩu thành công, vui lòng đăng nhập lại !');
        }
    }

    public function forgot_password()
    {
        return view('forgot_password.index');
    }

    public function check_forgot_password(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $token = Str::random(40);
        $data = [
            'email' => $request->email,
            'token' => $token
        ];
        if (PasswordResetToken::create($data)) {
            Mail::to($request->email)->send(new ForgotPassword($user, $token));
            return redirect()->route('formLogin')->with('message', 'Send mail successfully, please check email to continue !');
        }
        return redirect()->back()->with('error', 'Something error, please check again !');
    }

    public function reset_password($token)
    {
        return view('reset_password.index', compact('token'));
    }

    public function check_reset_password(ResetPasswordRequest $request, $token)
    {
        $tokenData = PasswordResetToken::where('token', $token)->firstOrFail();
        $user = User::where('email', $tokenData->email)->firstOrFail();

        $password = [
            'password' => bcrypt($request->password)
        ];
        if ($user->update($password))
        {
            return redirect()->route('formLogin')->with('message', 'Update your password successfully !');
        }
        return redirect()->back()->with('error', 'Something error, please check again');
    }

    public function verify($email)
    {
        $acc = User::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        User::where('email', $email)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return redirect()->route('formLogin')->with('message', 'Xác thực thành công, hãy đăng nhập !');
    }
}
