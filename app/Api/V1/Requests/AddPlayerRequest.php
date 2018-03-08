<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class AddPlayerRequest extends FormRequest
{
    public function rules()
    {
        return Config::get('boilerplate.add_player.validation_rules');
    }

    public function authorize()
    {
        return true;
    }
}
