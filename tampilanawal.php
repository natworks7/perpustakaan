<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webpage</title>
</head>
<body>
    <header>
        <h2> SOLOTECH UNIVERSITY </h2>
    </header>
    <hr>
    <div class="logo">
        <h1> PERPUSTAKAAN KAMPUS</h1>
        <img src="logo.png" alt="logo">

        <h3>Masuk Sebagai</h3>
        <ol>
            <a href="webpage.php">Dosen/Mahasiswa</a><br>
            <a href="login.php">Admin</a>
        </ol>
    </div>
</body>
</html>

<style>
html {
    background: linear-gradient(to bottom, rgb(80, 154, 245), rgb(240, 240, 246) );
}

header h2 {
    width: 30px;
    height: 100%;
}

.logo {
    padding-top: 30px;
    display: flex;
    flex-direction: column; 
    justify-content: center;
    align-items: center;
    text-align: center; 
}

.logo img {
    width: 30%;
}


</style>