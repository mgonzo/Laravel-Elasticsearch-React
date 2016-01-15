<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{

    protected $fillable = [
        'id',
        'name',
        'slug',
        'parentId'
    ];

    public function getUrl()
    {
        // if there is no id yet for an article
        // can't call getUrl, or return null
        $this->url = implode('/', [
            url('/'),
            'channel',
            $this->slug
        ]);

        return true;
    }
}
