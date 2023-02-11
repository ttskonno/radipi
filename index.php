<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>RadiPi - Radiko Player with Raspberry Pi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
            crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous"></script>
        <style>
            .list-group-margin {
                margin-top: 30px;
            }
        </style>
    </head>
    <body class="h-100">
        <header>
            <nav class="navbar text-light narver-dark bg-dark">
                <span class="navbar-brand mb-0 h1">RadiPi</span>
                <button class="btn btn-outline-success" type="button" 
                    onclick="location.href='https://radiko.jp/index/JP13/'">Timetable</button>
            </nav>
        </header>
        <div class="alert alert-success" role="alert">
        <b><?php
        $script = "/home/pi/work/radiko/radiko-streamlink.py";
        if (isset($_POST["control"])) {
            $cmd = "";
            switch (($_POST["control"])) {
                case "stop":
                    $cmd = $script." --quit >/dev/null &";
                    exec($cmd, $out, $return_var);
                    echo "Stopped.";
                    // echo $cmd." ".$out." ".$return_var.": Stop button pushed.";
                    break;
                case "play":
                    $cmd = $script." --play 0 >/dev/null &";
                    exec($cmd, $out, $return_var);
                    echo "Random playbacking.";
                    // echo $cmd." ".$out." ".$return_var.": Play button pushed.";
                    break;
                default: 
                    echo "Error: control buttons."; 
                    exit;
            }
        }
        if (isset($_POST["radio"])) {
            $val = explode(",", ($_POST["radio"]));
            $cmd = $script." --play ".$val[0]." >/dev/null&";
            exec($cmd, $out, $return_var);
            echo $val[1]." casting."; 
            // echo $cmd." ".$out." ".$return_var.": Play ".($_POST["radio"]).": pushed";
        }
        ?></b>
        </div>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" 
                    class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" 
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" 
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" 
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" 
                    aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" 
                    aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="https://www.interfm.co.jp/" target="_blank" rel="noopener noreferrer">
                        <img src="images/interfm897.png" class="d-block w-100" alt="First-slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.tfm.co.jp/" target="_blank" rel="noopener noreferrer">
                        <img src="images/tokyofm.png" class="d-block w-100" alt="Second-slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.j-wave.co.jp/" target="_blank" rel="noopener noreferrer">
                        <img src="images/j-wave.jpg" class="d-block w-100" alt="Third-slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.tbsradio.jp/" target="_blank" rel="noopener noreferrer">
                        <img src="images/tbs.png" class="d-block w-100" alt="Fourth-slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.bayfm.co.jp/" target="_blank" rel="noopener noreferrer">
                        <img src="images/bayfm78.png" class="d-block w-100" alt="Fifth-slide">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="https://www.nack5.co.jp/" target="_blank" rel="noopener noreferrer">
                        <img src="images/nack5.png" class="d-block w-100" alt="Sixth-slide">
                    </a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" 
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" 
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="list-group list-group-margin">
                        <p class="list-group-item active"><b>Control</b></p>
                        <form action="" method="POST">
                            <button type="submit" name="control" value="play" 
                                class="list-group-item list-group-item-action border border-secondary">Random playback</button>
                            <button type="submit" name="control" value="stop" 
                                class="list-group-item list-group-item-action border border-secondary">Stop</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="list-group list-group-margin">
                        <p class="list-group-item active"><b>Select Radio Station</b></p>
                        <form action="" method="POST">
                            <button type="submit" name="radio" value="TBS,TBSラジオ" class="list-group-item list-group-item-action border border-secondary">TBSラジオ</button>
                            <button type="submit" name="radio" value="QRR,文化放送" class="list-group-item list-group-item-action border border-secondary">文化放送</button>
                            <button type="submit" name="radio" value="LFR,ニッポン放送" class="list-group-item list-group-item-action border border-secondary">ニッポン放送</button>
                            <button type="submit" name="radio" value="INT,InterFM897" class="list-group-item list-group-item-action border border-secondary">InterFM897</button>
                            <button type="submit" name="radio" value="FMT,TOKYO FM" class="list-group-item list-group-item-action border border-secondary">TOKYO FM</button>
                            <button type="submit" name="radio" value="FMJ,J-WAVE" class="list-group-item list-group-item-action border border-secondary">J-WAVE</button>
                            <button type="submit" name="radio" value="JORF,ラジオ日本" class="list-group-item list-group-item-action border border-secondary">ラジオ日本</button>
                            <button type="submit" name="radio" value="BAYFM78,bayfm78" class="list-group-item list-group-item-action border border-secondary">bayfm78</button>
                            <button type="submit" name="radio" value="NACK5,NACK5" class="list-group-item list-group-item-action border border-secondary">NACK5</button>
                            <button type="submit" name="radio" value="YFM,FMヨコハマ" class="list-group-item list-group-item-action border border-secondary">FMヨコハマ</button>
                            <button type="submit" name="radio" value="JOAK-FM,NHK FM" class="list-group-item list-group-item-action border border-secondary">NHK-FM</button>
                            <button type="submit" name="radio" value="JOAK,NHKラジオ第1" class="list-group-item list-group-item-action border border-secondary">NHKラジオ第1</button>
                            <button type="submit" name="radio" value="JOAB,NHKラジオ第2" class="list-group-item list-group-item-action border border-secondary">NHKラジオ第2</button>
                        </form>
                    </div>
                </div>
            </div>
