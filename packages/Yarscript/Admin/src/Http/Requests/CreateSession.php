<?php

namespace Yarscript\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateSession
 * @package Yarscript\Admin\Http\Requests
 */
class CreateSession extends FormRequest
{
    /**
     * Credentials validation rules
     *
     * @var array|string[]
     */
    protected array $credentials = [
        'email'    => 'email|max:255',
        'password' => 'string|max:255',
    ];

    /**
     * Remember validation rules
     *
     * @var array|string[]
     */
    protected array $remember = [
        'remember' => 'bool',
    ];

    /**
     * Determine if user is authorized to make this request
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get validation rules that apply to the request
     *
     * @return array
     */
    public function rules(): array
    {
        return $this->credentials + $this->remember;
    }

    /**
     * Get CreateSession Request credentials
     *
     * @param array $payload
     * @return array
     */
    public function credentials(array $payload): array
    {
        return array_merge($this->only(array_keys($this->credentials)), $payload);
    }

    /**
     * Get CreateSession Request remember
     *
     * @return array
     */
    public function remember(): array
    {
        return $this->only(array_keys($this->remember));
    }
}
