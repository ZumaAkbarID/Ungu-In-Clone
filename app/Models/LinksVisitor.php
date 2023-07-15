<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinksVisitor extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function link()
    {
        return $this->belongsTo(Links::class, 'link_id', 'id');
    }
}
