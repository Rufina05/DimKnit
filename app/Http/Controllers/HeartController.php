<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Heart;

class HeartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $heart = Heart::with("heartItems.product")->firstOrCreate([
            "user_id" => $user->id
        ]);

        return view("heart.index", ["heart"=>$heart]);
    }

}  