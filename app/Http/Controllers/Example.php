<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Example_model;
use App\Role;

class Example extends Controller
{
    public function index(){
        $people = ['Edwin', 'van', 'der', 'Sar'];
        return view('example', compact('people'));
    }

    public function read(){
        $posts = Example_model::all();
        foreach($posts as $post){
            return $post->title;
        }
    }

    public function insert(){
        return DB::insert('insert into posts(title, content, created_at) values(?, ?, ?)', ['PH4 NOOB', 'Codeigniter is the best', date("Y-m-d H:i:s")]);
    }

    public function find(){
        $post = Example_model::find(2);
        return $post->title;
    }

    public function findwhere(){
        $posts = Example_model::where('id', 2)->orderBy('id', "DESC")->take(2)->get();
        return $posts;
    }

    public function findmore(){
        $posts = Example_model::findOrFail(3);
        //$posts = Example_model::where('users_count', '<', 50)->firstOrFail();
        return $posts;
    }

    public function basicinsert(){
        $post = new Example_model;

        $post->title = 'new Eloquent title';
        $post->content = 'Le Eloquent';

        $post->save();
    }

    public function basicupdate(){
        $post = Example_model::find(4);

        $post->title = 'Updated Eloquent title';
        $post->content = 'Le Eloquent';

        $post->save();
    }

    public function create(){
        Example_model::create(['title'=>'Create method', 'content'=>'I\'m learning Laravel']);
    }

    public function update(){
        Example_model::where('id', 2)->update(['title' => 'new PHP title', 'content' => 'Edwin is a noob']);
    }

    public function delete(){
        //can = Example_model::find(2)->delete();

        return Example_model::destroy([3,4,5]);
    }

    public function softdelete(){
        return Example_model::find(7)->delete();
    }

    public function readsoftdelete(){
        return Example_model::onlyTrashed()->where('id', 3)->get();
    }

    public function restore(){
        return Example_model::onlyTrashed()->restore(); //where alır.
    }

    public function forcedelete(){
        return Example_model::onlyTrashed()->forceDelete();
    }

    public function userpost($id){
        return User::find($id)->post;
    }

    public function postuser($id){
        return Example_model::find($id)->user->name;
    }

    public function posts($id){
        $user = User::find($id);
        foreach ($user->posts as $post){
            echo $post->title.'<br>';
        }
    }

    public function userrole($id){
        $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
        return $user;
//        foreach ($user->roles as $role) {
//            return $role->role_name;
//        }
    }

    public function userpivot(){
        $user = User::find(1);
        foreach ($user->roles as $role) {
            return $role->pivot->created_at;
        }
    }

    public function usercountry(){

    }
}
