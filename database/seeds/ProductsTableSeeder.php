<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('products')->insert([
            ["name" => "Booklets"],
            ["name" => "Bookmarks"],
            ["name" => "Brochures"],
            ["name" => "Business cards"],
            ["name" => "Calendars"],
            ["name" => "Door Hangers"],
            ["name" => "Envelopes"],
            ["name" => "Event Tickets"],
            ["name" => "Flyers"],
            ["name" => "Folders"],
            ["name" => "Greeting Cards"],
            ["name" => "Letterheads"],
            ["name" => "Notepads"],
            ["name" => "Postcards"],
            ["name" => "Posters"],
            ["name" => "Rack Cards"],
            ["name" => "Roll Labels"],
            ["name" => "Special Shapes"],
            ["name" => "Stickers"],
            ["name" => "Table Tents"],
        ]);
    }
}
