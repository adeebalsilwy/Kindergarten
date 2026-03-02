<?php

namespace Database\Seeders;

use App\Models\AccountingEntry;
use App\Models\Activity;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Curriculum;
use App\Models\Event;
use App\Models\Expense;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\GradeLevel;
use App\Models\Guardian;
use App\Models\Material;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class YemeniNurserySeeder extends Seeder
{
    /**
     * Run the database seeds with comprehensive Arabic data for Yemeni childcare management system.
     */
    public function run(): void
    {
        $this->command->info('Starting comprehensive Yemeni nursery data seeding...');

        // Create roles in English
        $roles = ['Administrator', 'Principal', 'Teacher', 'Parent', 'Accountant', 'Staff', 'Super Admin'];
        foreach ($roles as $roleName) {
            \Spatie\Permission\Models\Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);
        }

        // Create super admin user
        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@nursery.ye'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
                'phone' => '+967770000000',
                'address' => 'System Administrator',
                'email_verified_at' => Carbon::now(),
                'is_active' => true,
            ]
        );
        $superAdmin->assignRole('Super Admin');

        // Create sample users with different roles
        $users = [
            [
                'name' => 'Ahmad Mohammed Abdullah Al-Qaissi',
                'email' => 'admin@nursery.ye',
                'plain_password' => 'admin123',
                'phone' => '+967771234567',
                'address' => 'Sanaa - Huda - Al-Zubairi Street',
                'role' => 'Administrator',
            ],
            [
                'name' => 'Dr. Fatima Abdullah Ahmed Al-Hamidi',
                'email' => 'principal@nursery.ye',
                'plain_password' => 'admin123',
                'phone' => '+967772345678',
                'address' => 'Sanaa - Sabcin - An-Nakhil District',
                'role' => 'Principal',
            ],
            [
                'name' => 'Mohammed Khaled Saeed Al-Qaissi',
                'email' => 'accountant@nursery.ye',
                'plain_password' => 'admin123',
                'phone' => '+967773456789',
                'address' => 'Sanaa - Al-Mualla - Al-Jala Street',
                'role' => 'Accountant',
            ],
            [
                'name' => 'Noora Ahmad Mohammed Al-Sulai',
                'email' => 'staff@nursery.ye',
                'plain_password' => 'admin123',
                'phone' => '+967774567890',
                'address' => 'Sanaa - Al-Zubairi - Peace District',
                'role' => 'Staff',
            ],
            [
                'name' => 'Sara Abdullah Mohammed Al-Qaissi',
                'email' => 'teacher@nursery.ye',
                'plain_password' => 'admin123',
                'phone' => '+967771111111',
                'address' => 'Sanaa - Huda - Al-Zubairi Street',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Ali Hassan Ali Al-Habshi',
                'email' => 'parent@nursery.ye',
                'plain_password' => 'admin123',
                'phone' => '+967779999999',
                'address' => 'Sanaa - Sabcin - Taiz Street',
                'role' => 'Parent',
            ],
        ];

        $createdUsers = collect([]);
        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make($userData['plain_password']),
                    'phone' => $userData['phone'],
                    'address' => $userData['address'],
                    'email_verified_at' => Carbon::now(),
                    'is_active' => true,
                ]
            );

            if (!$user->hasRole($userData['role'])) {
                $user->assignRole($userData['role']);
            }
            
            $createdUsers->push($user);
        }

        // Create grade levels in Arabic for nursery
        $gradeLevels = [
            ['name' => 'KG1', 'description' => 'الروضة الأولى - أعمار 3-4 سنوات'],
            ['name' => 'KG2', 'description' => 'الروضة الثانية - أعمار 4-5 سنوات'],
            ['name' => 'KG3', 'description' => 'الروضة الثالثة - أعمار 5-6 سنوات'],
            ['name' => 'ما قبل المدرسة', 'description' => 'ما قبل المدرسة - أعمار 6-7 سنوات'],
            ['name' => 'الطفولة المبكرة', 'description' => 'برنامج الطفولة المبكرة'],
        ];

        $createdGradeLevels = collect([]);
        foreach ($gradeLevels as $level) {
            $createdLevel = GradeLevel::updateOrCreate(
                ['name' => $level['name']],
                [
                    'name' => $level['name'],
                    'description' => $level['description'],
                    'code' => match($level['name']) {
                        'KG1' => 'KG1',
                        'KG2' => 'KG2',
                        'KG3' => 'KG3',
                        'ما قبل المدرسة' => 'PRE_SCHOOL',
                        'الطفولة المبكرة' => 'EARLY_CHILD',
                        default => strtoupper(substr(str_replace(' ', '_', preg_replace('/[^A-Za-z0-9_]/', '', $level['name'])), 0, 10))
                    },
                ]
            );
            $createdGradeLevels->push($createdLevel);
        }

        // Create professional teachers with Arabic names
        $professionalTeachers = [
            [
                'name' => 'سارة عبدالله محمد القائسي',
                'email' => 'sara.alqaisi@ nursery.ye',
                'phone' => '+967771111111',
                'address' => 'صنعاء - حدة - شارع الزبيري',
                'qualification' => 'ماجستير في تربية الطفولة المبكرة',
                'specialization' => 'تطوير الطفل',
                'experience_years' => 8,
            ],
            [
                'name' => 'أمل سعيد أحمد السلوي',
                'email' => 'amal.alsulawi@ nursery.ye',
                'phone' => '+967772222222',
                'address' => 'صنعاء - سبعين - حي النخيل',
                'qualification' => 'بكالوريوس في تربية الطفولة',
                'specialization' => 'الرياضيات المبكرة',
                'experience_years' => 5,
            ],
            [
                'name' => 'ربى خالد محمد الحميدي',
                'email' => 'rahab.alhamidi@ nursery.ye',
                'phone' => '+967773333333',
                'address' => 'صنعاء - المعلّا - شارع الجلاء',
                'qualification' => 'دبلوم رعاية الأطفال',
                'specialization' => 'اللغة العربية',
                'experience_years' => 3,
            ],
            [
                'name' => 'هدى أحمد عبدالله القائسي',
                'email' => 'huda.alqaisi@ nursery.ye',
                'phone' => '+967774444444',
                'address' => 'صنعاء - الزبيري - حي السلام',
                'qualification' => 'بكالوريوس في علم النفس',
                'specialization' => 'السلوك والنمو',
                'experience_years' => 6,
            ],
            [
                'name' => 'منى سالم خالد القائسي',
                'email' => 'mona.alsalem@ nursery.ye',
                'phone' => '+967775555555',
                'address' => 'صنعاء - حدة - شارع الزبيري',
                'qualification' => 'ماجستير في التعليم الخاص',
                'specialization' => 'الاحتياجات الخاصة',
                'experience_years' => 7,
            ],
            [
                'name' => 'دعاء محمد سعيد السلوي',
                'email' => 'duha.alsulawi@ nursery.ye',
                'phone' => '+967776666666',
                'address' => 'صنعاء - سبعين - حي النخيل',
                'qualification' => 'بكالوريوس في الفنون',
                'specialization' => 'الفن والإبداع',
                'experience_years' => 4,
            ],
            [
                'name' => 'فاطمة حسن علي الردماني',
                'email' => 'fatima.alradmani@ nursery.ye',
                'phone' => '+967777777777',
                'address' => 'صنعاء - المعلّا - حي الثورة',
                'qualification' => 'ماجستير في قيادة التعليم',
                'specialization' => 'إدارة المدارس',
                'experience_years' => 10,
            ],
            [
                'name' => 'عزيزة محمد سعيد العميري',
                'email' => 'aisha.ameeri@ nursery.ye',
                'phone' => '+967778888888',
                'address' => 'صنعاء - حدة - شارع الوحدة',
                'qualification' => 'بكالوريوس في تعليم العلوم',
                'specialization' => 'العلوم المبكرة',
                'experience_years' => 5,
            ],
        ];

        $createdTeachers = collect([]);
        foreach ($professionalTeachers as $teacherData) {
            $teacher = Teacher::updateOrCreate(
                ['email' => $teacherData['email']],
                [
                    'name' => $teacherData['name'],
                    'email' => $teacherData['email'],
                    'phone' => $teacherData['phone'],
                    'address' => $teacherData['address'],
                    'qualification' => $teacherData['qualification'],
                    'specialization' => $teacherData['specialization'],
                    'experience_years' => $teacherData['experience_years'],
                    'hire_date' => Carbon::now()->subYears($teacherData['experience_years'] - 2),
                    'salary' => rand(120000, 200000), // ر.ي
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
            $createdTeachers->push($teacher);
        }

        // Create comprehensive classes with Arabic names and descriptions for nursery
        $classData = [
            [
                'name' => 'KG1 - تطوير المهارات الأساسية',
                'code' => 'KG1-BSD',
                'age_group' => 'preschool',
                'description' => 'تطوير المهارات الأساسية للأطفال أعمار 3-4 سنوات',
                'capacity' => 20,
                'monthly_fee' => 50000, // ر.ي
                'curriculum' => 'المنهاج الوطني',
                'teacher_id' => $createdTeachers[0]->id,
                'grade_level_id' => $createdGradeLevels[0]->id,
            ],
            [
                'name' => 'KG2 - التعلم الإبداعي',
                'code' => 'KG2-CL',
                'age_group' => 'pre_k',
                'description' => 'التعلم الإبداعي للأطفال أعمار 4-5 سنوات',
                'capacity' => 25,
                'monthly_fee' => 60000, // ر.ي
                'curriculum' => 'المنهاج الوطني',
                'teacher_id' => $createdTeachers[1]->id,
                'grade_level_id' => $createdGradeLevels[1]->id,
            ],
            [
                'name' => 'KG3 - مهارات ما قبل القراءة',
                'code' => 'KG3-PRS',
                'age_group' => 'kindergarten',
                'description' => 'مهارات ما قبل القراءة للأطفال أعمار 5-6 سنوات',
                'capacity' => 22,
                'monthly_fee' => 70000, // ر.ي
                'curriculum' => 'المنهاج الوطني',
                'teacher_id' => $createdTeachers[2]->id,
                'grade_level_id' => $createdGradeLevels[2]->id,
            ],
            [
                'name' => 'ما قبل المدرسة - الاستعداد للمدرسة',
                'code' => 'PS-SP',
                'age_group' => 'kindergarten',
                'description' => 'الاستعداد للمدرسة للأطفال أعمار 6-7 سنوات',
                'capacity' => 18,
                'monthly_fee' => 80000, // ر.ي
                'curriculum' => 'المنهاج الوطني',
                'teacher_id' => $createdTeachers[3]->id,
                'grade_level_id' => $createdGradeLevels[3]->id,
            ],
            [
                'name' => 'فصل الاحتياجات الخاصة',
                'code' => 'SNC-SN',
                'age_group' => 'preschool',
                'description' => 'فصل دعم الأطفال ذوي الاحتياجات الخاصة',
                'capacity' => 12,
                'monthly_fee' => 90000, // ر.ي
                'curriculum' => 'برنامج التعليم الفردي',
                'teacher_id' => $createdTeachers[4]->id,
                'grade_level_id' => $createdGradeLevels[4]->id,
            ],
            [
                'name' => 'مجموعة التعلم المتقدم',
                'code' => 'ALG-AL',
                'age_group' => 'pre_k',
                'description' => 'التعلم المتقدم للأطفال الموهوبين',
                'capacity' => 15,
                'monthly_fee' => 85000, // ر.ي
                'curriculum' => 'المنهاج الوطني المتقدم',
                'teacher_id' => $createdTeachers[5]->id,
                'grade_level_id' => $createdGradeLevels[1]->id,
            ],
            [
                'name' => 'غمر اللغة العربية',
                'code' => 'ALI-AL',
                'age_group' => 'pre_k',
                'description' => 'برنامج غمر اللغة العربية',
                'capacity' => 20,
                'monthly_fee' => 75000, // ر.ي
                'curriculum' => 'منهاج اللغة العربية',
                'teacher_id' => $createdTeachers[6]->id,
                'grade_level_id' => $createdGradeLevels[1]->id,
            ],
            [
                'name' => 'أساسيات الرياضيات',
                'code' => 'MF-MF',
                'age_group' => 'kindergarten',
                'description' => 'مهارات أساسيات الرياضيات',
                'capacity' => 18,
                'monthly_fee' => 65000, // ر.ي
                'curriculum' => 'منهاج الرياضيات',
                'teacher_id' => $createdTeachers[7]->id,
                'grade_level_id' => $createdGradeLevels[2]->id,
            ],
        ];

        $createdClasses = collect([]);
        foreach ($classData as $data) {
            $class = Classes::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name' => $data['name'],
                    'code' => $data['code'],
                    'description' => $data['description'],
                    'capacity' => $data['capacity'],
                    'age_group' => $data['age_group'],
                    'current_students' => rand(10, $data['capacity'] - 2),
                    'start_time' => ['07:30:00', '08:00:00', '08:30:00'][rand(0, 2)],
                    'end_time' => ['13:30:00', '14:00:00', '14:30:00'][rand(0, 2)],
                    'room_number' => 'غرفة '.($createdClasses->count() + 1),
                    'monthly_fee' => $data['monthly_fee'],
                    'curriculum' => $data['curriculum'],
                    'teacher_id' => $data['teacher_id'],
                    'grade_level_id' => $data['grade_level_id'],
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
            $createdClasses->push($class);
        }

        // Professional Arabic/Yemeni names data
        $arabicMaleNames = [
            'أحمد', 'محمد', 'علي', 'يحيى', 'عمر', 'خالد', 'سالم', 'ناصر', 'فهد', 'عبدالله',
            'محمود', 'سامي', 'رائد', 'فضل', 'جمال', 'هادي', 'منصور', 'صالح', 'ماجد', 'ربيع',
            'زيد', 'أسامة', 'بدر', 'تيم', 'راشد', 'شيري', 'طارق', 'وليد', 'يزيد', 'عمرو',
            'سفيان', 'أيمن', 'رضا', 'مروان', 'حسام', 'إياد', 'جهاد', 'أ الشريف', 'رائف', 'نبيل'
        ];

        $arabicFemaleNames = [
            'فاطمة', 'مريم', 'آمنة', 'نورا', 'سارة', 'هند', 'عائشة', 'نادية', 'منى', 'سوسن',
            'رنا', 'علا', 'نجلاء', 'هدى', 'عروة', 'بتول', 'دoha', 'نور', 'ردا', 'إخرام',
            'رها', 'أمل', 'شهد', 'رحمة', 'زينب', 'خديجة', 'أسماء', 'رقية', 'فريدة', 'سمية',
            'مها', 'ربى', 'جميلة', 'لبنى', 'نسمة', 'سجى', 'تالا', 'حنين', 'ميساء', 'ليلى'
        ];

        $yemeniLastNames = [
            'القائسي', 'السلوي', 'الحميدي', 'البختي', 'الصفواني', 'النقبي', 'الأنسي',
            'السمعي', 'الرعيني', 'الهديفي', 'السعودي', 'الحمالي', 'الشامي', 'الحبشي',
            'البحرمي', 'العبسي', 'الشجاعي', 'الردمي', 'المصلي', 'الجنبي',
            'الرازحي', 'الصمدي', 'السقاف', 'البركاني', 'الرفاعي', 'الظاهري', 'العكبري', 'الهاشمي'
        ];

        $yemeniCities = [
            'صنعاء', 'عدن', 'تعز', 'الحديدة', 'إب', 'ذمار', 'عمران', 'صعدة',
            'حجة', 'البيضاء', 'ريمة', 'الجوف', 'مأرب', 'نيوز سنا', 'الضالع',
            'أبين', 'المحويت', 'حيفان', 'الصلو', 'الكحلاء'
        ];

        // Create diverse children with Arabic names and Yemeni backgrounds
        $createdChildren = collect([]);
        for ($i = 0; $i < 80; $i++) {
            $gender = rand(0, 1) ? 'male' : 'female';
            $firstName = $gender === 'male'
                ? $arabicMaleNames[array_rand($arabicMaleNames)]
                : $arabicFemaleNames[array_rand($arabicFemaleNames)];
            $lastName = $yemeniLastNames[array_rand($yemeniLastNames)];

            // Generate realistic family addresses
            $city = $yemeniCities[array_rand($yemeniCities)];
            $districts = ['الزبيري', 'سبعین', 'المعلّا', 'حدة', 'الوسيطية', 'الثوابت', 'الصفیاء', 'النهدة'];
            $district = $districts[array_rand($districts)];

            $child = Children::updateOrCreate(
                ['name' => "$firstName $lastName", 'dob' => Carbon::now()->subYears(rand(3, 7))->subDays(rand(0, 365))],
                [
                    'name' => "$firstName $lastName",
                    'dob' => Carbon::now()->subYears(rand(3, 7))->subDays(rand(0, 365)),
                    'gender' => $gender,
                    'emergency_contact_name' => 'Parent/Father/Mother',
                    'emergency_contact_phone' => '+96777'.rand(1000000, 9999999),
                    'emergency_contact_relation' => ['Father', 'Mother', 'Grandfather', 'Grandmother', 'Uncle', 'Aunt'][rand(0, 5)],
                    'medical_conditions' => rand(1, 8) == 1 ? ['Asthma', 'Diabetes', 'Epilepsy', 'Heart Condition'][rand(0, 3)] : 'Healthy child',
                    'allergies' => rand(1, 10) == 1 ? ['Soy allergy', 'Dairy allergy', 'Egg allergy', 'Nut allergy'][rand(0, 3)] : null,
                    'class_id' => $createdClasses->random()->id,
                    'enrollment_date' => Carbon::now()->subDays(rand(30, 365)),
                    'nationality' => 'Yemeni',
                    'blood_type' => ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'][rand(0, 7)],
                    'fees_required' => rand(100000, 500000), // إجمالي الرسوم المطلوبة
                    'fees_paid' => rand(0, 500000), // المبلغ المدفوع
                    'enrollment_status' => ['active', 'inactive', 'graduated', 'transferred'][rand(0, 3)],
                    'religion' => 'Islam',
                    'special_needs' => rand(1, 15) == 1 ? ['Learning disability', 'Speech delay', 'Physical disability', 'Emotional/behavioral'][rand(0, 3)] : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
            $createdChildren->push($child);
        }

        // Create diverse parents/guardians with Arabic names and realistic family structures
        $createdGuardians = collect([]);
        foreach ($createdChildren as $child) {
            $lastName = explode(' ', $child->name)[1]; // Extract last name

            // Generate realistic family addresses
            $city = $yemeniCities[array_rand($yemeniCities)];
            $districts = ['الزبيري', 'سبعین', 'المعلّا', 'حدة', 'الوسيطية', 'الثوابت', 'الصفیاء'];
            $district = $districts[array_rand($districts)];

            // Father
            $fatherFirstName = $arabicMaleNames[array_rand($arabicMaleNames)];
            $father = Guardian::updateOrCreate(
                ['email' => strtolower(str_replace(' ', '.', $fatherFirstName)).'.'.strtolower($lastName).'@gmail.com'],
                [
                    'name' => "$fatherFirstName $lastName",
                    'phone' => '+96777'.rand(1000000, 9999999),
                    'relationship' => 'أب',
                    'occupation' => ['مهندس', 'طبيب', 'محاسب', 'معلم', 'موظف حكومي', 'رجل أعمال', 'عامل', 'فلاح'][rand(0, 7)],
                    'address' => "$city - $district",
                    'email' => strtolower(str_replace(' ', '.', $fatherFirstName)).'.'.strtolower($lastName).'@gmail.com',
                    'is_primary_guardian' => true,
                    'is_primary_emergency_contact' => true,
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
            $createdGuardians->push($father);

            // Mother (50% chance)
            if (rand(1, 2) == 1) {
                $motherFirstName = $arabicFemaleNames[array_rand($arabicFemaleNames)];
                $mother = Guardian::updateOrCreate(
                    ['email' => strtolower(str_replace(' ', '.', $motherFirstName)).'.'.strtolower($lastName).'@gmail.com'],
                    [
                        'name' => "$motherFirstName $lastName",
                        'phone' => '+96777'.rand(1000000, 9999999),
                        'relationship' => 'أم',
                        'occupation' => ['طبيبة', 'معلمة', 'محاسبة', 'ربة منزل', 'موظفة حكومية', 'مصممة', 'ممرضة', 'موظفة اجتماعية'][rand(0, 7)],
                        'address' => "$city - $district",
                        'email' => strtolower(str_replace(' ', '.', $motherFirstName)).'.'.strtolower($lastName).'@gmail.com',
                        'is_primary_guardian' => false,
                        'is_primary_emergency_contact' => false,
                        'is_active' => true,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
                $createdGuardians->push($mother);

                // Link child to both parents
                $child->update([
                    'parent_id' => $father->id,
                    'second_parent_id' => $mother->id,
                ]);
            } else {
                // Link child to single parent
                $child->update([
                    'parent_id' => $father->id,
                ]);
            }
        }

        // Create comprehensive fee structure with Arabic categories
        $feeCategories = [
            ['name' => 'رسوم التسجيل', 'amount' => 75000, 'description' => 'رسوم تسجيل لمرة واحدة للأطفال الجدد', 'frequency' => 'once', 'category' => 'registration'],
            ['name' => 'الرسوم الشهرية', 'amount' => 60000, 'description' => 'الرسوم الشهرية للتعليم والأنشطة', 'frequency' => 'monthly', 'category' => 'tuition'],
            ['name' => 'مواد الدراسة', 'amount' => 25000, 'description' => 'كتب ومواد الدراسة', 'frequency' => 'yearly', 'category' => 'materials'],
            ['name' => 'رسوم الأنشطة', 'amount' => 15000, 'description' => 'رسوم الأنشطة ورحلات المدرسة', 'frequency' => 'monthly', 'category' => 'activities'],
            ['name' => 'المواصلات', 'amount' => 30000, 'description' => 'رسوم حافلة المدرسة', 'frequency' => 'monthly', 'category' => 'transportation'],
            ['name' => 'فحص طبي', 'amount' => 10000, 'description' => 'رسوم الفحص الطبي السنوي', 'frequency' => 'yearly', 'category' => 'medical'],
            ['name' => 'معدات الرياضة', 'amount' => 20000, 'description' => 'معدات التربية البدنية والرياضة', 'frequency' => 'yearly', 'category' => 'sports'],
            ['name' => 'الوصول إلى المكتبة', 'amount' => 8000, 'description' => 'وصول المكتبة وصيانة الكتب', 'frequency' => 'yearly', 'category' => 'library'],
        ];

        $createdFees = collect([]);
        foreach ($feeCategories as $feeData) {
            $fee = Fee::create([
                'name' => $feeData['name'],
                'amount' => $feeData['amount'],
                'description' => $feeData['description'],
                'frequency' => $feeData['frequency'],
                'category' => $feeData['category'],
                'due_date' => Carbon::now()->addDays(10),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $createdFees->push($fee);
        }

        // Create comprehensive payment records with Arabic data
        $paymentMethods = ['cash', 'bank_transfer', 'online', 'check'];
        $paymentStatuses = ['completed', 'pending', 'failed', 'refunded'];
        
        foreach ($createdChildren as $child) {
            // Registration fee (one-time, but some might be pending)
            $regFee = Fee::where('category', 'registration')->first();
            if ($regFee) {
                Payment::create([
                    'child_id' => $child->id,
                    'fee_id' => $regFee->id,
                    'amount' => 75000,
                    'payment_date' => $child->enrollment_date,
                    'payment_method' => $paymentMethods[rand(0, 3)],
                    'reference_number' => 'REG-'.strtoupper(substr(md5(time().$child->id), 0, 8)),
                    'status' => $paymentStatuses[rand(0, 3)], // Different statuses for comprehensive data
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Monthly payments for the last 6 months
            for ($month = 0; $month < 6; $month++) {
                $paymentDate = Carbon::now()->subMonths($month);

                // Tuition payment (sometimes partial)
                $tuitionFee = Fee::where('category', 'tuition')->first();
                if ($tuitionFee) {
                    $tuitionAmount = rand(1, 5) == 1 ? $tuitionFee->amount / 2 : $tuitionFee->amount; // Partial payment scenario
                    
                    Payment::create([
                        'child_id' => $child->id,
                        'fee_id' => $tuitionFee->id,
                        'amount' => $tuitionAmount,
                        'payment_date' => $paymentDate->copy()->addDays(rand(1, 15)),
                        'payment_method' => $paymentMethods[rand(0, 3)],
                        'reference_number' => 'TUITION-'.strtoupper(substr(md5(time().$child->id.$month), 0, 8)),
                        'status' => $paymentStatuses[rand(0, 3)],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                // Activity fee (80% chance of payment)
                $activityFee = Fee::where('category', 'activities')->first();
                if ($activityFee && rand(1, 10) <= 8) {
                    Payment::create([
                        'child_id' => $child->id,
                        'fee_id' => $activityFee->id,
                        'amount' => 15000,
                        'payment_date' => $paymentDate->copy()->addDays(rand(10, 25)),
                        'payment_method' => $paymentMethods[rand(0, 3)],
                        'reference_number' => 'ACT-'.strtoupper(substr(md5(time().$child->id.$month), 0, 8)),
                        'status' => $paymentStatuses[rand(0, 3)],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
                
                // Transportation fee (70% chance)
                $transportFee = Fee::where('category', 'transportation')->first();
                if ($transportFee && rand(1, 10) <= 7) {
                    Payment::create([
                        'child_id' => $child->id,
                        'fee_id' => $transportFee->id,
                        'amount' => 30000,
                        'payment_date' => $paymentDate->copy()->addDays(rand(5, 20)),
                        'payment_method' => $paymentMethods[rand(0, 3)],
                        'reference_number' => 'TRANS-'.strtoupper(substr(md5(time().$child->id.$month), 0, 8)),
                        'status' => $paymentStatuses[rand(0, 3)],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        // Create detailed attendance records with Arabic data
        foreach ($createdChildren as $child) {
            $startDate = Carbon::now()->subMonths(3); // Last 3 months
            $endDate = Carbon::now();

            for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                // Skip weekends (Friday and Saturday in Yemen)
                if ($date->dayOfWeek == Carbon::FRIDAY || $date->dayOfWeek == Carbon::SATURDAY) {
                    continue;
                }

                // Various attendance scenarios: present, late, absent
                $attendanceChance = rand(1, 100);
                if ($attendanceChance <= 75) { // 75% attendance rate
                    $status = 'present';
                    $checkInTime = $date->copy()->hour(7)->minute(rand(15, 45));
                    $checkOutTime = $date->copy()->hour(13)->minute(rand(15, 45));
                    
                    // Determine if late or on time
                    $checkInStatus = $checkInTime->hour > 8 || ($checkInTime->hour == 8 && $checkInTime->minute > 15) ? 'late' : 'ontime';
                    $checkOutStatus = $checkOutTime->hour < 13 || ($checkOutTime->hour == 13 && $checkOutTime->minute < 15) ? 'early' : 'ontime';
                    
                    Attendance::create([
                        'child_id' => $child->id,
                        'date' => $date,
                        'status' => $status,
                        'check_in_time' => $checkInTime,
                        'check_out_time' => $checkOutTime,
                        'absence_reason' => null,
                        'check_in_status' => $checkInStatus,
                        'check_out_status' => $checkOutStatus,
                        'attendance_type' => 'full_day',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } elseif ($attendanceChance <= 90) { // 15% absent
                    $absenceReasons = ['Illness', 'Family trip', 'External event', 'Unspecified', 'Medical appointment', 'Weather conditions'];
                    Attendance::create([
                        'child_id' => $child->id,
                        'date' => $date,
                        'status' => 'absent',
                        'check_in_time' => null,
                        'check_out_time' => null,
                        'absence_reason' => $absenceReasons[rand(0, count($absenceReasons) - 1)],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                } else { // 10% half-day attendance
                    $checkInTime = $date->copy()->hour(9)->minute(rand(0, 30));
                    $checkOutTime = $date->copy()->hour(11)->minute(rand(30, 59));
                    
                    Attendance::create([
                        'child_id' => $child->id,
                        'date' => $date,
                        'status' => 'present',
                        'check_in_time' => $checkInTime,
                        'check_out_time' => $checkOutTime,
                        'absence_reason' => 'Half day due to appointment',
                        'attendance_type' => 'half_day',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }

        // Create academic evaluations and grades with Arabic subjects
        $subjects = [
            'المهارات الاجتماعية', 'الفن والإبداع', 'اللغة العربية', 'الرياضيات المبكرة', 
            'التنمية الجسدية', 'العلوم المبكرة', 'الموسيقى والحركة', 'المهارات الدقيقة',
            'تطوير اللغة', 'حل المشكلات', 'التعاون', 'الاستقلال'
        ];
        
        $gradeSystems = [
            // Numeric scores
            ['ممتاز' => 95, 'جيد جداً' => 85, 'جيد' => 75, 'مقبول' => 65, 'ضعيف' => 45],
            // Letter grades
            ['A+' => 95, 'A' => 90, 'B+' => 85, 'B' => 80, 'C+' => 75, 'C' => 70, 'D' => 60, 'F' => 45],
            // Percentage
            ['متميز' => 95, 'ممتاز' => 90, 'جيد جداً' => 85, 'جيد' => 75, 'مقبول' => 65, 'تحتاج تحسين' => 55]
        ];

        foreach ($createdChildren as $child) {
            // Create 4-8 evaluations per child with different subjects and grading systems
            for ($i = 0; $i < rand(4, 8); $i++) {
                $subject = $subjects[array_rand($subjects)];
                $gradingSystem = $gradeSystems[array_rand($gradeSystems)];
                
                $score = array_rand($gradingSystem);
                $gradeValue = $gradingSystem[$score];
                
                Grade::create([
                    'child_id' => $child->id,
                    'subject' => $subject,
                    'score' => $score,
                    'grade' => $gradeValue >= 90 ? 'ممتاز' : ($gradeValue >= 80 ? 'جيد جداً' : ($gradeValue >= 70 ? 'جيد' : ($gradeValue >= 60 ? 'مقبول' : 'ضعيف'))),
                    'date' => Carbon::now()->subDays(rand(15, 120)), // evaluation date
                    'comments' => ['يظهر تحسناً كبيراً', 'تحتاج لمزيد من التدريب', 'مشاركة ممتازة', 'جهد جيد', 'يمكن تحسينه'][rand(0, 4)],
                    'evaluator_id' => $createdTeachers->random()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Create comprehensive curriculum with Arabic content
        $curricula = [
            [
                'name' => 'المنهاج الوطني لطفولة الطفولة المبكرة',
                'code' => 'NECC-001',
                'description' => 'منهاج شامل للتعليم ما قبل المدرسي',
                'objectives' => ['تطوير المهارات المعرفية', 'تعزيز التفاعل الاجتماعي', 'بناء المهارات الحركية'],
                'learning_outcomes' => ['أساسيات القراءة', 'مهارات الحساب', 'الكفاءة الاجتماعية'],
                'grade_level' => 'ما قبل المدرسة',
                'subject_area' => 'عام',
                'topics' => ['تطوير اللغة', 'المفاهيم الرياضية', 'استكشاف العلوم', 'الفن والإبداع'],
                'materials_needed' => ['كتب العمل', 'لوازم الفنون', 'كتل البناء', 'الآلات الموسيقية'],
                'curriculum_type' => 'وطني',
                'duration_weeks' => 36,
                'assessment_methods' => ['الملاحظة', 'تقييم المحفظة', 'مهام الأداء'],
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'name' => 'برنامج غمر اللغة العربية',
                'code' => 'ALIP-002',
                'description' => 'برنامج تعليم اللغة العربية المكثف',
                'objectives' => ['الإتقان في اللغة العربية', 'الفهم الثقافي', 'التقدير الأدبي'],
                'learning_outcomes' => ['فهم القراءة', 'مهارات الكتابة', 'الاتصال الشفهي'],
                'grade_level' => 'KG2-KG3',
                'subject_area' => 'لغة',
                'topics' => ['بناء المفردات', 'أساسيات القواعد', 'سرد القصص', 'الخط'],
                'materials_needed' => ['الكتب الدراسية', 'المواد الصوتية', 'البطاقات التعليمية', 'مواد الكتابة'],
                'curriculum_type' => 'متخصص',
                'duration_weeks' => 32,
                'assessment_methods' => ['تقييمات التحدث', 'نماذج الكتابة', 'اختبارات القراءة'],
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'name' => 'أساسيات STEM',
                'code' => 'SFP-003',
                'description' => 'العلوم، والتكنولوجيا، والهندسة، والرياضيات',
                'objectives' => ['التفكير العلمي', 'حل المشكلات', 'الاستدلال المنطقي'],
                'learning_outcomes' => ['المفاهيم العلمية الأساسية', 'الهندسة البسيطة', 'التفكير الرياضي'],
                'grade_level' => 'KG3-ما قبل المدرسة',
                'subject_area' => 'STEM',
                'topics' => ['الآلات البسيطة', 'البرمجة الأساسية', 'القياس', 'الأنماط'],
                'materials_needed' => ['مجموعات البناء', 'أدوات القياس', 'أجهزة الكمبيوتر البسيطة', 'مختبرات العلوم'],
                'curriculum_type' => 'متخصص',
                'duration_weeks' => 30,
                'assessment_methods' => ['تقييم المشروع', 'عروض مباشرة', 'التعاون بين الأقران'],
                'is_active' => true,
                'status' => 'published',
            ],
            [
                'name' => 'برنامج احتياجات خاصة مخصص',
                'code' => 'SNIP-004',
                'description' => 'برنامج التعليم المخصص للأطفال ذوي الاحتياجات الخاصة',
                'objectives' => ['أهداف التعلم الشخصية', 'الدعم العلاجي', 'تطوير المهارات'],
                'learning_outcomes' => ['تحسين الاتصال', 'قدرات العناية الذاتية', 'المهارات الاجتماعية'],
                'grade_level' => 'متنوع',
                'subject_area' => 'علاجي',
                'topics' => ['علاج النطق', 'العلاج المهني', 'تدخلات سلوكية', 'مهارات الحياة'],
                'materials_needed' => ['مواد العلاج', 'المعدات التكيفية', 'الوسائط البصرية', 'أدوات الحسية'],
                'curriculum_type' => 'مخصص',
                'duration_weeks' => 40,
                'assessment_methods' => ['التقييمات العلاجية', 'ملاحظات السلوك', 'معالم التنمية'],
                'is_active' => true,
                'status' => 'published',
            ],
        ];

        $createdCurricula = collect([]);
        foreach ($curricula as $curriculumData) {
            $curriculum = Curriculum::updateOrCreate(
                ['code' => $curriculumData['code']],
                [
                    'name' => $curriculumData['name'],
                    'code' => $curriculumData['code'],
                    'description' => $curriculumData['description'],
                    'objectives' => $curriculumData['objectives'],
                    'learning_outcomes' => $curriculumData['learning_outcomes'],
                    'grade_level' => $curriculumData['grade_level'],
                    'subject_area' => $curriculumData['subject_area'],
                    'topics' => $curriculumData['topics'],
                    'materials_needed' => $curriculumData['materials_needed'],
                    'curriculum_type' => $curriculumData['curriculum_type'],
                    'duration_weeks' => $curriculumData['duration_weeks'],
                    'assessment_methods' => $curriculumData['assessment_methods'],
                    'is_active' => $curriculumData['is_active'],
                    'status' => 'published',
                    'published_at' => Carbon::now()->subDays(rand(30, 180)),
                    'created_by' => $createdUsers->random()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
            $createdCurricula->push($curriculum);
        }

        // Create diverse activities with Arabic content
        $activityTypes = ['educational', 'creative', 'physical', 'social', 'cultural', 'science'];
        $difficultyLevels = ['beginner', 'intermediate', 'advanced'];
        $categories = ['art', 'math', 'language', 'science', 'music', 'games', 'storytelling', 'outdoor'];

        foreach ($createdClasses as $class) {
            // Create 8-12 activities per class
            for ($i = 0; $i < rand(8, 12); $i++) {
                $scheduledDate = Carbon::now()->addDays(rand(1, 30));
                
                $activityTitles = [' mixing colors art', 'number games', 'story circle', 'music and movement', 'building blocks challenge', 'nature walk', 'drama play', 'cooking activity', 'science experiment', 'puzzle time'];
                $title = ucfirst(trim($activityTitles[rand(0, 9)])); // Properly capitalize
                
                $materials = ['Pencils', 'Paper', 'Scissors', 'Glue', 'Colors', 'Blocks', 'Musical Instruments'];
                $requiredMaterials = array_slice($materials, 0, rand(2, min(5, count($materials))));
                
                $objectives = ['Cognitive development', 'Motor skills', 'Social interaction', 'Creativity'];
                $learningObjectives = array_slice($objectives, 0, rand(2, min(3, count($objectives))));
                
                $outcomes = ['Improved skills', 'Knowledge gained', 'Confidence building'];
                $outcomeResults = array_slice($outcomes, 0, rand(1, min(2, count($outcomes))));
                
                // Don't include assessment_criteria since it's not in the casts array
                Activity::updateOrCreate(
                    ['title' => $title, 'scheduled_date' => $scheduledDate],
                    [
                        'title' => $title,
                        'description' => 'نشاط ممتع للأطفال لتعلم وتطوير المهارات',
                        'instructions' => 'اتبع إرشادات النشاط المخطط',
                        'class_id' => $class->id,
                        'teacher_id' => $class->teacher_id,
                        'curriculum_id' => $createdCurricula->random()->id,
                        'scheduled_date' => $scheduledDate,
                        'start_time' => $scheduledDate->copy()->hour(rand(9, 11))->minute([0, 15, 30, 45][rand(0, 3)]),
                        'end_time' => $scheduledDate->copy()->hour(rand(10, 12))->minute([0, 15, 30, 45][rand(0, 3)]),
                        'activity_type' => $activityTypes[rand(0, count($activityTypes) - 1)],
                        'difficulty_level' => $difficultyLevels[rand(0, count($difficultyLevels) - 1)],
                        'required_materials' => $requiredMaterials,
                        'estimated_duration' => rand(30, 120), // minutes
                        'location' => ['Classroom', 'Playground', 'Art Room', 'Library', 'Garden'][rand(0, 4)],
                        'is_active' => true,
                        'learning_objectives' => $learningObjectives,
                        'outcomes' => $outcomeResults,
                        'max_participants' => $class->capacity,
                        'status' => 'active',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        }

        // Create diverse events with Arabic content
        $eventTypes = ['field_trip', 'parent_meeting', 'performance', 'celebration', 'workshop', 'sports_day'];
        $statuses = ['active', 'completed', 'cancelled', 'upcoming'];
        
        foreach ($createdClasses as $class) {
            // Create 4-6 events per class
            for ($i = 0; $i < rand(4, 6); $i++) {
                $startDate = Carbon::now()->addDays(rand(1, 60));
                $endDate = $startDate->copy()->addHours(rand(1, 4));
                
                $eventTitles = ['Field Trip to Zoo', 'Parent-Teacher Meeting', 'Children Performance', 'National Day Celebration', 'Art Workshop', 'Sports Day', 'Science Fair', 'Story Telling Session'];
                $title = $eventTitles[rand(0, 7)];
                
                $attendeesOptions = ['children', 'parents', 'teachers', 'guests'];
                $attendees = array_slice($attendeesOptions, 0, rand(1, min(3, count($attendeesOptions))));
                
                Event::updateOrCreate(
                    ['title' => $title, 'start_datetime' => $startDate],
                    [
                        'title' => $title,
                        'description' => 'حدث خاص للأطفال والعائلات',
                        'start_datetime' => $startDate,
                        'end_datetime' => $endDate,
                        'location' => ['School Playground', 'Community Center', 'Local Park', 'School Hall', 'Museum', 'Zoo'][rand(0, 5)],
                        'event_type' => $eventTypes[rand(0, count($eventTypes) - 1)],
                        'organizer' => $createdTeachers->random()->name,
                        'class_id' => $class->id,
                        'teacher_id' => $class->teacher_id,
                        'attendees' => $attendees,
                        'requires_confirmation' => rand(1, 3) != 1,
                        'is_public' => rand(1, 4) == 1,
                        'is_recurring' => rand(1, 5) == 1,
                        'status' => $statuses[rand(0, count($statuses) - 1)],
                        'send_reminders' => rand(1, 2) == 1,
                        'reminder_hours_before' => [6, 12, 24, 48][rand(0, 3)],
                        'max_attendees' => $class->capacity * 2, // Allow parents too
                        'cost' => rand(0, 20000), // Some events might have cost
                        'registration_deadline' => $startDate->copy()->subDays(rand(1, 7)),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        }

        // Create operational expenses with Arabic categories
        $expenseCategoriesList = ['supplies', 'utilities', 'salaries', 'maintenance', 'activities', 'insurance', 'equipment', 'food', 'transportation', 'training'];
        $vendors = ['Office Supply Co.', 'Electric Company', 'Water Company', 'Cleaning Service', 'Security Service', 'IT Support', 'Medical Clinic', 'Transport Company', 'Training Institute', 'Construction Co.'];

        foreach ($expenseCategoriesList as $category) {
            for ($i = 0; $i < rand(3, 6); $i++) {
                Expense::updateOrCreate(
                    ['title' => $category.' expenses', 'expense_date' => Carbon::now()->subDays(rand(0, 120))],
                    [
                        'title' => $category.' expenses',
                        'description' => $category.' related expenses for kindergarten operations',
                        'amount' => rand(50000, 300000),
                        'category' => $category,
                        'expense_date' => Carbon::now()->subDays(rand(0, 120)),
                        'payment_method' => $paymentMethods[rand(0, 2)], // cash, bank_transfer, check
                        'vendor' => $vendors[rand(0, count($vendors) - 1)],
                        'status' => ['pending', 'approved', 'paid', 'rejected'][rand(0, 3)],
                        'created_by' => $createdUsers->random()->id,
                        'assigned_to' => $createdUsers->random()->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                );
            }
        }

        // Create comprehensive accounting entries
        // Entries for payments received
        $payments = Payment::with('child')->get();
        foreach ($payments as $payment) {
            if ($payment->child) {
                AccountingEntry::create([
                    'description' => 'دفعة مستلمة من '.$payment->child->name,
                    'debit' => 0,
                    'credit' => $payment->amount,
                    'entry_date' => $payment->payment_date,
                    'reference' => $payment->reference_number,
                    'account_type' => 'revenue',
                    'created_by' => $createdUsers->random()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Entries for expenses
        foreach (Expense::all() as $expense) {
            AccountingEntry::create([
                'description' => 'مصروفات '.$expense->category.' - '.$expense->vendor,
                'debit' => $expense->amount,
                'credit' => 0,
                'entry_date' => $expense->expense_date ?? $expense->created_at,
                'reference' => 'EXP-'.strtoupper(substr(md5(time().$expense->id), 0, 8)),
                'account_type' => 'expense',
                'created_by' => $createdUsers->random()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        // Add salary payments for teachers
        foreach ($createdTeachers as $teacher) {
            for ($month = 0; $month < 3; $month++) {
                AccountingEntry::create([
                    'description' => 'راتب المعلم '.$teacher->name,
                    'debit' => $teacher->salary,
                    'credit' => 0,
                    'entry_date' => Carbon::now()->subMonths($month)->lastOfMonth(),
                    'reference' => 'SAL-'.strtoupper(substr(md5(time().$teacher->id.$month), 0, 8)),
                    'account_type' => 'salary',
                    'created_by' => $createdUsers->random()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        // Create some asset entries
        AccountingEntry::create([
            'description' => 'شراء معدات تعليمية',
            'debit' => 250000,
            'credit' => 0,
            'entry_date' => Carbon::now()->subDays(15),
            'reference' => 'EQP-'.strtoupper(substr(md5(time().'equipment'), 0, 8)),
            'account_type' => 'asset',
            'created_by' => $createdUsers->random()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create comprehensive class enrollment records
        $enrolledPairs = []; // Track which child-class pairs are already enrolled
        
        foreach ($createdChildren as $child) {
            // Each child can be enrolled in multiple classes
            $availableClasses = $createdClasses->random(rand(1, 2)); // 1-2 classes per child
            
            foreach ($availableClasses as $class) {
                // Create a unique identifier for this child-class pair
                $pairKey = $child->id . '_' . $class->id;
                
                // Only create enrollment if this pair hasn't been enrolled yet
                if (!in_array($pairKey, $enrolledPairs)) {
                    // Determine enrollment status
                    $statusOptions = ['active', 'inactive', 'completed', 'transferred'];
                    $status = $statusOptions[rand(0, count($statusOptions) - 1)];
                    
                    // Calculate enrollment date (could be in the past)
                    $enrollmentDate = $child->enrollment_date->copy()->addDays(rand(0, 30));
                    
                    // Set withdrawal date if status is inactive/completed/transferred
                    $withdrawalDate = null;
                    if (in_array($status, ['inactive', 'completed', 'transferred'])) {
                        $withdrawalDate = $enrollmentDate->copy()->addDays(rand(30, 365));
                    }
                    
                    // Define reasons for enrollment status changes
                    $reasons = [
                        'active' => 'التسجيل النشط في الفصل',
                        'inactive' => 'إيقاف مؤقت للدراسة',
                        'completed' => 'إتمام متطلبات الفصل',
                        'transferred' => 'نقل إلى فصل آخر'
                    ];
                    
                    \App\Models\ClassEnrollment::updateOrCreate([
                        'class_id' => $class->id,
                        'child_id' => $child->id,
                        'enrollment_date' => $enrollmentDate,
                    ], [
                        'class_id' => $class->id,
                        'child_id' => $child->id,
                        'enrollment_date' => $enrollmentDate,
                        'withdrawal_date' => $withdrawalDate,
                        'status' => $status,
                        'reason' => $reasons[$status],
                        'created_by' => $createdUsers->random()->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                    
                    // Mark this pair as enrolled
                    $enrolledPairs[] = $pairKey;
                }
            }
        }

        $this->command->info('Comprehensive Yemeni nursery data has been successfully seeded!');
        $this->command->info('Created:');
        $this->command->info('- '.count($users).' admin users');
        $this->command->info('- '.count($createdGradeLevels).' grade levels');
        $this->command->info('- '.count($createdTeachers).' teachers');
        $this->command->info('- '.count($createdClasses).' classes');
        $this->command->info('- '.count($createdChildren).' children');
        $this->command->info('- '.count($createdGuardians).' guardians');
        $this->command->info('- '.count($createdFees).' fee types');
        $this->command->info('- '.count(Payment::all()).' payment records');
        $this->command->info('- '.count(Attendance::all()).' attendance records');
        $this->command->info('- '.count(Grade::all()).' grade records');
        $this->command->info('- '.count($createdCurricula).' curricula');
        $this->command->info('- '.count(Activity::all()).' activities');
        $this->command->info('- '.count(Event::all()).' events');
        $this->command->info('- '.count(Expense::all()).' expenses');
        $this->command->info('- '.count(AccountingEntry::all()).' accounting entries');
        $this->command->info('- '.count(\App\Models\ClassEnrollment::all()).' class enrollment records');
    }
}