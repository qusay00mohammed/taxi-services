<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Taxi;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function dashboard()
    {
        $totalUser = User::all('id');
        $pendeningUser = User::select('id')->where('regStatus', 0)->get();
        $totalTaxi = Taxi::all('id');
        $totalCity = City::all('id');
        $latestUsers = User::select('*')->orderBy('id', 'desc')->take(5)->get();
        $latestTaxi = Taxi::select('*')->orderBy('id', 'desc')->take(5)->get();
        $latestCities = City::select('*')->orderBy('id', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('totalUser', 'pendeningUser', 'totalTaxi', 'totalCity', 'latestUsers', 'latestTaxi', 'latestCities'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select(['*'])->orderBy('id', 'desc')->get();
        return view('admin.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate(
            [
                'username' => 'bail | required | unique:users',
                'password' => 'required',
                'email'    => 'required | unique:users',
                'fullname' => 'required',
            ]
        );

        $input['password'] = bcrypt($request->password);
        $input['regStatus'] = 1;
        $user = User::create($input);
        if ($user) {
            return redirect()->route('users.index')->withSuccess('user was created successfully');
        } else {
            return redirect()->route('users.index')->withError('user not created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $activate['regStatus'] = 1;
        $userActive = $user->update($activate);

        if ($userActive) {
        return redirect()->back()->withSuccess('activate user successfully');
        } else {
        return redirect()->back()->withError('not activate user successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit_user', compact('user'));
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
        // dd($request->all());
        $user = User::findOrFail($id);
        $input = $request->all();

        if ($input['password'] == '') {
            $input = $request->except('password');
        } else {
            $input['password'] = bcrypt($request->password);
        }
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'email'    => 'required|unique:users,email,' . $id,
            'fullname' => 'required',
            'groupId'  => 'required',
        ]);
        $input['regStatus'] = $request->groupId;

        $userUpdate = $user->update($input);

        if ($userUpdate) {
            return redirect()->route('users.index')->withSuccess('user was updated successfully');
        } else {
            return redirect()->route('users.index')->withError('user not updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        if ($user) {
            return redirect()->back()->withSuccess('user was deleted successfully');
        } else {
            return redirect()->back()->withError('user not updated successfully');
        }
    }
}
