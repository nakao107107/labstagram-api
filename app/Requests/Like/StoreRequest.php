<?php
namespace App\Requests\Like;
use Illuminate\Foundation\Http\FormRequest;
class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ];
    }
}