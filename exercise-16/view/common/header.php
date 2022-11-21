<!doctype html>
<html lang="bg">
  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Прилепите в България</title>
    
    <!-- Include CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link href="view/style/style.css" rel="stylesheet" type="text/css" />
    
    <!-- Include JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    
    <!-- Custom JavaScript -->
    
  </head>
  
  <!-- Начало на body секция -->
    <!-- Начало на body секция -->
  
  <body>
    <div class="container">
      <header>
        <div class="header">
          
          <div class="login-header">
            <?php if (isset($_SESSION['user']) ): ?>
              <p>
                Здравейте, <?=$_SESSION['user']['firstname']." ".$_SESSION['user']['family'] ?> 
                &nbsp;|&nbsp;Профил:&nbsp;
                <a href="?page=edit-user">Редакция</a>
                &nbsp;|&nbsp;
                <a href="?page=delete-user">Изтриване</a>
                &nbsp;|&nbsp;
                <a href="?page=logout">Изход</a>
              </p>
            <?php endif; ?>
          </div>
          <h1>Прилепите в България</h1>
      
          <!-- begin: Главно меню -->
          <nav class="navbar navbar-expand-lg navbar-light bg-light">      
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Главно меню:</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarSupportedContent" 
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active"
                       aria-current="page" href="?page=home">Начало</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=myths">Митове и легенди</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=about">За нас</a>
                  </li>
                  <!-- 
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                      role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      За контакти
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  -->
                </ul>
                <form class="d-flex">
                  <input class="form-control me-2" type="search"
                         placeholder="Търси" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Търси</button>
                </form>
              </div>
            </div>
          </nav>
          <!-- end: Главно меню -->
        
        </div>
      </header>
