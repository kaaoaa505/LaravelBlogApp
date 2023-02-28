<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function getSlug()
    {
        $slug = str()->slug($this->title);
        $slugsFoundCount = static::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();

        if ($slugsFoundCount > 0) {
            $slug .= '_' . ($slugsFoundCount + 1);
        }

        return $slug;
    }
}