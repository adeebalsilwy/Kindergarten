<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="AccountingEntryResource",
 *     description="AccountingEntry resource",
 *
 *     @OA\Xml(name="AccountingEntryResource")
 * )
 */
class AccountingEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'debit' => $this->debit,
            'credit' => $this->credit,
            'entry_date' => $this->entry_date,
            'reference' => $this->reference,
            'account_type' => $this->account_type,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
