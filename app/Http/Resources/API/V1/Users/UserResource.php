<?php

namespace App\Http\Resources\API\V1\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'country_code' => $this->country_code,
            'account_type' => $this->account_type,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
//            'hide_show' => $this->hide_show,
//            'is_banned' => $this->is_banned,
        ];
    }
}
