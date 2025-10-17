<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_no',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'gender',
        'birth_date',
        'civil_status',
        'birthplace',
        'phone_no',
        'address',
        'guardian',
        'program_id',
        'year_level_id',
        'section_id',
        'status',
        'is_irregular',
    ];

    protected $casts = [
        'birthplace' => 'array',
        'address' => 'array',
        'guardian' => 'array',
        'is_irregular' => 'boolean',
        'birth_date' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($student) {
            if (is_null($student->birthplace)) {
                $student->birthplace = [
                    'street' => null,
                    'city' => null,
                    'province' => null,
                    'country' => null,
                    'postal_code' => null,
                ];
            }

            if (is_null($student->address)) {
                $student->address = [
                    'street' => null,
                    'city' => null,
                    'province' => null,
                    'country' => null,
                    'postal_code' => null,
                ];
            }

            if (is_null($student->guardian)) {
                $student->guardian = [
                    'fullname' => null,
                    'phone_no' => null,
                    'address' => [
                        'street' => null,
                        'city' => null,
                        'province' => null,
                        'country' => null,
                        'postal_code' => null,
                    ],
                    'relationship' => null,
                ];
            }
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
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

    public function studentSubjects() {
        return $this->hasMany(StudentSubject::class);
    }

    public function employment() {
        return $this->belongsTo(Employment::class);
    }

    // Helper Classes
}
