<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Group::class, 10)
            ->create()
            ->each(function ($group) {
                $group->users()->createMany(
                    factory(App\Models\User::class, 3)->make()->toArray()
                );

                $group->devices()->createMany(
                    factory(App\Models\Device::class, 5)->make()->toArray()
                );
            });
    }
}
