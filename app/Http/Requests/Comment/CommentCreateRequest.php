<?php

declare(strict_types=1);

namespace App\Http\Requests\Comment;

use App\Http\Requests\APIRequest;

final class CommentCreateRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|string|max:1000'
        ];
    }
}
