<?php

declare(strict_types=1);

namespace App\Http\Requests\PostImage;

use App\Http\Requests\APIRequest;
use Illuminate\Support\Facades\Gate;

final class PostImageCreateRequest extends APIRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    $post = $this->route()->parameter('post');
    $imageCount = $post->postImages->count();
    return Gate::inspect('postUpdate', $post) && $imageCount < 4;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'upload_file' => 'required|file|max:10240|mimes:jpg,jpeg,png,gif'
    ];
  }
}
