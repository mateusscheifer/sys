<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientUrl extends Model
{
    use SoftDeletes;

    protected $table = 'client_urls';

    public function pages()
    {
        return $this->hasMany(Page::class, 'client_url_id', 'id');
    }
}
