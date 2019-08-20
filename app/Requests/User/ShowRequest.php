<?php
namespace App\Requests\User;
use Illuminate\Foundation\Http\FormRequest;

class ShowRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
        ];
    }
    /*
    URLパラメータもバリデートできるようにする
    */
    protected function validationData()
    {
        return array_merge($this->all(), [
            'user_id' => $this->route('user_id'),
        ]);
    }
}