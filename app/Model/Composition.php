<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composition extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_composition';
    protected $keyType = 'string';
    protected $table = 'Composition';

    public function cats() {
        return $this->hasMany(Cat::class );
    }
}