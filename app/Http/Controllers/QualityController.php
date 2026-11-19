<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\View\View;

class QualityController extends Controller
{
    public function index(): View
    {
        $seo = SeoSetting::forPage('quality');
        $settings = SiteSetting::getAllSettings();

        $certifications = [
            [
                'name_ko' => 'KS F 4009 레미콘',
                'name_en' => 'KS F 4009 Ready-Mixed Concrete',
                'body_ko' => '한국산업표준',
                'body_en' => 'Korean Industrial Standards',
                'year' => '2003',
            ],
            [
                'name_ko' => 'KS F 4004 콘크리트 블록',
                'name_en' => 'KS F 4004 Concrete Block',
                'body_ko' => '한국산업표준',
                'body_en' => 'Korean Industrial Standards',
                'year' => '2008',
            ],
            [
                'name_ko' => 'ISO 9001 품질경영시스템',
                'name_en' => 'ISO 9001 Quality Management System',
                'body_ko' => 'Bureau Veritas',
                'body_en' => 'Bureau Veritas',
                'year' => '2012',
            ],
        ];

        $qualitySteps = [
            [
                'step' => '01',
                'title_ko' => '원자재 검수',
                'title_en' => 'Raw Material Inspection',
                'desc_ko' => '시멘트, 골재, 혼화재 등 모든 원자재는 입고 시 품질 기준에 따라 엄격히 검수됩니다.',
                'desc_en' => 'All raw materials including cement, aggregates, and admixtures are strictly inspected upon delivery.',
            ],
            [
                'step' => '02',
                'title_ko' => '배합 설계',
                'title_en' => 'Mix Design',
                'desc_ko' => 'KS 기준에 따라 강도, 슬럼프, 내구성 등을 고려한 최적 배합비를 설계합니다.',
                'desc_en' => 'Optimal mix proportions are designed considering strength, slump, and durability per KS standards.',
            ],
            [
                'step' => '03',
                'title_ko' => '생산 품질관리',
                'title_en' => 'Production Quality Control',
                'desc_ko' => '전자동 배처플랜트로 정확한 계량과 혼합을 실시하며, 각 배치마다 품질을 모니터링합니다.',
                'desc_en' => 'Accurate weighing and mixing through fully automated batching plants, with per-batch quality monitoring.',
            ],
            [
                'step' => '04',
                'title_ko' => '출하 검사',
                'title_en' => 'Dispatch Inspection',
                'desc_ko' => '출하 전 슬럼프 시험, 공기량 측정, 압축강도 시험편 채취로 품질을 최종 확인합니다.',
                'desc_en' => 'Final quality verification via slump test, air content measurement, and compressive strength specimen sampling before dispatch.',
            ],
            [
                'step' => '05',
                'title_ko' => '현장 품질 지원',
                'title_en' => 'On-Site Quality Support',
                'desc_ko' => '납품 현장에서의 타설 조건 확인 및 품질 이상 발생 시 신속한 기술지원을 제공합니다.',
                'desc_en' => 'Verification of placement conditions at the delivery site, with prompt technical support in case of quality issues.',
            ],
        ];

        return view('quality', compact('seo', 'settings', 'certifications', 'qualitySteps'));
    }
}
