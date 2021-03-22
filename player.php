<?php
     require_once 'vendor/mashape/unirest-php/src/Unirest.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        echo "Não foi possível encontrar esse podcast!";
    };
    
    $response = \Unirest\Request::get("https://listen-api.listennotes.com/api/v2/podcasts/".$id,
      array(
        "X-ListenAPI-Key" => "1de38c2b0b6c4aa395ac59ff0a38ac8b"
      )
    );
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="fakeLoader.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <title>Player</title>
        <style>
            body { margin: 0;
            padding: 0;
            background-image:url("imgs/background.jpg");
            font-family: 'Roboto', sans-serif;
            background-color: #18191c;
            color:white; 
            background-repeat: no-repeat;
            background-size: auto;
            }
        </style>
        <script>
            var response = <?php echo $response->raw_body ?>;
            console.log(response)
        </script>
        <link rel="icon" href="https://img.icons8.com/ios-filled/50/ffffff/microphone--v1.png">
    </head>
    <body>
        <div class="logo"><img src="imgs/logo.png"></div>
        <a href="index.php" style="position:fixed;top:0;width:5rem;height:1rem;margin:1rem"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/chevron-left.png"/></a>
            <div class="nowplaying">
            <img src="" id="nowplayingimg">
            <span><p>Tocando Agora</p><p id="ep"></p></span>
            </div>
        <div class="container">
        <div class="desc">
            <img src="" id="image"/>
            <p id="description"></p>
            <p id="totalepisodes"></p>
        </div>
        <div class="content">
            <p id="name"></p>
            <p id="publisher"></p>
            <table id="numberofepisodes">
             
            
        </table>
        </div>
        </div>
        <div class="container-audio">
        <audio controls  loop autoplay src="" id="batatinha">
        </div>
        <script>
            const img = document.getElementById("image")
            img.src = response.image
            const name = document.getElementById("name")
            name.innerHTML = response.title
            const publisher = document.getElementById("publisher")
            publisher.innerHTML = "Feito por: "+response.publisher
            const description = document.getElementById("description")
            description.innerHTML = response.description
            const totalepisodes = document.getElementById("totalepisodes")
            totalepisodes.innerHTML = "N° de episodios: "+response.total_episodes
            const numberofepisodes = document.getElementById("numberofepisodes")

            function play(x,y,j){
                const player = document.getElementById("batatinha")
                player.src = x;
                const nowplaying = document.querySelector(".nowplaying")
                console.log(nowplaying)
                nowplaying.style.transform = "translateX(0%)";
                const nowplayingimg = document.querySelector("#nowplayingimg")
                nowplayingimg.src = y
                const ep = document.querySelector("#ep")
                ep.innerHTML = j;
                
            }

            for(let z = 0;z < response.total_episodes;z++){
                mins = response.episodes[z].audio_length_sec/60
                item = `<tr>
                <td><img src='${response.episodes[z].thumbnail}' class="thumb"/></td>
                <td>${response.episodes[z].title}</td>
                <td>${mins.toFixed(2)} mins</td>
                <td><img src="https://img.icons8.com/ios-filled/50/ffffff/circled-play.png" onclick="play('${response.episodes[z].audio}','${response.episodes[z].thumbnail}','${response.episodes[z].title}')" "/></td>
            </tr>`
            numberofepisodes.innerHTML += item;
            }
        </script>
    </body>
</html>