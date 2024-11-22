<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture</title>
    <style>
        #camera {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
        }
        video, canvas {
            width: 100%;
        }
    </style>
</head>
<body>

<div id="camera">
    <video id="video" autoplay></video>
    <button id="capture">Capture</button>
    <canvas id="canvas" style="display: none;"></canvas>
</div>

<script>
    // Akses webcam
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('capture');
    const context = canvas.getContext('2d');

    // Minta akses ke kamera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then((stream) => {
            video.srcObject = stream;
        })
        .catch((err) => {
            console.error('Error accessing webcam: ', err);
        });

    // Fungsi untuk menangkap gambar
    captureButton.addEventListener('click', () => {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Kirim gambar ke server
        canvas.toBlob((blob) => {
            const formData = new FormData();
            formData.append('webcamImage', blob, 'webcam.jpg');

            fetch('upload.php', {
                method: 'POST',
                body: formData,
            })
            .then((response) => response.text())
            .then((data) => {
                alert('Image uploaded successfully: ' + data);
            })
            .catch((error) => {
                console.error('Error uploading image: ', error);
            });
        });
    });
</script>

</body>
</html>
