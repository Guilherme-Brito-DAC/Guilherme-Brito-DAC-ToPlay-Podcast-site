<?php
if(isset($_GET['page'])){
    $pag = $_GET['page'];
}else{
    $pag = "1";
}

require_once 'vendor/mashape/unirest-php/src/Unirest.php';
 $response = Unirest\Request::get("https://listen-api.listennotes.com/api/v2/best_podcasts?genre_id=93&page=".$pag."&region=br&safe_mode=0",
   array(
     "X-ListenAPI-Key" => "1de38c2b0b6c4aa395ac59ff0a38ac8b"
   )
 );  

 $resposta = Unirest\Request::get("https://listen-api.listennotes.com/api/v2/best_podcasts?genre_id=93&page=6&region=br&safe_mode=0",
   array(
     "X-ListenAPI-Key" => "1de38c2b0b6c4aa395ac59ff0a38ac8b"
   )
 );  

if(isset($_COOKIE['photo'])){
    echo $_COOKIE['photo'];
    $bananinha = $_COOKIE['photo'];
   }else{
    $bananinha = "imgs/8.jpg";
   };

   if(isset($_COOKIE['name'])){
    $name = $_COOKIE['name'];
   }else{
    $name = "Usuário";
   };
   ?>
   
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <style>
            body { margin: 0;
            padding: 0;
            background-color: #18191c;
            font-family: 'Roboto', sans-serif;
            color:white; 
            background-image:url("imgs/background1.jpg");
            background-repeat: no-repeat;
            background-size: auto;
        }
        </style>
        <script>
            var response = <?php echo $response->raw_body ?>;
            var resposta = <?php echo $resposta->raw_body ?>;
        </script>
        <link rel="icon" href="https://img.icons8.com/ios-filled/50/ffffff/microphone--v1.png">
        <title>ToPlay</title>
    </head>
    <body>
        <div class="logo"><img src="imgs/logo.png"></div>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="perfil">
                <img class="perfilimg" src="<?php echo $bananinha ?>" id="perfilphoto">
                <div style="margin-left: 1rem;">
                    <p id="nameperfil"><?php echo $name?></p>
                    <div style="display:flex;justify-content: space-around;">
                        <a href="#ex1" rel="modal:open"><img src="https://img.icons8.com/material-sharp/25/1982c4/settings.png" id="gear"/></a> 
                    </div>
                </div>
            </div>
            <p id="hr">Geral</p>
            <a href="#" class="active" id="link"><img src="https://img.icons8.com/material/20/ffffff/home.png"/>    Início</a>
            <a href="for.html" id="link"><img src="https://img.icons8.com/material/20/ffffff/gift--v1.png"/>    Feito para você</a>
            <p id="hr">Sua Livraria</p>
            
            <div class="file-input">
                <input type="file" id="file" class="file" accept="audio/*">
                
                    <label for="file"><img src="https://img.icons8.com/android/15/ffffff/plus.png" style="margin-top:-0.1rem;margin-right:0.1rem"/>Adicionar um podcast</label>
            </div>
            <a href="for.html" id="link"><img src="https://img.icons8.com/material-sharp/20/ffffff/maintenance.png"/>   Gerenciar meus podcasts</a> 
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <main>
            <div class="search">
                <form action="search.php" method="get">
                <input type="text" placeholder="Pesquisar" id="search1" name="search1"/>   
                <button><img src="https://img.icons8.com/android/20/ffffff/search.png"/></button>
                </form>
            </div>
            <div class="mid" style="margin-top: 30rem;">
                <h2 style="text-align:center">Adicionados Recentemente</h2>
                <div class="box1">
                    
                     
                </div>
            </div>
            <div class="mid" style=" margin-top: 23rem;">
              <div class="list">

                </div>
            </div>
            <div class="pagination">
                <div id="page">


                </div>
            </div>
        </main>
        
        <div id="ex1" class="modal">
             <label>Qual o seu nome forasteiro?</label><br>
             <input type="text" class="chose" placeholder="Nome" value="" required><br>
                <label>Escolha sua imagem de perfil:</label>
                <div style="display:flex;flex-wrap:wrap;justify-content:center">
                    <input type="image" src="imgs/1.jpg" onclick="photo('imgs/1.jpg')">
                    <input type="image" src="imgs/2.jpg" onclick="photo('imgs/2.jpg')">
                    <input type="image" src="imgs/3.jpg" onclick="photo('imgs/3.jpg')">
                    <input type="image" src="imgs/4.jpg" onclick="photo('imgs/4.jpg')">
                    <input type="image" src="imgs/5.jpg" onclick="photo('imgs/5.jpg')">
                    <input type="image" src="imgs/6.jpg" onclick="photo('imgs/6.jpg')">
                    <input type="image" src="imgs/7.jpg" onclick="photo('imgs/7.jpg')">
                    <input type="image" src="imgs/8.jpg" onclick="photo('imgs/8.jpg')">
                    <input type="image" src="imgs/9.jpg" onclick="photo('imgs/9.jpg')">
                </div><br>
                <span style="width:100%;display:flex;justify-content:center">
                <button><a href="ex1" rel="modal:close" style="color:black">Cancelar</a></button>
                <button style="background-image: linear-gradient(to right,#1982c4 , #1ec07a);" onclick="nameperfil()">Salvar</button>
                </span>
        </div>
        <script>
            function openNav() {
              document.getElementById("mySidenav").style.width = "300px";
            }
            
            function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <script>
            const list = document.querySelector(".list")
            const page = document.querySelector("#page")
            const box = document.querySelector(".box1")

            for(let i = 0 ; i < 20 ; i++){
            item = `<div class="popular">
                       <img src="${response.podcasts[i].thumbnail}"/>
                       <div class="hoverimg"><img src="https://img.icons8.com/android/100/ffffff/play.png" onclick="window.location.href='player.php?id=${response.podcasts[i].id}'"/></div>
                      <p style="margin-top:0.5rem">${response.podcasts[i].title}</p>
                     <p style="margin-top:-0.8rem;opacity:0.5;font-size:0.8rem">${response.podcasts[i].publisher}</p>
                    </div>`
                list.innerHTML += item;
            }

            for(let g = 0; g < 20;g++){
                item2 = `<div class="popular1">
                       <img src="${resposta.podcasts[g].thumbnail}"/>
                       <div class="hoverimg1"><img src="https://img.icons8.com/android/100/ffffff/play.png" onclick="window.location.href='player.php?id=${resposta.podcasts[g].id}'"/></div>
                      <p style="margin-top:0.5rem">${resposta.podcasts[g].title}</p>
                     <p style="margin-top:-0.8rem;opacity:0.5;font-size:0.7rem">${resposta.podcasts[g].publisher}</p>
                    </div>`
                box.innerHTML += item2;
            }

            for(let y = 1 ; y < 10 ; y++){
                item2= `<a value="${y}" href="index.php?page=${y}">${y}</a> `
                page.innerHTML += item2;
            }
            function photo(x){
               const photoperfil = document.querySelector("#perfilphoto");
               photoperfil.src = x;
               document.cookie = "photo="+x+";path=/";
           }
           function nameperfil(){
                const inputname = document.querySelector(".chose")
                document.getElementById("nameperfil").innerHTML = inputname.value;
                document.cookie = "name="+inputname.value+";path=/";
           }
            </script>
    </body>
</html>