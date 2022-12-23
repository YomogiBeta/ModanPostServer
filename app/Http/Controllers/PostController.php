<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest\PostCreateRequest;
use App\Http\Requests\PostRequest\PostUpdateRequest;
use App\Http\Resources\PostsResource;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PostsResource
     */
    public function index()
    {
        $posts = Post::orderBy("created_at","desc")->limit(30)->get();
        return PostsResource::collection($posts);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return PostsResource
     */
    public function create(PostCreateRequest $request)
    {
        $param = ['user_id' => $request->user()->id] + $request->validated();
        $post = Post::create($param);
        return PostsResource::make($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return PostsResource
     */
    public function show(Post $post)
    {
        return PostsResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostUpdateRequest $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        return PostsResource::make($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
