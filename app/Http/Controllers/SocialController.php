<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function edit($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.social', compact('social'));
    }
}
