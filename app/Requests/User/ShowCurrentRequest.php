<?php
namespace App\Requests\User;
use Illuminate\Foundation\Http\FormRequest;
class ShowCurrentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer']
        ];
    }
}