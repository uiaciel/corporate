<?php

namespace App\Imports;

use App\Models\Setting;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SettingImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Setting([
            'id' => 1,
            'sitename' => $row['sitename'],
            'tagline'=> $row['tagline'],
            'description'=> $row['description'],
            'keywords'=> $row['keywords'],
            'googlesiteverification'=> $row['googlesiteverification'],
            'address'=> $row['address'],
            'email'=> $row['email'],
            'phone'=> $row['phone'],
            'whatsapp'=> $row['whatsapp'],
            'facebook'=> $row['facebook'],
            'twitter'=> $row['twitter'],
            'instagram'=> $row['instagram'],
            'linkedin'=> $row['linkedin'],
            'url'=> $row['url'],
            'logo'=> $row['logo'],
            'favicon'=> $row['favicon'],
            'code'=> $row['code'],
        ]);
    }
}
