<?php

namespace rohsyl\OmegaPlugin\Blog\Http\Requests\Admin\BlogPost;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogPostRequest extends FormRequest
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
            'title' => 'required|string',
            'introduction' => 'nullable|string',
            'description' => 'nullable|string',
            'featured_media_id' => 'nullable|exists:media,id',
            'published_at' => 'nullable|date',
            'categories.*' => 'nullable|array',
            'categories.*' => 'nullable|numeric|exists:blog_categories,id',
        ];
    }
}