<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\User;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();

        $users = User::all();

        $companies = [
            0 => 'Microsoft',
            1 => 'Sulpak',
            2 => 'Sinooil',
            3 => 'Transtelecom',
            4 => 'Dodo Pizza',
            5 => 'Meloman',
            6 => 'Air Astana',
            7 => 'Magnum'
        ];

        foreach($users as $key => $user){
            Company::create([
                'name' => $companies[$key],
                'user_id' => $user->id
            ]);
        }
    }
}
