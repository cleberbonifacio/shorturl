<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrlsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_user'   => $this->id_user,
            'nova_url'   => $this->nova_url,
            'antiga_url'   => $this->antiga_url,
            'validade'   => $this->validade,
        ];
    }
}
