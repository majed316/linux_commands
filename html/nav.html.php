<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header navbar-right">
        <a class="navbar-brand" href="#"><h3 style="display: inline">لينوكس باور</h3></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#links-navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-navbar" id="search-button">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-right" id="links-navbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">عن لينوكس<span class="sr-only">(current)</span></a></li>
        <li><a href="#">دروس الشل</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">مدونة لينوكس<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="pull-right"><a href="#">لينوكس++</a></li>
            <li class="pull-right"><a href="#">بدايات لينوكس</a></li>
            <li class="pull-right"><a href="#">لينوكس الخطوة2</a></li>
            <li class="divider pull-right"></li>
            <li class="divider pull-right"></li>
            <li class="pull-right"><a href="#">عن لينوكس++</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
    
    <div class="collapse navbar-collapse" id="search-navbar">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" id="box" onkeyup="getAjxaData()" class="form-control" placeholder="أبحث">
          <div id="result" class="well well-sm" style="display: none;"></div>
        </div>
        <!--- <button type="submit" class="btn btn-default">بحث</button> -->
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>