<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait Filterable
{
    /**
     * Apply filters to the query.
     *
     * @param Builder $query
     * @param Request|array $request
     * @return Builder
     */
    public function scopeFilter(Builder $query, $request)
    {
        // Convert request to array if needed
        $filters = $request instanceof Request ? $request->all() : (array) $request;

        // Apply search filter
        if (!empty($filters['search']) && method_exists($this, 'scopeSearch')) {
            $query->search($filters['search']);
        }

        // Get fillable columns for security
        $fillable = $this->getFillable();
        $guarded = ['password', 'remember_token', 'api_token'];

        // Advanced dynamic filtering based on request parameters
        foreach ($filters as $key => $value) {
            // Skip empty values and reserved parameters
            if (empty($value) && $value !== '0' && $value !== 0) {
                continue;
            }

            // Skip reserved parameters
            if (in_array($key, ['search', 'page', 'export', '_token', '_method'])) {
                continue;
            }

            // Skip guarded fields
            if (in_array($key, $guarded)) {
                continue;
            }

            // Handle exact match on fillable columns
            if (in_array($key, $fillable) || $key === 'id') {
                $query->where($key, $value);
                continue;
            }

            // Handle date range filters (_from suffix)
            if (str_ends_with($key, '_from')) {
                $column = substr($key, 0, -5); // Remove '_from'
                if (in_array($column, $fillable)) {
                    $query->where($column, '>=', $value);
                }
                continue;
            }

            // Handle date range filters (_to suffix)
            if (str_ends_with($key, '_to')) {
                $column = substr($key, 0, -3); // Remove '_to'
                if (in_array($column, $fillable)) {
                    $query->where($column, '<=', $value);
                }
                continue;
            }

            // Handle date range filters (_min suffix)
            if (str_ends_with($key, '_min')) {
                $column = substr($key, 0, -4); // Remove '_min'
                if (in_array($column, $fillable)) {
                    $query->where($column, '>=', $value);
                }
                continue;
            }

            // Handle date range filters (_max suffix)
            if (str_ends_with($key, '_max')) {
                $column = substr($key, 0, -4); // Remove '_max'
                if (in_array($column, $fillable)) {
                    $query->where($column, '<=', $value);
                }
                continue;
            }
        }

        return $query;
    }

    /**
     * Apply search to the query.
     *
     * @param Builder $query
     * @param string|null $search
     * @return Builder
     */
    public function scopeSearch(Builder $query, $search)
    {
        if (empty($search) || !isset($this->searchable) || !is_array($this->searchable)) {
            return $query;
        }

        // Escape special characters to prevent SQL injection
        $search = addcslashes($search, '%_\\');

        return $query->where(function ($q) use ($search) {
            foreach ($this->searchable as $column) {
                if (is_string($column)) {
                    $q->orWhere($column, 'LIKE', "%{$search}%");
                }
            }
        });
    }
}
