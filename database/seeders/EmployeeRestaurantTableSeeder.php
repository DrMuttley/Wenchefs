<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Restaurant;


class EmployeeRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = Employee::all();

        $restaurants = Restaurant::all();

        foreach ($employees as $employee) {    
            
            $restaurant = $restaurants[rand(0, $restaurants->count()-1)];

            while($restaurant->employees()->count() >= 5){
                $restaurant = $restaurants[rand(0, $restaurants->count()-1)];
            }
            $employee->restaurants()->attach($restaurant);
        }
    }
}
