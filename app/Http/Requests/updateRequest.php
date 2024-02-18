<?php

namespace App\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateRequest extends CustomFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ["nullable","string"],
            "address" => ["nullable","string"],
            "price" => ["nullable","integer"],
            "bedrooms" => ["nullable","integer"],
            "bathrooms" => ["nullable","integer"],
            "type"=> ["nullable","string",Rule::in(Property::TYPE_OPTIONS)],
            "status"=> ["nullable","string",Rule::in(Property::STATUS_OPTIONS)],
        ];
    }
}
