<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use App\Http\Requests\APIRequest;

final class PostCreateRequest extends APIRequest
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
            'title' => 'required|string|max:30',
            'content' => 'required|string|max:1000'
        ];
    }
}
