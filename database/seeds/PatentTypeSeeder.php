<?php

use Illuminate\Database\Seeder;

class PatentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('patent_type')->insert(
        array(
            array('ptt_name' => 'สิทธิบัตรการประดิษฐ์'),
            array('ptt_name' => 'สิทธิบัตรการออกแบบผลิตภัณฑ์'),
            array('ptt_name' => 'อนุสิทธิบัตร ( Petty Patent )')
        ));
    }
}
