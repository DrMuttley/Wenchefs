<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee([
            'first_name' => 'Adam',
            'last_name' => 'Adamski',
            'email' => 'adam.adamski@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Bartek',
            'last_name' => 'Borek',
            'email' => 'bartek.borek@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Cezary',
            'last_name' => 'Cis',
            'email' => 'cezary.cis@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Daniel',
            'last_name' => 'Dast',
            'email' => 'daniel.dast@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Edmund',
            'last_name' => 'Elis',
            'email' => 'edmund.elis@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Franek',
            'last_name' => 'Fronter',
            'email' => 'franek.fronter@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Grzegorz',
            'last_name' => 'Gruz',
            'email' => 'grzegorz.gruz@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Henryk',
            'last_name' => 'Huc',
            'email' => 'Henryk.Huc@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Irek',
            'last_name' => 'Iris',
            'email' => 'irek.iris@gmail.com'
        ]);
        $employee->save();

        $employee = new Employee([
            'first_name' => 'Janek',
            'last_name' => 'Jostek',
            'email' => 'janek.jostek@gmail.com'
        ]);
        $employee->save();
    }
}
