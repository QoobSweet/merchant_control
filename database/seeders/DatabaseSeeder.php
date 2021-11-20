<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use App\Models\StatusCollection;
use App\Models\User;
use App\Models\Team;
use App\Models\Status;
use App\Models\Board;
use App\Models\Lead;
use App\Models\Section;
use Illuminate\Database\Seeder;
use PhpParser\ErrorHandler\Collecting;
use PHPUnit\Framework\Constraint\Count;

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

        $unitedStates = Country::create([
            'long_name' => 'United States',
            'short_name' => 'US'
        ]);
        $states = [
            "AK" => "Alaska",
            "AL" => "Alabama",
            "AR" => "Arkansas",
            "AS" => "American Samoa",
            "AZ" => "Arizona",
            "CA" => "California",
            "CO" => "Colorado",
            "CT" => "Connecticut",
            "DC" => "District of Columbia",
            "DE" => "Delaware",
            "FL" => "Florida",
            "GA" => "Georgia",
            "GU" => "Guam",
            "HI" => "Hawaii",
            "IA" => "Iowa",
            "ID" => "Idaho",
            "IL" => "Illinois",
            "IN" => "Indiana",
            "KS" => "Kansas",
            "KY" => "Kentucky",
            "LA" => "Louisiana",
            "MA" => "Massachusetts",
            "MD" => "Maryland",
            "ME" => "Maine",
            "MI" => "Michigan",
            "MN" => "Minnesota",
            "MO" => "Missouri",
            "MS" => "Mississippi",
            "MT" => "Montana",
            "NC" => "North Carolina",
            "ND" => "North Dakota",
            "NE" => "Nebraska",
            "NH" => "New Hampshire",
            "NJ" => "New Jersey",
            "NM" => "New Mexico",
            "NV" => "Nevada",
            "NY" => "New York",
            "OH" => "Ohio",
            "OK" => "Oklahoma",
            "OR" => "Oregon",
            "PA" => "Pennsylvania",
            "PR" => "Puerto Rico",
            "RI" => "Rhode Island",
            "SC" => "South Carolina",
            "SD" => "South Dakota",
            "TN" => "Tennessee",
            "TX" => "Texas",
            "UT" => "Utah",
            "VA" => "Virginia",
            "VI" => "Virgin Islands",
            "VT" => "Vermont",
            "WA" => "Washington",
            "WI" => "Wisconsin",
            "WV" => "West Virginia",
            "WY" => "Wyoming"
        ];

        foreach ($states as $abbr => $longName) {
            State::create([
                'country_id' => $unitedStates->id,
                'long_name' => $longName,
                'short_name' => $abbr
            ]);
        }

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

        // create Status Collections
        $stateCollection = StatusCollection::create(['label' => 'state', 'lead_key' => 'state_status_id']);
        $valueCollection = StatusCollection::create(['label' => 'value', 'lead_key' => 'value_status_id']);

        $newLeadState = Status::create(['label' => 'New Lead', 'status_collection_id' => $stateCollection->id]);
        $needsProposalState = Status::create(['label' => 'Needs Proposal', 'status_collection_id' => $stateCollection->id]);
        $proposalSentState = Status::create(['label' => 'Proposal Sent', 'status_collection_id' => $stateCollection->id]);
        $shootDatesState = Status::create(['label' => 'Awaiting Shoot Dates', 'status_collection_id' => $stateCollection->id]);
        $schedulingState = Status::create(['label' => 'Scheduling Photographers', 'status_collection_id' => $stateCollection->id]);
        $scheduledState = Status::create(['label' => 'Photo Shoot Scheduled', 'status_collection_id' => $stateCollection->id]);
        $moderatingState = Status::create(['label' => 'Photographed/Moderating', 'status_collection_id' => $stateCollection->id]);
        $publishedState = Status::create(['label' => 'Published', 'status_collection_id' => $stateCollection->id]);

        // create Lead Value Status's

        $lowValue = Status::create(['label' => 'Low Value', 'status_collection_id' => $valueCollection->id]);
        $medValue = Status::create(['label' => 'Medium Value', 'status_collection_id' => $valueCollection->id]);
        $highValue = Status::create(['label' => 'High Value', 'status_collection_id' => $valueCollection->id]);

        // create 2 boards for testing
        $board1 = Board::create([
            'title' => 'sample Board 1',
            'description' => 'sample Description.',
            'is_personal' => false,
            'user_id' => $user->id,
            'team_id' => $team->id
        ]);
        $board2 = Board::create([
            'title' => 'sample Board 2',
            'description' => 'sample Description.',
            'is_personal' => false,
            'user_id' => $user->id,
            'team_id' => $team->id
        ]);

        // generate a few sections
        $section1 = $board1->sections()->create([
            'status_ids' => '1',
            'title' => 'Sample Section 1'
        ]);
        $section2 = $board1->sections()->create([
            'status_ids' => '1, 2',
            'title' => 'Sample Section 2'
        ]);

        $lead1 =  $board1->leads()->create([
            'title' => 'sample Lead 1',
            'state_status_id' => $newLeadState->id,
            'contact_name' => 'John Doe',
            'contact_phone' => '1234567890',
            'company_name' => 'Every Merchant',
            'company_phone' => 0000000000
        ]);
        $lead2 =  $board1->leads()->create([
            'title' => 'sample Lead 2',
            'state_status_id' => $needsProposalState->id,
            'contact_name' => 'John Doe',
            'contact_phone' => '1234567891',
        ]);
    }
}
