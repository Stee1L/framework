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

    protected $fillable = [
        'id_division',
        'name',
        'id_view',
    ];

    public function cats() {
        return $this->hasMany(Cat::class );
    }

    public function view() {
        return $this->belongsTo(View::class, 'id_view', 'id_view' );
    }
}