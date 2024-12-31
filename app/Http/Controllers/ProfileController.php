<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProfileController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateAvatar(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $file = $request->file('avatar');

        $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();

        $user->img = $uploadedFileUrl;
        $user->save();

        return redirect()->back()->with('success', 'Ảnh đại diện đã được cập nhật thành công.');
    }
}
