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
        if (method_exists($this, 'scopeSearch')) {
            $query->search($request->get('search'));
        }

        // Add more generic filtering logic here if needed
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
