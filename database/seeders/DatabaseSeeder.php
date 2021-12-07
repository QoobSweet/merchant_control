<?php

namespace Database\Seeders;

use App\Models\AriaColor;
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

        // create Default Users
        $user1 = new User();
        $user1->name = "Kevin";
        $user1->email = "kevina@everymerchant.com";
        $user1->password = "$2y$10\$i/J62kOU/aQzjn3TyFxLUOAlWe4rSTd9wQ8ChYlRg.YlXA4LcJQgS";
        $user1->save();

        $user2 = new User();
        $user2->name = "Jonathan";
        $user2->email = "johnl@everymerchant.com";
        $user2->password = "$2y$10\$Zs6lrDotH92odRaE8ARnEOPTnlBsom7p9E2YqgI1py.gpVdFmwFou";
        $user2->save();

        // Create Admin Team using user
        $adminTeam = new Team();
        $adminTeam->user_id = $user1->id;
        $adminTeam->name = 'Admin Team';
        $adminTeam->save();

        // save team to user
        $user1->current_team_id = $adminTeam->id;
        $user1->save();
        $user2->current_team_id = $adminTeam->id;
        $user2->save();

        // create 2 boards for testing
        $board1 = Board::create([
            'title' => 'sample Board 1',
            'description' => 'sample Description.',
            'is_personal' => false,
            'user_id' => $user1->id,
            'team_id' => $adminTeam->id
        ]);

        $ariaColorLightRed = AriaColor::create(['name' => 'Light Red', 'aria_color_tag' => 'red-300']);
        $ariaColorRed = AriaColor::create(['name' => 'Red', 'aria_color_tag' => 'red-500']);
        $ariaColorDarkRed = AriaColor::create(['name' => 'Dark Red', 'aria_color_tag' => 'red-700']);
        $ariaColorLightBlue = AriaColor::create(['name' => 'Light Blue', 'aria_color_tag' => 'blue-300']);
        $ariaColorBlue = AriaColor::create(['name' => 'Blue', 'aria_color_tag' => 'blue-500']);
        $ariaColorDarkBlue = AriaColor::create(['name' => 'Dark Blue', 'aria_color_tag' => 'blue-700']);
        $ariaColorLightGreen = AriaColor::create(['name' => 'Light Green', 'aria_color_tag' => 'green-300']);
        $ariaColorGreen = AriaColor::create(['name' => 'Green', 'aria_color_tag' => 'green-500']);
        $ariaColorDarkGreen = AriaColor::create(['name' => 'Dark Green', 'aria_color_tag' => 'green-700']);
    }
}
