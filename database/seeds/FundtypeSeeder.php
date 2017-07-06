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
                array( 'fund_name' => '( งบมุ่งเป้า )สำนักงานคณะกรรมการวิจัยแห่งชาติ' ),
                array( 'fund_name' => '( งบแผ่นดิน ) สำนักงานคณะกรรมการวิจัยแห่งชาติ' ),
                array( 'fund_name' => 'สำนักงานกองทุนสนับสนุนการวิจัย' ),
                array( 'fund_name' => 'สำนักงานพัฒนาวิทยาศาสตร์และเทคโนโลยีแห่งชาติ' ),
                array( 'fund_name' => 'สำนักงานคณะกรรมการการอุดมศึกษา' ),
                array( 'fund_name' => 'สำนักงานคณะกรรมการนโยบายวิทยาศาสตร์ เทคโนโลยีและนวัฒตกรรมแห่งชาติ' ),
                array( 'fund_name' => 'สำนักงานพัฒนาการวิจัยการเกษตร' ),
            )
        );
    }
}
