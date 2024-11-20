<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    public function clientUrl()
    {
        return $this->belongsTo(ClientUrl::class, 'client_url_id', 'id');
    }
}
