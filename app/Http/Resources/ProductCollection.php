<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'count' => $this->collection->count(),
                'total' => $this->total(),
            ],
        ];

    }

    // Переопределяем метод toResponse для полного контроля над ответом
    public function toResponse($request)
    {
        return parent::toResponse($request)->setData([
            'success' => true,
            'data' => $this->collection,
            'meta' => [
                'count' => $this->collection->count(),
                'total' => $this->total(),
            ],
        ]);
    }
}
