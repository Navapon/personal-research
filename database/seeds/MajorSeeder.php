<?php

use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('majors')->insert(
            array(
                array('major_name' => 'เคมี'),
                array('major_name' => 'วิทยาการคอมพิวเเตอร์'),
                array('major_name' => 'เทคโนโลยีและการจัดการความปลอดภัยของอาหาร'),
                array('major_name' => 'ออกแบบผลิตภัณฑ์อุตสาหกรรม'),
                array('major_name' => 'เทคโนโลยีการถ่ายภาพและภาพยนตร์'),
                array('major_name' => 'เทคโนโลยีการพิมพ์'),
                array('major_name' => 'เทคโนโลยีการโทรทัศน์และวิทยุกระจายเสียง'),
                array('major_name' => 'เทคโนโลยีเครื่องเรือนและการออกแบบ'),
                array('major_name' => 'ชีววิทยา'),
                array('major_name' => 'ฟิสิกส์'),
                array('major_name' => 'คณิตศาสตร์'),
            ));
    }
}
