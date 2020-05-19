<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $companies = Company::all();

        $categories = [
            0 => 'software development',
            1 => 'sale of household appliances',
            2 => 'sale of oil products',
            3 => 'communication services',
            4 => 'food delivery',
            5 => 'sale of literature',
            6 => 'air transportation',
            7 => 'grocery store',
        ];

        foreach($companies as $key => $company){
            Category::create([
                'name' => $categories[$key],
                'company_id' => $company->id
            ]);
        }
    }
}
