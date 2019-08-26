<?php
namespace App\Requests\Post;
use Illuminate\Foundation\Http\FormRequest;
class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
            'caption' => ['required', 'string'],
            'img_url' => ['required', 'string'],
            'tags'    => ['nullable', 'array'],

            'tags.*.name' => ['required', 'string']
        ];
    }
}