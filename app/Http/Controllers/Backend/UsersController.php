<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Illuminate\Support\Facades\Storage;
use Alert;

class UsersController extends Controller
{
     public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('members.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $users = User::where('role','user')->orderBy('member_id', 'Desc')->get();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('members.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $roles  = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been created !!');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if (is_null($this->user) || !$this->user->can('members.view')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $user = User::find($id);
        $roles  = Role::all();
        return view('backend.users.profile', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (is_null($this->user) || !$this->user->can('members.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $user = User::find($id);
        $roles  = Role::all();
        return view('backend.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'mobile_number' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'birth_month' => 'required|string|max:255',
        'address_line_1' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'postcode' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->mobile_number = $request->mobile_number;
    $user->gender = $request->gender;
    $user->birth_month = $request->birth_month;
    $user->address_line_1 = $request->address_line_1;
    $user->address_line_2 = $request->address_line_2;
    $user->address_line_3 = $request->address_line_3;
    $user->city = $request->city;
    $user->postcode = $request->postcode;
    $user->country = $request->country;

  if ($request->hasFile('photo')) {
        if($user->photo != NULL){
            Storage::delete($user->photo);
        }
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('photos'), $imageName);
        $user->photo = 'photos/'.$imageName;
    }

    $user->save();

    return response()->json(['success' => 'Member updated successfully.']);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (is_null($this->user) || !$this->user->can('members.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

                   Alert::success('Success', 'Member has been deleted !!');
        return back();
    }
}
