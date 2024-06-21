<?php
function get_CURL($url){
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
  }
$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCDcmNdiBH7tT73f9SzIFjBQ&key=AIzaSyB-bUTPz-oKn7AuF91LMN1DvZ5QXMD8JKc');
$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName= $result['items'][0]['snippet']['title'];
$subscriber= $result['items'][0]['statistics']['subscriberCount'];

$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyB-bUTPz-oKn7AuF91LMN1DvZ5QXMD8JKc&part=snippet&channelId=UCDcmNdiBH7tT73f9SzIFjBQ&order=date&maxResults=1';
$result = get_CURL($urlLatestVideo);
$urlLatestVideoId = $result['items'][0]['id']['videoId'];
$urlLatestVideoIdName = $result['items'][0]['snippet']['title'];

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #001f3f;">
      <div class="container">
        <a class="navbar-brand" href="#home">Diva Diandra Mahardika</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="margin-left: 30px;">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item" style="margin-left: 30px;">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item" style="margin-left: 30px;">
              <a class="nav-link" href="#social">Socio</a>
            </li>
            <li class="nav-item" style="margin-left: 30px;">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="jumbotron" id="home">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center mb-4">
          <div class="col-md-6">
            <h6 style="margin-bottom: 5px;">Hello</h6>
            <h2 class="font-weight-bold" style="margin-bottom: 5px;">DIVA DIANDRA MAHARDIKA</h2>
            <h4 class="design-grafis">Graphic Design | Photography | UI/UX Design</h4>
          </div>
          <img src="img/d.jpg" class="rounded-circle img-thumbnail">
        </div>
      </div>
    </div>


    <!-- About -->
    <section class="about" id="about" style="margin-bottom: 50px;">
      <div class="container">
          <div class="row">
              <div class="col text-center">
                  <h2 style="color: #001f3f; font-weight:bold;">About</h2>
              </div>
          </div>
          <div class="row justify-content-center align-items-center">
              <div class="col-md-4 d-flex justify-content-center">
                  <img src="img/di.png" class="rounded-circle " style="max-width: 100%;">
              </div>
              <div class="col-md-6">
                <h6>My name is Diva Diandra Mahardika<h6>
                <h3>Have good skills in creative industries Photography, videography, and editing</h3>
                <h6>I'm a person who likes to learn new things and master several things such as Adobe Premiere, Canva, Capcut, Lightroom.</h6>
                <a href="file/resume.pdf" class="btn btn-dark btn-sm mt-3" download>Download Resume</a>
              </div>
          </div>
      </div>
    </section>
 

    <!-- yt&ig -->
    <section class="sociol bg-light" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2 style="color: #001f3f; font-weight:bold;">Social Media</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col md-5">
            <div class="row">
              <div class="col-md-4 d-flex justify-content-center">
                <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8 d-flex flex-column justify-content-center">
                <h3 style="color: #001f3f;"><?=$channelName;?></h3>
                <p><?=$subscriber;?> Subscriber</p>
                <div class="g-ytsubscribe" data-channelid="UCDcmNdiBH7tT73f9SzIFjBQ" data-layout="default" data-count="hidden"></div>
              </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?=$urlLatestVideoId?>?rel=0" allowfullscreen></iframe>
                </div>
                <h5> - <?=$urlLatestVideoIdName?> - </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2 style="color: #001f3f; font-weight:bold;">Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/hallodoc.jpg" alt="Card image cap" data-toggle="modal" data-target="#imageModal" onclick="showImage(this)">
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/inventory.jpg" alt="Card image cap" data-toggle="modal" data-target="#imageModal" onclick="showImage(this)">
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/absen.jpg" alt="Card image cap" data-toggle="modal" data-target="#imageModal" onclick="showImage(this)">
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/ml.png" alt="Card image cap" data-toggle="modal" data-target="#imageModal" onclick="showImage(this)">
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/ig.jpg" alt="Card image cap" data-toggle="modal" data-target="#imageModal" onclick="showImage(this)">
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/camp.jpg" alt="Card image cap" data-toggle="modal" data-target="#imageModal" onclick="showImage(this)">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="" id="modalImage" class="img-fluid" alt="Responsive image">
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="footer text-white mt-5" style= "background-color: #001f3f;">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; Diva Diandra Mahardika</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    <script>
      function showImage(element) {
        var src = element.src;
        document.getElementById("modalImage").src = src;
      }
    </script>


    <style>
      #home h6 {
        font-family: Arial, sans-serif;
        font-style: italic;
        margin-bottom: 2px;
        margin-left: 5px;
        font-size: 1.5em;
      }
      #home h2 {
        color: #001f3f; 
        margin-bottom: 2px;
        margin-top: 0px;
      }
      #home .design-grafis {
        font-style: italic;
        font-weight: bold;
        color: #B8860B;
        margin-top: 2px;
        font-size: 1em;
        margin-left: 10%;
      }
      .navbar-nav .nav-item .nav-link {
        position: relative;
        transition: color 0.3s;
      }
      .navbar-nav .nav-item .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        display: block;
        margin-top: 5px;
        right: 0;
        background: #B8860B; 
        transition: width 0.3s ease, right 0.3s ease;
      }
      .navbar-nav .nav-item .nav-link:hover {
        color: #B8860B;
      }
      .navbar-nav .nav-item .nav-link:hover::after {
        width: 100%;
        right: 0;
      }
      .navbar-nav .nav-item .nav-link.active::after {
        width: 100%;
        right: 0;
      }
      #about h6{
        color: #B8860B;
        margin-bottom: 5px;
      }
      #about h3{
        font-weight: bold;
        margin-top: 5px;
      }
      .btn-dark:hover {
        background-color: #B8860B !important;
        transition: background-color 0.3s ease; 
      }
      #social h5{
        font-size: 1.5rem;
        margin-top: 10px;
      }
      .card-img-top {
        object-fit: cover;
        height: 300px;
      }
      .modal-dialog-centered {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .modal-body {
        text-align: center;
      }
    </style>
  </body>
</html>