<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserRequest;
use App\Mail\VerifyAccount;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(5);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $body = $request->all();

        if ($request->hasFile('avatar')) {
            $ext = $request->file('avatar')->extension();
            $generate_unique_file_name = md5(time()) . '.' . $ext;
            $request->file('avatar')->move('images', $generate_unique_file_name, 'local');

            $body['avatar'] = 'images/' . $generate_unique_file_name;

        }

        $account = User::create($body);

        if($account)
        {
            Mail::to($account->email)->send(new VerifyAccount($account));
            return redirect()->route('user.index')->with('message', 'Thêm mới thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $body = $request->all();

        if ($request->hasFile('avatar')) {
            $ext = $request->file('avatar')->extension();
            $generate_unique_file_name = md5(time()) . '.' . $ext;
            $request->file('avatar')->move('images', $generate_unique_file_name, 'local');

            $body['avatar'] = 'images/' . $generate_unique_file_name;

        }

        $user->update($body);
        return redirect()->route('user.index')->with('message', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('message', 'Xóa thành công!');
    }
}
