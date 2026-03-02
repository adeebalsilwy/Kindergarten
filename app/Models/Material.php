<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category',
        'type',
        'quantity_available',
        'quantity_required',
        'unit_cost',
        'supplier',
        'storage_location',
        'is_consumable',
        'is_digital',
        'specifications',
        'is_active',
        'purchased_at',
        'created_by',
    ];

    protected $casts = [
        'quantity_available' => 'integer',
        'quantity_required' => 'integer',
        'unit_cost' => 'decimal:2',
        'is_consumable' => 'boolean',
        'is_digital' => 'boolean',
        'is_active' => 'boolean',
        'purchased_at' => 'datetime',
        'specifications' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $dates = [
        'purchased_at',
        'deleted_at',
    ];

    // Relationships
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function curricula(): BelongsToMany
    {
        return $this->belongsToMany(Curriculum::class, 'curriculum_materials')
                    ->withPivot(['quantity_required', 'usage_instructions'])
                    ->withTimestamps();
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_materials')
                    ->withPivot(['quantity_required', 'usage_instructions'])
                    ->withTimestamps();
    }
    
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'class_materials')
                    ->withPivot(['quantity_required', 'usage_instructions'])
                    ->withTimestamps();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeByName($query, $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }

    public function scopeAvailable($query)
    {
        return $query->where('quantity_available', '>', 0);
    }

    public function scopeConsumable($query)
    {
        return $query->where('is_consumable', true);
    }

    public function scopeDigital($query)
    {
        return $query->where('is_digital', true);
    }

    // Accessors
    public function getFormattedCostAttribute()
    {
        return number_format($this->unit_cost, 2) . ' ريال يمني';
    }

    public function getAvailabilityStatusAttribute()
    {
        if ($this->quantity_available <= 0) {
            return 'نفد من المخزون';
        } elseif ($this->quantity_available < $this->quantity_required) {
            return 'مخزون قليل';
        }
        return 'متوفر';
    }

    public function getIsAvailableAttribute()
    {
        return $this->quantity_available > 0;
    }

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    // Accessors for form compatibility
    public function getQuantityAttribute()
    {
        return $this->quantity_available;
    }

    public function getStatusAttribute()
    {
        if (!$this->is_active) {
            return 'out-of-stock';
        }
        
        if ($this->quantity_available <= 0) {
            return 'out-of-stock';
        } elseif ($this->quantity_available < $this->quantity_required) {
            return 'maintenance';
        }
        
        return 'available';
    }

    public function getUnitAttribute()
    {
        return $this->storage_location;
    }

    public function getCostAttribute()
    {
        return $this->unit_cost;
    }

    public function getPurchaseDateAttribute()
    {
        return $this->purchased_at;
    }

    public function getExpiryDateAttribute()
    {
        // Assuming there's no expiry date field in the DB, but if we had one it would be here
        return null;
    }

    public function getQuantityFormattedAttribute()
    {
        return $this->quantity_available . ' ' . ($this->storage_location ?: 'وحدة');
    }

    public function getDescriptionHtmlAttribute()
    {
        return nl2br(e($this->description));
    }

    // Mutators for form compatibility
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity_available'] = $value;
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['is_active'] = $value !== 'out-of-stock';
    }

    public function setUnitAttribute($value)
    {
        $this->attributes['storage_location'] = $value;
    }

    public function setCostAttribute($value)
    {
        $this->attributes['unit_cost'] = $value;
    }

    public function setPurchaseDateAttribute($value)
    {
        $this->attributes['purchased_at'] = $value;
    }

    public function setExpiryDateAttribute($value)
    {
        // If we had an expiry date field in the DB, we would set it here
        // For now, we'll ignore it or could add a custom field if needed
    }
    
    // Arabic localized accessor methods
    public function getCategoryNameAttribute()
    {
        $categories = [
            'arts_crafts' => 'الرسم والحرف',
            'educational_toys' => 'الألعاب التعليمية',
            'reading_materials' => 'مواد القراءة',
            'music_movement' => 'الموسيقى والحركة',
            'digital_learning' => 'التعلم الرقمي',
            'furniture' => 'الأثاث',
            'hygiene' => 'النظافة',
            'emergency' => 'الطوارئ',
        ];
        
        return $categories[$this->category] ?? $this->category;
    }
    
    public function getTypeNameAttribute()
    {
        $types = [
            'consumable' => 'مستهلك',
            'reusable' => 'قابل لإعادة الاستخدام',
            'digital' => 'رقمي',
        ];
        
        return $types[$this->type] ?? $this->type;
    }
}