<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Education;
use App\Models\Fund;
use App\Models\Organization;
use App\Models\Area;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    private $categories = [
        'Scholarship',
        'Internship',
        'Workshop',
        'Fellowship',
        'Job',
        'Course',
        'Miscellaneous'
    ];

    private $locations = [
        'Afghanistan',
        'Armenia',
        'Australia',
        'Belarus',
        'Belgium',
        'Canada',
        'Denmark',
        'Finland',
        'Germany',
        'Italy',
        'Iran',
        'India',
        'Lithuania',
        'Netherlands',
        'New Zealand',
        'Pakistan',
        'Russia',
        'Spain',
        'Turkey',
        'Uruguay',
        'Kabul',
        'Herat',
        'Balkh',
        'Bamyan',
        'Nangarhar'
    ];

    private $funds = [
        'Unspecified',
        'Paid',
        'Unpaid',
        'Fully Funded',
        'Partially Funded'
    ];

    private $organizations = [
        'NSIA',
        'DACCAR',
        'BARAK',
        'JSSP',
        'Netlinks',
        'Moore'
    ];

    private $educations = [
        'Unspecified',
        'High School',
        'Diploma',
        'Bachelor',
        'Master',
        'PHD'
    ];

    private $areas = [
        'Agriculture',
        'Engineering',
        'General',
        'Medical',
        'Politics',
        'Information Technology'
    ];

    private $opportunity = [
        'name' => 'Software Developer',
        'slug' => 'software-developer-1',
        'category_id' => 5,
        'organization_id' => 1,
        'fund_id' => 2,
        'deadline' => '2021-08-12',
        'description' => 'This is Description'
    ];

    public function run()
    {
         $user = User::create([
             'name' => 'Opp4af',
             'email' => 'opp4af@gmail.com',
             'is_admin' => true,
             'email_verified_at' => now(),
             'password' => '12341234',
             'remember_token' => Str::random(10),
         ]);

         foreach ($this->categories as $category)
         {
             Category::create(['name' => $category]);
         }

        foreach ($this->locations as $location)
        {
            Location::create(['name' => $location]);
        }

        foreach ($this->educations as $education)
        {
            Education::create(['name' => $education]);
        }

        foreach ($this->organizations as $organization)
        {
            Organization::create(['name' => $organization]);
        }

        foreach ($this->funds as $fund)
        {
            Fund::create(['name' => $fund]);
        }

        foreach ($this->areas as $area)
        {
            Area::create(['name' => $area]);
        }

        $opportunity = $user->opportunities()->create($this->opportunity);
        $opportunity->education()->attach([4,5]);
        $opportunity->locations()->attach([1]);
        $opportunity->areas()->attach([2,6]);
    }
}
