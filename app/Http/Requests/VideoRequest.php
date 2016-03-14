<?php

namespace LearnParty\Http\Requests;

use LearnParty\Http\Requests\Request;

class VideoRequest extends Request
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
            'url' => 'required|url|active_url|youtube_url',
            'category_list' => 'required',
            'description' => 'required|min:5|max:255',
        ];
    }
}
