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

    public function messages(): array
    {
        return [
            'tender_id.required' => 'Tender ID is required',
            'tender_id.numeric' => 'Tender ID must be numeric',
            'tender_id.unique' => 'Tender ID must be unique',
            'description.required' => 'Description is required',
            'document_price.required' => 'Document Price is required',
            'tender_security.required' => 'Tender Security is required',
            'method.required' => 'Method is required',
            'last_sale_date.required' => 'Last Sale Date is required',
            'last_sale_date.date' => 'Last Sale Date must be a valid date',
            'liquid_amount.required' => 'Liquid Amount is required',
            'department_id.required' => 'Department ID is required',
            'location_id.required' => 'Location ID is required'
        ];
    }

}
