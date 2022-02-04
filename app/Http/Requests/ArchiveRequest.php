<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArchiveRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'sound_type' => ['required', 'string'],
            'date' => ['required', 'string'],
            'season' => ['required', 'string'],
            'time_of_day' => ['required', 'string'],
            'type_of_location' => ['required', 'string'],
            'location' => ['required', 'string'],
            'recordist' => ['required', 'string'],
            'artist' => ['required', 'string'],
            'length' => ['required', 'string'],
            'device_recorder' => ['required', 'string'],
            'format_quality' => ['required', 'string'],
            'access_and_license' => ['required', 'string'],
            'tags' => ['required', 'string'],
            'media' => ['required', 'string'],
        ];
    }
}
