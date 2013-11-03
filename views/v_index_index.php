<!-- Carousel 
================================================== -->
<div class="item active">
  <img src="/images/sign.jpg" data-src="/images/sign.jpg" alt="Cup of Joe" width="900px" height="600px">
  <div class="container">
    <!-- <div class="carousel-caption-background"> -->
            <div class="carousel-caption">
              <h1>Breakfast table talk.</h1>
              <p>What'd you eat for breakfast? Tell all, show all.</p>
              <p><a class="btn btn-large btn-primary" href="/users/signup">Sign up today</a></p>
            </div>
        <!-- </div> -->
  </div>
</div>

<div id="myCarousel" class="carousel slide">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
<div class="item active">
  <img src="/images/sign.jpg" data-src="/images/sign.jpg" alt="Cup of Joe">
  <div class="container">
    <!-- <div class="carousel-caption-background"> -->
            <div class="carousel-caption">
              <h1>Breakfast table talk.</h1>
              <p>What'd you eat for breakfast? Tell all, show all.</p>
              <p><a class="btn btn-large btn-primary" href="/users/signup">Sign up today</a></p>
            </div>
        <!-- </div> -->
  </div>
</div>
<div class="item">
  <img src="/images/utensils.jpg" data-src="/images/utensils.jpg" alt="Menu sign">
  <div class="container">
    <div class="carousel-caption">
      <h1>Share breakfast stories.</h1>
      <p>Snap a photo, write a blurb.</p>
      <p><a class="btn btn-large btn-primary" href="#">Learn more</a></p>
    </div>
  </div>
</div>
<div class="item">
  <img src="/images/mug.jpg" data-src="/images/mug.jpg" alt="Third slide">
  <div class="container">
    <div class="carousel-caption">
      <h1>One more for good measure.</h1>
      <p>More text here.</p>
      <p><a class="btn btn-large btn-primary" href="#">Browse gallery</a></p>
    </div>
  </div>
</div>
</div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/png;base64," data-src="holder.js/140x140" alt="Generic placeholder image">
          	<h2>
	          	<?php if($user): ?>
	        		Hello <?=$user->first_name;?>
				<?php else: ?>
		        		Welcome Stranger!
				<?php endif; ?>
			</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Welcome to FriedEggs! <span class="text-muted">Start sharing your mornings.</span></h2>
          <p class="lead">You know what they say about breakfast: it's the most important meal of the day.  So what did you eat for breakfast?  Log in, upload a photo, or</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="data:image/png;base64," data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Mash, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->