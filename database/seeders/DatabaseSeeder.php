<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
use App\Models\Board;
use App\Models\Section;
use App\Models\Lead;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Status::truncate();
        Board::truncate();

        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create();

        $status = new Status();
        $status->name = 'Lead';
        $status->save();

        $board1 = Board::create([
            'name' => 'sample Board 1',
            'description' => 'sample Description.',
            'is_personal' => false,
            'user_id' => $user->id,
            'team_id' => 0
        ]);
        $section1 = Section::create([
            'name' => 'sample Section 1',
            'board_id' => $board1->id
        ]);
        $section2 = Section::create([
            'name' => 'sample Section 1',
            'board_id' => $board1->id
        ]);
        $lead1 =  Lead::create([
            'section_id' => $section2->id,
            'title' => 'sample Lead',
            'status_id' => $status->id
        ]);
    }
}
