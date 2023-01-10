<?php

declare(strict_types=1);

namespace App\Http\Requests\Comment;

use App\Http\Requests\APIRequest;
use Illuminate\Support\Facades\Gate;

final class CommentUpdateRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      $comment = $this->route()->parameter('comment');
      return Gate::inspect('commentUpdate', $comment);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => 'required|string|',
            'content' => 'nullable|string|max:5000'
        ];
    }
}
