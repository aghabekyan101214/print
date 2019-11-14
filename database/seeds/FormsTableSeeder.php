<?php

use Illuminate\Database\Seeder;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert([
            ['name' => 'Flat Size'],
            ['name' => 'Paper Stock'],
            ['name' => 'Printed Side Options'],
            ['name' => 'Finishing'],
            ['name' => 'Quantity'],
            ['name' => 'Turnaround time'],
            ['name' => 'Material'],
            ['name' => 'Shape'],
        ]);
    }
}
