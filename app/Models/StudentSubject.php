<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    /** @use HasFactory<\Database\Factories\StudentSubjectFactory> */
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'instructor_id',
        'program_id',
        'year_level_id',
        'section_id',
        'school_year',
        'semester',
        'status',
        'is_irregular',
        'prelim',
        'midterm',
        'final',
        'final_grade',
        'remarks',
    ];
    protected $casts = [
        'is_irregular' => 'boolean',
        'prelim' => 'decimal:2',
        'midterm' => 'decimal:2',
        'final' => 'decimal:2',
        'final_grade' => 'decimal:2',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function instructor() {
        return $this->belongsTo(Employee::class, 'instructor_id');
    }

    public function program() {
        return $this->belongsTo(Program::class);
    }

    public function yearLevel() {
        return $this->belongsTo(YearLevel::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
