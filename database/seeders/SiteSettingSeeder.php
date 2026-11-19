<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'company_name_ko'   => '우성레미콘(주)',
            'company_name_en'   => 'Woosung Remicon Co., Ltd.',
            'address_ko'        => '강원특별자치도 강릉시 강동면 오이동길 104',
            'address_en'        => '104 Oidong-gil, Gangdong-myeon, Gangneung-si, Gangwon State, Republic of Korea',
            'phone'             => '033-644-5677',
            'email'             => 'info@woosung-remicon.kr',
            'business_hours_ko' => '평일 08:00–18:00',
            'business_hours_en' => 'Weekdays 08:00–18:00',
            'founded_year'      => '1999',
            'kakao_map_url'     => 'https://map.kakao.com/?q=강릉시+강동면+오이동길+104',
            'kakao_map_embed'   => '<div style="width:100%;height:400px;"><iframe src="https://map.kakao.com/link/embed/map/강원특별자치도+강릉시+강동면+오이동길+104,37.7651,128.9573,강동면+오이동길+104,강릉시" frameborder="0" scrolling="no" width="100%" height="100%" style="border:1px solid #ccc;"></iframe></div>',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
