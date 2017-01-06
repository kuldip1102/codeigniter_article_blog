<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?= anchor('user', 'Article', ['class'=>'navbar-brand']); ?>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?= form_open('user/search',['class'=>'navbar-form navbar-left','role'=>'search']); ?>
        <div class="form-group">  
          <input type="text" name="query" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      <?= form_close(); ?>
      <?= form_error('query',"<p class='navbar-text'>","</p>"); ?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
      </ul>
    </div>
  </div>
</nav>