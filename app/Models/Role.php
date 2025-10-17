<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name',
        'description',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($role) {
            $defaultPermissions = [
                'full_access' => false,
                'view_dashboard' => false,
                'manage_users' => false,
                'create_users' => false,
                'edit_users' => false,
                'delete_users' => false,
                'manage_roles' => false,
                'manage_permissions' => false,
                'manage_students' => false,
                'create_student' => false,
                'edit_student' => false,
                'delete_student' => false,
                'view_student_records' => false,
                'assign_student_section' => false,
                'view_student_enrollment' => false,
                'manage_employees' => false,
                'create_employee' => false,
                'edit_employee' => false,
                'delete_employee' => false,
                'view_instructor_records' => false,
                'assign_instructors' => false,
                'manage_courses' => false,
                'create_course' => false,
                'edit_course' => false,
                'delete_course' => false,
                'manage_subjects' => false,
                'create_subject' => false,
                'edit_subject' => false,
                'delete_subject' => false,
                'assign_subjects' => false,
                'manage_schedules' => false,
                'create_schedule' => false,
                'edit_schedule' => false,
                'delete_schedule' => false,
                'view_class_list' => false,
                'manage_enrollment' => false,
                'process_enrollment' => false,
                'approve_enrollment' => false,
                'reject_enrollment' => false,
                'view_enrollment_status' => false,
                'enroll_students' => false,
                'manage_grades' => false,
                'encode_grades' => false,
                'edit_grades' => false,
                'delete_grades' => false,
                'view_grades' => false,
                'submit_grades' => false,
                'manage_payments' => false,
                'confirm_payments' => false,
                'reject_payments' => false,
                'view_payment_reports' => false,
                'generate_invoices' => false,
                'view_balance' => false,
                'manage_documents' => false,
                'upload_documents' => false,
                'view_documents' => false,
                'delete_documents' => false,
                'download_documents' => false,
                'manage_announcements' => false,
                'create_announcement' => false,
                'edit_announcement' => false,
                'delete_announcement' => false,
                'view_announcements' => false,
                'send_notifications' => false,
                'view_reports' => false,
                'generate_reports' => false,
                'export_reports' => false,
                'manage_settings' => false,
                'backup_system' => false,
                'restore_system' => false,
                'view_audit_logs' => false,
                'system_maintenance' => false,
                'view_profile' => false,
                'edit_profile' => false,
                'submit_enrollment' => false,
                'view_grades_student' => false,
                'view_payment_history' => false,
                'download_certificate' => false,
            ];

            // apply defaults if not set
            if (is_null($role->permissions)) {
                $role->permissions = $defaultPermissions;
            }
        });

        // NOTE: NEED TO REWORK THE ENTIRE PERMISSION SYSTEM, WE CAN REMOVE THE TRUE OR FALSE VALUE AND JUST THE PERMISSION ITSELF
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
