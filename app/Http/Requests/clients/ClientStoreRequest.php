<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'name' => 'required|string|unique:clients',
            'vat' => 'required|string|unique:clients',
            'address' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'Your client needs a name.',
          'name.unique' => 'You can\'t have one client twice, right?',
          'vat.required' => 'VAT for clients are required.',
          'vat.unique' => 'VATs are always unique to clients.',
          'address.required' => 'Your client needs an operating address.',
        ];
    }
}
