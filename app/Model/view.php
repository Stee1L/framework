<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_view';
}