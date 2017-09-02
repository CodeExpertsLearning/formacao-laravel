<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
          'title' => 'required|min:5|max:255',
          'author' => 'required|min:5|max:255',
          'edition' => 'required|numeric|min:1|max:200',
          'year' => 'required|numeric|max:'.date('Y'),
          'quantity' => 'required|numeric|min:1',
          'publisher_id' => 'required|numeric'
        ];
    }
}
