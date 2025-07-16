<x-guest-layout>
    <section id="content">
        <div class="section bg-white no-padding">
            <div class="container">
                <h2 class="center">Search Results for "{{ $query }}"</h2>

                @if($tyres->isEmpty())
                    <p class="center">No results found.</p>
                @else
                    <x-tyre-grid :tyres='$tyres' />
                @endif
            </div>
        </div>
    </section>
</x-guest-layout>