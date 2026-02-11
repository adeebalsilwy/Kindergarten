<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Filterable
{
    /**
     * Scope a query to filter results.
     *
     * @param Builder $query
     * @param Request $request
     * @return Builder
     */
    public function scopeFilter(Builder $query, Request $request)
    {
        $params = $request->all();

        foreach ($params as $field => $value) {
            if ($value === '' || $value === null) {
                continue;
            }

            // Custom filter method (e.g. filterByStatus)
            $method = 'filterBy' . Str::studly($field);
            if (method_exists($this, $method)) {
                $this->{$method}($query, $value);
                continue;
            }

            // Search functionality
            if ($field === 'search' && $this->searchable) {
                $query->where(function ($q) use ($value) {
                    foreach ($this->searchable as $column) {
                        $q->orWhere($column, 'LIKE', '%' . $value . '%');
                    }
                });
                continue;
            }

            // Simple "where" clause if column exists in fillable
            if (in_array($field, $this->fillable)) {
                $query->where($field, $value);
            }
        }

        // Sorting
        if ($request->has('sort_by')) {
            $direction = $request->get('sort_order', 'asc');
            $query->orderBy($request->get('sort_by'), $direction);
        }

        return $query;
    }
}
