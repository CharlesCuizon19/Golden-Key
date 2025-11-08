@extends('layouts.app')

@section('content')
    <x-banner />

    @include('homepage-tabs.services-tab')

    @include('homepage-tabs.aboutus-tab')

    @include('homepage-tabs.discover-more-tab')

    @include('homepage-tabs.listed-properties-tab')

    @include('homepage-tabs.FAQs-tab')
@endsection
