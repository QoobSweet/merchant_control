<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Status;
use App\Models\Board;
use App\Models\Lead;
use App\Models\Section;
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




        // create Admin User
        $user = new User();
        $user->name = "admin";
        $user->email = "kevina@everymerchant.com";
        $user->password = "$2y$10\$i/J62kOU/aQzjn3TyFxLUOAlWe4rSTd9wQ8ChYlRg.YlXA4LcJQgS";
        $user->save();

        // Create Admin Team using user
        $team = new Team();
        $team->user_id = $user->id;
        $team->name = 'Admin Team';
        $team->save();

        // save team to user
        $user->current_team_id = $team->id;
        $user->save();



        // create Status's
        $status = new Status();
        $status->name = 'New Lead';
        $status->save();

        $board1 = Board::create([
            'name' => 'sample Board 1',
            'description' => 'sample Description.',
            'is_personal' => false,
            'user_id' => $user->id,
            'team_id' => $team->id
        ]);
        $section1 = Section::create([
            'board_id' => $board1->id,
            'title' => 'Sample Section 1'
        ]);
        $section2 = Section::create([
            'board_id' => $board1->id,
            'title' => 'Sample Section 2'
        ]);
        $lead1 =  Lead::create([
            'section_id' => $section1->id,
            'title' => 'sample Lead 1',
            'status_id' => $status->id,
            'contact_name' => 'John Doe',
            'contact_phone' => '1234567890',
            'company_name' => 'Every Merchant',
            'company_phone' => 0000000000
        ]);
        $lead2 =  Lead::create([
            'section_id' => $section2->id,
            'title' => 'sample Lead 2',
            'status_id' => $status->id,
            'contact_name' => 'John Doe',
            'contact_phone' => '1234567891',
        ]);
        $lead2 =  Lead::create([
            'section_id' => $section2->id,
            'title' => 'sample Lead 2',
            'status_id' => $status->id,
            'contact_name' => 'John Doe',
            'contact_phone' => '1234567891',
        ]);
        $lead2 =  Lead::create([
            'section_id' => $section2->id,
            'title' => 'sample Lead 2',
            'status_id' => $status->id,
            'contact_name' => 'John Doe',
            'contact_phone' => '1234567891',
        ]);
    }
}
