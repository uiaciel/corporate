<?php

namespace App\Exports;

use App\Models\Setting;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SettingExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Setting::query();
    }

    public function headings(): array
    {
        return [
            'sitename',
            'tagline',
            'description',
            'keywords',
            'googlesiteverification',
            'address',
            'email',
            'phone',
            'whatsapp',
            'facebook',
            'twitter',
            'instagram',
            'linkedin',
            'url',
            'logo',
            'favicon',
            'code',
        ];
    }

    public function map($setting): array
    {
        return [
            $setting->sitename,
            $setting->tagline,
            $setting->description,
            $setting->keywords,
            $setting->googlesiteverification,
            $setting->address,
            $setting->email,
            $setting->phone,
            $setting->whatsapp,
            $setting->facebook,
            $setting->twitter,
            $setting->instagram,
            $setting->linkedin,
            $setting->url,
            $setting->logo,
            $setting->favicon,
            $setting->code,

        ];
    }
}
