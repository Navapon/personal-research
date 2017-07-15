<?php

use Illuminate\Database\Seeder;

class CommitStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('commit_status')->insert(
            array(

                array('status_name' => 'รอการตรวจสอบ'),
                array('status_name' => 'อนุมัติ'),
                array('status_name' => 'ยกเลิก'),

            ));
    }
}
