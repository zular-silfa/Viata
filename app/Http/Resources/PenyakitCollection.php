<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PenyakitCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(fn ($item) => [
            'id' => $item->id,
            'nama' => $item->nama,
            'detail' => $item->detail,
            'foto' => asset($item->foto),
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at,
        ]);
    }
}
