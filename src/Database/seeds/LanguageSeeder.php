<?php

namespace Swandam\Core\Database\seeds;

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public const ID = 'id';
    public const CODE = 'code';
    public const NAME = 'name';

    public function run()
    {
        DB::table('languages')->delete();
        DB::table('languages')->insert();
    }
}
