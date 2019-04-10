<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Business;
use App\Person;
use App\Role;

Route::get('/', function () {

    $person1 = factory(Person::class)->create();
    $person2 = factory(Person::class)->create();
    $person3 = factory(Person::class)->create();
    $person4 = factory(Person::class)->create();

    $business1 = factory(Business::class)->create();

    $role1 = factory(Role::class)->create();
    $role2 = factory(Role::class)->create();

    $business1->people()->attach([
        $person1->id => ['role_id' => $role1->id],
        $person2->id => ['role_id' => $role1->id],
        $person3->id => ['role_id' => $role1->id],
    ]);

    dump($business1->people()->get()->pluck('pivot.role_id', 'id')->toArray());

    sleep(3);

    $changes = $business1->people()->sync([
        $person1->id => ['role_id' => $role2->id],
        $person3->id => ['role_id' => $role1->id],
        $person4->id => ['role_id' => $role1->id],
    ]);

    dump($business1->people()->get()->pluck('pivot.role_id', 'id')->toArray());

    dump($changes);
});
