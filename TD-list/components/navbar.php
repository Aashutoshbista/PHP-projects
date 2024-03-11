<?php include"../headerfooter/header.php"?>
<nav class="navbar navbar-expand-lg navbar-light  navbartop">
  <div class="container-fluid">
    <a class="navbar-brand hea" href="#">TD-list</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active navlink" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle navlink" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           list
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="./complete.php">Complete</a></li>
            <li><a class="dropdown-item" href="#">Progress</a></li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active navlink" aria-current="page" href="../logout/logout.php">LogOut</a>

        </li>
        <li>

        </li>
      </ul>
    </div>
  </div>
</nav>