<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostImage\PostImageCreateRequest;
use App\Http\Resources\PostImageResource;
use App\Models\Post;
use App\Models\PostImage;

class PostImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PostImageResource
     */
    public function index(Post $post)
    {
        $images = $post->postImages();
        return PostImageResource::collection($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return PostsResource
     */
    public function create(PostImageCreateRequest $request, Post $post)
    {
        $filePath = $request->upload_file->store('public/postimages');
        $imageFilePath = str_replace('public/', '', $filePath);
        $param = ['post_id' => $post->id, 'path' => $imageFilePath];
        $postImage = PostImage::create($param);
        return PostImageResource::make($postImage);
    }
}
