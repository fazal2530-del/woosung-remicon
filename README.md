# 우성레미콘(주) — Woosung Remicon Co., Ltd.
### B2B Corporate Website & Management System (Laravel 11 + MySQL + Docker)

강원특별자치도 강릉시 강동면에 위치한 **우성레미콘(주)**의 공식 B2B 기업 웹사이트 및 관리자 제어 시스템입니다.  
레미콘(Ready-Mixed Concrete)과 콘크리트 블록(Concrete Blocks)의 규격별 제품 정보, 품질 인증 공정, 실시간 견적 문의 의뢰, 그리고 한국어/영어 전환 기능을 제공합니다.

---

## 🌟 핵심 기능 (Key Features)

### 1. 사용자 화면 (Public Website)
- **홈 (Home)**: 실제 공장 드론 촬영 사진 및 믹서 트럭 수송단 비주얼, 주요 사업 현황, 핵심 통계(1999년 설립, 25년 전통).
- **회사소개 (About)**: 우성레미콘 기업 개요, 연혁(1999년 창립~현재), 사업장 및 유압 블록 성형기 실제 시설 갤러리.
- **제품안내 (Products)**:
  - **레미콘**: 설계기준강도(24MPa, 30MPa, 35MPa 등), 슬럼프(mm), 굵은 골재 최대치수(mm), 적용 현장 용도.
  - **콘크리트 블록**: 가로(W) × 세로(H) × 길이(L) mm 치수 규격, 규격별 용도, 상태 안내.
- **품질관리 (Quality)**: 원자재 검수 → 자동 배칭 → 슬럼프/공기량 측정 → 28일 압축강도 파괴 시험 4단계 품질 프로세스 및 설비 소개.
- **오시는 길 & 견적 문의 (Contact)**:
  - 카카오맵(Kakao Map) & 네이버 지도 길찾기 연동.
  - 세부 견적 의뢰 폼: 담당자명, 회사/현장명, 연락처, 이메일, 품목, 수량, 현장 주소, 희망 납품일, 요청사항.
- **다국어 지원 (i18n)**:
  - **한국어 (KO)**: 한국 건설 B2B 표준에 맞춘 정교하고 자연스러운 어휘.
  - **영어 (EN)**: 해외 바이어 및 기술 검토를 위한 글로벌 비즈니스 영문.
  - 상단 내비게이션에서 원클릭 전환 (`/lang/ko`, `/lang/en`).

### 2. 관리자 시스템 (Admin Panel)
- **다국어 지원**: 관리자 대시보드 및 모든 관리 화면 역시 한국어/영어 원클릭 전환 가능.
- **대시보드 (Dashboard)**: 등록 제품 수, 신규/전체 견적 문의 건수, 최근 접수 내역 모니터링.
- **제품 관리 (Products CRUD)**: 레미콘 및 블록 제품 등록, 치수(W×H×L), 강도(MPa), 슬럼프, 골재치수, 공급 여부 토글, 정렬 순서 설정.
- **견적/문의 관리 (Inquiries)**: 온라인으로 접수된 납품 문의 상세 열람, 전화 바로걸기, 상태(신규/열람/상담완료) 관리.
- **공지사항 (Announcements)**: 현장 타설 지침 및 기업 소식 게시판 (한국어/영어 동시 작성).
- **페이지 콘텐츠 관리 (Page Content)**: 소스코드 수정 없이 웹페이지 섹션별 텍스트 직접 편집.
- **SEO 설정 (SEO Management)**: 네이버/구글 검색 최적화를 위한 페이지별 Meta Title 및 Description 관리.
- **사이트 기본 정보 설정 (Site Settings)**: 대표 전화번호(`033-644-5677`), 공장 직통(`033-644-5515`), 주소, 영업시간 수정.
- **관리자 계정 관리 (Users)**: 최고 관리자(Super Admin) 및 편집자(Editor) 권한 관리.

---

## 🏗️ 기술 스택 (Tech Stack)

| 구분 | 기술 / 라이브러리 |
|---|---|
| **Backend Framework** | Laravel 11.x (PHP 8.3) |
| **Database** | MySQL 8.0 |
| **Cache & Session** | Redis / File |
| **Frontend Styling** | Tailwind CSS (CDN custom palette), Noto Sans KR |
| **Web Server** | Nginx (Alpine) |
| **Containerization** | Docker & Docker Compose |

---

## 🚀 빠른 시작 가이드 (Quick Start with Docker)

### 1. 프로젝트 디렉토리 이동
```bash
cd "C:\Users\HP\.gemini\antigravity\scratch\woosung-remicon"
```

### 2. 도커 컨테이너 빌드 및 백그라운드 실행
```bash
docker compose up -d --build
```
> 최초 실행 시 PHP 8.3 환경 빌드, MySQL 8.0 초기화, Composer 의존성 설치 및 마이그레이션/시더(`ProductSeeder`, `UserSeeder`, `SiteSettingSeeder`, `SeoSettingSeeder`)가 자동으로 완료됩니다.

### 3. 웹사이트 접속
- **공개 웹사이트**: [http://localhost:8080](http://localhost:8080)
- **관리자 로그인**: [http://localhost:8080/admin/login](http://localhost:8080/admin/login)

### 🔑 기본 관리자 계정 (Default Credentials)
- **아이디 (Email)**: `admin@woosung-remicon.kr`
- **비밀번호 (Password)**: `admin1234`

---

## 📁 디렉토리 구조 요약

```
woosung-remicon/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php, AboutController.php, ProductController.php...
│   │   └── Admin/ (ProductAdminController, InquiryController, SeoController...)
│   ├── Models/ (Product, Inquiry, Announcement, SiteSetting, SeoSetting...)
│   └── Http/Middleware/ (SetLocale.php, AdminMiddleware.php)
├── database/
│   ├── migrations/ (7개 핵심 테이블 스키마)
│   └── seeders/ (초기 제품 및 관리자 데이터)
├── docker/
│   ├── nginx/default.conf
│   └── php/Dockerfile & entrypoint.sh
├── public/
│   ├── images/ (사용자 제공 실제 공장 드론 촬영 및 설비 사진)
│   └── index.php
├── resources/
│   ├── lang/
│   │   ├── ko/ (고품질 네이티브 한국어 언어팩)
│   │   └── en/ (비즈니스 영문 언어팩)
│   └── views/
│       ├── layouts/ (app.blade.php, admin.blade.php)
│       ├── home.blade.php, about.blade.php, quality.blade.php, contact.blade.php
│       ├── products/ (index.blade.php, show.blade.php)
│       └── admin/ (대시보드, 제품, 문의, 공지, SEO, 설정, 사용자 관리 뷰)
├── routes/
│   └── web.php (공개 라우트 및 보호된 관리자 라우트 그룹)
├── docker-compose.yml
└── .env
```
