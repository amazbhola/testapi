<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenderRequest extends FormRequest
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
            "tender_id" => "required|numeric|unique:tenders,tender_id",
            "description" => "required|string",
            "document_price" => "required|string",
            "tender_security" => "required|string",
            "method" => "required",
            "last_sale_date" => "required|date",
            "liquid_amount" => "required|string",
            "department_id" => "required",
            "location_id" => "required"
        ];
    }


}
