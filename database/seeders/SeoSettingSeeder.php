<?php

namespace Database\Seeders;

use App\Models\SeoSetting;
use Illuminate\Database\Seeder;

class SeoSettingSeeder extends Seeder
{
    public function run(): void
    {
        $seoData = [
            [
                'page'                 => 'home',
                'meta_title_ko'        => '우성레미콘(주) | 강릉 레미콘·콘크리트 블록 전문',
                'meta_title_en'        => 'Woosung Remicon Co., Ltd. | Ready-Mixed Concrete & Block, Gangneung',
                'meta_description_ko'  => '1999년 창립. 강원도 강릉 강동면에 위치한 우성레미콘(주)은 고품질 레미콘, 콘크리트 블록을 공급합니다. 033-644-5677',
                'meta_description_en'  => 'Founded in 1999, Woosung Remicon Co., Ltd. supplies high-quality ready-mixed concrete and concrete blocks in Gangneung, Gangwon. Call 033-644-5677.',
                'og_image'             => null,
            ],
            [
                'page'                 => 'about',
                'meta_title_ko'        => '회사 소개 | 우성레미콘(주)',
                'meta_title_en'        => 'About Us | Woosung Remicon Co., Ltd.',
                'meta_description_ko'  => '1999년 설립된 우성레미콘(주)의 연혁, 경영이념, 품질방침을 소개합니다.',
                'meta_description_en'  => 'Learn about the history, management philosophy, and quality policy of Woosung Remicon, established in 1999.',
                'og_image'             => null,
            ],
            [
                'page'                 => 'products',
                'meta_title_ko'        => '제품 소개 | 레미콘·블록·아스콘 | 우성레미콘(주)',
                'meta_title_en'        => 'Products | Ready-Mix, Blocks & Ascon | Woosung Remicon',
                'meta_description_ko'  => '우성레미콘의 다양한 제품을 확인하세요. 일반·고강도·포장용 레미콘, 콘크리트 블록, 경계석 등.',
                'meta_description_en'  => 'Explore Woosung Remicon\'s full product range: standard, high-strength and pavement concrete, concrete blocks, kerb stones, and more.',
                'og_image'             => null,
            ],
            [
                'page'                 => 'quality',
                'meta_title_ko'        => '품질관리 | 우성레미콘(주)',
                'meta_title_en'        => 'Quality Management | Woosung Remicon Co., Ltd.',
                'meta_description_ko'  => 'KS 인증, ISO 품질관리 체계로 엄격하게 관리되는 우성레미콘의 품질 기준을 소개합니다.',
                'meta_description_en'  => 'Discover the KS-certified and ISO quality management standards that underpin every batch at Woosung Remicon.',
                'og_image'             => null,
            ],
            [
                'page'                 => 'contact',
                'meta_title_ko'        => '문의 / 오시는 길 | 우성레미콘(주)',
                'meta_title_en'        => 'Contact & Directions | Woosung Remicon Co., Ltd.',
                'meta_description_ko'  => '우성레미콘(주)에 견적 문의, 납품 상담을 하세요. 전화: 033-644-5677 | 강원특별자치도 강릉시 강동면 오이동길 104',
                'meta_description_en'  => 'Contact Woosung Remicon for quotes and delivery inquiries. Phone: 033-644-5677 | 104 Oidong-gil, Gangdong-myeon, Gangneung.',
                'og_image'             => null,
            ],
        ];

        foreach ($seoData as $data) {
            SeoSetting::updateOrCreate(['page' => $data['page']], $data);
        }
    }
}
