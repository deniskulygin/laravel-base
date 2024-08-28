<?php
declare(strict_types = 1);

namespace App\Http\Request;

class CreateRequest extends JsonFormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|string|max:128',
            'email' => 'bail|required|email:rfc,dns|max:191',
            'message' => 'bail|required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'Field name must be a string',
            'name.required' => 'Field name is required',
            'name.max' => 'Field name cannot be longer than 128 characters',
            'email.string' => 'Field email must be a string',
            'email.required' => 'Field email is required',
            'email.max' => 'Field email cannot be longer than 191 characters',
            'message.string' => 'Field message must be a string',
            'message.required' => 'Field message is required',
            'message.max' => 'Field message cannot be longer than 500 characters',
        ];
    }

    public function getName(): string
    {
        return $this->json('name');
    }

    public function getEmail(): string
    {
        return $this->json('email');
    }

    public function getMessage(): string
    {
        return $this->json('message');
    }
}
