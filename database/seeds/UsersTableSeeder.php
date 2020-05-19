<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'Joe',
            'email' => 'joedoe@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Bret',
            'email' => 'Sincere@april.biz',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Antonette',
            'email' => 'Shanna@melissa.tv',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Samantha',
            'email' => 'Nathan@yesenia.net',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Karianne',
            'email' => 'OConner@kory.org',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Kamren',
            'email' => 'Hettinger@annie.ca',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Elwyn',
            'email' => 'Hoeger@billy.biz',
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'Nienow',
            'email' => 'Sherwood@rosamond.me',
            'password' => Hash::make('password')
        ]);
    }
}
