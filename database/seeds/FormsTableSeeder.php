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
            ['name' => 'Paper Type', "slug" => "paper_type"],
            ['name' => 'Shape', "slug" => "shape"],
            ['name' => 'Colors', "slug" => "colors"],
            ['name' => 'Finishing', "slug" => "finishing"],
            ['name' => 'Size', "slug" => "size"],
            ['name' => 'Quantity', "slug" => "quantity"],
            ['name' => 'Material Type', "slug" => "material_type"],
            ['name' => 'Print Side', "slug" => "print_side"],
            ['name' => 'Thickness', "slug" => "thickness"],
        ]);
    }
}
