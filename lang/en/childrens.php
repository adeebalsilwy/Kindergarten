<?php

return [
    'title' => 'Children',
    'add_new' => 'Add New Child',
    'edit' => 'Edit Child',
    'list' => 'Children List',
    
    // Tabs
    'tabs' => [
        'basic_info' => 'Basic Information',
        'parents' => 'Parents Information',
        'medical' => 'Medical Information',
        'enrollment' => 'Enrollment & Fees',
    ],
    
    // Sections
    'sections' => [
        'personal_info' => 'Personal Information',
        'class_assignment' => 'Class Assignment',
        'parent_info' => 'Parent/Guardian Information',
        'emergency_contact' => 'Emergency Contact',
        'medical_info' => 'Medical Information',
        'financial_info' => 'Financial Information',
        'enrollment_info' => 'Enrollment Information',
    ],
    
    // Descriptions
    'descriptions' => [
        'personal_info' => 'Enter the child\'s basic personal information including name, date of birth, and contact details.',
        'class_assignment' => 'Assign the child to an appropriate class based on their age and grade level.',
        'parent_info' => 'Select the primary parent/guardian and optional secondary parent for the child.',
        'emergency_contact' => 'Provide emergency contact information for immediate assistance when needed.',
        'medical_info' => 'Record important medical information including conditions, allergies, and medications.',
        'financial_info' => 'Set up the financial requirements and track payments for the child\'s enrollment.',
        'enrollment_info' => 'Manage enrollment status, dates, and attendance tracking information.',
    ],
    
    'fields' => [
        'name' => 'Full Name',
        'dob' => 'Date of Birth',
        'gender' => 'Gender',
        'class_id' => 'Assigned Class',
        'parent_id' => 'Primary Parent/Guardian',
        'second_parent_id' => 'Secondary Parent/Guardian',
        'photo_path' => 'Child Photo',
        'fees_required' => 'Required Fees',
        'fees_paid' => 'Fees Paid',
        'emergency_contact_name' => 'Emergency Contact Name',
        'emergency_contact_phone' => 'Emergency Contact Phone',
        'emergency_contact_relation' => 'Relationship to Child',
        'medical_conditions' => 'Medical Conditions',
        'allergies' => 'Allergies',
        'medications' => 'Current Medications',
        'blood_type' => 'Blood Type',
        'enrollment_date' => 'Enrollment Date',
        'expected_graduation_date' => 'Expected Graduation Date',
        'last_attended_at' => 'Last Attendance',
        'enrollment_status' => 'Enrollment Status',
        'nationality' => 'Nationality',
        'religion' => 'Religion',
        'special_needs' => 'Special Needs',
    ],
    
    // Placeholders
    'placeholders' => [
        'name' => 'Enter child\'s full name',
        'nationality' => 'Enter nationality',
        'religion' => 'Enter religion',
        'emergency_contact_name' => 'Enter emergency contact name',
        'emergency_contact_phone' => 'Enter emergency contact phone',
        'emergency_contact_relation' => 'Enter relationship (e.g., Mother, Father, Grandparent)',
        'medical_conditions' => 'List any medical conditions or health concerns',
        'allergies' => 'List any known allergies',
        'medications' => 'List current medications',
        'special_needs' => 'Describe any special needs or requirements',
    ],
    
    // Help text
    'help' => [
        'second_parent_optional' => 'Optional: Select if there is a secondary parent/guardian',
    ],
    
    'actions' => [
        'save' => 'Save Child',
        'cancel' => 'Cancel',
        'update' => 'Update Child',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'confirm_delete' => 'Are you sure you want to delete this child record?',
    ],
    
    'messages' => [
        'created' => 'Child record created successfully.',
        'updated' => 'Child record updated successfully.',
        'deleted' => 'Child record deleted successfully.',
        'validation_error' => 'Please correct the errors below before submitting.',
        'fill_demo_data' => 'Fill with Demo Data',
        'demo_data_filled' => 'Demo data has been filled successfully!',
    ],
];
