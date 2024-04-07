<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'Last_name',
        'Patronymic',
        'gender',
        'Date_birth',
        'Residence_address',
        'id_composition',
        'id_position',
        'id_division',
    ];

    public function composition() {
        return $this->belongsTo(Composition::class, 'id_composition', 'id_composition');
    }

    public function division() {
        return $this->belongsTo(Division::class, 'id_division', 'id_division');
    }

    public function position() {
        return $this->belongsTo(Position::class, 'id_position', 'id_position');
    }
}

