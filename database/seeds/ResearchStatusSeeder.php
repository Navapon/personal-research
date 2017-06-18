<?php

use Illuminate\Database\Seeder;

class ResearchStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('research_status')->insert(
            array(

                array('rst_name' => 'ตีพิมพ์แล้ว'),
                array('rst_name' => 'อยู่ในระหว่างการดำเนินการ'),

            ));
    }
}
