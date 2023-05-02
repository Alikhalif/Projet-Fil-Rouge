<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(2);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','email', 'max:255', 'unique:users'],
            'role' => ['required', 'integer'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role,
        ]);

        return redirect('/admin/users')->with('message','Add user successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8'],
            'role' => ['required', 'integer'],
        ]);
        User::findOrFail($id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role_as' => $request->role,
        ]);

        return redirect('/admin/users')->with('message','Update user successfully');
    }

    public function destroy($id){
        User::where('id',$id)->delete();
        return redirect('/admin/users')->with('message','Deleted user successfully');
    }
}
