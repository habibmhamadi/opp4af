<?php

namespace Database\Seeders;

use App\Models\Opportunity;
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
        'Job',
        'Miscellaneous'
    ];

    private $locations = [

        'Afghanistan',
        'Aland Islands',
        'Albania',
        'Algeria',
        'American Samoa',
        'Andorra',
        'Angola',
        'Anguilla',
        'Antarctica',
        'Antigua and Barbuda',
        'Argentina',
        'Armenia',
        'Aruba',
        'Australia',
        'Austria',
        'Azerbaijan',
        'Bahamas',
        'Bahrain',
        'Bangladesh',
        'Barbados',
        'Belarus',
        'Belgium',
        'Belize',
        'Benin',
        'Bermuda',
        'Bhutan',
        'Bolivia',
        'Bosnia and Herzegovina',
        'Botswana',
        'Bouvet Island',
        'Brazil',
        'British Indian Ocean Territory',
        'Brunei Darussalam',
        'Bulgaria',
        'Burkina Faso',
        'Burundi',
        'Cambodia',
        'Cameroon',
        'Canada',
        'Cape Verde',
        'Cayman Islands',
        'Central African Republic',
        'Chad',
        'Chile',
        'China',
        'Christmas Island',
        'Cocos (Keeling) Islands',
        'Colombia',
        'Comoros',
        'Congo',
        'Congo, The Democratic Republic of the',
        'Cook Islands',
        'Costa Rica',
        'Cote D\'Ivoire',
        'Croatia',
        'Cuba',
        'Cyprus',
        'Czech Republic',
        'Denmark',
        'Djibouti',
        'Dominica',
        'Dominican Republic',
        'Ecuador',
        'Egypt',
        'El Salvador',
        'Equatorial Guinea',
        'Eritrea',
        'Estonia',
        'Ethiopia',
        'Falkland Islands (Malvinas)',
        'Faroe Islands',
        'Fiji',
        'Finland',
        'France',
        'French Guiana',
        'French Polynesia',
        'French Southern Territories',
        'Gabon',
        'Gambia',
        'Georgia',
        'Germany',
        'Ghana',
        'Gibraltar',
        'Greece',
        'Greenland',
        'Grenada',
        'Guadeloupe',
        'Guam',
        'Guatemala',
        'Guernsey',
        'Guinea',
        'Guinea-Bissau',
        'Guyana',
        'Haiti',
        'Heard Island and Mcdonald Islands',
        'Holy See (Vatican City State)',
        'Honduras',
        'Hong Kong',
        'Hungary',
        'Iceland',
        'India',
        'Indonesia',
        'Iran, Islamic Republic Of',
        'Iraq',
        'Ireland',
        'Isle of Man',
        'Israel',
        'Italy',
        'Jamaica',
        'Japan',
        'Jersey',
        'Jordan',
        'Kazakhstan',
        'Kenya',
        'Kiribati',
        'Korea, Democratic People\'S Republic of',
        'Korea, Republic of',
        'Kuwait',
        'Kyrgyzstan',
        'Lao People\'S Democratic Republic',
        'Latvia',
        'Lebanon',
        'Lesotho',
        'Liberia',
        'Libyan Arab Jamahiriya',
        'Liechtenstein',
        'Lithuania',
        'Luxembourg',
        'Macao',
        'Macedonia, The Former Yugoslav Republic of',
        'Madagascar',
        'Malawi',
        'Malaysia',
        'Maldives',
        'Mali',
        'Malta',
        'Marshall Islands',
        'Martinique',
        'Mauritania',
        'Mauritius',
        'Mayotte',
        'Mexico',
        'Micronesia, Federated States of',
        'Moldova, Republic of',
        'Monaco',
        'Mongolia',
        'Montserrat',
        'Morocco',
        'Mozambique',
        'Myanmar',
        'Namibia',
        'Nauru',
        'Nepal',
        'Netherlands',
        'Netherlands Antilles',
        'New Caledonia',
        'New Zealand',
        'Nicaragua',
        'Nigeria',
        'Niger',
        'Niue',
        'Norfolk Island',
        'Northern Mariana Islands',
        'Norway',
        'Oman',
        'Pakistan',
        'Palau',
        'Palestinian Territory, Occupied',
        'Panama',
        'Papua New Guinea',
        'Paraguay',
        'Peru',
        'Philippines',
        'Pitcairn',
        'Poland',
        'Portugal',
        'Puerto Rico',
        'Qatar',
        'Reunion',
        'Romania',
        'Russian Federation',
        'RWANDA',
        'Saint Helena',
        'Saint Kitts and Nevis',
        'Saint Lucia',
        'Saint Pierre and Miquelon',
        'Saint Vincent and the Grenadines',
        'Samoa',
        'San Marino',
        'Sao Tome and Principe',
        'Saudi Arabia',
        'Senegal',
        'Serbia and Montenegro',
        'Seychelles',
        'Sierra Leone',
        'Singapore',
        'Slovakia',
        'Slovenia',
        'Solomon Islands',
        'Somalia',
        'South Africa',
        'South Georgia and the South Sandwich Islands',
        'Spain',
        'Sri Lanka',
        'Sudan',
        'Suriname',
        'Svalbard and Jan Mayen',
        'Swaziland',
        'Sweden',
        'Switzerland',
        'Syrian Arab Republic',
        'Taiwan, Province of China',
        'Tajikistan',
        'Tanzania, United Republic of',
        'Thailand',
        'Timor-Leste',
        'Togo',
        'Tokelau',
        'Tonga',
        'Trinidad and Tobago',
        'Tunisia',
        'Turkey',
        'Turkmenistan',
        'Turks and Caicos Islands',
        'Tuvalu',
        'Uganda',
        'Ukraine',
        'United Arab Emirates',
        'United Kingdom',
        'United States',
        'United States Minor Outlying Islands',
        'Uruguay',
        'Uzbekistan',
        'Vanuatu',
        'Venezuela',
        'Viet Nam',
        'Virgin Islands, British',
        'Virgin Islands, U.S.',
        'Wallis and Futuna',
        'Western Sahara',
        'Yemen',
        'Zambia',
        'Zimbabwe',
        "Badakhshan",
        "Baghlan",
        "Balkh",
        "Badghis",
        "Bamyan",
        "Daykundi",
        "Farah",
        "Faryab",
        "Ghazni",
        "Ghor",
        "Helmand",
        "Herat",
        "Jowzjan",
        "Kandahar",
        "Khost",
        "Kunar",
        "Kunduz",
        "Kabul",
        "Kapisa",
        "Laghman",
        "Logar",
        "Nangarhar",
        "Nimroz",
        "Nuristan",
        "Paktiya",
        "Paktika",
        "Panjshir",
        "Parwan",
        "Samangan",
        "Sar-e-Pul",
        "Takhar",
        "Uruzgan",
        "Wardak",
        "Zabul",
        "Remote"
    ];

    private $funds = [
        'Unspecified',
        'Paid',
        'Unpaid',
        'Fully Funded',
        'Partially Funded'
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
        'Information Technology',
        'Finance',
        'Sales/Marketing',
        'Media',
        'Social Science',
        'Human Resource',
        'Teaching',
        'Security/Safety',
        'Management',
        'Communication'
    ];

    public function run()
    {
         $user = User::create([
             'name' => 'Opp4af',
             'email' => 'opp4af@gmail.com',
             'is_admin' => true,
             'email_verified_at' => now(),
             'password' => 'opp4af@opp4af',
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

        foreach ($this->funds as $fund)
        {
            Fund::create(['name' => $fund]);
        }

        foreach ($this->areas as $area)
        {
            Area::create(['name' => $area]);
        }


       // foreach (Opportunity::factory()->count(20)->create() as $opportunity)
       // {
         //   $opportunity->education()->attach([4, 5]);
          //  $opportunity->locations()->attach([1]);
          //  $opportunity->areas()->attach([2,6]);
       // }
    }
}
