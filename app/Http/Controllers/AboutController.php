<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $seo = SeoSetting::forPage('about');
        $settings = SiteSetting::getAllSettings();

        $milestones = [
            ['year' => '1999', 'ko' => '우성레미콘(주) 설립', 'en' => 'Founded Woosung Remicon Co., Ltd.'],
            ['year' => '2003', 'ko' => 'KS 인증 획득 (레미콘)', 'en' => 'Obtained KS Certification (Ready-Mixed Concrete)'],
            ['year' => '2008', 'ko' => '콘크리트 블록 생산 라인 증설', 'en' => 'Expanded concrete block production line'],
            ['year' => '2012', 'ko' => 'ISO 9001 품질경영시스템 인증', 'en' => 'ISO 9001 Quality Management System Certification'],
            ['year' => '2015', 'ko' => '아스콘 사업부 신설', 'en' => 'Established Ascon Division'],
            ['year' => '2018', 'ko' => '생산 설비 현대화 완료', 'en' => 'Completed modernization of production equipment'],
            ['year' => '2022', 'ko' => '친환경 콘크리트 연구개발 착수', 'en' => 'Initiated eco-friendly concrete R&D'],
            ['year' => '2024', 'ko' => '창립 25주년', 'en' => '25th Anniversary'],
        ];

        $values = [
            [
                'icon' => 'shield-check',
                'title_ko' => '품질 최우선',
                'title_en' => 'Quality First',
                'desc_ko' => '철저한 품질관리를 통해 최고의 제품을 공급합니다.',
                'desc_en' => 'We supply the highest quality products through rigorous quality control.',
            ],
            [
                'icon' => 'clock',
                'title_ko' => '정시 납품',
                'title_en' => 'On-Time Delivery',
                'desc_ko' => '고객의 공사 일정에 맞는 신속하고 정확한 납품을 보장합니다.',
                'desc_en' => 'We guarantee prompt and accurate delivery aligned with your construction schedule.',
            ],
            [
                'icon' => 'users',
                'title_ko' => '고객 신뢰',
                'title_en' => 'Customer Trust',
                'desc_ko' => '25년간 쌓아온 신뢰를 바탕으로 고객과 함께 성장합니다.',
                'desc_en' => 'We grow together with our customers, built on 25 years of trust.',
            ],
            [
                'icon' => 'leaf',
                'title_ko' => '환경 책임',
                'title_en' => 'Environmental Responsibility',
                'desc_ko' => '친환경 생산 공정으로 지속가능한 미래를 만들어 갑니다.',
                'desc_en' => 'We create a sustainable future through eco-friendly production processes.',
            ],
        ];

        return view('about', compact('seo', 'settings', 'milestones', 'values'));
    }
}
