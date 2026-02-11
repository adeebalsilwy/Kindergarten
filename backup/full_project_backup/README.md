
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

This ensures the application is maintainable, testable, and scalable.
