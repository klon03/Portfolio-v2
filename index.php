<?php
function countTrueValues($array, $key) {
    return array_reduce($array, function($carry, $item) use ($key) {
        return $carry + ($item[$key] ?? false);
    }, 0);
}

$portfolio = array(
    "asgr" => array(
        "title" => "ASG Runowo",
        "year" => 2020,
        "tech" => "Wordpress",
        "img" => "asgr",
        "link" => "https://asgrunowo.pl/pl/",
        "descPL" => "Rozbudowana strona reprezentatywna. Stworzona od podstaw w Wordpressie, podłączona do systemu zapisów. Zarządzana przeze mnie do dzisiaj.",
        "descEN" => "An extensive representative website. Created from scratch in Wordpress, connected to the registration system. Managed by me to this day.",
        "isBackend" => true,
        "isManaged" => true,
    ),
    "skr" => array(
        "title" => "Stadnina Koni Runowo",
        "year" => 2020,
        "tech" => "Wordpress",
        "img" => "skr",
        "link" => "https://stadninarunowo.pl/pl/",
        "descPL" => "Prosta lecz rozbudowana strona prezentująca ofertę oraz obiekt stadniny koni na Pomorzu. Zaprojektowana i wykonana w całości przeze mnie w Wordpressie (całkowity rework starej strony). Jest również podłączona do autorskiego systemu zapisów na obozy wakacyjne.",
        "descEN" => "A simple but extensive website presenting the offer and facility of a horse farm in Pomerania.
        Designed and made entirely by me in Wordpress (total rework of the old website).
        It is also connected to the proprietary registration system for holiday camps.",
        "isBackend" => true,
        "isManaged" => true,
    ),
    "bluebee" => array(
        "title" => "Blue Bee",
        "year" => 2021,
        "tech" => "Wordpress",
        "img" => "bluebee",
        "link" => "https://www.bluebee.edu.pl/",
        "descPL" => "Podstawowa witryna przedstawiająca ofertę firmy w rozbudowanej formie. Zawiera między innymi kilka formularzy, połączenie z Google Maps. Projekt mojego autorstwa.",
        "descEN" => "A basic website presenting the company's offer in an extensive form. It includes, among other things, several forms and a connection to Google Maps. Graphic design by me.",
        "isBackend" => false,
        "isManaged" => true,
    ),
    "borsuki" => array(
        "title" => "Borsuki",
        "year" => 2017,
        "tech" => "Wordpress",
        "img" => "borsuki",
        "link" => "https://borsuki.pl/pl/",
        "descPL" => "Jedna z pierwszych stron, którą wykonałem. Bardzo prosta, z wieloma niedoskonałościami. W międzyczasie częściowo aktualizowana i modyfikowana.",
        "descEN" => "One of the first websites I made. Very simple, with many imperfections. In the meantime, partially updated and modified.",
        "isBackend" => false,
        "isManaged" => false,
    ),
    "zapisy" => array(
        "title" => "System zapisów",
        "year" => 2021,
        "tech" => "PHP, MySQL",
        "img" => "zapisy",
        "link" => "#",
        "descPL" => "Pierwszy system backendowy mojego autorstwa. Przeznaczony do prowadzenia zapisów na obozy wakacyjne. Umożliwia zarządzanie zapisanymi osobami, wysyłkę maili, automatyczne zamykanie zapisów, monitorowanie statystyk. Dodatkowo posiada zintegrowane płatności online.",
        "descEN" => "My first backend system. Intended for registering for holiday camps. It allows you to manage registered people, send e-mails, automatically close registrations, monitor statistics. Additionally, it has integrated online payments.",
        "isBackend" => true,
        "isManaged" => true,
    ),
    "sprzedawcy" => array(
        "title" => "Arena Sprzedawcy, BOK, Brutto",
        "year" => 2023,
        "tech" => "Bootstrap",
        "img" => "sprzedawcy",
        "link" => "https://sprzedawcy.arena.pl/",
        "descPL" => "Wykonałem trzy landing-page'e osadzone w Bootstrapie. Wykonane według projektu graficznego zapewnionego przez klienta.",
        "descEN" => "Three landing pages based on Bootstrap. Created according to the graphic design provided by the client.",
        "isBackend" => false,
        "isManaged" => false,
    ),
    "kickseeker" => array(
        "title" => "KICKSEEKER",
        "year" => 2023,
        "tech" => "PHP, MySQL, Node.js",
        "img" => "kickseeker",
        "link" => "https://kickseeker.com/",
        "descPL" => "Rozbudowana aplikacja do handlu markowym obuwiem pomiędzy użytkownikami. Start-up, w którym od podstaw tworzę backend oparty głównie o PHP 8.2 i MySQL. Funkcjonalność chatu została wykonana w Node.js.",
        "descEN" => "An extensive application for trading branded footwear between users. A start-up where I work on backend part, which I created from scratch. It is based mainly on PHP 8.2 and MySQL. The chat functionality was made in Node.js.",
        "isBackend" => true,
        "isManaged" => true,
    ),
    "roceup" => array(
        "title" => "RoceUp",
        "year" => 2023,
        "tech" => "Bootstrap",
        "img" => "roceup",
        "link" => "https://roceup.com/",
        "descPL" => "Nowoczesny i minimalistyczny one-pager służący jako wizytówka firmy. Napisany przy użyciu Bootstrapa i kilku skryptów.",
        "descEN" => "A modern and minimalist one-pager serving as a company's business card. Written using Bootstrap and several scripts.",
        "isBackend" => false,
        "isManaged" => false,
    ),
);
$portfolio = array_reverse($portfolio);
usort($portfolio, fn($a, $b) => $b['year'] - $a['year'] );
$cProjects = count($portfolio) + 2;
$cBackend = countTrueValues($portfolio, 'isBackend');
$cManaged = countTrueValues($portfolio, 'isManaged');


$slideTemplate = '
<div class="swiper-slide">
    <div class="overlay-container">
        [link-image]
    </div>
    <h4>[title]</h4>
    <h6>[year] | [tech]</h6>
    <p>
        <span lang="pl">[descPL]</span>
        <span lang="en">[descEN]</span>
    </p>
    [link-button]
</div>';

$linkButton = '<a href="[link]" target="_blank">
<button class="btn btn-primary btn-md alt" type="button">
    Wyświetl 
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
</button>
</a>';

$linkImage = '
<a href="[link]" target="_blank">
<img src="img/portfolio/[img].webp" alt="[title]"/>
<div class="overlay">
    <svg xmlns="http://www.w3.org/2000/svg" height="4.5em" viewBox="0 0 640 512"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
</div>
</a>';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Kajetan Wachowski</title>
    <meta name="description" content="Ambitny student informatyki aspirujący w kierunku tworzenia aplikacji i systemów internetowych z naciskiem na backend.">
    <meta name="keywords" content="Webdev, Web developer, PHP, student, Kajetan, Wachowski">
    <meta name="author" content="Kajetan Wachowski">
    <meta property="og:image" content="https://kwachowski.pl/img/profile.webp" />

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="css/bootstrap-purified.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" media="print" onload="this.media='all'"/>
    <link rel="stylesheet" href="css/style.css">

    <!-- Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/ico/favicon-16x16.png">
    <link rel="manifest" href="/img/ico/site.webmanifest">
    <link rel="mask-icon" href="/img/ico/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/ico/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/img/ico/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- Javascript -->
    
</head>
<body>
<nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark" id="navbar">
    <div class="col-lg-2"></div>
    <div class="container-fluid">
        <a class="navbar-brand" href="#start">kWachowski</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
            aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-center" id="navbarID">
            <div class="navbar-nav">
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" href="#start">Home</a>
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" href="#about-me">
                    <span lang="pl">O mnie</span>
                    <span lang="en">About me</span>
                </a>
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" href="#portfolio" >
                    Portfolio
                </a>
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" href="#skills">
                    <span lang="pl">Umiejętności</span>
                    <span lang="en">Skills</span>
                </a>
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" href="#contact">
                    <span lang="pl">Kontakt</span>
                    <span lang="en">Contact</span>
                </a>
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" id="selectEn" style="display: none;">
                    <img src="/img/gb.svg" alt="English" width="25" title="English language">
                </a>
                <a class="nav-link my-1 my-lg-0 mx-md-1 p-2" id="selectPl">
                    <img src="/img/pl.svg" alt="Polski" width="25" title="Język polski">
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</nav>

<div class="container-fluid">
    <!-- Landing page -->
    <div class="row align-items-center flex-column flex-lg-row justify-content-lg-center section g-3" id="start">
        <div class="col-12 col-lg-4 order-2 order-lg-1">
            <h1 class="text-white text-left">Kajetan Wachowski</h1>
            <h5>Web Developer</h5>
            <p class="mb-0 mb-md-4" style="text-align: justify;">
                <span lang="pl">Ambitny student informatyki aspirujący w kierunku tworzenia aplikacji i systemów internetowych z naciskiem na backend. Preferuje pracę w sposób zorganizowany i zaplanowany, pozostawiając jak najmniej przypadkowi.</span>
                <span lang="en">An ambitious student of computer science, aspiring towards web-development with an emphasis on backend. Prefers to work in an organized and planned way, leaving as little to chance as possible.</span>
            </p>
            <div class="btn-wrapper text-center d-none d-md-block">
                <a href="#contact">
                    <button class="btn btn-primary main btn-lg" type="button">
                        <span lang="pl">Kontakt</span>
                        <span lang="en">Contact</span> 
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.4em" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>
                    </button>
                </a>
            </div>  
        </div>

        <div class="col-12 col-lg-4 order-1 order-lg-2 mt-lg-5">
            <div class="imgContainer">
                <div class="imgBlur"></div>
                <div class="img"></div>
            </div>
        </div>
        
        <div class="more">
            <a href="#about-me">
                <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 60 60"><defs><style>.cls-1{fill:none;}</style></defs><path d="M55.46,15.58l-25.45,25.45L4.54,15.55c-.78-.78-2.05-.78-2.83,0h0c-.78,.78-.78,2.05,0,2.83l25.48,25.48h0s0,0,0,0c1.56,1.56,4.09,1.56,5.66,0l25.45-25.45c.78-.78,.78-2.05,0-2.83h0c-.78-.78-2.05-.78-2.83,0Z"/><rect class="cls-1"/></svg>
            </a>
        </div>
    </div>

    <!-- About me -->
    <div class="row about-me align-items-center justify-content-center section" id="about-me">
        <div class="col-12 text-center mb-3">
            <h2>
                <span lang="pl">O mnie</span>
                <span lang="en">About me</span>
            </h2>
        </div>
        <div class="col-12 col-md-auto col-lg-4 p-3 p-lg-5 my-3 ">
            <a href="https://undraw.co/illustrations" target="_blank" title="Check out unDraw!">
                <img src="/img/about-me.svg" alt="About me" class="img-fluid">
            </a>
        </div>
        <div class="col-12 col-lg-4">
            <p style="text-align: justify;">
                <span lang="pl">Od ponad 5 lat tworzę witryny internetowe. Specjalizuję się w skryptach backend'owych, posługując się językami takimi jak PHP, MySQL, Python czy Javascript. 
                Mam również spore doświadczenie w tworzeniu i zarządzaniu aplikacjami opartymi na Wordpressie.</span>
                <span lang="en">I have been creating websites for over 5 years. I specialize in backend scripts, using languages such as PHP, MySQL, Python or Javascript. 
                Additionally, I have a lot of experience in creating and managing applications based on Wordpress.</span>
            </p>
            <div class="row text-center justify-content-center my-5 py-0 gx-2">
                <div class="col-4 col-md-4">
                    <h3><?php echo sprintf("%02d", $cProjects); ?></h3>
                    <p lang="pl">Zakończonych<br>projektów</p>
                    <p lang="en">Finished<br>projects</p>
                </div>
                <div class="col-4 col-md-4">
                    <h3><?php echo sprintf("%02d", $cBackend); ?></h3>
                    <p lang="pl">Systemy<br>backend'owe</p>
                    <p lang="en">Backend<br>systems</p>
                </div>
                <div class="col-4 col-md-4 text-center justify-content-center">
                    <h3><?php echo sprintf("%02d", $cManaged); ?></h3>
                    <p lang="pl">Zarządzanych<br> aplikacji</p>
                    <p lang="en">Managed<br>applications</p>
                </div>
            </div>   
        </div>
    </div>

    <!-- Portfolio -->
    <div class="row align-items-center justify-content-center section" id="portfolio">
        <div class="col-12 text-center">
            <h2>Portfolio</h2>
            <p class="mb-0">
                <span lang="pl">Moje projekty</span>
                <span lang="en">My recent projects</span>
            </p>
        </div>
        <!-- Slider main container -->
        <div class="col-12">
            <div class="swiper pt-3">
                <div class="swiper-wrapper">
                    <?php
                    
                        foreach($portfolio as $s) {
                            $html = $slideTemplate;
                            $s = array_reverse($s);
                            foreach($s as $key => $element) {
                                
                                if($key == 'link') {
                                    if($element == "#") {
                                        $html = str_replace("[link-button]", "", $html);
                                        $html = str_replace("[link-image]", '<img src="img/portfolio/[img].webp" alt="[title]"/>', $html);
                                    } else {
                                        $html = str_replace("[link-button]", $linkButton, $html);
                                        $html = str_replace("[link-image]", $linkImage, $html);
                                    }
                                }
                                $html = str_replace("[".$key."]", $element, $html);
                            }
                            echo $html;
                        }
                    ?>                                    
                </div>
                <div class="swiper-overlay left"></div>
                <div class="swiper-overlay right"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        
    </div>

    <!-- Skills -->
    <div class="row skills justify-content-center section" id="skills" style="padding-bottom: 5rem;">
        <div class="col-12 text-center mb-3">
            <h2>
                <span lang="pl">Umiejętności</span>
                <span lang="en">Skills</span>
            </h2>
            <p class="mb-0">
                <span lang="pl">Mój tech stack</span>
                <span lang="en">My tech stack</span>
            </p>
        </div>
        <div class="row py-0 logos justify-content-center text-center">
            <div class="col-3 col-lg-1 mx-lg-4">
                <img src="/img/skills/php.svg" alt="PHP" title="PHP">
                <img src="/img/skills/html.svg" alt="HTML" title="HTML">
                <img src="/img/skills/python.svg" alt="Python" title="Python">    
            </div>
            <div class="col-3 col-lg-1 mx-lg-4">
                <img src="/img/skills/mysql.svg" alt="MySQL" title="MySQL">
                <img src="/img/skills/css.svg" alt="CSS" title="CSS">
                <img src="/img/skills/csharp.svg" alt="C#" title="C#">
                <img src="/img/skills/googleads.svg" alt="Google Ads" title="Google Ads">      
            </div>
            <div class="col-3 col-lg-1 mx-lg-4">
                <img src="/img/skills/js.svg" alt="JavaScript" title="JavaScript">
                <img src="/img/skills/bootstrap.webp" alt="Bootstrap" title="Bootstrap" style="margin: 25% 0 25% 0;">
                <img src="/img/skills/kotlin.svg" alt="Kotlin" title="Kotlin" style="width: 90%;">
                <img src="/img/skills/c++.svg" alt="C++" title="C++" style="width: 90%;">
            </div>
            <div class="col-3 col-lg-1 mx-lg-4">
                <img src="/img/skills/nodejs.svg" alt="Node.js" title="Node.js">
                <img src="/img/skills/wordpress.svg" alt="Wordpress" title="Wordpress">
                <img src="/img/skills/postgresql.svg" alt="PostgreSQL" title="PostgreSQL">
            </div>            
        </div>
    </div>
</div>

<!-- Contact -->
<div class="container-fluid contact section" id="contact">
    <div class="row justify-content-left justify-content-md-center" style="padding-bottom: 5rem;">
        <div class="col-12 text-center mb-5">
            <h2>
                <span lang="pl">Kontakt</span>
                <span lang="en">Contact</span>
            </h2>
            <p class="mb-0">
                <span lang="pl">Napisz do mnie</span>
                <span lang="en">Get in touch</span>
            </p>
        </div>
        
        <div class="col-12 col-md-auto d-flex flex-row tile align-items-center px-4 py-3 mx-lg-4" id="contact-email">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
            </svg>  
            <div>
                <h3>E-mail</h3>
                <p>wachowski.kajetan@gmail.com</p>
            </div>
        </div>

        <div class="col-12 col-md-auto d-flex flex-row tile align-items-center px-4 py-3 mx-lg-4 my-3 my-lg-0" id="contact-linkedin">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>  
            <div>
                <h3>LinkedIn</h3>
                <p>/in/k-wachowski</p>
            </div>
        </div>

        

        <div class="col-12 col-md-auto d-flex flex-row tile align-items-center px-4 py-3 mx-lg-4" id="contact-github">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>          
            <div>
                <h3>GitHub</h3>
                <p>/klon03</p>
            </div>
        </div>

        
        

    </div>
</div>

<div class="notification" id="copy-notification">
    <span lang="pl">Adres&nbsp;e&#8209;mail&nbsp;skopiowany!</span>
    <span lang="en">E&#8209;mail&nbsp;address&nbsp;copied!</span>
</div>







<footer>
  <div class="text-center p-4" style="color:rgba(255, 255, 255, 0.233)">
    Copyright © <span id="year"></span> Kajetan Wachowski
  </div>
</footer>

<!-- Javascript -->
<script src="js/language.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script type="module" src="js/swiper.js" async></script>
</body>
</html>