<?php

namespace Modules\Blog\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CategoryResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'color' => $this->color,
            'slug' => $this->slug,
            'tags' => $this->tags,
            'childs' => $this->childs,
        ];
    }
}
