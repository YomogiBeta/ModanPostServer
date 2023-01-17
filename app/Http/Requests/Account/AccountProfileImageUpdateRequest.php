<?php

declare(strict_types=1);

namespace App\Http\Requests\Account;

use App\Http\Requests\APIRequest;

final class AccountProfileImageUpdateRequest extends APIRequest
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
          'upload_file' => 'required|file|max:10240|mimes:jpg,jpeg,png,gif'
        ];
    }
}
