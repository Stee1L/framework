<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_view';

    protected $keyType = 'string';
    protected $table = 'view';

    public function divisions() {
        return $this->hasMany(Division::class );
    }
}