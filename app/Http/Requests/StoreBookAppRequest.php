<?php

namespace App\Http\Requests;

use App\Models\BookApp;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookAppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = BookApp::$rules;

        return $rules;
    }

    // custom message
    public function attributes()
    {
        return BookApp::$ruleMessages;
    }
}
