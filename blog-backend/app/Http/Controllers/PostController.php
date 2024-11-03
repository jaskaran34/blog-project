<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use Exception;
Use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function user_all_post(){
            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);
            $posts = $user->posts()->get();
            return PostResource::collection($posts);
     }
    public function index()
    {
        //return Post::all();
        
     //   return PostResource::collection(Post::with('user')->latest()->get());
        //    return response()->json(['message' => 'No posts available'], 200);
     
     $posts = Post::with('user')->latest()->get();

        if ($posts->isEmpty()) {
        return response()->json(['message' => 'No posts available'], 200);
        }
        return PostResource::collection($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //return $request->title;
        try{
            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);
            $post = $user->posts()->create([
                'title' => $request->title,
                'description' => $request->description
            ]);

           
        return new PostResource($post);
        }
        catch(Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, $id)
    {
        return PostResource::collection(Post::with('user')->where('id',$id)->latest()->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //UpdatePostRequest
    public function update(UpdatePostRequest $request, $id)
{
        //return $request->title;
        try{
            $user_id = Auth::user()->id;
            $user = User::findOrFail($user_id);
            $post = $user->posts()->where('id',$id)->firstOrFail();
            $post->update([
                'title' => $request->title,
                'description' => $request->description
            ]);

            

        return new PostResource($post);
        }
        catch(Exception $e){
            return $e;
        }
        
    }

    public function destroy(Post $post,$id)
    {
        $post->where('id',$id)->delete();

        return "post deleted";
    }
}
