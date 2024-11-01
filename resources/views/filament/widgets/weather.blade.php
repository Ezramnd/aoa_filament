<x-filament-widgets::widget class="fi-filament-info-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <h2 class="text-lg font-bold">{{ $city }}</h2>
                <div class="flex items-center space-x-2">
                    <img src="https://openweathermap.org/img/wn/{{ $icon }}.png" alt="Weather Icon">
                    <p class="text-xl">{{ $temp }}°C (Feels like: {{ $feels_like }}°C)</p>
                </div>
                <p>{{ ucfirst($desc) }}</p>
                <p>Wind: {{ $wind_speed }} m/s, {{ $wind_deg }}°</p>
                <p>Humidity: {{ $humidity }}%</p>
                <p>Clouds: {{ $clouds }}%</p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>