<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'description' => 'required',
            'deadline' => 'required|date',
            'user_id' => 'required',
            'client_id' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Every project needs a title.',
            'description.required' => 'Projects are better understood with descriptions',
            'deadline.required' => 'Every project need a deadline.',
            'user_id.required' => 'Every project must be assigned to a user. ',
            'client_id.required' => 'Every project must have to a client. ',
            'status.required' => 'Every project requires a status',
        ];
    }
}
