<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::all();
        $roles = role::orderBy('area')->get();
        return view('roles.index', compact('data', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'area' => 'required',
            'cargo' => 'required'
        ]);

        Role::create([
            'area' => $request->area,
            'cargo' => $request->cargo
        ]);

        return redirect()->back();
    }

    public function adduser(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required'
        ]);

        $rol = UserRole::where('user_id', $request->user_id)->where('role_id', $request->role_id)->get();
        if ($rol->count() < 1) {
            UserRole::create([
                'user_id' => $request->user_id,
                'role_id' => $request->role_id,
                'rol' => $request->role_id
            ]);
        }
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back();
    }

    public function borrarcargo(Request $request)
    {
        $role = UserRole::where('user_id', $request->user_id)->where('role_id', $request->role_id)->first();
        $role->delete();
        return redirect()->back();
    }
}
