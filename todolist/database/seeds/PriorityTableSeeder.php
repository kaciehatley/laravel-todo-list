<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([[
            'priority'=>'Urgent'
        ],
        [
            'priority'=>'Important'
        ],
        [
            'priority'=>'Ignore'
        ],
        [
            'priority'=>'Optional'
        ]
        ]);
    }
}
