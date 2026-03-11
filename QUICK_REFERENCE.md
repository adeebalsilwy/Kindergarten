# Quick Reference - Professional UI Components

## 🚀 Quick Start

### 1. Statistics Cards
```blade
<x-stat-card title="Total" value="150" icon="Users" color="blue" />
```

### 2. Page Header
```blade
<x-page-header 
    title="Materials" 
    subtitle="Manage materials"
    icon="Package"
/>
```

### 3. Filter Bar
```blade
<x-filter-bar action="{{ route('search') }}">
    <div>
        <x-base.form-label>Search</x-base.form-label>
        <x-base.form-input name="q" />
    </div>
</x-filter-bar>
```

### 4. Section Container
```blade
<x-section-container title="List" icon="Table">
    <!-- Content -->
</x-section-container>
```

### 5. Data Table
```blade
<x-data-table
    :columns="['name' => 'Name', 'email' => 'Email']"
    :data="$users"
    :actions="[['type' => 'edit', 'route' => 'users.edit']]"
/>
```

---

## 🎨 Color Options

- `blue` - Primary
- `green` - Success
- `purple` - Special
- `red` - Danger
- `yellow` - Warning
- `indigo` - Secondary
- `pink` - Highlight
- `orange` - Important

---

## 📱 Responsive Grid

```blade
<!-- 4 columns desktop, 2 tablet, 1 mobile -->
<x-grid-container :cols="4" :tablet-cols="2" :mobile-cols="1">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item3</div>
    <div>Item 4</div>
</x-grid-container>
```

---

## 🔧 Common Patterns

### Dashboard Stats Row
```blade
<x-grid-container:cols="4" class="mt-6">
    <x-stat-card title="Total" value="100" icon="Database" />
    <x-stat-card title="Active" value="85" icon="Check" color="green" />
    <x-stat-card title="Pending" value="10" icon="Clock" color="warning" />
    <x-stat-card title="Issues" value="5" icon="Alert" color="danger" />
</x-grid-container>
```

### Filter + Table Pattern
```blade
<!-- Filters -->
<x-filter-bar :action="route('index')" :cols="4">
    <div><x-base.form-label>Name</label><x-base.form-input name="name"/></div>
    <div><x-base.form-label>Type</label><x-base.tom-select name="type">...</x-base.tom-select></div>
</x-filter-bar>

<!-- Table -->
<x-section-container title="Results" icon="Table" class="mt-6">
    <x-data-table :columns="$cols" :data="$items" :actions="$actions" />
</x-section-container>
```

### Info Cards Grid
```blade
<x-grid-container:cols="3">
    @foreach($items as $item)
        <x-action-card
            title="{{ $item->name }}"
            description="{{ $item->description }}"
            href="{{ route('show', $item->id) }}"
            icon="ArrowRight"
            color="primary"
        />
    @endforeach
</x-grid-container>
```

---

## 💡 Pro Tips

1. **Always use icons** - Makes UI more intuitive
2. **Consistent colors** - Follow the color scheme
3. **Mobile first** - Test on small screens
4. **Empty states** - Provide helpful messages
5. **Loading states** - Show feedback to users

---

## ⚠️ Common Mistakes

❌ Hardcoding values
```blade
<!-- BAD -->
<x-stat-card title="Total Materials in System" value="150" />
```

✅ Use translations and variables
```blade
<!-- GOOD -->
<x-stat-card 
    title="{{ __('global.total_materials') }}"
    value="{{ $materials->count() }}"
/>
```

---

## 📚 Full Documentation

- **Components Guide**: `COMPONENTS_IMPLEMENTATION_GUIDE.md`
- **Summary Report**: `UI_REDESIGN_SUMMARY.md`
- **Examples**: Materials Index page

---

## 🔗 Quick Links

- [Tailwind Docs](https://tailwindcss.com/docs)
- [Lucide Icons](https://lucide.dev/icons/)
- [Alpine.js](https://alpinejs.dev/)
- [Laravel Blade](https://laravel.com/docs/blade)

---

*Quick Ref v1.0 | Updated: 2026-03-09*
