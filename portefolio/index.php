
<?php
// include ("../../Portfolio_PHP/dashboard/pages/user/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/home/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/about_my/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/education/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/experience/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/project/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/skills/get.php");
// include ("../../Portfolio_PHP/dashboard/pages/footer/get.php");



include("../db.php");

$query = "SELECT * FROM user_info";
$result = $con -> query($query);

$dataU = [];

while ($row = $result->fetch_assoc()){
    $dataU [] = $row;
}
//////////////////////////////////////////////////////

$query = "SELECT * FROM home";
$result = $con -> query($query);

$dataH = [];

while ($row = $result->fetch_assoc()){
    $dataH [] = $row;
}
/////////////////////////////////////////////////////
$query = "SELECT * FROM about_us";
$result = $con -> query($query);

$dataA = [];

while ($row = $result->fetch_assoc()){
    $dataA [] = $row;
}
/////////////////////////////////////////////////////
$query = "SELECT * FROM skills";
$result = $con -> query($query);

$dataS = [];

while ($row = $result->fetch_assoc()){
    $dataS [] = $row;
}
////////////////////////////////////////////////////

$query = "SELECT * FROM projects";
$result = $con -> query($query);

$dataP = [];

while ($row = $result->fetch_assoc()){
    $dataP [] = $row;
}
/////////////////////////////////////////////////////
$query = "SELECT * FROM footer";
$result = $con -> query($query);

$dataF = [];

while ($row = $result->fetch_assoc()){
    $dataF [] = $row;
}


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portfolio to showcase your profile saif mehdawi">
    <meta name="keywords" content="saif, mehdawi, ful stack,web">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
       


    <title> Portfolio </title>
</head>

<body>
    <!-- <header>
        <a href="#" class="logo">Saif Mehdawi</a>
        <nav class="nav">
            <a href="#">#</a>
            <a href="#">#</a>
            <a href="#">#</a>
        </nav>
    </header> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-3  border-bottom  border-secondary ">
        <div class="container-fluid">
        <?php foreach($dataU as $row): ?>
            <h2 style="color: #192D39;" class="navbar-brand"><?php echo $row['username']; ?></h2>
        <?php endforeach ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button id="mybtn"></button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" aria-current="page" style="color: #192D39;" href="#About">About
                            my</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" style="color: #192D39;" href="#Skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" style="color: #192D39;" href="#Projects">Products</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <section class="main" id="myContainer">
        <div class="subject">

        <?php foreach($dataU as $row): ?>
            <h1><?php echo $row['username']; ?></h1>
        <?php endforeach ?>

        <?php foreach($dataH as $row): ?>
            <h4><?php echo $row['title']; ?></h4>

            <p>
            <?php echo $row['brief']; ?>
            </p>
            <a  href="<?php echo "uploads/cvs/" . $row['cv']; ?>" class="main-btn" download>Download CV</a>
            <?php endforeach ?>

        </div>
    </section>


    <section id="About" class="about">
        <h1 class="title">About my</h1>
        <div class="content">
            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <div class="info">
                <?php foreach($dataA as $row): ?>

                <p>
                    <?php echo $row['description']; ?>
                </p>
                <?php endforeach ?>
                </div>
            </div>

            <div class="card">
                <div class="icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div>

                    <div class="info">
                    <?php foreach($dataA as $row): ?>

                    <p>
                        <?php echo $row['description']; ?>
                    </p>
                    <?php endforeach ?>
                    </div>
                </div>

            </div>
    </section>


    <!-- <section id="Skills">
        <h1 class="title">Education & Skills</h1>
        <div class="content">

            <div class="education">
                <div class="info_edu">
                    <i class="fa-solid fa-building-columns"></i>
                    <p style="display: inline;">
                        University: Yarmouk University
                    </p>
                </div>
                <div class="info_edu">
                    <i class="fa-solid fa-desktop"></i>
                    <p style="display: inline;">
                    Specialization: Computer Science
                    </p>
                </div>
                <div class="info_edu">
                    <i class="fa-solid fa-hourglass-start"></i>
                    <p style="display: inline;">
                        Start: 10/10/2019
                    </p>
                </div>
                <div class="info_edu">
                    <i class="fa-solid fa-hourglass-end"></i>
                    <p style="display: inline;">
                        End: 7/25/2023
                    </p>
                </div>
                <div class="info_edu">
                    <i class="fa-solid fa-percent"></i>
                    <p style="display: inline;">
                        GPA: Very good
                    </p>
                </div>
            </div> -->


    <!-- <div class="skill-bars">

                 <div class="progressbar">
                    <p class="name">HTML<span style="margin-left:68% ;">95%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 95%; background-color: #af0000;"></div>
                        </div>
                    </div>
                    <p class="name">CSS<span style="margin-left:68% ;">90%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 90%; background-color: #008204;"></div>
                        </div>
                    </div>
                    <p class="name">JavaScript<span style="margin-left:50% ;">20%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 20%; background-color: #00317a;"></div>
                        </div>
                    </div>
                    <p class="name">ASP.NET<span style="margin-left:60% ;">30%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 30%; background-color: #00317a;"></div>
                        </div>
                    </div>
                    <p class="name">SQL<span style="margin-left:75% ;">70%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 70%; background-color: #390000;"></div>
                        </div>
                    </div>
                </div> 
                 <div class="progressbar">
                    <p class="name">Python<span style="margin-left:65% ;">75%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 75%; background-color: #7d0149;"></div>
                        </div>
                    </div>
                    <p class="name">PHP<span style="margin-left:75% ;">70%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 70%; background-color: #477400;"></div>
                        </div>
                    </div>
                    <p class="name">C#<span style="margin-left:75% ;">50%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 50%; background-color: #78013e;"></div>
                        </div>
                    </div>
                    <p class="name">Laravel<span style="margin-left:60% ;">60%</span></p>
                    <div class="skill">
                        <div class="progresss">
                            <div class="value" style="width: 60%; background-color: #78013e;"></div>
                        </div>
                    </div>
                </div>

            </div> -->
    <!-- <div class="education">
                <div class="article-container">
                    <article>
                        <i class="fa-solid fa-desktop"></i>
                        <div>
                            <h3>HTML</h3>
                            <p>experienced</p>
                        </div>
                    </article>
                    <article>
                        <i class="fa-solid fa-desktop"></i>
                        <div>
                            <h3>HTML</h3>
                            <p>experienced</p>
                        </div>
                    </article>
                    <article>
                        <i class="fa-solid fa-desktop"></i>
                        <div>
                            <h3>HTML</h3>
                            <p>experienced</p>
                        </div>
                    </article>
                    <article>
                        <i class="fa-solid fa-desktop"></i>
                        <div>
                            <h3>HTML</h3>
                            <p>experienced</p>
                        </div>
                    </article>
                    <article>
                        <i class="fa-solid fa-desktop"></i>
                        <div>
                            <h3>HTML</h3>
                            <p>experienced</p>
                        </div>
                    </article>
            </div>
        </div> -->


    <!-- </section> -->

    <!-- <section>
        <h1 class="title">Projects</h1>
        <div class="experience-details-container">
             <div class="about-containers">
                <div class="details-container">
                    <h2 class="experience-sub-title">frontend developer</h2>
                    <div class="article-container">
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        
                    </div>

                </div>
                <div class="details-container">
                    <h2 class="experience-sub-title">frontend developer</h2>
                    <div class="article-container">
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        <article>
                            <i class="fa-solid fa-desktop"></i>
                            <div>
                                <h3>HTML</h3>
                                <p>experienced</p>
                            </div>
                        </article>
                        
                    </div>

                </div>
             </div>
        </div>
    </section> -->

    <!-- <section class="skillls" id="Skills">
        <h2 class="title">Skills</h2>
  
        <div class="skills-wrapper">
            <div class="w">
                <div class="image">
                <img 
                  src="images/html.jpg"
                  alt=""
                  loading="lazy"
                  class="i icon-card"
                />
                <div class="c">
                  <h1>one</h1>
                  <p>hard</p>
              </div>
              </div>
                
            </div>
            <img
              src="images/htmlcssjs.png"
              alt=""
              loading="lazy"
              class="i icon-card"
            />
            <img
              src="images/py.png"
              alt=""
              loading="lazy"
              class="i icon-card"
            />
            <img
              src="images/php.jpg"
              alt=""
              loading="lazy"
              class="i icon-card"
            />
            <img
            src="images/c.png"
            alt=""
            loading="lazy"
            class="i icon-card"
          />
          </div>
  
          <div class="">
            <img
              src="images/laravell.png"
              alt=""
              loading="lazy"
              class="i icon-card"
            />
            <img
              src="images/aspnet.png"
              alt=""
              loading="lazy"
              class="i icon-card"
            />
            <img
              src="images/git.png"
              alt=""
              loading="lazy"
              class="i icon-card"
            />
            <img
            src="images/bootstrap.jpg"
            alt=""
            loading="lazy"
            class="i icon-card"
          />
          </div>
        
      </section> -->


    <section id="Skills" style="padding: 30px 60px;">
        <h1 class="title">My skills</h1>

        <div class="skills-container">
        <?php foreach($dataS as $row): ?>
            <div class="skills-box">
                <div class="skills-content">
                <img src="<?php echo "uploads/images/" . $row['image']; ?>" alt="images">
                    <h2><?php echo $row["experience"] ?><br><span><?php echo $row["level"] ?></span></h2>
                </div>
            </div>
            <?php endforeach ?>

            <!-- <div class="skills-box">
                <div class="skills-content">
                    <img src="images/bootstrap.jpg" />
                    <h2>6 months experience<br><span>intermediate</span></h2>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-content">
                    <img src="images/sql.png" />
                    <h2>3 years experience<br><span>Advanced</span></h2>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-content">
                    <img src="images/py.jpg" />
                    <h2>4 years experience<br><span>Advanced</span></h2>
                </div>
            </div> -->
            
        </div>

        

        <!-- <div class="skills-container">

            <div class="skills-box">
                <div class="skills-content">
                    <img src="images/php.jpg" />
                    <h2>2 years experience<br><span>Advanced</span></h2>
                </div>
            </div>

            <div class="skills-box">
                <div class="skills-content">
                    <img src="images/l.jpg" />
                    <h2>1 years experience<br><span>intermediate</span></h2>
                </div>
            </div>

            <div class="skills-box">
                <div class="skills-content">
                    <img src="images/c.png" />
                    <h2>6 months experienc<br><span>intermediate</span></h2>
                </div>
            </div>

            <div class="skills-box">
                <div class="skills-content">
                    <img src="images/aspnet.png" />
                    <h2>3 months experienc<br><span>beginner</span></h2>
                </div>
            </div>
        </div> -->



    </section>



    <section class="projects" id="Projects">
        <h1 class="title">Projects</h1>

        <div class="Project-content">
        <?php foreach($dataP as $row): ?>

            <div class="project-card">
                <div class="project-image">
                <img src="<?php echo "uploads/images/" . $row['image']; ?>" alt="images">
                </div>
                <div class="project-info">
                    <p class="project-category"><?php echo $row["brief"] ?></p>
                    <strong class="project-title">

                        <a href="<?php echo $row["link"] ?>" target="_blank" class="more-details">More
                            details</a>
                    </strong>
                </div>
            </div>
        <?php endforeach ?>
            <!-- <div class="project-card">
                <div class="project-image">
                    <img src="images/laravel.PNG" />
                </div>
                <div class="project-info">
                    <p class="project-category">online store by laravel</p>
                    <strong class="project-title">
                        <a href="https://github.com/saifa3010/heinstore" target="_blank" class="more-details">More
                            details</a>
                    </strong>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/asp.png" />
                </div>
                <div class="project-info">
                    <p class="project-category">Dashboard by ASP.NET CORE</p>
                    <strong class="project-title">
                        <a href="https://github.com/saifa3010/asp_project/tree/master" target="_blank"
                            class="more-details">More details</a>
                    </strong>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/html.jpg" />
                </div>
                <div class="project-info">
                    <p class="project-category">HTML projects</p>
                    <strong class="project-title">
                        <a href="https://github.com/saifa3010/HTML-7-Projects/tree/master" target="_blank"
                            class="more-details">More details</a>
                    </strong>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/css.png" />
                </div>
                <div class="project-info">
                    <p class="project-category">CSS projects</p>
                    <strong class="project-title">
                        <a href="https://github.com/saifa3010/CSS-Project/tree/master" target="_blank"
                            class="more-details">More details</a>
                    </strong>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">
                    <img src="images/htmlCss.PNG" />
                </div>
                <div class="project-info">
                    <p class="project-category">project by HTML & CSS</p>
                    <strong class="project-title">
                        <a href="https://github.com/saifa3010/pets/tree/master" target="_blank"
                            class="more-details">More details</a>
                    </strong>
                </div>
            </div> -->
        </div>
    </section>


    <!-- <section class="cards contact" id="contact">
        <h2 class="title">Let's work together</h2>
        <div class="content">
            <div class="card">
                <div class="icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="info">
                    <h3>Phone</h3>
                    <p>0781949811</p>
                </div>
            </div>
            <div class="card">
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info">
                    <h3>Email</h3>
                    <p>saifalden.mehdawi@gmali.com</p>
                </div>
            </div>
        </div>
    </section> -->

    <footer class="footer">
        <div style="text-align: center;">
        <?php foreach($dataU as $row): ?>

            <p"><i style="color: #FFC213;" class="fas fa-envelope"></i> <?php echo $row["email"]; ?></p>
            <p><i style="color: #FFC213;" class="fas fa-phone"></i> <?php echo $row["phone"]; ?></p>
        <?php endforeach ?>
            <div class="social-icons">
                <a href="https://www.linkedin.com/in/saif-alden-mahdawi-4698071a9/"><i class="fab fa-linkedin"></i></a>
                <a href="https://web.facebook.com/saifealden.ali?locale=ar_AR"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://github.com/saifa3010"><i class="fa-brands fa-github"></i></i></a>
            </div>
            <?php foreach($dataF as $row): ?>
            <p class="footer-title"><span> <?php echo $row["copy_right"]; ?></span></p>
            <?php endforeach ?>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</body>

</html>