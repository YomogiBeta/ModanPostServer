<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CommentCreateRequest;
use App\Http\Requests\Comment\CommentUpdateRequest;
use App\Http\Resources\CommentsResource;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CommentsResource
     */
    public function index(Post $post)
    {
        return CommentsResource::collection($post->comments());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return CommentsResource
     */
    public function create(CommentCreateRequest $request)
    {
        $param = ['user_id' => $request->user()->id] + $request->validated();
        $comment = Comment::create($param);
        return CommentsResource::make($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CommentUpdateRequest $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment->update($request->validated());
        return CommentsResource::make($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('commentDelete', $comment);
        $comment->delete();
        return response()->noContent();
    }
}