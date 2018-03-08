<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('boilerplate.update_customer.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
