<?php

use Illuminate\Database\Seeder;

class FundtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        DB::table('fund_type')->insert(
            array(
                array( 'fund_name' => 'เงินงบประมาณแผ่นดิน' ),
                array( 'fund_name' => 'เงินรายได้มหาวิทยาลัย' ),
                array( 'fund_name' => 'เงินรายได้คณะ สถาบัน สำนัก' ),
                array( 'fund_name' => 'เงินจากแหล่งทุนภายนอก' ),
                array( 'fund_name' => 'เงินอื่น ๆ' ),
                array( 'fund_name' => 'วช.' ),
                array( 'fund_name' => 'สกว.' ),
                array( 'fund_name' => 'สวทช.' ),
                array( 'fund_name' => 'สวรส.' ),
                array( 'fund_name' => 'สกอ.' ),
                array( 'fund_name' => 'สสวท.' ),
            )
        );
    }
}
