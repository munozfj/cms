
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">

    <!-- Header, Logo y Toggle -->
    <div class="navbar-header">
    
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="index.php"> <?php echo APPLICATION_SHORT_TITLE ?> </a>
    </div>

    <!-- Menu de opciones de la aplicación -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>

      <form role="search" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" placeholder="Search" class="form-control">
        </div>
      </form>

      <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Login</a></li>
      </ul>

    </div><!-- Fin menu de opciones-->


  </div><!-- /.container -->
</div><!-- /.navbar -->

    