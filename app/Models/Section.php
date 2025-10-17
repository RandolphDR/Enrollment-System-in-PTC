<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'program_id',
        'year_level_id',
        'capacity'
    ];

    protected $casts = [
        'capacity' => 'integer',
    ];

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function yearLevel() {
        return $this->belongsTo(YearLevel::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

}
