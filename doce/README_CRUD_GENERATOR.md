# Laravel CRUD Generator

A powerful and professional CRUD generator for Laravel applications that creates complete modules with full OOP structure, multilingual support, and proper architecture patterns.

## Features

- ✅ **One-command generation** - Create entire modules with a single Artisan command
- ✅ **Full OOP architecture** - Repository pattern, Service layer, Dependency Injection
- ✅ **Multilingual support** - Automatic generation of English and Arabic localization files
- ✅ **Complete CRUD operations** - Index, Create, Store, Edit, Update, Delete
- ✅ **Professional validation** - Form requests with proper validation rules including unique constraints
- ✅ **Clean routing** - Automatic route registration
- ✅ **Menu integration** - Automatic sidebar menu item addition
- ✅ **Template-based** - Easy to customize with stub files
- ✅ **Migration parsing** - Automatically detects fields from migration files
- ✅ **Cleanup command** - Remove all generated files with one command

## Installation

The CRUD generator is already integrated into your Laravel application. No additional installation required.

## Usage

### Generate CRUD Module

```bash
php artisan make:crud ModelName [--force]
```

**Examples:**
```bash
# Generate CRUD for Languages model
php artisan make:crud Languages

# Force regeneration (overwrite existing files)
php artisan make:crud Languages --force

# Generate for other models
php artisan make:crud Users
php artisan make:crud Posts
php artisan make:crud Categories
```

### Remove CRUD Module

```bash
php artisan remove:crud ModelName
```

**Examples:**
```bash
# Remove all Languages module files
php artisan remove:crud Languages

# Remove Users module
php artisan remove:crud Users
```

## Generated Structure

When you run `php artisan make:crud Languages`, the following files are created:

### Backend Files
```
app/
├── Models/
│   └── Languages.php
├── Repositories/
│   ├── Contracts/
│   │   └── LanguagesRepositoryInterface.php
│   └── Eloquent/
│       └── LanguagesRepository.php
├── Services/
│   └── LanguagesService.php
├── Http/
│   ├── Controllers/
│   │   └── LanguagesController.php
│   └── Requests/
│       ├── StoreLanguagesRequest.php
│       └── UpdateLanguagesRequest.php
```

### Frontend Files
```
resources/
└── views/
    └── pages/
        └── languages/
            ├── index.blade.php
            ├── create.blade.php
            └── edit.blade.php
```

### Language Files
```
lang/
├── en/
│   └── languages.php
└── ar/
    └── languages.php
```

### Automatic Additions
- **Routes**: Added to `routes/web.php`
- **Menu**: Added to `app/Main/SideMenu.php`

## Architecture Patterns

### Repository Pattern
```php
// Interface
interface LanguagesRepositoryInterface extends BaseRepositoryInterface

// Implementation
class LanguagesRepository extends BaseRepository implements LanguagesRepositoryInterface
```

### Service Layer
```php
class LanguagesService
{
    protected $repository;
    
    public function __construct(LanguagesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    // Business logic methods...
}
```

### Controller Structure
```php
class LanguagesController extends Controller
{
    protected $service;
    
    public function __construct(LanguagesService $service)
    {
        $this->service = $service;
    }
    
    // CRUD methods...
}
```

## Field Detection

The generator automatically parses your migration files to detect fields and their types:

### Supported Field Types
- `string` → Text input
- `integer` → Number input
- `boolean` → Checkbox
- `text` → Textarea
- `date` → Date picker
- `email` → Email input

### Special Handling
- **Unique fields**: Automatically adds unique validation for `email`, `code`, and `slug` fields
- **Boolean fields**: Generates proper checkbox HTML with hidden inputs
- **Foreign keys**: Detected and handled appropriately

## Validation Rules

### Store Request
```php
public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:languages,code',
        'is_rtl' => 'required|boolean',
        'is_active' => 'required|boolean',
    ];
}
```

### Update Request
```php
public function rules()
{
    return [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:languages,code,' . $this->route('language'),
        'is_rtl' => 'required|boolean',
        'is_active' => 'required|boolean',
    ];
}
```

## Multilingual Support

### English Localization (`lang/en/languages.php`)
```php
return [
    'title' => 'Languages',
    'add_new' => 'Add New Language',
    'edit' => 'Edit Language',
    'list' => 'Languages List',
    'fields' => [
        'name' => 'Name',
        'code' => 'Code',
        'is_rtl' => 'Is Rtl',
        'is_active' => 'Is Active',
    ],
    // ... more translations
];
```

### Arabic Localization (`lang/ar/languages.php`)
```php
return [
    'title' => 'اللغات',
    'add_new' => 'إضافة لغة جديدة',
    'edit' => 'تعديل اللغة',
    'list' => 'قائمة اللغات',
    'fields' => [
        'name' => 'الاسم',
        'code' => 'الرمز',
        'is_rtl' => 'من اليمين إلى اليسار',
        'is_active' => 'نشط',
    ],
    // ... more translations
];
```

## Customization

### Modify Stubs

All generated files use template stubs located in `stubs/` directory:

```
stubs/
├── controller.stub
├── model.stub
├── repository.interface.stub
├── repository.eloquent.stub
├── service.stub
├── request.store.stub
├── request.update.stub
├── view.index.stub
├── view.create.stub
└── view.edit.stub
```

### Add New Field Types

Modify the `generateFormFields` method in `app/Console/Commands/GenerateCrud.php` to add support for new field types.

### Extend Translations

Add new translations to the `translateToArabic` and `translateFieldToArabic` methods in the GenerateCrud command.

## Best Practices

### 1. Migration First Approach
Always create your migration first, then generate the CRUD:

```bash
# 1. Create migration
php artisan make:migration create_languages_table

# 2. Run migration
php artisan migrate

# 3. Generate CRUD
php artisan make:crud Languages
```

### 2. Naming Conventions
- Use singular model names: `Language`, `User`, `Post`
- The generator automatically handles pluralization for routes and views

### 3. Field Planning
Plan your database fields carefully as they determine:
- Form field types
- Validation rules
- Table columns
- Localization keys

### 4. Testing Generated Code
Always test the generated CRUD after creation:
```bash
# Visit the index page
http://your-app.test/languages

# Test create, edit, and delete operations
```

## Troubleshooting

### Common Issues

**1. Route not found**
- Ensure the route was added to `routes/web.php`
- Clear route cache: `php artisan route:clear`

**2. Menu item missing**
- Check `app/Main/SideMenu.php` for the menu entry
- Clear config cache: `php artisan config:clear`

**3. Translation not working**
- Verify language files exist in `lang/en/` and `lang/ar/`
- Check that the locale is properly set in your application

**4. Validation errors**
- Review the generated request files for proper validation rules
- Ensure unique constraints match your database schema

### Debug Commands

```bash
# List all routes
php artisan route:list

# Clear all caches
php artisan optimize:clear

# Check for syntax errors
php artisan tinker
```

## Advanced Usage

### Custom Repository Methods

Add custom methods to your repository interface:

```php
// app/Repositories/Contracts/LanguagesRepositoryInterface.php
interface LanguagesRepositoryInterface extends BaseRepositoryInterface
{
    public function getActiveLanguages();
    public function findByCode($code);
}
```

Implement in the repository:

```php
// app/Repositories/Eloquent/LanguagesRepository.php
class LanguagesRepository extends BaseRepository implements LanguagesRepositoryInterface
{
    public function getActiveLanguages()
    {
        return $this->model->where('is_active', true)->get();
    }
    
    public function findByCode($code)
    {
        return $this->model->where('code', $code)->first();
    }
}
```

### Custom Service Methods

Add business logic to your service:

```php
// app/Services/LanguagesService.php
class LanguagesService
{
    public function getActiveLanguages()
    {
        return $this->repository->getActiveLanguages();
    }
    
    public function toggleStatus($id)
    {
        $language = $this->find($id);
        $language->is_active = !$language->is_active;
        return $this->update($id, $language->toArray());
    }
}
```

## Contributing

To contribute to the CRUD generator:

1. Fork the repository
2. Create your feature branch
3. Modify the `GenerateCrud` and `RemoveCrud` commands
4. Update stub files as needed
5. Test thoroughly with various model types
6. Submit a pull request

## License

This CRUD generator is open-sourced software licensed under the MIT license.

## Support

For issues, questions, or feature requests, please create an issue in the repository or contact the development team.