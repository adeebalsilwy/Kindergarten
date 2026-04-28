<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:teachers,email|unique:teachers,email,'.$this->route('teacher').'',
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
        $addresses = ['الرياض - حي النزهة', 'جدة - حي الصفا', 'الدمام - حي الفيصلية', 'مكة - حي العزيزية'];
        $qualifications = ['بكالوريوس تربية', 'ماجستير علم النفس', 'دبلوم حضانة', 'بكالوريوس علوم'];

        $this->merge([
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'address' => $this->address ?? $addresses[array_rand($addresses)],
            'date_of_birth' => $this->date_of_birth ?? null,
            'gender' => $this->gender ?? null,
            'qualification' => $this->qualification ?? $qualifications[array_rand($qualifications)],
            'experience' => $this->experience ?? null,
            'salary' => $this->salary ?? null,
            'hire_date' => $this->hire_date ?? null,
            'photo_path' => $this->photo_path ?? null,
            'is_active' => $this->is_active ?? null,
            'notes' => $this->notes ?? 'معلم متميز في مجال رياض الأطفال',
            'specialization' => $this->specialization ?? null,
            'experience_years' => $this->experience_years ?? null,
            'bio' => $this->bio ?? null,
            'user_id' => $this->user_id ?? null,
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
