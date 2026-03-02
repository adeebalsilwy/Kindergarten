# Access Control Components Documentation

## Overview
This package provides professional, responsive, and feature-rich components for managing access control in Laravel applications. The components include enhanced permissions, roles, and user management interfaces with advanced filtering, searching, and bulk operations capabilities.

## Features

### 1. Professional UI Components
- **Index Component**: Advanced data listing with multiple view modes (table, grid, list)
- **Form Component**: Flexible form builder with validation and section support
- **Filter Component**: Powerful filtering system with advanced search capabilities
- **Responsive Design**: Mobile-first approach with touch-friendly interfaces

### 2. Advanced Functionality
- **Multi-view Support**: Toggle between table, grid, and list views
- **Advanced Filtering**: Complex filter combinations with saved preferences
- **Bulk Operations**: Multi-select with bulk actions
- **Real-time Search**: Instant search with debouncing
- **Form Validation**: Client-side and server-side validation
- **Auto-save**: Automatic saving of form data
- **Export Options**: PDF, Excel, and CSV export capabilities

### 3. Responsive & Accessible
- **Mobile Optimization**: Touch-friendly interfaces for all screen sizes
- **Dark Mode Support**: Automatic dark mode detection and styling
- **Accessibility**: WCAG 2.1 compliant with proper ARIA attributes
- **Keyboard Navigation**: Full keyboard support for all interactions
- **Screen Reader Support**: Proper semantic markup and labels

### 4. Internationalization
- **Multi-language Support**: Complete Arabic and English translations
- **RTL Support**: Right-to-left layout for Arabic interfaces
- **Cultural Adaptation**: Locale-specific formatting and conventions

## Installation

### 1. Component Files
The components are located in:
```
resources/views/components/access-control/
├── index.blade.php          # Main index component
├── form.blade.php            # Form builder component
├── form-field.blade.php      # Individual form field component
└── filters.blade.php         # Advanced filter component
```

### 2. Asset Files
```
resources/
├── css/access-control-responsive.css    # Responsive styling
└── js/access-control.js                  # JavaScript functionality
```

### 3. Translation Files
```
lang/
├── ar/access_control.php                # Arabic translations
└── en/access_control.php                # English translations
```

## Usage Examples

### 1. Basic Index Component
```blade
<x-access-control.index
    title="access_control.permissions.title"
    :items="$permissions"
    :columns="[
        ['key' => 'id', 'label' => 'access_control.fields.id'],
        ['key' => 'name', 'label' => 'access_control.fields.name'],
        ['key' => 'created_at', 'label' => 'access_control.fields.created_at'],
    ]"
    searchPlaceholder="access_control.permissions.search"
    createUrl="{{ route('permissions.create') }}"
/>
```

### 2. Advanced Form Component
```blade
<x-access-control.form
    title="access_control.permissions.add_new"
    action="{{ route('permissions.store') }}"
    :sections="[
        [
            'title' => 'access_control.fields.basic_info',
            'fields' => [
                ['name' => 'name', 'label' => 'access_control.fields.name', 'type' => 'text', 'required' => true],
                ['name' => 'guard_name', 'label' => 'access_control.fields.guard_name', 'type' => 'select', 'options' => $guards],
                ['name' => 'description', 'label' => 'access_control.fields.description', 'type' => 'textarea'],
            ]
        ]
    ]"
/>
```

### 3. Advanced Filter Component
```blade
<x-access-control.filters
    :filters="[
        ['name' => 'status', 'label' => 'access_control.fields.status', 'type' => 'select', 'options' => $statusOptions],
        ['name' => 'created_at', 'label' => 'access_control.fields.created_at', 'type' => 'date-range'],
        ['name' => 'guard_name', 'label' => 'access_control.fields.guard_name', 'type' => 'select', 'options' => $guards, 'advanced' => true],
    ]"
    :bulkActions="[
        ['action' => 'delete', 'label' => 'access_control.actions.delete', 'icon' => 'Trash2'],
        ['action' => 'activate', 'label' => 'access_control.actions.activate', 'icon' => 'CheckCircle'],
    ]"
    advancedMode="true"
/>
```

## Component Properties

### Index Component
| Property | Type | Default | Description |
|----------|------|---------|-------------|
| title | string | 'Access Control' | Page title |
| items | Collection | [] | Data items to display |
| columns | array | [] | Column definitions |
| filters | array | [] | Filter definitions |
| searchPlaceholder | string | 'Search...' | Search input placeholder |
| createUrl | string | null | URL for create action |
| bulkActions | array | [] | Bulk action definitions |
| showStats | boolean | true | Show statistics cards |
| viewType | string | 'table' | Default view mode |
| sortable | boolean | true | Enable column sorting |
| searchable | boolean | true | Enable search functionality |

### Form Component
| Property | Type | Default | Description |
|----------|------|---------|-------------|
| title | string | 'Form' | Form title |
| action | string | '' | Form action URL |
| method | string | 'POST' | HTTP method |
| fields | array | [] | Form field definitions |
| sections | array | [] | Form section definitions |
| validation | boolean | true | Enable validation |
| tabs | boolean | false | Use tabbed interface |

### Filter Component
| Property | Type | Default | Description |
|----------|------|---------|-------------|
| filters | array | [] | Filter definitions |
| showSearch | boolean | true | Show search input |
| showFilters | boolean | true | Show filter controls |
| showBulkActions | boolean | false | Show bulk actions |
| advancedMode | boolean | false | Enable advanced filters |
| exportOptions | array | ['pdf', 'excel', 'csv'] | Available export formats |

## Field Types

The form component supports multiple field types:

- **text** - Standard text input
- **email** - Email input with validation
- **password** - Password input
- **textarea** - Multi-line text input
- **select** - Dropdown selection
- **checkbox** - Single checkbox
- **radio** - Radio button group
- **switch** - Toggle switch
- **file** - File upload with preview
- **date/datetime** - Date/time pickers
- **range** - Range slider
- **color** - Color picker
- **custom** - Custom rendered content

## Advanced Features

### 1. Custom Column Rendering
```php
'columns' => [
    [
        'key' => 'permissions',
        'label' => 'access_control.fields.permissions',
        'render' => function($item) {
            return view('components.permission-tags', ['permissions' => $item->permissions]);
        }
    ]
]
```

### 2. Relationship Support
```php
'columns' => [
    [
        'key' => 'user.name',
        'label' => 'access_control.fields.user',
        'relation' => 'user.name'
    ]
]
```

### 3. Bulk Actions
```php
'bulkActions' => [
    [
        'action' => 'assign_role',
        'label' => 'access_control.actions.assign_role',
        'icon' => 'Shield'
    ]
]
```

## Styling Customization

### CSS Classes
The components use utility-first CSS with the following key classes:
- `access-control-index` - Main index container
- `access-control-form` - Form container
- `access-control-filters` - Filter container
- `form-field-group` - Individual form field wrapper

### Responsive Breakpoints
- **Mobile**: up to 640px
- **Tablet**: 641px to 1024px
- **Desktop**: 1025px and above

### Dark Mode
Dark mode is automatically detected using `prefers-color-scheme: dark` media query.

## JavaScript API

### Global Functions
```javascript
// Change view mode
AccessControl.changeView('grid');

// Perform search
AccessControl.performSearch('query');

// Validate form
AccessControl.validateForm(formElement);

// Show notification
AccessControl.showNotification('Title', 'Message', 'success');
```

### Events
```javascript
// Listen for view changes
window.addEventListener('viewChanged', function(e) {
    console.log('View changed to:', e.detail.view);
});

// Listen for search events
window.addEventListener('searchPerformed', function(e) {
    console.log('Search query:', e.detail.query);
});
```

## Best Practices

### 1. Performance Optimization
- Use pagination for large datasets
- Implement lazy loading for images
- Cache frequently accessed data
- Use database indexing for filtered columns

### 2. Security Considerations
- Always validate server-side
- Implement proper authorization checks
- Sanitize user input
- Use CSRF protection
- Implement rate limiting

### 3. User Experience
- Provide clear feedback for all actions
- Use loading indicators for async operations
- Implement undo functionality where appropriate
- Provide keyboard shortcuts
- Ensure consistent error messaging

## Troubleshooting

### Common Issues

1. **Components not rendering**
   - Check if all required props are provided
   - Verify component file paths
   - Ensure Blade components are properly registered

2. **JavaScript errors**
   - Verify TomSelect library is loaded
   - Check for conflicting scripts
   - Ensure CSRF token is present

3. **Styling issues**
   - Verify CSS files are included
   - Check for CSS conflicts
   - Ensure responsive classes are applied correctly

### Debugging Tips
- Use browser developer tools
- Check console for JavaScript errors
- Verify network requests
- Test with different screen sizes
- Check browser compatibility

## Browser Support

- **Chrome**: Latest 2 versions
- **Firefox**: Latest 2 versions
- **Safari**: Latest 2 versions
- **Edge**: Latest 2 versions
- **Mobile Browsers**: iOS Safari, Chrome Mobile

## Contributing

### Code Standards
- Follow PSR-12 coding standards
- Use meaningful variable names
- Include proper documentation
- Write comprehensive tests
- Maintain backward compatibility

### Testing
- Unit tests for all components
- Integration tests for workflows
- Cross-browser testing
- Accessibility testing
- Performance testing

## License
This package is open-source software licensed under the MIT license.

## Support
For support, please open an issue on the project repository or contact the development team.