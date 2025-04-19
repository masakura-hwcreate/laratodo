<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('todos')->insert([
                [
                    'user_id' => 1,
                    'deadline' => '2025/04/29',
                    'title' => 'todoサンプル1',
                    'is_finished' => false,
                    'created_at' => '2025/04/07 20:30:00',
                ],
                [
                    'user_id' => 1,
                    'deadline' => '2025/04/30',
                    'title' => 'todoサンプル2',
                    'is_finished' => false,
                    'created_at' => '2025/04/07 20:31:00',
                ],
                [
                    'user_id' => 1,
                    'deadline' => '2025/05/01',
                    'title' => 'todoサンプル3',
                    'is_finished' => false,
                    'created_at' => '2025/04/07 20:32:00',
                ],
            ]);
    }
}
