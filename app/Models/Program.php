<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
     /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'duration_years',
        'status'
    ];

    protected $casts = [
        'duration_years' => 'integer',
    ];

    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    public function yearLevels() {
        return $this->hasMany(YearLevel::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

}
