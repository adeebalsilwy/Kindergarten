<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="PaymentResource",
 *     description="Payment resource",
 *
 *     @OA\Xml(name="PaymentResource")
 * )
 */
class PaymentResource extends JsonResource
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
            'child_id' => $this->child_id,
            'fee_id' => $this->fee_id,
            'amount' => $this->amount,
            'payment_date' => $this->payment_date,
            'payment_method' => $this->payment_method,
            'reference_number' => $this->reference_number,
            'status' => $this->status,
            'receipt_number' => $this->receipt_number,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
