<?php

declare(strict_types=1);

namespace App\Http\Requests\PostRequest;

use App\Http\Requests\APIRequest;
use Illuminate\Support\Facades\Gate;

final class PostUpdateRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $post = $this->route()->parameter('post');
      return Gate::authorize('has-post', $post);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string|max:30',
            'content' => 'nullable|string|max:5000'
        ];
    }
}
