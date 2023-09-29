<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
 use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except(["index", "show"]);
        $this->authorizeResource(Post::class, "post");
    }



    public function index()
    {
        $posts = Post::latest()->paginate(6);

        return view("posts.index")->with("posts", $posts);
    }

    public function create()
    {
        return view("posts.create")->with([
            "categories" => Category::all(),
            "tags" => Tag::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        if($request->hasFile("photo")) {
            $path = $request->file("photo")->store("post-photos");
        }

        $post = Post::create([
            "user_id" => auth()->user()->id,
            "category_id" => $request->category_id,
            "title" => $request->title,
            "short_content" => $request->short_content,
            "content" => $request->content,
            "photo" => $path ?? null,
        ]);

        if(isset($request->tags)) {
            $post->tags()->attach($request->tags);
        }

        PostCreated::dispatch($post);

        return redirect()->route("post.index");
    }

    public function show(Post $post)
    {


        return view("posts.show")->with([
            "post" => $post,
            "recent_posts" => Post::latest()->get()->except($post->id)->take(5),
            "tags" => Tag::all(),
            "categories"=>Category::all(),
        ]);
    }

    public function edit(Post $post)
    {

        return view("posts.edit")->with(["post" => $post]);
    }

    public function update(StorePostRequest $request, Post $post)
    {

        if($request->hasFile("photo")) {

            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }

            $name = $request->file("photo")->getClientOriginalName();
            $path = $request->file("photo")->store("post-photos", $name);
        }

        $post->update([
            "title" => $request->title,
            "short_content" => $request->short_content,
            "content" => $request->content,
            "photo" => $path ?? $post->photo,
        ]);

        return redirect()->route("post.show", ["post" => $post->id]);
    }

    public function destroy(Post $post)
    {
        if(isset($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route("post.index");
    }
}
