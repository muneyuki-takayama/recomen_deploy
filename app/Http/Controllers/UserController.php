<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();
        $products = $user->products->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all());

        if($request->file('prof_photo')) {

        $image_prof = $request->file('prof_photo');
        $extension = $request->file('prof_photo')->getClientOriginalExtension();
        $filename = $request->file('prof_photo')->getClientOriginalName();
        $hash = md5($filename);

        $resize_img = Image::make($image_prof)
                    ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($extension);
                
        Storage::disk('s3')->put($hash, $resize_img, 'public');

        $user->prof_photo = Storage::disk('s3')->url($hash);
        
        }
        
        $user->save();
        return redirect()->route('users.show',['name' => $user->name]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $products = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'products' => $products,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();
 
        $followings = $user->followings->sortByDesc('created_at');
 
        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }
    
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
 
        $followers = $user->followers->sortByDesc('created_at');
 
        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();
 
        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }
 
        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);
 
        return ['name' => $name];
    }
    
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();
 
        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }
 
        $request->user()->followings()->detach($user);
 
        return ['name' => $name];
    }
}
