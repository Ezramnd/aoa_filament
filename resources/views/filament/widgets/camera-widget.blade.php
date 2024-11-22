<x-filament-widgets::widget>
    <x-filament::section>
        <div class="p-4">
            <h2 class="text-lg font-bold mb-2">Live Camera View</h2>
            <video id="cameraStream" autoplay playsinline class="w-full h-auto rounded-lg"></video>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const video = document.getElementById('cameraStream');
        
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    navigator.mediaDevices.getUserMedia({ video: true })
                        .then((stream) => {
                            video.srcObject = stream;
                        })
                        .catch((error) => {
                            console.error("Error accessing camera: ", error);
                        });
                } else {
                    console.error("Your browser does not support the required media devices.");
                }
            });
        </script>
        
    </x-filament::section>
</x-filament-widgets::widget>
