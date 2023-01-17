<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountriesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Country::query()->truncate();
        State::query()->truncate();
        City::query()->truncate();
        DB::unprepared(file_get_contents(database_path('importables/countries-data.sql')));
        DB::unprepared(file_get_contents(database_path('importables/states-data.sql')));
        DB::unprepared(file_get_contents(database_path('importables/cities-data.sql')));
        Schema::enableForeignKeyConstraints();
    }
}
