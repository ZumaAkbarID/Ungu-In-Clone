<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function visitor()
    {
        return $this->hasMany(LinksVisitor::class, 'link_id', 'id');
    }
}
