<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'author_id',
    ];

    public function getImageUrl()
    {
        $imgUrl = 'img/0.png';

        if(! is_null($this->image)){
            $imgPath = public_path('img/'.$this->image);

            if(file_exists($imgPath)){
                $imgUrl = asset('img/'.$this->image);
            }
        }

        return $imgUrl;
    }

}
