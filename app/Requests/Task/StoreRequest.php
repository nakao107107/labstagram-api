<?php
namespace App\Requests\Task;
use Illuminate\Foundation\Http\FormRequest;
class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
            'character' => ['required', 'string']
        ];
    }
}