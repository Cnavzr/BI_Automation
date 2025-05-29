<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'firstname'=>'سینا',
            'lastname'=>'وزیری',
            'mobile'=>'09376668008',
            'status'=> 1,
            'company'=>'Sina',
            'password'=> Hash::make('cz%LbS^310`j'),
        ]);
    }
}
