<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    /** @use HasFactory<\Database\Factories\EmploymentFactory> */
    use HasFactory;

    protected $fillable = [
        'company_name',
        'position',
        'employment_status',
        'work_hours',
    ];

    protected $casts = [];

    public function student() {
        return $this->hasOne(Student::class);
    }

    public function employee() {
        return $this->hasOne(Employee::class);
    }
}
