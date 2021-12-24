<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentMunicipialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $sql = database_path('departments_and_municipialities.sql');
       DB::unprepared(file_get_contents($sql));
    }
}
