<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title><?=$this->e($title)?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        /*padding-top: 5rem;*/
        text-align: center;
      }
      .starter-template {
        padding: 3rem 1rem;
        text-align: center;
      }
      .fixed-top {
        position: relative;
      }
      .bg-dark {
        border-radius: 0 0 10px 10px;
      }
      .dropdown-menu {
        right: 0;
        left: auto;
        background: #343a40;
      }
      .dropdown-item {
        color: #9b9b9b;
      }
      .dropdown-item:focus, .dropdown-item:hover {
        color: #16181b;
        background-color: #aeaeae;
      }
    </style>
  </head>

  <body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="/">Marlin Academy</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contacts">Contacts <span class="sr-only">(current)</span></a>
              </li>                         
            </ul>

            <form class="form-inline my-2 my-lg-0 mr-auto">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
              <?php if($this->e($username) != NULL ): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$this->e($username)?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">My profile</a>
                    <a class="dropdown-item" href="/logout">Log out</a>
                  </div>
                </li>
            <?php else: ?>  
              <li class="nav-item">
                <a class="nav-link" href="/signup">Sign up</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="/signin">Sign in</a>
              </li> 
            <?php endif ?>
            </ul>
          </div>
        </nav>

      <main role="main">
        <div class="starter-template">
          <?=$this->section('content')?>
        </div>  
      </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>