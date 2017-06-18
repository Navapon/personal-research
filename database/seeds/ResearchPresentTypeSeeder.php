<?php

use Illuminate\Database\Seeder;

class ResearchPresentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('research_present_type')->insert(
            array(
                array('rsp_name' => 'Poster'),
                array('rsp_name' => 'Oral'),

            ));
    }
}
