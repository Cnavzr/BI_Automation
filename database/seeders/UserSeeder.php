<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'member']);
        $user = User::create([
            'firstname'=>'سینا',
            'lastname'=>'وزیری',
            'mobile'=>'09376668008',
            'status'=> 1,
            'company'=>'Sina',
            'password'=> Hash::make('cz%LbS^310`j'),
        ]);
        $user->assignRole('administrator');

        $user2 = User::create([
            'firstname'=>'حسین',
            'lastname'=>'فردوسیان',
            'mobile'=>'09353646265',
            'status'=> 1,
            'company'=>'Sina',
            'password'=> Hash::make('cz%LbS^310`j'),
        ]);
        $user2->assignRole('administrator');

    }
}
