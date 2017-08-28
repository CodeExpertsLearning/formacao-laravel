<?php

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $publisher = new Publisher();
        $publisher->name = "Editora Novatec";
        $publisher->save();

        $publisher = new Publisher();
        $publisher->name = "Editora Moderna";
        $publisher->save();
    }
}
