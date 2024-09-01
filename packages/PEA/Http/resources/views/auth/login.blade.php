@extends('http::layouts.auth')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen text-[#733082]">
        <div class="flex items-center justify-center mb-4">
            <img src="{{ asset('/images/logo_pea.png') }}" class="mr-4 h-32" alt="PEA">
            <img src="{{ asset('/images/logo_nu.png') }}" class="mr-4 h-32" alt="NU">
            <img src="{{ asset('/images/logo_sgtech.png') }}" class="mr-4 h-32" alt="SG Tech">
        </div>
        
        <div class="flex items-center justify-center">
            <span class="text-2xl">ระบบบริหารจัดการรักษาสมดุลของระบบจำหน่ายแรงต่ำ</span>
        </div>

        <div class="flex items-center justify-center mb-36">
            <span class="text-[12.7px]">The management system of balance maintaining for the low voltage distribution system.</span>
        </div>

        <div class="flex items-center justify-center mb-4">
            <h2 class="text-2xl">เข้าสู่ระบบ</h2>
        </div>

        <div class="flex items-center justify-center mb-4">
            {{ html()->a()->text('ลงทะเบียน / ลงชื่อเข้าใช้ผ่าน SSO')->href(route('http::auth.redirect.keycloak'))
                ->class('text-white bg-[#733082] hover:bg-[#652a72] focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-2xl text-sm w-full sm:w-auto px-5 py-2.5 text-center') }}
        </div>

        @include('http::commons.errors')
        @include('http::commons.messages')
    </div>
@stop