@extends('layouts.app')


@section('content')
    <div class="container mx-auto px-4">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <livewire:popular-games></livewire:popular-games>

        <div class="flex my-10 flex-col lg:flex-row">
            <div id="recently-reviewed" class="recently-reviewed w-full lg:w-3/4 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
                <livewire:recently-reviewed-games />
            </div>
            <div id="most-aniticipated"class="side-bar w-full mt-12 lg:w-1/4 lg:mt-0">
                <div class="most-anticipated">
                    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                    <livewire:most-anticipated-games />
                </div>

            <div id="coming-soon"class="coming-soon mt-12">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Coming Soon</h2>
                <livewire:coming-soon-games />
            </div>
        </div>

    </div> <!--  end container -->



@endsection
