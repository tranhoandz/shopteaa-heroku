@extends('frontend.master')
@section('title','Giới thiệu')
@section('main')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-12 text-center">
    <div class="container">
        <h1>Liên hệ</h1>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Contact Area Start -->
<div class="contact-area fix mb-60">
    <div class="contact-address pt-110 bg-white">
        <h1 class="contact-title">CONTACT US</h1>
        <div class="contact-info">
            <p>
            {{ $intro->value }}
            </p>
            <div class="contact-list-wrapper">
                <div class="contact-list">
                    <i class="fa fa-fax"></i>
                    <span>Address :  {{ $address->value }}</span>
                </div>
                <div class="contact-list">
                    <i class="fa fa-phone"></i>
                    <span> {{ $email->value }}</span>
                </div>
                <div class="contact-list">
                    <i class="fa fa-envelope-o"></i>
                    <span> {{ $phone->value }}</span>
                </div>
            </div>
        </div>
        <div class="working-time">
            <h2>Working hours</h2>
            {{ $worktime->value }}
            {{-- <span><span>Monday – Saturday:</span>  08AM – 22PM</span> --}}
        </div>
    </div>
    <div class="contact-form pt-110">
        {!! $gmap->value !!}
    </div>
</div>
<!-- Contact Area End -->
    @stop