# Kindergarten Management System

A professional management system built with Laravel 11.

## 🚀 Features

-   **Children Management**: Registration, Profiles, Fees, Photos.
-   **Parents Management**: Guardians, Contact Info.
-   **Attendance**: Daily tracking, Statuses.
-   **Grades**: Academic performance tracking.
-   **Localization**: English & Arabic support.
-   **Architecture**: Service-Repository Pattern.
-   **Automated CRUD**: One-command module generation.
-   **Multi-tenant Ready**: Built for scalability.
-   **Role-Based Access Control**: Fine-grained permissions.
-   **Financial Management**: Fees, Payments, Expenses, Reports.
-   **Communication Tools**: Events, Activities, Notifications.
-   **Dashboard Analytics**: Real-time statistics and insights.
-   **Export Capabilities**: PDF, Excel exports for all modules.

## 🛠️ Automated CRUD Generator

This project includes a powerful artisan command to generate all necessary files for a new module based on a database migration.

### How to use

**1. Create & Define Migration:**
First, create your migration file and define your table schema.

```bash
php artisan make:migration create_buses_table
```

Edit the migration file:
```php
Schema::create('buses', function (Blueprint $table) {
    $table->id();
    $table->string('plate_number');
    $table->integer('capacity');
    $table->boolean('is_active');
    $table->date('service_date');
    $table->timestamps();
});
```

**2. Run the Generator:**
Run the custom command to generate everything else.

```bash
php artisan make:crud Bus
```
*Use `--force` to overwrite existing files if you made a mistake.*

### What happens?

The command will automatically:

1.  **Parse Migration**: It reads `create_buses_table` to find fields (`plate_number`, `capacity`, `is_active`, `service_date`).
2.  **Generate Model**: Creates `App\Models\Bus.php` with `$fillable` and `$casts` automatically populated.
3.  **Generate Repository**: Creates `BusRepositoryInterface` and `BusRepository`.
4.  **Generate Service**: Creates `BusService`.
5.  **Generate Controller**: Creates `BusController` with full CRUD methods.
6.  **Generate Requests**: Creates `StoreBusRequest` and `UpdateBusRequest` with validation rules inferred from database types.
7.  **Generate Localization**: Creates `lang/en/buses.php` and `lang/ar/buses.php` with all keys.
8.  **Generate Views**: Creates `index`, `create`, and `edit` views using the theme, with proper input types (Number input for integer, Checkbox for boolean, Date picker for date).
9.  **Update Routes**: Appends `Route::resource('buses', ...)` to `web.php`.
10. **Update Menu**: Adds "Buses" item to the main sidebar menu.

**3. Finalize:**
Run the migration to create the table.

```bash
php artisan migrate
```

Visit `/buses` to see your fully functional module!

## 📂 Architecture

-   **Controllers**: Handle HTTP requests and responses. They call Services.
-   **Services**: Handle business logic. They call Repositories.
-   **Repositories**: Handle database interactions using Eloquent.
-   **Providers**: `RepositoryServiceProvider` automatically binds interfaces to implementations.

## 🎯 System Modules

### Core Modules:
- **Users**: Authentication, Authorization, Profile Management
- **Children**: Student Registration, Information, Medical Records
- **Parents/Guardians**: Contact Information, Emergency Contacts
- **Teachers**: Staff Management, Qualifications, Assignments
- **Classes**: Classroom Management, Curriculum Assignment
- **Attendance**: Daily Tracking, Check-in/Check-out, Absences
- **Grades**: Academic Performance, Evaluations, Comments
- **Fees**: Tuition, Additional Charges, Frequency Management
- **Payments**: Transaction Processing, Balance Tracking
- **Expenses**: Operational Costs, Budget Management
- **Financial Reports**: Revenue, Expenses, Profit/Loss Analysis
- **Activities**: Educational Activities, Participation Tracking
- **Events**: Calendar Events, Parent Notifications
- **Curriculum**: Lesson Plans, Syllabus Management

### Administrative Modules:
- **Role Management**: Custom Roles and Permissions
- **System Settings**: Configuration and Preferences
- **Backup & Import**: Data Backup and Migration Tools
- **API Manager**: RESTful API Generation and Management
- **Monitoring**: Activity Logs, System Health
- **Dashboard Analytics**: Real-time Statistics and Insights

## 🔐 Security Features

- **Laravel Sanctum**: API Token Management
- **Spatie Permissions**: Role-based access control
- **Input Validation**: Comprehensive request validation
- **CSRF Protection**: Cross-site request forgery prevention
- **XSS Prevention**: Output sanitization
- **SQL Injection Prevention**: Query parameter binding

## 🌍 Multi-language Support

- **Arabic & English**: Full localization
- **Dynamic Language Switching**: Per-user preference
- **RTL Support**: Right-to-left layout for Arabic

## 📊 Reporting & Analytics

- **Financial Reports**: Income, Expenses, Profit/Loss
- **Attendance Reports**: Daily, Weekly, Monthly summaries
- **Academic Reports**: Grade summaries, Performance tracking
- **Export Options**: PDF, Excel formats
- **Real-time Dashboard**: Key metrics visualization

## 🚀 Deployment

```bash
# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate --seed

# Build frontend assets
npm run build

# Serve application
php artisan serve
```

## 🧪 Testing

```bash
# Run unit and feature tests
php artisan test

# Run specific test suites
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature
```

## 📋 Current State

- **Database**: Successfully migrated with demo data
- **Modules**: 40+ fully functional CRUD modules
- **Users**: Demo accounts created with various roles
- **Frontend**: Responsive UI with Tailwind CSS and Alpine.js
- **Security**: Role-based access control implemented
- **Localization**: Arabic and English support
- **API**: RESTful endpoints for all modules
- **Reports**: PDF and Excel export capabilities

## 🔄 Development Status

- **Core Functionality**: ✅ Complete
- **Authentication**: ✅ Complete 
- **Authorization**: ✅ Complete
- **CRUD Operations**: ✅ Complete
- **Financial Management**: ✅ Complete
- **Attendance Tracking**: ✅ Complete
- **Academic Management**: ✅ Complete
- **Reporting**: ✅ Complete
- **Mobile Responsive**: ✅ Complete
- **Multi-language**: ✅ Complete