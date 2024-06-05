<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - BookEdukasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
    <style>
        body {
            font-family: 'Playfair Display', serif;
            background-image: url('https://c4.wallpaperflare.com/wallpaper/479/101/113/germany-saxony-gorlitz-hall-historical-literature-wallpaper-preview.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            flex: 1;
        }
        h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.25rem;
            line-height: 1.6;
        }
        footer {
            background-color: #343a40;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    @include('components.navbar')

    <div class="container my-4">
        <main>
            <h2 class="text-center">Our Profile</h2>
            <p>BookEdukasi stands as a pioneering platform dedicated to enriching literacy. Embracing the profound impact of reading, our mission is to streamline the process for users to explore a vast collection of books online, spanning an extensive range of subjects and genres.</p>
            <p>At BookEdukasi, user convenience is paramount. We provide an immersive online reading experience that transcends geographical boundaries, allowing individuals to embark on their literary journey from anywhere, at any time. Our ultimate goal is to democratize literacy, fostering a generation that is not only well-read but also intellectually empowered. Beyond merely serving as an online bookstore, BookEdukasi serves as a vibrant community hub, championing the love for reading and learning across diverse demographics.</p>
            <p>We firmly believe that reading serves as the cornerstone of personal and societal development, unlocking new horizons and fostering critical thinking. BookEdukasi is committed to empowering individuals on their quest for knowledge and self-discovery. Join us as we embark on this exciting journey to cultivate a world where literacy thrives and intellect flourishes.</p>
        </main>
    </div>

    <footer class="bg-dark text-white text-center">
        <div class="container">
            <p class="m-0">Copyright &copy; BookEdukasi 2024</p>
        </div>
    </footer>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
