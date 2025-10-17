<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'units',
        'lecture_hours',
        'lab_hours',
        'program_id',
        'year_level_id',
        'semester',
        'prerequisite_subject_id',
        'subject_status',
    ];

    protected $casts = [];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function yearLevel()
    {
        return $this->belongsTo(YearLevel::class);
    }

    public function prerequisite()
    {
        return $this->belongsTo(Subject::class, 'prerequisite_subject_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subjects')
            ->withPivot([
                'status',
                'is_irregular',
                'school_year',
                'semester',
                'prelim',
                'midterm',
                'final',
                'final_grade',
                'remarks'
            ])
            ->withTimestamps();
    }

}
