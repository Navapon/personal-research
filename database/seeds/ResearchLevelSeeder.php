<?php

use Illuminate\Database\Seeder;

class ResearchLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('research_level')->insert(
            array(
                array('rl_name' => 'ระดับชาติ'),
                array('rl_name' => 'ระดับนานาชาติ'),

            ));
    }
}
