<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="CommandLogResource",
 *     description="CommandLog resource",
 *
 *     @OA\Xml(name="CommandLogResource")
 * )
 */
class CommandLogResource extends JsonResource
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
            'command' => $this->command,
            'parameters' => $this->parameters,
            'output' => $this->output,
            'status' => $this->status,
            'error_message' => $this->error_message,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
