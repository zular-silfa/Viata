<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PerawatanCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(fn ($item) => [
            'id' => $item->id,
            'jenis_kucing' => $item->jenis_kucing,
            'foto' => asset($item->foto),
            'ciri_ciri' => $item->ciri_ciri,
            'perawatan' => $item->perawatan,
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at,
        ]);
    }
}
