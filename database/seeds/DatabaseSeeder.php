<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(seed_user_academic_table::class);
         $this->call(MajorSeeder::class);
         $this->call(UserRoleSeeder::class);
         $this->call(ResearchLevelSeeder::class);
         $this->call(ResearchPresentTypeSeeder::class);
         $this->call(ResearchProceedingTypeSeeder::class);
         $this->call(FundtypeSeeder::class);
         $this->call(ResearchStatusSeeder::class);
         $this->call(PatentTypeSeeder::class);
         $this->call(YearSeeder::class);
    }
}
