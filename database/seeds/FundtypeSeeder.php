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
                array( 'fund_name' => 'เงินงบประมาณแผ่นดิน','fund_type' => 'in' ),
                array( 'fund_name' => 'เงินรายได้มหาวิทยาลัย','fund_type' => 'in'  ),
                array( 'fund_name' => 'เงินรายได้คณะ สถาบัน สำนัก','fund_type' => 'in'  ),
                array( 'fund_name' => '( งบมุ่งเป้า )สำนักงานคณะกรรมการวิจัยแห่งชาติ','fund_type' => 'out'  ),
                array( 'fund_name' => '( งบแผ่นดิน ) สำนักงานคณะกรรมการวิจัยแห่งชาติ','fund_type' => 'in'  ),
                array( 'fund_name' => 'สำนักงานกองทุนสนับสนุนการวิจัย','fund_type' => 'out'  ),
                array( 'fund_name' => 'สำนักงานพัฒนาวิทยาศาสตร์และเทคโนโลยีแห่งชาติ','fund_type' => 'out'  ),
                array( 'fund_name' => 'สำนักงานคณะกรรมการการอุดมศึกษา','fund_type' => 'out'  ),
                array( 'fund_name' => 'สำนักงานคณะกรรมการนโยบายวิทยาศาสตร์ เทคโนโลยีและนวัฒตกรรมแห่งชาติ','fund_type' => 'out'  ),
                array( 'fund_name' => 'สำนักงานพัฒนาการวิจัยการเกษตร','fund_type' => 'out'  ),
                array( 'fund_name' => 'กระทรวงวิทยาศาสตร์และเทคโนโลยี','fund_type' => 'out'  ),
                array( 'fund_name' => 'เงินจากแหล่งทุนอื่น ๆ','fund_type' => 'out'  ),
            )
        );
    }
}
