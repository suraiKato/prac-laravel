@extends('layouts.layout')

@section('content')
    <section class="mt-8">
        <x-container>
            <div class="flex justify-center">
                <div class="w-80">
                    @yield('auth.content')
                </div>
            </div>
        </x-container>
    </section>
@endsection