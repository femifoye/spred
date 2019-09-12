<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UsersProfile;
class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile() {
        return view('/user_profile')->with(['user' => auth::user(), 'profile' => auth::user()->profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user_profile_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $profile = new UsersProfile;
        $validated = $request->validate([
            'about' => 'string',
            'image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:1000'
        ]);
        $profile->about = $validated['about'];
        auth::user()->profile()->save($profile);
        if($request->hasFile('image')){
            $image = $validated['image'];
            $image_url = $image->store('public/images');
            $profile->image = $image_url;
            $profile->save();
        }
        return redirect()->route('profile.me', $profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UsersProfile $profile, $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UsersProfile $profile)
    {
        return view('user_profile_edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersProfile $profile)
    {
        //
        $validated = $request->validate([
            'name' => 'nullable|string|unique:users',
            'about' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,png,svg,gif,jpeg|max:1000'
        ]);
        if(isset($validated['name'])){
            auth::user()->name = $validated['name'];
            auth::user()->save();
        }
        auth::user()->profile()->save($profile);
        if($request->hasFile('name')){
            if(Storage::exists($profile->image)){
                Storage::delete($profile->image);
            }
            $image = $validated['image'];
            $image_url = $image->store('public/images');
            $profile->image = $image_url;
            $profile->save();
        }
        if(isset($validated['about'])){
            $profile->about = $validated['about'];
            $profile->save();
        }
        return redirect()->route('profile.me', $profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
