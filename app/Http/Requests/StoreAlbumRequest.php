<?php

namespace App\Http\Requests;

use App\Models\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|image',
        ];
    }

    public function store()
    {

        $album =  Album::create([
            'name' => $this['name']
        ]);

        DB::table('album_media')->insert([
            'album_id' => $album->id,
            'name' => getFIleName($this['image']),
            'image' => upload($this['image'], 'albums'),
        ]);
    }
}
