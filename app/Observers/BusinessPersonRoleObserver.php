<?php

namespace App\Observers;

use App\BusinessPersonRole;

class BusinessPersonRoleObserver
{
    public function updated(BusinessPersonRole $businessPersonRole)
    {
        dump('==> UPDATED <==');
        dump($businessPersonRole->person_id);
        dump($businessPersonRole->business_id);
        dump($businessPersonRole->role_id);
        dump($businessPersonRole->getOriginal('role_id'));
    }

    public function updating(BusinessPersonRole $businessPersonRole)
    {
        dump('==> UPDATING <==');
        dump($businessPersonRole->person_id);
        dump($businessPersonRole->business_id);
        dump($businessPersonRole->role_id);
        dump($businessPersonRole->getOriginal('role_id'));
    }
}
