<?php

use Illuminate\Database\Seeder;
use App\AcademicModel;

class seed_user_academic_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_academic')->insert(
            array(
                array('academic_name' => 'ดร.'),
                array('academic_name' => 'ผศ.'),
                array('academic_name' => 'รศ.'),
                array('academic_name' => 'ศ.'),
                array('academic_name' => 'ผศ.ดร.'),
                array('academic_name' => 'รศ.ดร.'),
                array('academic_name' => 'ศ.ดร.'),
            ));
    }
}
