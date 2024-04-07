<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_position';
    protected $keyType = 'string';
    protected $table = 'Position';

    public function cats() {
        return $this->hasMany(Cat::class);
    }
}