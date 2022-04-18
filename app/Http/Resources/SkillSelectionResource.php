<?php

namespace App\Http\Resources;

use App\Models\Skill;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillSelectionResource extends JsonResource
{

    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = Skill::class;


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
        ];
    }
}
