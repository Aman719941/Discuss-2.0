<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="?logo=true"><img id="logo" src="./public/logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?home=true">Home</a>
        </li>

        <?php if (isset($_SESSION['user']['username'])) { ?> 
          <li class="nav-item">
            <a class="nav-link" href="./server/requests.php?logout=true">LogOut<?php echo"<b style='color: blue'> (".ucfirst($_SESSION['user']['username']).") </b>";?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?ask=true">Ask A Question</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link " href="?question=true">Question page</a>
          </li> -->
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?signup=true">Signup</a>
          </li>
        <?php } ?>
<!-- 
        <li class="nav-item">
          <a class="nav-link " href="?catagory=true">Catagory</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " href="?latest_questions=true">Latest Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="?about_me=true">About/Contact me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="?portfolio=true">My Portfolio site</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="?my_blog=true">My Blogging Site</a>
        </li>

      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search in the site" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>