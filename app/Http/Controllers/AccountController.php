<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\AccountUpdateRequest;
use App\Http\Requests\Account\AccountProfileImageUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return UserResource
     */
    public function show(Request $request)
    {
        return UserResource::make($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AccountUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(AccountUpdateRequest $request)
    {
        $request->user()->update($request->validated());
        return UserResource::make($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AccountProfileImageUpdateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(AccountProfileImageUpdateRequest $request)
    {
        $filePath = $request->upload_file->store('public/usericons');
        $profile_path = str_replace('public/', '', $filePath);
        $request->user()->update(["profile_image" => $profile_path]);
        return UserResource::make($request->user());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {
    //     $this->authorize('postDelete', $post);
    //     $post->delete();
    //     return response()->noContent();
    // }
}
