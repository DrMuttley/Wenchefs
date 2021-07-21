<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = new Restaurant([
            'name' => 'MeatChefs'
        ]);
        $restaurant->save();

        $restaurant = new Restaurant([
            'name' => 'VegeChefs'
        ]);
        $restaurant->save();

        $restaurant = new Restaurant([
            'name' => 'BurgerChefs'
        ]);
        $restaurant->save();
    }
}
