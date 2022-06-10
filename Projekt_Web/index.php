<?php
include 'dbo-conn.php';

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Koliba</title>
</head>
<body>
    <script >
      
          /* var img = new Image();
           img.src = "./hamburger.png";
           document.getElementById('show').appendChild(img);
           */

           $(document).ready(function () {
                $(".BBQFood").click(function () {
                    if ($(this).parent(".roštilj-container").children(".image").length) {
                        $(this).parent(".roštilj-container").children(".image").toggle();  
                    } else {
                        var image_name='hamburger.png';
                        var imageTag='<div class="image">'+'<img src="./'+image_name+'" alt="image" height="100" />'+'</div>';
                        $(this).parent('.roštilj-container').append(imageTag);
                    }
                    });


                $(".pizzaFood").click(function () {
                    if ($(this).parent(".pizza-container").children(".image").length) {
                        $(this).parent(".pizza-container").children(".image").toggle();
                    } else {
                        var image_name='pizza.png';
                        var imageTag='<div class="image">'+'<img src="./'+image_name+'" alt="image" height="100" />'+'</div>';
                        $(this).parent('.pizza-container').append(imageTag);
                    }
                    });
                var name =""
                $(".table").click(function (){
                        $(".content").show();
                        $(".content").children(".table-name").text(name = $(this).attr('alt'));
                })
                $(".close-btn").click(function(){
                    $(".content").toggle();
                })
                $(".submit").click(function(event){
                    let regex = new RegExp(/^[a-zA-Z]+(-[a-zA-Z]+)*$/);
                    let regex_email = new RegExp(/[a-z0-9]+@[a-z]+\.[a-z]{2,3}/);
                    let form_flag = true;
                    var formData = {
                    ime: $(".ime").val(),
                    prezime: $(".prezime").val(),
                    email: $(".email").val(),
                    datum: $(".datum").val(),
                    br_gostiju : $(".br_gostiju").val(),
                    stol : name,
                    };
                    if(formData['ime'] === "" || formData['prezime']==="" || formData['email']==="" || formData['datum'] === "" || formData['br_gostiju']=== ""){
                        alert("Polja nisu unesena.");
                        
                    }else{
                        if(!regex.test(formData['ime']) ){
                           alert("Pogrešno uneseno: Ime");
                           form_flag = false;
                        }
                        if(!regex.test(formData['prezime']) ){
                           alert("Pogrešno uneseno: Prezime");
                           form_flag = false;
                        }
                        if(!regex_email.test(formData['email'])){
                           alert("Pogrešno unesen: Email");
                           form_flag = false;
                        }
                            
                    }
                  
                    if(form_flag){
                    $.ajax(
                    {
                    url: "insert.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                     });     
                     
                     $("#form_reservation").each(function(){
                         this.reset();
                     })
                    $(".content").toggle();
                    }
                    
                
                });
               
            });
            
               

  

    </script>
    
    <!--Navbar-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <p class="navbar-brand" href="#">Restoran Koliba</p>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#opis">O nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cijenik">Cijenik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rezervacija">Rezervacija</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        <header class="header">
            <img src="./entry_img.jpg" class="img-fluid" alt="Restoran" id="entry_img">  
        </header>
        <span id="content-divider"></span>
       <!--Sadržaj web apk-->
     <div class="content-container">
        <!--O nama-->
        <div class="about-container" id="opis">
            <h1>O nama</h1>
            <span id="content-divider"></span>
            <div class="map-container">
                <div class="embed-responsive embed-responsive-1by1">
                    <iframe id="map" class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2918.290082728729!2d21.944377915804484!3d42.993226002872056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47558319b251a41d%3A0x74a841e229ce3609!2zxIxpxI1pbmEga29saWJh!5e0!3m2!1shr!2shr!4v1651000696146!5m2!1shr!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="text-container">
                    <p>Otvoren 27. travnja 2022. godine, već dugi niz godina ima uspjesno poslovanje u slavoniji i baranji posebno u baranji.</p>
                </div>
            </div>  
        </div>
        <span id="content-divider"></span>
        <!--Cijenik-->
        <div class= "cijenik-container" id="cijenik">
            <h1>Cijenik</h1>
            <span id="content-divider"></span>
            <div class="vrste-container">
                <div class="predjela-container">
                    <h2>Predjela</h2>
                </div>
                <div class="roštilj-container" id="show">
                    <h2 class="BBQFood">Jela s roštilja</h2>
                </div>
                <div class="pizza-container">
                    <h2 class="pizzaFood" >Pizze</h2>
                </div>
                <div class="tjestenina-container">
                    <h2>Tjestenine</h2>
                </div>
                <div class="pića-container">
                    <h2>Pića</h2>
                </div>
            </div>
        </div>
    </div> 
    <span id="content-divider"></span>
    <!--Reservacije-->
    <div class="rezervacija-container" id="rezervacija">
        <h1>Rezervacija</h1>
        <span id="content-divider"></span>
        <img src="restaurant-plan.png" alt="Sjedala" usemap="#rezervacija">

        <map name="rezervacija">
          <area class="table" shape="circle" coords="92,72,24" alt="SepareLijevi1" href="#content">
          <area class="table" shape="circle" coords="202,72,24" alt="SepareLijevi2" href="#content">
          <area class="table" shape="circle" coords="430,72,24" alt="SepareDesni1" href="#content">
          <area class="table" shape="circle" coords="552,72,24" alt="SepareDesni2" href="#content">
          <area class="table" shape="circle" coords="74,184,22" alt="Obiteljski1" href="#content">
          <area class="table" shape="circle" coords="74,250,22" alt="Obiteljski2" href="#content">
          <area class="table" shape="circle" coords="74,314,22" alt="Obiteljski3" href="#content">
          <area class="table" shape="circle" coords="208,170,20" alt="Okrugli4Lijevo1" href="#content">
          <area class="table" shape="circle" coords="208,228,20" alt="Okrugli4Lijevo2" href="#content">
          <area class="table" shape="circle" coords="208,296,20" alt="Okrugli4Lijevo3" href="#content">
          <area class="table" shape="circle" coords="266,170,20" alt="Okrugli4Lijevo4" href="#content">
          <area class="table" shape="circle" coords="266,228,20" alt="Okrugli4Lijevo5" href="#content">
          <area class="table" shape="circle" coords="266,296,20" alt="Okrugli4Lijevo6" href="#content">
          <area class="table" shape="circle" coords="388,170,20" alt="Okrugli4Desni1" href="#content">
          <area class="table" shape="circle" coords="388,228,20" alt="Okrugli4Desni2" href="#content">
          <area class="table" shape="circle" coords="388,296,20" alt="Okrugli4Desni3" href="#content">
          <area class="table" shape="circle" coords="446,170,20" alt="Okrugli4Desni4" href="#content">
          <area class="table" shape="circle" coords="446,228,20" alt="Okrugli4Desni5" href="#content">
          <area class="table" shape="circle" coords="446,296,20" alt="Okrugli4Desni6" href="#content">
          <area class="table" shape="circle" coords="559,171,10" alt="Okrugli2Desni1" href="#content">
          <area class="table" shape="circle" coords="559,215,10" alt="Okrugli2Desni2" href="#content">
          <area class="table" shape="circle" coords="559,257,10" alt="Okrugli2Desni3" href="#content">
          <area class="table" shape="circle" coords="559,301,10" alt="Okrugli2Desni4" href="#content">
        </map> 
        <!--POPUP-->
        <div class="content">
            <div class="close-btn">
                ×
            </div>
            <h3 class="table-name"></h3>
      
                <form method="post" action="insert.php" id="form_reservation" class="was-validated">
                    <div class="row">
                      <div class="col">
                        
                        <input type="text" class="form-control is-valid ime" id="validationServer01" placeholder="Ime" required>
                        <div class="valid-feedback">
                        <label for="validationServer01" class="form-label"></label>
                        </div>
                      </div>
                      <div class="col">
                      <label for="validationServer02" class="form-label"></label>
                        <input type="text" class="form-control is-valid prezime" id="validationServer02" placeholder="Prezime" required>
                        
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col">
                      <label for="validationServer03" class="form-label"></label>
                        <input type="text" class="form-control is-valid email" id="validationServer03" placeholder="Email" required>
                       
                      </div>
                      <div class="col">
                      <label for="validationServer04" class="form-label"></label>
                        <input type="datetime-local" class="form-control is-valid datum" id="validationServer04" placeholder="Datum" required>
                        
                      </div>
                      <div class="col">
                      <label for="validationServer05" class="form-label"></label>
                        <input type="text" class="form-control is-valid br_gostiju" id="validationServer05" placeholder="Broj gostiju" required>
                     
                      </div>
                    </div>
                 </form>
                    <div class="row">
                         <div class="col">
                             <button type="submit"  class="submit" value="Submit" name=submit>Submit</button>
                         </div>
                    </div>
                      
                    
                  
        </div>
        
    </div>
</body>

</html>
