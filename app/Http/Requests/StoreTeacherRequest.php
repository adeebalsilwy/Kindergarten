<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:teachers,email|unique:teachers,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'hire_date' => 'nullable|date',
            'photo_path' => 'nullable|image',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',

        ];
    }

    protected function prepareForValidation()
    {
        $teacherNames = ['أحمد محمد', 'فاطمة علي', 'سارة أحمد', 'محمد عبدالله', 'نورة سعد', 'ليلى خالد'];
        $qualifications = ['بكالوريوس تربية', 'ماجستير علم النفس', 'دبلوم حضانة', 'بكالوريوس علوم'];
        $addresses = ['الرياض - حي النزهة', 'جدة - حي الصفا', 'الدمام - حي الفيصلية', 'مكة - حي العزيزية'];

        $this->merge([
            'name' => $this->name ?? $teacherNames[array_rand($teacherNames)],
            'email' => $this->email ?? 'teacher' . time() . '@kindergarten.edu.sa',
            'phone' => $this->phone ?? '05' . rand(10000000, 99999999),
            'address' => $this->address ?? $addresses[array_rand($addresses)],
            'date_of_birth' => $this->date_of_birth ?? now()->subYears(rand(25, 45))->format('Y-m-d'),
            'gender' => $this->gender ?? (rand(0, 1) ? 'male' : 'female'),
            'qualification' => $this->qualification ?? $qualifications[array_rand($qualifications)],
            'experience' => $this->experience ?? rand(1, 15) . ' سنوات خبرة في التدريس',
            'salary' => $this->salary ?? rand(5000, 15000),
            'hire_date' => $this->hire_date ?? now()->subYears(rand(0, 5))->format('Y-m-d'),
            'photo_path' => $this->photo_path ?? null,
            'is_active' => $this->is_active ?? true,
            'notes' => $this->notes ?? 'معلم متميز في مجال رياض الأطفال',
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('teachers.fields.name'),
            'email' => __('teachers.fields.email'),
            'phone' => __('teachers.fields.phone'),
            'address' => __('teachers.fields.address'),
            'date_of_birth' => __('teachers.fields.date_of_birth'),
            'gender' => __('teachers.fields.gender'),
            'qualification' => __('teachers.fields.qualification'),
            'experience' => __('teachers.fields.experience'),
            'salary' => __('teachers.fields.salary'),
            'hire_date' => __('teachers.fields.hire_date'),
            'photo_path' => __('teachers.fields.photo_path'),
            'is_active' => __('teachers.fields.is_active'),
            'notes' => __('teachers.fields.notes'),

        ];
    }
}
