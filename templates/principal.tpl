<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Music Service</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            margin: 0;
            background: #f4f4f4;
            background-size: cover;
        }
        aside{
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-arround;
        }
        .Title{
            display: flex;
            align-items: center;
            margin-bottom: 10%;
        }
        .Title h1 {
            font-family: "Poppins", sans-serif;
            font-style: normal;
            margin-bottom: 20px;
            font-size: 2.5rem;
            font-weight: bolder;
            text-align: center;
            background: linear-gradient(90deg, indigo, blueviolet, violet, pink);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;  
        }

        ul{
            display: flex;
            width: 80%;
            height: 500px;
            flex-direction: column;
        }
        ul button{
            margin: 30px;
            padding: 25px;
            background: #f1438d;
            color: #fff;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: width 0.3s;
            width: 70%;
        }
        ul button:hover{
           width: 90%;
        }
    </style>
</head>
<body>
    <aside>
        <div class="Title"><h1>Music Service</h1> <span class="material-symbols-outlined">
            music_note
            </span>
        </div>
        <ul>
         <button>+ Nueva lista</button>
         <button>Plataforma</button>
         <button>Cuenta</button>
        </ul>
    </aside>
</body>
</html>
