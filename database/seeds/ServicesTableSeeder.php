<?php

use Illuminate\Database\Seeder;
use App\Service;
use App\Category;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::truncate();

        $services = [
            0 => 'Frontend Development',
            1 => 'Backend Development',
            2 => 'Mobile Apps',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 1
            ]);
        }

        $services = [
            0 => 'Продажа Телевизоров',
            1 => 'Продажа Холодильников',
            2 => 'Продажа Тостеров',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 2
            ]);
        }

        $services = [
            0 => 'Масла',
            1 => 'Смазки',
            2 => 'Шланги',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 3
            ]);
        }

        $services = [
            0 => 'Проектирование сетей',
            1 => 'Установка видеонаблюдения',
            2 => 'Беспроводные точки доступа',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 4
            ]);
        }

        $services = [
            0 => 'Бургеры',
            1 => 'Пицца',
            2 => 'Суши',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 5
            ]);
        }

        $services = [
            0 => 'Литература',
            1 => 'Видеоигры',
            2 => 'Сувениры',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 6
            ]);
        }

        $services = [
            0 => 'Продажа авиабилетов',
            1 => 'Перевозка грузов',
            2 => 'Оформление виз',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 7
            ]);
        }

        $services = [
            0 => 'Доставка еды',
            1 => 'Продажа продуктов питания',
            2 => 'Продажа оптом',
        ];

        foreach($services as $key => $service){
            Service::create([
                'name' => $service,
                'category_id' => 8
            ]);
        }
    }
}
