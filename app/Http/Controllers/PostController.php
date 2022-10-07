<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["show", "index"]);
    }

    public function create() {
        $tags = Tag::all();
        return view("posts.create")->with("tags", $tags);
    }

    public function store(Request $request) {
        $data = $request->validate([
            "title" => ["required", "min:3", "max:50"],
            "image" => ["required", "image", "mimes:jpg,png"],
            "body" => ["required"]
        ]);


        // $post = new Post();
        // $post->title = $data["title"];
        // $post->image = $data['image'];
        // $post->body = $data["body"];
        // $post->user_id = auth()->user()->id;

        // $post->save();
        $data["user_id"] = auth()->user()->id;


        if($request->hasFile("image")) {
            $file = $request->file("image");
            $filename = $file->store("");
            $data["image"] = $filename;
        }

        $post = Post::create($data);

        $tags = $request->get("tags");
        if($tags)
            $post->tags()->attach($tags);
        


        return redirect("/posts/$post->id");
    }

    public function show(int $id) {

        $post = Post::find($id);
        $tags = $post->tags;
        $related_posts = [];
        foreach ($tags as $tag) {
            array_push($related_posts, ...$tag->posts->where("id", "!=", $post->id));
        }
        return view("posts.show")->with("post", $post)->with("related_posts", $related_posts);
    }

    public function index(Request $request) {

        if($request->has("keywords")) {
            $keywords = $request->get("keywords");
            $posts = Post::whereHas("user", function($query) use($keywords) 
            {
                $query->where("name", "LIKE", "%$keywords%");
            }
            )->orWhere("title", "LIKE", "%$keywords%")
            ->orWhere("body", "LIKE", "%$keywords%")
            ->get();
        }
        else
            $posts = Post::all();
        return view("posts.index")->with("posts", $posts);
    }

    public function edit(Post $post) {
        if(auth()->user() && auth()->user()->id == $post->user_id)
            return view("posts.edit")->with("post", $post);
        return response("Unauthorized Access", 401);
    }

    public function update(Request $request, Post $post) {
        // dd($request->all());

        if(auth()->user() && auth()->user()->id == $post->user_id) {
            $data = $request->validate([
                "title" => ["required", "min:3", "max:50"],
                "image" => ["required"],
                "body" => ["required"]
            ]);

            $post->title = $data["title"];
            $post->image = $data["image"];
            $post->body = $data["body"];

            $post->save();

            return redirect("/posts/$post->id");
        }
        return response("Unauthorized Access", 401);
    }

    public function destroy(Post $post) {
        if(auth()->user() && auth()->user()->id == $post->user_id) {
            $post->delete();

            return redirect("/")->with("message", "Post is DELETED.");
        }

        return response("Unauthorized Access", 401);
    }



}
