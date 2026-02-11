<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ExpenseResource",
 *     description="Expense resource",
 *
 *     @OA\Xml(name="ExpenseResource")
 * )
 */
class ExpenseResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'amount' => $this->amount,
            'expense_date' => $this->expense_date,
            'vendor' => $this->vendor,
            'receipt_number' => $this->receipt_number,
            'payment_method' => $this->payment_method,
            'reference_number' => $this->reference_number,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'assigned_to' => $this->assigned_to,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
