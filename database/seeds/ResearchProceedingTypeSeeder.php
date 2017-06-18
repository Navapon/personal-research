<?php

use Illuminate\Database\Seeder;

class ResearchProceedingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('research_proceeding_type')->insert(
            array(
                array('rpt_name' => 'Abstract'),
                array('rpt_name' => 'Fullpaper'),

            ));
    }
}
