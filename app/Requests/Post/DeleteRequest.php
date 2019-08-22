<?php
namespace App\Requests\Post;
use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer']
        ];
    }
    /*
    URLパラメータもバリデートできるようにする
    */
    protected function validationData()
    {
        return array_merge($this->all(), [
            'post_id' => $this->route('post_id'),
        ]);
    }
}