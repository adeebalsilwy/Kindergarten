<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Apply filters to the query.
     *
     * @param Builder $query
     * @param mixed $request
     * @return Builder
     */
    public function scopeFilter(Builder $query, $request)
    {
        if ($request->filled('search') && method_exists($this, 'scopeSearch')) {
            $query->search($request->get('search'));
        }

        // Advanced dynamic filtering based on request parameters
        foreach ($request->all() as $key => $value) {
            if ($request->filled($key) && $key !== 'search' && $key !== 'page' && $key !== 'export') {
                if (in_array($key, $this->getFillable()) || $key === 'id') {
                    $query->where($key, $value);
                } elseif (str_ends_with($key, '_from')) {
                    $column = str_replace('_from', '', $key);
                    if (in_array($column, $this->getFillable())) {
                        $query->where($column, '>=', $value);
                    }
                } elseif (str_ends_with($key, '_to')) {
                    $column = str_replace('_to', '', $key);
                    if (in_array($column, $this->getFillable())) {
                        $query->where($column, '<=', $value);
                    }
                }
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
        if (!$search || !isset($this->searchable)) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            foreach ($this->searchable as $column) {
                $q->orWhere($column, 'LIKE', "%{$search}%");
            }
        });
    }
}
