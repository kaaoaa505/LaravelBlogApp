<?php

namespace App\Models;

use Carbon\Carbon;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image',
        'author_id',
        'published_at',
        'category_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getSlug()
    {
        $slug = str()->slug($this->title);
        $slugsFoundCount = static::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();

        if ($slugsFoundCount > 0) {
            $slug .= '_' . ($slugsFoundCount + 1);
        }

        return $slug;
    }

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

    public function getDate()
    {
        $date = Carbon::create($this->published_at);

        return date_format($date, 'F d, Y') . ' | ' . $date->diffForhumans();
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', DB::raw('NOW()'));
    }

    public function getBodyContent()
    {
        return Markdown::convert($this->body)->getContent();
    }

    public function getBodyHtmlAttribute()
    {
        return Markdown::convert($this->body)->getContent();
    }

    public function getExcerptHtmlAttribute()
    {
        return Markdown::convert($this->excerpt)->getContent();
    }

}
