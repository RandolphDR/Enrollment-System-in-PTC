<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ===== 1. Admin =====
        Role::create([
            'name' => 'Admin',
            'description' => 'System Administrator with full control over all modules and settings.',
            'permissions' => json_encode([
                'full_access' => true,
                'view_dashboard' => true,

                'manage_users' => true,
                'create_users' => true,
                'edit_users' => true,
                'delete_users' => true,
                'manage_roles' => true,
                'manage_permissions' => true,

                'manage_students' => true,
                'create_student' => true,
                'edit_student' => true,
                'delete_student' => true,
                'view_student_records' => true,
                'assign_student_section' => true,
                'view_student_enrollment' => true,

                'manage_employees' => true,
                'create_employee' => true,
                'edit_employee' => true,
                'delete_employee' => true,
                'view_instructor_records' => true,
                'assign_instructors' => true,

                'manage_courses' => true,
                'create_course' => true,
                'edit_course' => true,
                'delete_course' => true,
                'manage_subjects' => true,
                'create_subject' => true,
                'edit_subject' => true,
                'delete_subject' => true,
                'assign_subjects' => true,

                'manage_schedules' => true,
                'create_schedule' => true,
                'edit_schedule' => true,
                'delete_schedule' => true,
                'view_class_list' => true,

                'manage_enrollment' => true,
                'process_enrollment' => true,
                'approve_enrollment' => true,
                'reject_enrollment' => true,
                'view_enrollment_status' => true,
                'enroll_students' => true,

                'manage_grades' => true,
                'encode_grades' => true,
                'edit_grades' => true,
                'delete_grades' => true,
                'view_grades' => true,
                'submit_grades' => true,

                'manage_payments' => true,
                'confirm_payments' => true,
                'reject_payments' => true,
                'view_payment_reports' => true,
                'generate_invoices' => true,
                'view_balance' => true,

                'manage_documents' => true,
                'upload_documents' => true,
                'view_documents' => true,
                'delete_documents' => true,
                'download_documents' => true,

                'manage_announcements' => true,
                'create_announcement' => true,
                'edit_announcement' => true,
                'delete_announcement' => true,
                'view_announcements' => true,
                'send_notifications' => true,

                'view_reports' => true,
                'generate_reports' => true,
                'export_reports' => true,

                'manage_settings' => true,
                'backup_system' => true,
                'restore_system' => true,
                'view_audit_logs' => true,
                'system_maintenance' => true,

                'view_profile' => true,
                'edit_profile' => true,
                'view_grades_student' => true,
                'view_payment_history' => true,
                'download_certificate' => true,
            ]),
        ]);

        // ===== 2. Registrar =====
        Role::create([
            'name' => 'Registrar',
            'description' => 'Manages student records, enrollment, and academic schedules.',
            'permissions' => json_encode([
                'view_dashboard' => true,

                'manage_students' => true,
                'create_student' => true,
                'edit_student' => true,
                'view_student_records' => true,
                'assign_student_section' => true,

                'manage_courses' => true,
                'manage_subjects' => true,
                'manage_schedules' => true,
                'view_class_list' => true,

                'manage_enrollment' => true,
                'process_enrollment' => true,
                'approve_enrollment' => true,
                'view_enrollment_status' => true,

                'view_reports' => true,
                'generate_reports' => true,

                'view_profile' => true,
                'edit_profile' => true,
            ]),
        ]);

        // ===== 3. Instructor =====
        Role::create([
            'name' => 'Instructor',
            'description' => 'Responsible for managing their subjects, students, and grades.',
            'permissions' => json_encode([
                'view_dashboard' => true,

                'view_class_list' => true,
                'manage_grades' => true,
                'encode_grades' => true,
                'edit_grades' => true,
                'view_grades' => true,
                'submit_grades' => true,

                'view_student_records' => true,

                'view_profile' => true,
                'edit_profile' => true,
            ]),
        ]);

        // ===== 4. Cashier =====
        Role::create([
            'name' => 'Cashier',
            'description' => 'Handles payment confirmation and financial reports.',
            'permissions' => json_encode([
                'view_dashboard' => true,

                'manage_payments' => true,
                'confirm_payments' => true,
                'reject_payments' => true,
                'view_payment_reports' => true,
                'generate_invoices' => true,

                'view_reports' => true,
                'generate_reports' => true,

                'view_profile' => true,
                'edit_profile' => true,
            ]),
        ]);

        // ===== 5. Student =====
        Role::create([
            'name' => 'Student',
            'description' => 'Can view grades, payment history, and submit enrollment forms.',
            'permissions' => json_encode([
                'view_dashboard' => true,
                'view_profile' => true,
                'edit_profile' => true,
                'submit_enrollment' => true,
                'view_enrollment_status' => true,
                'view_grades_student' => true,
                'view_payment_history' => true,
                'download_certificate' => true,
                'view_announcements' => true,
            ]),
        ]);
    }
}
