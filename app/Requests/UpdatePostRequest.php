<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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

        try {
            $id = $this->route('id');
            $post = Post::find($id);
            return [
                'title' => [
                    'required',
                    'min:3',
                    'max:70',
                    Rule::unique('posts')->ignore($post->title, 'title')
                ],
                'content' => 'required|min:100',
            ];
        }catch (\Exception $e)
        {
            // for production
            return view('errors.404',['error'=>$e->getMessage()]);

            // for debug
            /*
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
            */
        }

    }





}
