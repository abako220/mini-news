<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'news_type',
        'posted_by'
    ];

    public function newsType() {
        return $this->belongsTo('App\NewsType', 'id');
    }
}
