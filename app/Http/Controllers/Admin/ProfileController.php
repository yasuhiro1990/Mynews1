<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\P_History;

use Carbon\Carbon;
use Log;

class ProfileController extends Controller
{
    //add
    public function add(){
      return view('admin.profile.create');
    }
    //create
    public function create(Request $request){
      $this->validate($request,Profile::$rules);
      $profile = new profile;
      $form = $request->all();
      
      unset($form['_token']);
      
      
      $profile->fill($form);
      $profile->save();
      return redirect('admin/profile/');
    }
    //index(一覧表示)
    public function index(Request $request){
      $cond_name=$request->cond_name;
      if($cond_name !=""){
        $posts=Profile::where('name',$cond_name)->get();
      }else{
        $posts=Profile::all();
      }
      return view('admin.profile.index',['cond_name'=>$cond_name,'posts'=>$posts]);
    }
    //edit(編集)
    public function edit(Request $request){
      $profile=Profile::find($request->id);
      if(empty($profile)){
        abort(404);
      }
      
      return view('admin.profile.edit',['profile_form'=>$profile]);
    }
    //update(更新)
    public function update(Request $request){
      $this->validate($request, Profile::$rules);
      $profile=Profile::find($request->id);
      $profile_form=$request->all();
      
      unset($profile_form['_token']);
      $profile->fill($profile_form)->save();
      
      $p_history=new P_History;
      $p_history->profile_id = $profile->id;
      $p_history->edited_at = Carbon::now();
      //Log::debug("edit=".$p_history->p_edited_at);
      $p_history->save();
      return redirect('admin/profile/');
    }
    //delete(削除)
    public function delete(Request $request){
      $profile=Profile::find($request->id);
      
      $profile->delete();
      return redirect('admin/profile/');
      
    }
}
