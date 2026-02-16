<?php

namespace Database\Seeders;

use App\Models\AccountingEntry;
use App\Models\Attendance;
use App\Models\Children;
use App\Models\Classes;
use App\Models\Expense;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Parents;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KindergartenDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting to seed professional Yemeni kindergarten data...');

        // Create roles first
        $roles = ['Administrator', 'Principal', 'Teacher', 'Parent', 'Accountant', 'Staff'];
        foreach ($roles as $roleName) {
            \Spatie\Permission\Models\Role::firstOrCreate([
                'name' => $roleName,
                'guard_name' => 'web',
            ]);
        }

        // Ensure demo users exist and have the exact credentials shown on the login page
        $users = [
            [
                'name' => 'أحمد محمد عبد الله القيسي',
                'email' => 'admin@kindergarten.ye',
                'plain_password' => 'admin123',
                'phone' => '+967771234567',
                'address' => 'صنعاء - حدة - شارع الزبيري',
                'role' => 'Administrator',
            ],
            [
                'name' => 'د. فاطمة عبدالله أحمد الحميدي',
                'email' => 'principal@kindergarten.ye',
                'plain_password' => 'principal123',
                'phone' => '+967772345678',
                'address' => 'صنعاء - السبعين - حي النخيل',
                'role' => 'Principal',
            ],
            [
                'name' => 'محمد خالد سعيد القيسي',
                'email' => 'accountant@kindergarten.ye',
                'plain_password' => 'accountant123',
                'phone' => '+967773456789',
                'address' => 'صنعاء - المعلا - شارع الجلاء',
                'role' => 'Accountant',
            ],
            [
                'name' => 'نورا أحمد محمد الصلوي',
                'email' => 'staff@kindergarten.ye',
                'plain_password' => 'staff123',
                'phone' => '+967774567890',
                'address' => 'صنعاء - الزبيري - حي السلام',
                'role' => 'Staff',
            ],
            [
                'name' => 'سارة عبد الله محمد القيسي',
                'email' => 'teacher@kindergarten.ye',
                'plain_password' => 'teacher123',
                'phone' => '+967771111111',
                'address' => 'صنعاء - حدة - شارع الزبيري',
                'role' => 'Teacher',
            ],
            [
                'name' => 'علي حسن علي الحبشي',
                'email' => 'parent@kindergarten.ye',
                'plain_password' => 'parent123',
                'phone' => '+967779999999',
                'address' => 'صنعاء - السبعين - شارع تعز',
                'role' => 'Parent',
            ],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['plain_password']),
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'email_verified_at' => Carbon::now(),
                    'is_active' => true,
                ]
            );

            if (! $user->hasRole($data['role'])) {
                $user->assignRole($data['role']);
            }
        }

        // Create sample teachers with professional Yemeni names and qualifications
        $teacherEmails = ['sara.alqaisi@kindergarten.ye', 'amal.alsulawi@kindergarten.ye', 'rahab.alhamidi@kindergarten.ye', 'huda.alqaisi@kindergarten.ye', 'mana.alsalem@kindergarten.ye', 'duha.alsulawi@kindergarten.ye'];

        // Skip creating teachers if any already exist
        $existingTeachersCount = Teacher::whereIn('email', $teacherEmails)->count();
        if ($existingTeachersCount === 0) {
            $professionalTeachers = [
                [
                    'name' => 'سارة عبد الله محمد القيسي',
                    'email' => 'sara.alqaisi@kindergarten.ye',
                    'phone' => '+967771111111',
                    'address' => 'صنعاء - حدة - شارع الزبيري',
                    'qualification' => 'ماجستير في التربية المبكرة',
                    'specialization' => 'تطوير الطفل',
                    'experience_years' => 8,
                ],
                [
                    'name' => 'أمل سعيد أحمد الصلوي',
                    'email' => 'amal.alsulawi@kindergarten.ye',
                    'phone' => '+967772222222',
                    'address' => 'صنعاء - السبعين - حي النخيل',
                    'qualification' => 'بكالوريوس في التعليم الابتدائي',
                    'specialization' => 'الرياضيات المبكرة',
                    'experience_years' => 5,
                ],
                [
                    'name' => 'رحاب خالد محمد الحميدي',
                    'email' => 'rahab.alhamidi@kindergarten.ye',
                    'phone' => '+967773333333',
                    'address' => 'صنعاء - المعلا - شارع الجلاء',
                    'qualification' => 'دبلوم في رعاية الأطفال',
                    'specialization' => 'اللغة العربية',
                    'experience_years' => 3,
                ],
                [
                    'name' => 'هدى أحمد عبد الله القيسي',
                    'email' => 'huda.alqaisi@kindergarten.ye',
                    'phone' => '+967774444444',
                    'address' => 'صنعاء - الزبيري - حي السلام',
                    'qualification' => 'بكالوريوس في علم النفس',
                    'specialization' => 'السلوك والنمو',
                    'experience_years' => 6,
                ],
                [
                    'name' => 'منى سالم خالد القيسي',
                    'email' => 'mana.alsalem@kindergarten.ye',
                    'phone' => '+967775555555',
                    'address' => 'صنعاء - حدة - شارع الزبيري',
                    'qualification' => 'ماجستير في التربية الخاصة',
                    'specialization' => 'احتياجات خاصة',
                    'experience_years' => 7,
                ],
                [
                    'name' => 'ضحى محمد سعيد الصلوي',
                    'email' => 'duha.alsulawi@kindergarten.ye',
                    'phone' => '+967776666666',
                    'address' => 'صنعاء - السبعين - حي النخيل',
                    'qualification' => 'بكالوريوس في الفنون',
                    'specialization' => 'الفن والإبداع',
                    'experience_years' => 4,
                ],
            ];

            $teachers = [];
            foreach ($professionalTeachers as $teacherData) {
                $teacher = Teacher::create([
                    'name' => $teacherData['name'],
                    'email' => $teacherData['email'],
                    'phone' => $teacherData['phone'],
                    'address' => $teacherData['address'],
                    'qualification' => $teacherData['qualification'],
                    'specialization' => $teacherData['specialization'],
                    'experience_years' => $teacherData['experience_years'],
                    'hire_date' => Carbon::now()->subYears($teacherData['experience_years'] - 2),
                    'salary' => rand(120000, 200000), // Yemeni Rial
                    'is_active' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $teachers[] = $teacher;
            }
        } else {
            $this->command->info('Teachers already exist. Skipping teacher creation.');
            $teachers = Teacher::whereIn('email', $teacherEmails)->get();
        }

        // Create sample classes with Yemeni educational context
        $classNames = ['الروضة الأولى (KG1)', 'الروضة الثانية (KG2)', 'الروضة الثالثة (KG3)', 'التحضير للمدرسة (Pre-School)'];

        // Skip creating classes if any already exist
        $existingClassesCount = Classes::whereIn('name', $classNames)->count();
        if ($existingClassesCount === 0) {
            $classData = [
                [
                    'name' => 'الروضة الأولى (KG1)',
                    'code' => 'KG1',
                    'age_group' => 'preschool',
                    'description' => 'فئة الروضة الأولى للأطفال من 3 إلى 4 سنوات',
                    'capacity' => 20,
                    'monthly_fee' => 50000, // Yemeni Rial
                    'curriculum' => 'المنهج الوطني اليمني',
                    'teacher_id' => $teachers[0]->id,
                ],
                [
                    'name' => 'الروضة الثانية (KG2)',
                    'code' => 'KG2',
                    'age_group' => 'pre_k',
                    'description' => 'فئة الروضة الثانية للأطفال من 4 إلى 5 سنوات',
                    'capacity' => 25,
                    'monthly_fee' => 60000, // Yemeni Rial
                    'curriculum' => 'المنهج الوطني اليمني',
                    'teacher_id' => $teachers[1]->id,
                ],
                [
                    'name' => 'الروضة الثالثة (KG3)',
                    'code' => 'KG3',
                    'age_group' => 'kindergarten',
                    'description' => 'فئة الروضة الثالثة للأطفال من 5 إلى 6 سنوات',
                    'capacity' => 22,
                    'monthly_fee' => 70000, // Yemeni Rial
                    'curriculum' => 'المنهج الوطني اليمني',
                    'teacher_id' => $teachers[2]->id,
                ],
                [
                    'name' => 'التحضير للمدرسة (Pre-School)',
                    'code' => 'PRE_SCHOOL',
                    'age_group' => 'pre_k',
                    'description' => 'فئة التحضير للمدرسة للأطفال من 6 إلى 7 سنوات',
                    'capacity' => 18,
                    'monthly_fee' => 80000, // Yemeni Rial
                    'curriculum' => 'المنهج الوطني اليمني',
                    'teacher_id' => $teachers[3]->id,
                ],
            ];

            $classes = [];
            foreach ($classData as $data) {
                $class = Classes::create([
                    'name' => $data['name'],
                    'code' => $data['code'],
                    'description' => $data['description'],
                    'capacity' => $data['capacity'],
                    'age_group' => $data['age_group'],
                    'current_students' => rand(15, $data['capacity'] - 2),
                    'start_time' => '07:30:00',
                    'end_time' => '13:30:00',
                    'room_number' => 'Room '.(count($classes) + 1),
                    'monthly_fee' => $data['monthly_fee'],
                    'curriculum' => $data['curriculum'],
                    'teacher_id' => $data['teacher_id'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $classes[] = $class;
            }
        } else {
            $this->command->info('Classes already exist. Skipping class creation.');
            $classes = Classes::whereIn('name', $classNames)->get();
        }

        // Professional Yemeni names data
        $yemeniMaleNames = [
            'أحمد', 'محمد', 'علي', 'يحيى', 'عمر', 'خالد', 'سالم', 'ناصر', 'فهد', 'عبدالله',
            'محمود', 'سامي', 'رائد', 'فضل', 'جمال', 'هادي', 'منصور', 'صالح', 'ماجد', 'ربيع',
            'زيد', 'أسامة', 'بدر', 'تميم', 'راشد', 'شريف', 'طارق', 'وليد', 'يزيد', 'عمرو',
        ];

        $yemeniFemaleNames = [
            'فاطمة', 'مريم', 'آمنة', 'نورا', 'سارة', 'هناء', 'عائشة', 'نادية', 'منى', 'سوسن',
            'رنا', 'آلاء', 'نجلاء', 'هدى', 'أروى', 'بتول', 'ضحى', 'نور', 'ردينة', 'إكرام',
            'رحاب', 'أمل', 'شهد', 'رحمة', 'زينب', 'خديجة', 'أسماء', 'رقية', 'فريدة', 'سمية',
        ];

        $yemeniLastNames = [
            'القيسي', 'الصلوي', 'الحميدي', 'البخيتي', 'الصفواني', 'النقبي', 'العنسي',
            'السماعي', 'الرعيني', 'الهديفي', 'الصعدي', 'الهملالي', 'الشامي', 'الحبشي',
            'البهرمي', 'العبسي', 'الشجاعي', 'الرداعي', 'الموصلي', 'الجنبيحي',
        ];

        $yemeniCities = [
            'صنعاء', 'عدن', 'تعز', 'الحديدة', '-Taiz', 'Ibb', 'ذمار', 'عمران', 'صعدة',
            'حجة', 'البيضاء', 'ريمة', 'الجوف', 'مأرب', 'صنعاء الجديدة', 'الضالع',
        ];

        // Create sample children with professional Yemeni families
        $existingChildrenCount = Children::count();
        if ($existingChildrenCount === 0) {
            $children = [];
            for ($i = 0; $i < 40; $i++) {
                $gender = rand(0, 1) ? 'male' : 'female';
                $firstName = $gender === 'male'
                    ? $yemeniMaleNames[array_rand($yemeniMaleNames)]
                    : $yemeniFemaleNames[array_rand($yemeniFemaleNames)];
                $lastName = $yemeniLastNames[array_rand($yemeniLastNames)];

                // Generate realistic family addresses
                $city = $yemeniCities[array_rand($yemeniCities)];
                $districts = ['الزبيري', 'السبعين', 'المعلا', 'حدة', 'الوصيفية', 'الثوابيت', 'السافية'];
                $district = $districts[array_rand($districts)];

                $child = Children::create([
                    'name' => "$firstName $lastName",
                    'dob' => Carbon::now()->subYears(rand(3, 7))->subDays(rand(0, 365)),
                    'gender' => $gender,
                    'emergency_contact_name' => 'الوالد/الوالدة',
                    'emergency_contact_phone' => '+96777'.rand(1000000, 9999999),
                    'emergency_contact_relation' => 'الوالد/الوالدة',
                    'medical_conditions' => rand(1, 5) == 1 ? 'حساسية من اللوز' : 'طفل بصحة جيدة',
                    'allergies' => rand(1, 8) == 1 ? 'حساسية من الفول السوداني' : null,
                    'class_id' => $classes[array_rand($classes)]->id,
                    'enrollment_date' => Carbon::now()->subDays(rand(30, 365)),
                    'nationality' => 'يمني',
                    'blood_type' => ['A+', 'B+', 'O+', 'AB+'][rand(0, 3)],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
                $children[] = $child;
            }
        } else {
            $this->command->info('Children already exist. Skipping children creation.');
            $children = Children::all();
        }

        // Create sample parents/guardians with realistic family structures
        $existingGuardiansCount = Parents::count();
        if ($existingGuardiansCount === 0) {
            $parents = [];
            foreach ($children as $child) {
                $lastName = explode(' ', $child->name)[1]; // Extract last name

                // Generate realistic family addresses
                $city = $yemeniCities[array_rand($yemeniCities)];
                $districts = ['الزبيري', 'السبعين', 'المعلا', 'حدة', 'الوصيفية', 'الثوابيت', 'السافية'];
                $district = $districts[array_rand($districts)];

                // Father
                $fatherFirstName = $yemeniMaleNames[array_rand($yemeniMaleNames)];
                $father = Parents::create([
                    'name' => "$fatherFirstName $lastName",
                    'phone' => '+96777'.rand(1000000, 9999999),
                    'relationship' => 'Father',
                    'occupation' => ['مهندس', 'طبيب', 'محاسب', 'مدرس', 'موظف حكومي', 'رجل أعمال', 'عامل'][rand(0, 6)],
                    'address' => "$city - $district",
                    'email' => strtolower(str_replace(' ', '.', $fatherFirstName)).'.'.strtolower($lastName).'@gmail.com',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // Mother
                $motherFirstName = $yemeniFemaleNames[array_rand($yemeniFemaleNames)];
                $mother = Parents::create([
                    'name' => "$motherFirstName $lastName",
                    'phone' => '+96777'.rand(1000000, 9999999),
                    'relationship' => 'Mother',
                    'occupation' => ['طبيبة', 'مدرسة', 'محاسبة', 'ربة منزل', 'موظفة حكومية', 'مصممة'][rand(0, 5)],
                    'address' => "$city - $district",
                    'email' => strtolower(str_replace(' ', '.', $motherFirstName)).'.'.strtolower($lastName).'@gmail.com',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                $parents[] = $father;
                $parents[] = $mother;

                // Link children to parents (assuming first parent is father, second is mother)
                $child->update([
                    'parent_id' => $father->id,
                ]);
            }
        } else {
            $this->command->info('Guardians already exist. Skipping guardian creation.');
        }

        // Create comprehensive fee structure
        $feeNames = ['رسوم التسجيل', 'الرسوم الشهرية', 'رسوم المواد الدراسية', 'رسوم الأنشطة', 'رسوم النقل'];

        // Skip creating fees if any already exist
        $existingFeesCount = Fee::whereIn('name', $feeNames)->count();
        if ($existingFeesCount === 0) {
            $feeStructure = [
                [
                    'name' => 'رسوم التسجيل',
                    'amount' => 75000, // Yemeni Rial
                    'description' => 'رسوم تسجيل واحدة للطالب الجديد',
                    'frequency' => 'once',
                    'category' => 'registration',
                ],
                [
                    'name' => 'الرسوم الشهرية',
                    'amount' => 60000, // Yemeni Rial
                    'description' => 'الرسوم الشهرية للتعليم والأنشطة',
                    'frequency' => 'monthly',
                    'category' => 'tuition',
                ],
                [
                    'name' => 'رسوم المواد الدراسية',
                    'amount' => 25000, // Yemeni Rial
                    'description' => 'رسوم الكتب والأدوات الدراسية',
                    'frequency' => 'yearly',
                    'category' => 'materials',
                ],
                [
                    'name' => 'رسوم الأنشطة',
                    'amount' => 15000, // Yemeni Rial
                    'description' => 'رسوم الأنشطة والرحلات المدرسية',
                    'frequency' => 'monthly',
                    'category' => 'activities',
                ],
                [
                    'name' => 'رسوم النقل',
                    'amount' => 30000, // Yemeni Rial
                    'description' => 'رسوم خدمة النقل المدرسي',
                    'frequency' => 'monthly',
                    'category' => 'transportation',
                ],
            ];

            foreach ($feeStructure as $feeData) {
                Fee::create([
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
            }
        } else {
            $this->command->info('Fees already exist. Skipping fee creation.');
        }

        // Create comprehensive payment records
        $existingPaymentsCount = Payment::count();
        if ($existingPaymentsCount === 0) {
            foreach ($children as $child) {
                // Registration fee (one-time)
                Payment::create([
                    'child_id' => $child->id,
                    'fee_id' => Fee::where('category', 'registration')->first()->id,
                    'amount' => 75000,
                    'payment_date' => $child->enrollment_date,
                    'payment_method' => ['cash', 'bank_transfer', 'online'][rand(0, 2)],
                    'reference_number' => 'REG-'.strtoupper(substr(md5(time().$child->id), 0, 8)),
                    'status' => 'completed',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // Monthly payments for the last 6 months
                for ($month = 0; $month < 6; $month++) {
                    $paymentDate = Carbon::now()->subMonths($month);

                    // Tuition payment
                    Payment::create([
                        'child_id' => $child->id,
                        'fee_id' => Fee::where('category', 'tuition')->first()->id,
                        'amount' => 60000,
                        'payment_date' => $paymentDate->copy()->addDays(rand(1, 15)),
                        'payment_method' => ['cash', 'bank_transfer', 'online'][rand(0, 2)],
                        'reference_number' => 'TUITION-'.strtoupper(substr(md5(time().$child->id.$month), 0, 8)),
                        'status' => 'completed',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    // Activity fee (80% chance of payment)
                    if (rand(1, 10) <= 8) {
                        Payment::create([
                            'child_id' => $child->id,
                            'fee_id' => Fee::where('category', 'activities')->first()->id,
                            'amount' => 15000,
                            'payment_date' => $paymentDate->copy()->addDays(rand(10, 25)),
                            'payment_method' => ['cash', 'bank_transfer', 'online'][rand(0, 2)],
                            'reference_number' => 'ACT-'.strtoupper(substr(md5(time().$child->id.$month), 0, 8)),
                            'status' => 'completed',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }
        } else {
            $this->command->info('Payments already exist. Skipping payment creation.');
        }

        // Create detailed attendance records for the last month
        $existingAttendanceCount = Attendance::count();
        if ($existingAttendanceCount === 0) {
            foreach ($children as $child) {
                $startDate = Carbon::now()->subMonth();
                $endDate = Carbon::now();

                for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
                    // Skip weekends (Friday and Saturday in Yemen)
                    if ($date->dayOfWeek == Carbon::FRIDAY || $date->dayOfWeek == Carbon::SATURDAY) {
                        continue;
                    }

                    // 90% attendance rate
                    if (rand(1, 100) <= 90) {
                        Attendance::create([
                            'child_id' => $child->id,
                            'date' => $date,
                            'status' => 'present',
                            'check_in_time' => $date->copy()->hour(7)->minute(rand(15, 45)),
                            'check_out_time' => $date->copy()->hour(13)->minute(rand(15, 45)),
                            'check_in_status' => rand(1, 20) == 1 ? 'late' : 'ontime',
                            'check_out_status' => rand(1, 15) == 1 ? 'early' : 'ontime',
                            'attendance_type' => 'full_day',
                            'notes' => rand(1, 30) == 1 ? ' arrived early for extra activities' : null,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    } else {
                        $absenceReasons = ['مرض', 'سفر عائلي', 'حدث خارجي', 'غير محدد'];
                        Attendance::create([
                            'child_id' => $child->id,
                            'date' => $date,
                            'status' => 'absent',
                            'absence_reason' => $absenceReasons[rand(0, count($absenceReasons) - 1)],
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }
        } else {
            $this->command->info('Attendance records already exist. Skipping attendance creation.');
        }

        // Create academic evaluations and grades
        $subjects = ['المهارات الاجتماعية', 'الفن والإبداع', 'اللغة العربية', 'الرياضيات المبكرة', 'التطور الجسدي', 'العلوم المبكرة'];
        $grades = ['ممتاز', 'جيد جداً', 'جيد', 'مقبول'];

        $existingGradesCount = Grade::count();
        if ($existingGradesCount === 0) {
            foreach ($children as $child) {
                // Create 3-5 evaluations per child
                for ($i = 0; $i < rand(3, 5); $i++) {
                    Grade::create([
                        'child_id' => $child->id,
                        'subject' => $subjects[rand(0, count($subjects) - 1)],
                        'score' => $grades[rand(0, count($grades) - 1)],
                        'date' => Carbon::now()->subDays(rand(15, 90)), // evaluation date
                        'comments' => 'تقدم جيد في الأنشطة الصفية والتفاعل مع الزملاء',
                        'evaluator_id' => collect($teachers)->random()->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        } else {
            $this->command->info('Grades already exist. Skipping grade creation.');
        }

        // Create operational expenses
        $expenseCategoriesList = ['supplies', 'utilities', 'salaries', 'maintenance', 'other', 'activities', 'insurance', 'equipment'];

        $existingExpensesCount = Expense::whereIn('category', $expenseCategoriesList)->count();
        if ($existingExpensesCount === 0) {
            $expenseCategories = [
                ['category' => 'supplies', 'amount' => 150000, 'description' => 'Office supplies'],
                ['category' => 'utilities', 'amount' => 200000, 'description' => 'Utilities expenses'],
                ['category' => 'salaries', 'amount' => 800000, 'description' => 'Employee salaries'],
                ['category' => 'maintenance', 'amount' => 100000, 'description' => 'Maintenance costs'],
                ['category' => 'other', 'amount' => 250000, 'description' => 'Food expenses'],
                ['category' => 'other', 'amount' => 180000, 'description' => 'Transportation expenses'],
                ['category' => 'activities', 'amount' => 120000, 'description' => 'Activities and trips'],
                ['category' => 'insurance', 'amount' => 80000, 'description' => 'Insurance costs'],
                ['category' => 'other', 'amount' => 60000, 'description' => 'Marketing and advertising'],
                ['category' => 'equipment', 'amount' => 200000, 'description' => 'Educational equipment'],
            ];

            foreach ($expenseCategories as $expenseData) {
                for ($i = 0; $i < rand(2, 4); $i++) {
                    Expense::create([
                        'title' => $expenseData['category'].' expenses',
                        'description' => $expenseData['description'],
                        'amount' => rand($expenseData['amount'] * 0.7, $expenseData['amount'] * 1.3),
                        'category' => $expenseData['category'],
                        'expense_date' => Carbon::now()->subDays(rand(0, 120)), // expense date
                        'payment_method' => ['cash', 'bank_transfer', 'check'][rand(0, 2)],
                        'vendor' => 'Vendor '.rand(1, 20),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        } else {
            $this->command->info('Expenses already exist. Skipping expense creation.');
        }

        // Create comprehensive accounting entries
        $existingAccountingEntriesCount = AccountingEntry::count();
        if ($existingAccountingEntriesCount === 0) {
            // Only create accounting entries for payments with existing children
            $payments = Payment::with('child')->get();
            foreach ($payments as $payment) {
                if ($payment->child) {  // Check if the child exists
                    AccountingEntry::create([
                        'description' => 'دفعة مستلمة من '.$payment->child->name,
                        'debit' => 0,
                        'credit' => $payment->amount,
                        'entry_date' => $payment->payment_date,
                        'reference' => $payment->reference_number,
                        'account_type' => 'revenue',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            // Create accounting entries for expenses
            foreach (Expense::all() as $expense) {
                AccountingEntry::create([
                    'description' => 'مصروفات '.$expense->category,
                    'debit' => $expense->amount,
                    'credit' => 0,
                    'entry_date' => $expense->expense_date ?? $expense->created_at, // Use expense_date or fallback to created_at
                    'reference' => 'EXP-'.strtoupper(substr(md5(time().$expense->id), 0, 8)),
                    'account_type' => 'expense',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            // Add some salary payments for teachers
            foreach ($teachers as $teacher) {
                for ($month = 0; $month < 3; $month++) {
                    AccountingEntry::create([
                        'description' => 'راتب المعلم '.$teacher->name,
                        'debit' => $teacher->salary,
                        'credit' => 0,
                        'entry_date' => Carbon::now()->subMonths($month)->lastOfMonth(),
                        'reference' => 'SAL-'.strtoupper(substr(md5(time().$teacher->id.$month), 0, 8)),
                        'account_type' => 'salary',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        } else {
            $this->command->info('Accounting entries already exist. Skipping accounting entry creation.');
        }

        $this->command->info('Professional Yemeni kindergarten demo data has been successfully seeded!');
        $this->command->info('Created: '.count($users).' admin users, '.count($teachers).' teachers, '.count($children).' children, and comprehensive financial records.');
    }
}
