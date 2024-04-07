<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_division';
    protected $keyType = 'string';
    protected $table = 'Division';

    public function cats() {
        return $this->hasMany(Cat::class );
    }
}