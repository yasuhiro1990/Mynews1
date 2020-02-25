<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function index(Request $request){
      $posts = Profile::all()->sortByDesc('update_at');
      
      if(count($posts) >0){
        $nameline =$posts->shift();
      }else{
        $nameline = null;
      }
      return view('profile.index',['nameline' => $nameline,'posts' =>$posts]);
    }
}