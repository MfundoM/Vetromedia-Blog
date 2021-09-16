<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PostRequest extends FormRequest
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
        if ($this->isMethod('put')) {
            return $this->updateRules();
        } else {
            return $this->createRules();
        }
    }

    /**
     * Rules for creating resource.
     *
     * @return array
     */
    public function createRules() : array
    {
        return [
            'title'         => ['required', 'string', 'min:2'],
            'content'       => ['required', 'string', 'min:2'],
            'image_path'    => ['required', 'image', 'max:5120'],
        ];
    }

    /**
     * Rules for updating resource.
     *
     * @return array
     */
    public function updateRules() : array
    {
        return [
            'title'             => ['required', 'string', 'min:2'],
            'content'           => ['required', 'string', 'min:2'],
            'image_path'         => ['nullable', 'image', 'max:5120'],
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @return array
     */
    public function validated()
    {
        $validated = $this->getValidatorInstance()->validate();

        $validated['user_id'] = Auth::id();

        if ($validated['image_path'] ?? false) {
            $validated['image_path'] = self::uploadImage($validated['image_path']);
        }

        return $validated;
    }

    /**
     * Upload thumbnail then save.
     *
     * @param \Illuminate\Http\UploadedFile $file
     *
     * @return string
     */
    private static function uploadImage(UploadedFile $file) : string
    {
        $file_name = sprintf('%s.%s', sha1(time()), $file->getClientOriginalExtension());

        $img = Image::make($file->path());

        $path = storage_path('app/public/posts/');
        if (!File::exists($path)) {
            File::makeDirectory($path, 777, true, true);
        }

        $img->save(storage_path('app/public/posts/') . $file_name);

        return $file_name;
    }
}
