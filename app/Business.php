<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function people()
    {
        return $this->belongsToMany(Person::class, 'business_person_role')
            ->using(BusinessPersonRole::class)
            ->withPivot([
                'role_id',
            ])
            ->withTimestamps();
    }
}
