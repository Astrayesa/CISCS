<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Store;
use App\Http\Requests\Admin\User\Update;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view("admin.users.index", [
            'users' => User::where('is_admin', '!=', true)->get()
        ]);
    }

    public function create()
    {
        return view("admin.users.create");
    }

    public function store(Store $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());

        if(!$user){
            return redirect()->route("admin.user.index")->with("error", "Gagal menambah user baru!");
        }
        return redirect()->route("admin.user.index")->with("success", "Berhasil menambah user baru!");
    }

    public function edit(User $user)
    {
        return view("admin.users.edit", compact("user"));
    }

    public function update(Update $request, User $user)
    {
        if($request->password){
            $request->merge(['password' => bcrypt($request->password)]);
        }else{
            $request->merge(['password' => $user->password ]);
        }

        $user = $user->update($request->all());
        if (!$user) {
            return redirect()->route("admin.user.index")->with("error", "Gagal mengubah user!");
        }
        return redirect()->route("admin.user.index")->with("success", "Berhasil mengubah user!");
    }

    public function destroy(User $user)
    {
        $user = $user->delete();
        if (!$user) {
            return redirect()->route("admin.user.index")->with("error", "Gagal menghapus user!");
        }
        return redirect()->route("admin.user.index")->with("success", "Berhasil menghapus user!");
    }
}
