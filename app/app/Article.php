<?php

namespace SheKnows;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'id',
        'title',
        'body',
        'image',
        'description',
        'channel',
        'author',
        'subtitle'
    ];

    public function getUrl()
    {
        // if there is no id yet for an article
        // can't call getUrl, or return null
        $this->url = implode('/', [
            url('/'),
            'article',
            $this->id
        ]);

        return true;
    }
}
