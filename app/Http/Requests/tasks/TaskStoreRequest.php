<?php

namespace App\Http\Requests\tasks;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'user_id' => 'required',
            'deadline' => 'required|date',
            'status' => 'required',
            'priority' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Every task needs a short clear description.',
            'user_id.required' => 'Every project must be assigned to a user. ',
            'status.required' => 'Every project requires a status',
            'priority.required' => 'Every project requires a priority level.',
        ];
    }
}
