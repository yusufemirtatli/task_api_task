<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Bu isteğe kimlerin yetkili olduğunu kontrol edebilirsiniz
        return true;  // Şu an için herkes yetkili
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $enumValues = ['pending', 'in_progress', 'completed'];

        return [
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'status' => ['required', Rule::in($enumValues)],
        ];
    }
}
