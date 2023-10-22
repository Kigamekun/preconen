@extends('layouts.basic')

@section('body')
    <div class="relative max-h-screen w-full overflow-hidden">

        <img src="{{ asset('img/bg.sawah.png') }}" alt="" class="h-full w-full">
        <div class="absolute inset-0 ">
            <div class="flex h-full items-center">

                <div class="max-w-7xl grid grid-cols-2 items-center mx-auto h-screen">
                    <img src="{{ asset('img/landing.petani1.png') }}" alt="" class="scale-90 p-10">
                    @yield('form')

                </div>
            </div>
        </div>
    </div>
@stop
