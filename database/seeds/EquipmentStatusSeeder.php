<?php

use Illuminate\Database\Seeder;

class EquipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        //
        DB::table('research_equipment_status')->insert(
            array(
                array( 're_status_name' => 'สามารถใช้งานได้' ),
                array( 're_status_name' => 'ชำรุด ไม่สามารถใช้งานได้' ),
                array( 're_status_name' => 'กำลังซ่อมแซม' ),
            )
        );
    }
}
