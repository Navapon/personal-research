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
                array( 'fund_name' => 'เงินรายได้' ),
                array( 'fund_name' => 'เงินจากนอก' ),
                array( 'fund_name' => 'เงินอื่นๆ' ),
            )
        );
    }
}
