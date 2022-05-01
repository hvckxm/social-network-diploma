<x-app-layout>
    <div class="container-fluid">
        <!-- First row (equally spaced) -->
        <div class="row row-eq-spacing">
            <div class="col-6 col-xl-3">
                <div class="card">
                    <h2 class="card-title">friends</h2>
                    {{ auth()->user()->getFriends()->count() }}
                </div>
            </div>
            <div class="col-6 col-xl-3">
                <div class="card">
                    <h2 class="card-title">articles in blog</h2>
                    {{ auth()->user()->blog()->first()->articles()->count() }}
                </div>
            </div>
            <!-- Overflow occurs here on large screens (and down) -->
            <!-- Therefore, a v-spacer is added at this point -->
            <div class="v-spacer d-xl-none"></div> <!-- d-xl-none = display: none only on extra large screens (> 1200px) -->
            <div class="col-6 col-xl-3">
                <div class="card">
                    <h2 class="card-title">group</h2>
                    {{ auth()->user()->information->group->name ?? '-' }}
                </div>
            </div>
            <div class="col-6 col-xl-3">
                <div class="card">
                    <h2 class="card-title">Profits</h2>
                    ...
                </div>
            </div>
        </div>
        <!-- Second row (equally spaced on large screens and up) -->
        <div class="row row-eq-spacing-lg">
            <div class="col-lg-8">
                <div class="card h-lg-250 overflow-y-lg-auto"> <!-- h-lg-250 = height = 25rem (250px) only on large screens and up (> 992px), overflow-y-lg-auto = overflow-y: auto only on large screens and up (> 992px) -->
                    <h2 class="card-title">last added friends</h2>
                    @foreach(auth()->user()->getFriends()->take(10) as $friend)
                        <p><a href="">{{ $friend->name }}</a></p>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-lg-250 overflow-y-lg-auto"> <!-- h-lg-250 = height = 25rem (250px) only on large screens and up (> 992px), overflow-y-lg-auto = overflow-y: auto only on large screens and up (> 992px) -->
                    <h2 class="card-title">Breakdown</h2>
                    ...
                </div>
            </div>
        </div>
        <!-- Third row (equally spaced on large screens and up) -->
        <div class="row row-eq-spacing-lg">
            <div class="col-lg-8">
                <div class="content">
                    <h2 class="content-title">Customer stories <a href="#">#</a></h2>
                    ...
                </div>
                <div class="card">
                    <h2 class="card-title">Transactions</h2>
                    ...
                </div>
                <div class="content">
                    ...
                </div>
            </div>
            <div class="col-lg-4">
                <div class="content">
                    <h2 class="content-title">Activity log <a href="#">#</a></h2>
                    ...
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
