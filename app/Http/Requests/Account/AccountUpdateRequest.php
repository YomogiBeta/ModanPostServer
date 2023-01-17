<?php

declare(strict_types=1);

namespace App\Http\Requests\Account;

use App\Http\Requests\APIRequest;

final class AccountUpdateRequest extends APIRequest
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
          'email' => 'nullable|email|max:255|unique:users,email',
          'name' => 'nullable|string|max:255',
          //'password' => 'nullable|string|min:8|max:30|confirmed',
        ];
    }
}
