<?php

return [
    'title' => 'Guardians',
    'add_new' => 'Add New Guardian',
    'edit' => 'Edit Guardian',
    'list' => 'Guardians List',
    
    // Tabs
    'tabs' => [
        'personal_info' => 'Personal Information',
        'work_info' => 'Work Information',
        'contact_info' => 'Contact Information',
        'settings' => 'Settings',
    ],
    
    // Sections
    'sections' => [
        'personal_info' => 'Personal Information',
        'work_info' => 'Work Information',
        'contact_info' => 'Contact Information',
        'settings' => 'Account Settings',
    ],
    
    // Descriptions
    'descriptions' => [
        'personal_info' => 'Enter the guardian\'s personal information including name, contact details, and identification.',
        'work_info' => 'Provide information about the guardian\'s occupation and workplace.',
        'contact_info' => 'Enter relationship details and complete address information.',
        'settings' => 'Configure account settings and notification preferences.',
    ],
    
    'fields' => [
        'name' => 'Full Name',
        'email' => 'Email Address',
        'phone' => 'Primary Phone',
        'secondary_phone' => 'Secondary Phone',
        'date_of_birth' => 'Date of Birth',
        'national_id' => 'National ID',
        'passport_number' => 'Passport Number',
        'preferred_language' => 'Preferred Language',
        'occupation' => 'Occupation',
        'workplace' => 'Workplace',
        'bank_name' => 'Bank Name',
        'bank_account_number' => 'Bank Account Number',
        'relationship' => 'Relationship to Child',
        'address' => 'Complete Address',
        'is_primary_guardian' => 'Primary Guardian',
        'is_primary_emergency_contact' => 'Primary Emergency Contact',
        'receives_sms_notifications' => 'Receive SMS Notifications',
        'receives_email_notifications' => 'Receive Email Notifications',
        'is_active' => 'Account Active',
        'notes' => 'Additional Notes',
    ],
    
    // Placeholders
    'placeholders' => [
        'name' => 'Enter full name',
        'email' => 'Enter email address',
        'phone' => 'Enter primary phone number',
        'secondary_phone' => 'Enter secondary phone number',
        'national_id' => 'Enter national ID number',
        'passport_number' => 'Enter passport number',
        'occupation' => 'Enter current occupation',
        'workplace' => 'Enter workplace name',
        'bank_name' => 'Enter bank name',
        'bank_account_number' => 'Enter bank account number',
        'address' => 'Enter complete address including street, city, and postal code',
        'notes' => 'Enter any additional information or notes',
    ],
    
    // Relationships
    'relationships' => [
        'father' => 'Father',
        'mother' => 'Mother',
        'grandfather' => 'Grandfather',
        'grandmother' => 'Grandmother',
        'uncle' => 'Uncle',
        'aunt' => 'Aunt',
        'other' => 'Other',
    ],
    
    'actions' => [
        'save' => 'Save Guardian',
        'cancel' => 'Cancel',
        'update' => 'Update Guardian',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'confirm_delete' => 'Are you sure you want to delete this guardian record?',
    ],
    
    'messages' => [
        'created' => 'Guardian record created successfully.',
        'updated' => 'Guardian record updated successfully.',
        'deleted' => 'Guardian record deleted successfully.',
        'validation_error' => 'Please correct the errors below before submitting.',
    ],
];
