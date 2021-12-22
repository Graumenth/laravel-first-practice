<?php

namespace App\Http\Controllers;

use App\Country;
use App\Photo;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Role;

class Example extends Controller
{
    public function index(){
        $people = ['Edwin', 'van', 'der', 'Sar'];
        return view('example', compact('people'));
    }

    public function read(){
        $posts = Post::all();
        foreach($posts as $post){
            return $post->title;
        }
    }

    public function insert(){
        return DB::insert('insert into posts(title, content, created_at) values(?, ?, ?)', ['PH4 NOOB', 'Codeigniter is the best', date("Y-m-d H:i:s")]);
    }

    public function find(){
        $post = Post::find(2);
        return $post->title;
    }

    public function findwhere(){
        $posts = Post::where('id', 2)->orderBy('id', "DESC")->take(2)->get();
        return $posts;
    }

    public function findmore(){
        $posts = Post::findOrFail(3);
        //$posts = Post::where('users_count', '<', 50)->firstOrFail();
        return $posts;
    }

    public function basicinsert(){
        $post = new Post;

        $post->title = 'new Eloquent title';
        $post->content = 'Le Eloquent';

        $post->save();
    }

    public function basicupdate(){
        $post = Post::find(4);

        $post->title = 'Updated Eloquent title';
        $post->content = 'Le Eloquent';

        $post->save();
    }

    public function create(){
        Post::create(['title'=>'Create method', 'content'=>'I\'m learning Laravel']);
    }

    public function update(){
        Post::where('id', 2)->update(['title' => 'new PHP title', 'content' => 'Edwin is a noob']);
    }

    public function delete(){
        //can = Post::find(2)->delete();

        return Post::destroy([3,4,5]);
    }

    public function softdelete(){
        return Post::find(7)->delete();
    }

    public function readsoftdelete(){
        return Post::onlyTrashed()->where('id', 3)->get();
    }

    public function restore(){
        return Post::onlyTrashed()->restore(); //where alır.
    }

    public function forcedelete(){
        return Post::onlyTrashed()->forceDelete();
    }

    public function userpost($id){
        return User::find($id)->post;
    }

    public function postuser($id){
        return Post::find($id)->user->name;
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
        $country = Country::find(2);
        foreach ($country->posts as $post){
            return $post->title;
        }
    }

    public function userphotos($id){
        $user = User::find($id);
        foreach ($user->photos as $photo){
            return $photo->name;
        }
    }

    public function postphotos($id){
        $post = Post::find($id);
        foreach ($post->photos as $photo){
            echo $photo->name;
        }
    }

    public function phototopost($id){
        $photo = Photo::findOrFail($id);
        return $photo->imageable;
    }

    public function posttags(){
        $post = Post::find(2);
        foreach ($post->tags as $tag){
            return $tag->name;
        }
    }

    public function tagspost(){
        $tag = Tag::find(2);
        foreach ($tag->posts as $post){
            return $post->title;
        }
    }
}
