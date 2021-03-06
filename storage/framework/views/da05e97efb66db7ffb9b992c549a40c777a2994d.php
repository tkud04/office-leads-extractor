<?php
$title = $apartment['name'];
$subtitle = "View this apartment";

$host = $apartment['host'];
$hostName = $host['fname']." ".substr($host['lname'],0,1);
$himg = $host['avatar'] == ""  ? asset("img/avatar.png") : $host['avatar'][0];
$img = asset("img/avatar.png");
$uid = "";
$hostNum = "Send ".$host['fname']." a message to book this apartment.";
$myName = ""; $myEmail = ""; $xf = "";

if($user != null)
{
	$myName = $user->fname." ".$user->lname;
	$myEmail = $user->email;
	$uid = $user->id;
	$xf = $uid;
	$img = $user['avatar'] == ""  ? asset("img/avatar.png") : $user['avatar'][0];
}

$terms = $apartment['terms'];
$adata = $apartment['data'];
$address = $apartment['address'];
$location = $address['city'].", ".$address['state'];
$stars = $apartment['rating'];
$reviews = $apartment['reviews'];
$facilities = $apartment['facilities'];
$cmedia = $apartment['cmedia'];
$media = $apartment['media'];
$rawImgs = $media['images'];
$imgs = $cmedia['images'];
$video = $cmedia['video'];

$as = $apartment['avb'];
$asText = $as == "available" ? "Available for booking" : "Apartment is currently occupied";

?>



<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('top-header'); ?>
<?php echo $__env->make('top-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<script>
let sec = 0, svc = 0, loc = 0, cln = 0, cmf = 0;


</script>

<!-- ============================ Hero Banner  Start================================== -->
			<div class="featured-slick">
				<div class="featured-slick-slide">
				<?php
				 foreach($imgs as $img)
				 {
				?>
					<div>
					  <a href="<?php echo e($img); ?>" class="mfp-gallery">
					    <img src="<?php echo e($img); ?>" class="img-fluid mx-auto" alt="" />
					  </a>
					</div>
				<?php
				 }
				?>
				</div>
			</div>
			
			<section class="spd-wrap">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-12 col-md-12">
						
							<div class="slide-property-detail">
								
								<div class="slide-property-first">
									<div class="row">
										<div class="col-lg-8 col-md-8">
											<div class="row">
											
												<!-- Single Items -->
												<div class="col-xs-6 col-lg-4 col-md-6">
													<div class="singles_item">
														<div class="icon">
															<i class="icofont-home"></i>
														</div>
														<div class="info">
															<h4 class="name"><?php echo e(ucwords($as)); ?></h4>
															<p class="value"><?php echo e($asText); ?></p>
														</div>
													</div>
												</div>
												
												<!-- Single Items -->
												<div class="col-xs-6 col-lg-3 col-md-6">
													<div class="singles_item">
														<div class="icon">
															<i class="icofont-credit-card"></i>
														</div>
														<div class="info">
															<h4 class="name">&#8358;<?php echo e(number_format($adata['amount'],2)); ?> </h4>
															<p class="value">per night</p>
														</div>
													</div>
												</div>
												
												<!-- Single Items -->
												<div class="col-xs-6 col-lg-2 col-md-6">
													<div class="singles_item">
														<div class="icon">
															<i class="icofont-travelling"></i>
														</div>
														<div class="info">
															<h4 class="name"><?php echo e($adata['max_adults']); ?></h4>
															<p class="value">Max. adults</p>
														</div>
													</div>
												</div>
												
												<!-- Single Items -->
												<div class="col-xs-6 col-lg-3 col-md-6">
													<div class="singles_item">
														<div class="icon">
															<i class="icofont-island"></i>
														</div>
														<div class="info">
															<h4 class="name"><em>[Address hidden]</em></h4>
															<p class="value"><?php echo e($address['city'].", ".$address['state']); ?></p>
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Hero Banner End ================================== -->


            	<!-- ============================ Property Detail Start ================================== -->
			<section class="gray pt-5">
				<div class="container">
					<div class="row">
						
						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12 order-lg-1 order-md-2 order-2">
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Description</h4>
								</div>
								
								<div class="block-body">
								<?php echo $adata['description']; ?>

								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								<?php
								 $svu = url('save-apartment')."?xf=".$apartment['id'];
								?>
								<div class="block-header">
									<h4 class="block-title">Quick links</h4>
								</div>
								
								<div class="block-body">
								<?php if($isSaved): ?>
								 <h4>You've already saved this apartment.</h4>
							    <?php else: ?>
								<a href="<?php echo e($svu); ?>" class="btn btn-theme">Save this apartment</a>
							    <?php endif; ?>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Facilities</h4>
								</div>
								
								<div class="block-body">
									<ul class="avl-features third">
									<?php
											        foreach($facilities as $f)
													{
														$facility = $f['facility'];
														
														foreach($services as $s)
														{
									                      if($s['tag'] == $facility)
														  {															  
														
					                 ?>
										<li><?php echo e($s['name']); ?></li>
									<?php
														  }
														}
													}
									?>
									</ul>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h3 class="block-title">Useful Tips</h3>
								</div>
								
								<div class="block-body">
									<ul class="qa-skill-list">
										<?php
										 foreach($tips as $tip)
								  {
										?>
										<!-- Single List -->
										<li>
											<div class="qa-skill-box">
												<h4 class="qa-skill-title"><?php echo e($tip['title']); ?></h4>
												<div class="qa-content">
													<p><?php echo e($tip['msg']); ?></p>
												</div>
											</div>
										</li>
										<?php
										}
										?>

									</ul>
								</div>
								
							</div>
							
							<!-- Review Block Wrap -->
							<div class="rating-overview">
								<div class="rating-overview-box">
									<span class="rating-overview-box-total"><?php echo e($stars); ?></span>
									<span class="rating-overview-box-percent">out of 5</span>
									<div class="star-rating" data-rating="5">
									 <?php for($i = 0; $i < floor($stars); $i++): ?>
									  <i class="ti-star"></i>
									 <?php endfor; ?>
									</div>
								</div>

								<div class="rating-bars">
								<?php
								$ratingColors = ['high' => "4",'mid' => "3",'low' => "2.1",'poor' => "2",];
								$rr = [
								  ['name' => "Service",'value' => "0"],
								  ['name' => "Security",'value' => "0"],
								  ['name' => "Location",'value' => "0"],
								  ['name' => "Cleanliness",'value' => "0"],
								  ['name' => "Comfort",'value' => "0"],
								];
								$reviewsLength = count($reviews);
								
								if($reviewsLength > 0)
								{
									$service = 0; $security = 0; $location = 0; $cleanliness = 0; $comfort = 0;
									
									foreach($reviews as $r)
									{
										$service += $r['service'];
										$security += $r['security'];
										$location += $r['location'];
										$cleanliness += $r['cleanliness'];
										$comfort += $r['comfort'];
									}
									
									$rr = [
								      ['name' => "Service",'value' => $service / $reviewsLength],
								      ['name' => "Security",'value' => $security / $reviewsLength],
								      ['name' => "Location",'value' => $location / $reviewsLength],
								      ['name' => "Cleanliness",'value' => $cleanliness / $reviewsLength],
								      ['name' => "Comfort",'value' => $comfort / $reviewsLength],
								   ];
								}
								 foreach($rr as $r)
								 {
									 $rc = "poor";
									 $n = $r['name']; $v = $r['value'];
									 
									 if($v > 2 && $v <= 2.9)
									 {
										 $rc = "low";
									 }
									 elseif($v > 3 && $v <= 3.9)
									 {
										 $rc = "mid";
									 }
									 elseif($v > 3.9)
									 {
										 $rc = "high";
									 }
								?>
										<div class="rating-bars-item">
											<span class="rating-bars-name"><?php echo e(ucwords($n)); ?></span>
											<span class="rating-bars-inner">
												<span class="rating-bars-rating <?php echo e($rc); ?>" data-rating="<?php echo e($v); ?>">
													<span class="rating-bars-rating-inner" style="width: <?php echo e($v * 20); ?>%;"></span>
												</span>
												<strong><?php echo e($v); ?></strong>
											</span>
										</div>
								<?php
								}
								?>
										
								</div>
							</div>
							
							<!-- Reviews Comments -->
							<div class="list-single-main-item fl-wrap">
								<div class="list-single-main-item-title fl-wrap">
									<h3>Item Reviews -  <span> <?php echo e($reviewsLength); ?> </span></h3>
								</div>
								
								<?php if($reviewsLength > 0): ?>
								<div class="reviews-comments-wrap">
							       <?php
								   
								    foreach($reviews as $r)
									{
										 $stats = $r['stats'];
										$u = $r['user'];
										$rxf = $r['id'];
										$ru = $u['id'] == $uid ? "You" : $u['fname']." ".substr($u['lname'],0,1).". ";
										$av = $u['avatar'] == ""  ? asset("img/avatar.png") : $u['avatar'][0];
								   ?>
									<!-- reviews-comments-item -->  
									<div class="reviews-comments-item">
										<div class="review-comments-avatar">
											<img src="<?php echo e($av); ?>" class="img-fluid" alt=""> 
										</div>
										<div class="reviews-comments-item-text">
											<h4><a href="javascript:void(0)"><?php echo e($ru); ?></a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i><?php echo e($r['date']); ?></span></h4>
											
											<div class="listing-rating high" data-starrating2="5">
											  <?php
											  for($i = 0; $i < $stars; $i++)
											   {
											  ?>
											  <i class="ti-star active"></i>
											  <?php
											   }
											  ?>
											  <span class="review-count"><?php echo e($stars); ?></span> 
											 </div>
											<div class="clearfix"></div>
											<p>" <?php echo e($r['comment']); ?> "</p>
											<div class="pull-left reviews-reaction">
												<a href="javascript:void(0)" class="comment-like active" onclick="voteReview({r: '<?php echo e($rxf); ?>', xf: '<?php echo e($xf); ?>', type: 'up'})"><i class="ti-thumb-up"></i> <span id="apartment-upvotes"><?php echo e($stats['upvotes']); ?></span></a>
												<a href="javascript:void(0)" class="comment-dislike active" onclick="voteReview({r: '<?php echo e($rxf); ?>', xf: '<?php echo e($xf); ?>', type: 'down'})"><i class="ti-thumb-down"></i> <span id="apartment-downvotes"><?php echo e($stats['downvotes']); ?></span></a>
												<a id="review-<?php echo e($rxf); ?>-loading" class="review-loading"><img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></a>
											</div>
										</div>
									</div>
									<!--reviews-comments-item end-->  
									<?php
									}
									?>
									
								</div>
								<?php else: ?>
								<div>
								  <h4>Be the first to rate this apartment! <a href="javascript:void(0)" id="apartment-add-first-review-btn" class="btn btn-theme">Add review</a></h4>
								</div>
								<?php endif; ?>
							</div>
							
							<!-- Add Review Wrap -->
							<div class="block-wrap" id="apartment-add-review">
							 <form method="post" action="add-review" id="apartment-add-review-form">
							   <?php echo csrf_field(); ?>

							   <input type="hidden" name="apt-id" value="<?php echo e($apartment['apartment_id']); ?>">
							   <input type="hidden" name="axf" value="<?php echo e($apartment['url']); ?>">
							   
								<?php
								$ars = [
								  ['name' => "Service",'id' => "svc"],
								  ['name' => "Security",'id' => "sec"],
								  ['name' => "Location",'id' => "loc"],
								  ['name' => "Cleanliness",'id' => "cln"],
								  ['name' => "Comfort",'id' => "cmf"],
								];
								?>
								
							   <input type="hidden" id="apartment-add-review-svc" name="service" value="0">
							   <input type="hidden" id="apartment-add-review-sec" name="security" value="0">
							   <input type="hidden" id="apartment-add-review-loc" name="location" value="0">
							   <input type="hidden" id="apartment-add-review-cln" name="cleanliness" value="0">
							   <input type="hidden" id="apartment-add-review-cmf" name="comfort" value="0">
								
								<div class="block-header">
									<h4 class="block-title">Add Review</h4>
								</div>
								
								<div class="block-body">
								
									<div class="giv-averg-rate">
										<div class="row">
											<div class="col-lg-8 col-md-8 col-sm-12">
												<div class="row">
												   <?php
												    foreach($ars as $a)
													{
												   ?>
													<div class="col-lg-6 col-md-6 col-sm-12">
														<label><?php echo e(ucwords($a['name'])); ?>?</label>
														<div class="rate-stars">
														    <?php for($i = 5; $i > 0; $i--): ?>
															<input type="checkbox" id="<?php echo e($a['id']); ?>-<?php echo e($i); ?>" onclick="setUserRating({r:'<?php echo e($a['id']); ?>',v:'<?php echo e($i); ?>'})" value="<?php echo e($i); ?>" />
															<label for="<?php echo e($a['id']); ?>-<?php echo e($i); ?>"></label>
															<?php endfor; ?>
															
														</div>
													</div>
													<?php
													}
													?>
												</div>
											</div>
											
											<div class="col-lg-4 col-md-4 col-sm-12">
												<div class="avg-total-pilx">
													<h4 class="high"><?php echo e($stars); ?></h4>
													<span>Average Rating</span>
												</div>
											</div>
										</div>
									</div>
									
									<div class="review-form-box form-submit">
										<form>
											<div class="row">

												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<label>Review</label>
														<textarea class="form-control ht-140" name="msg" id="apartment-add-review-msg" placeholder="Review"></textarea>
													</div>
												</div>
												
												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="form-group">
														<button class="btn btn-theme" id="apartment-add-review-btn">Submit Review</button>
													</div>
												</div>
												
											</div>
										</form>
									</div>
									
								</div>
								</form>
							</div>
							
						</div>
						
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12 order-lg-2 order-md-1 order-1">
							
							<div class="side-booking-wraps ">
								<div class="side-booking-wrap hotel-booking">
						         <form method="get" id="add-to-cart-form" action="<?php echo e(url('add-to-cart')); ?>">
								    <input type="hidden" name="axf" value="<?php echo e($apartment['id']); ?>"/>
									 <div class="side-booking-header light">
										<div class="author-with-rate">
											<div class="head-author">
												<div class="hau-thumb">
													<img src="<?php echo e($imgs[0]); ?>" alt="" style="width=100px; height: 100px;" />
												</div>
												<h4 class="head-list-titleup"><?php echo e($apartment['name']); ?></h4>
												<span><i class="ti-location-pin"></i><?php echo e($location); ?></span>
											</div>
											<div class="head-ratting">
												<div class="ht-star">
												    <?php for($i = 0; $i < $stars; $i++): ?>
													<i class="fa fa-star filled"></i>
												    <?php endfor; ?>
										            <?php for($i = 0; $i < 5 - $stars; $i++): ?>									
													<i class="fa fa-star"></i>
												    <?php endfor; ?>
													<span><?php echo e(count($reviews)); ?> Reviews</span>
												</div>
											</div>
										</div>
									</div>
									
									<div class="side-booking-body">
									<?php
									$checkin = date("m/d/Y");
									$cd = new DateTime($checkin);
                                    $cd->add(new DateInterval('P1D'));
                                    $checkout = $cd->format("m/d/Y");
									?>
										<div class="row mb-4">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Check In</label>
													<div class="cld-box">
														<i class="ti-calendar"></i>
														<input type="text" name="checkin" id="apartment-checkin" class="form-control" value="<?php echo e($checkin); ?>" />
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Check Out</label>
													<div class="cld-box">
														<i class="ti-calendar"></i>
														<input type="text" name="checkout" id="apartment-checkout" class="form-control" value="<?php echo e($checkout); ?>" />
													</div>
												</div>
											</div>
										</div>
									
										<!-- Single Row Booking -->
										<div class="single-row-booking">
											<span class="onsale-section blacks"><span class="onsale">Guests<small></small></span></span>
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 small-spilx">
													<h4 class="booking-title">How many are you?</h4>
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6 col-6 small-spilx">
													<div class="form-group">
														<div class="guests">
															<div class="advance-bboking">
															
																<div class="guest-type">
																	<h5>Adults</h5>
																	<span><?php echo e($adata['max_adults']); ?> max.</span>
																</div>
																
																<div class="guests-box">
																	  <button class="counter-btn" type="button" id="cnt-down"><i class="ti-minus"></i></button>
																	  <input type="text" id="guestNo" name="guests" value="2" max="<?php echo e($adata['max_children']); ?>"/>
																	  <button class="counter-btn" type="button" id="cnt-up"><i class="ti-plus"></i></button>
																</div>
																
															</div>
														</div>
													</div>
												</div>

												<div class="col-lg-6 col-md-6 col-sm-6 col-6 small-spilx brl">
													<div class="form-group">
														<div class="guests">
															<div class="advance-bboking">
															
																<div class="guest-type">
																	<h5>Child</h5>
																	<span><?php echo e($adata['max_children']); ?> max.</span>
																</div>
																
																<div class="guests-box">
																	<button class="counter-btn" type="button" id="kcnt-down"><i class="ti-minus"></i></button>
																	<input type="text" id="kidsNo" name="kids" value="0" max="<?php echo e($adata['max_children']); ?>"/>
																	<button class="counter-btn" type="button" id="kcnt-up"><i class="ti-plus"></i></button>
																</div>
																
															</div>
														</div>
													</div>
												</div>
											</div>
											
										</div>
										<!-- Single Row Booking -->
										
										
									</div>
									
									<div class="side-booking-footer light">
										<div class="stbooking-footer-top">
											<div class="stbooking-left">
												<h5 class="st-subtitle">Subtotal:</h5>
												<span>Expected Tax</span>
											</div>
											<h4 class="stbooking-title" id="checkout-total">&#8358;<?php echo e(number_format($adata['amount'],2)); ?></h4>
										</div>
										<div class="stbooking-footer-bottom">
											<a href="javascript:void(0)" id="apartment-hostchat-btn" class="books-btn btn-theme">Chat with host</a>
											<a href="javascript:void(0)" id="apartment-book-now-btn" class="books-btn black">Add to cart</a>
										</div>
									</div>
								  </form>
								</div>
							</div>
							
							<div class="page-sidebar" id="apartment-hostchat">
							
								<!-- Agent Detail -->
								<div class="agent-widget">
								   <input type="hidden" id="tk-apt-chat" value="<?php echo e(csrf_token()); ?>"/>
								   <input type="hidden" id="apt-id" value="<?php echo e($apartment['apartment_id']); ?>"/>
								   <input type="hidden" id="apt-gxf" value="<?php echo e($uid); ?>"/>
								   <input type="hidden" id="apt-gsb" value="<?php echo e($uid); ?>"/>
									<div class="agent-title">
										<div class="agent-photo"><img src="assets/img/user-3.jpg" alt=""></div>
										<div class="agent-details">
											<h4><a href="javascript:void(0)"><?php echo e($hostName); ?></a></h4>
											<span><i class="ti-mobile"></i><?php echo e($hostNum); ?></span>
										</div>
										<div class="clearfix"></div>
									</div>

									<div class="form-group">
										<label>Full Name</label>
										<input type="text" class="form-control" id="apt-message-name" value="<?php echo e($myName); ?>" placeholder="Your Name">
									</div>
									<div class="form-group">
										<label>Your Email</label>
										<input type="text" class="form-control" id="apt-message-email" value="<?php echo e($myEmail); ?>" placeholder="Your Email">
									</div>
									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control" id="apt-chat-msg" placeholder="Send a message to <?php echo e($host['fname']); ?>..."></textarea>
									</div>
									<button class="btn btn-theme full-width" id="apt-chat-btn">Send</button>
									<h4 class="text-primary" id="apt-chat-loading">Sending.. <img alt="Loading.." src="<?php echo e(asset('img/loading.gif')); ?>"></h4>
									<h4 class="text-primary" id="apt-chat-finish"><b>Message sent!</b></h4>
								</div>
								
								<!-- Statics Info -->
								<div class="tr-single-box">
									<div class="tr-single-header">
										<h4><i class="ti-bar-chart"></i> Stats</h4>
									</div>
									
									<div class="tr-single-body">
										<ul class="extra-service half">
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-star"></i>
														</div>
														<div class="icon-box-text">
															4.5 Rating
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-bookmark"></i>
														</div>
														<div class="icon-box-text">
															20 Bookmarked
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-eye"></i>
														</div>
														<div class="icon-box-text">
															785 Views
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-share"></i>
														</div>
														<div class="icon-box-text">
															110 Shared
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-comment-alt"></i>
														</div>
														<div class="icon-box-text">
															22 comments
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-heart"></i>
														</div>
														<div class="icon-box-text">
															20 Likes
														</div>
													</a>
												</div>
											</li>
											
										</ul>
									</div>
									
								</div>
								
								<!-- Business Info -->
								<div class="tr-single-box">
									<div class="tr-single-header">
										<h4><i class="ti-direction"></i>Landmarks/Interesting Places</h4>
									</div>
									
									<div class="tr-single-body">
										<ul class="extra-service">
										   <?php
										    for($i = 0; $i < 5; $i++)
											{
										   ?>
											<li>
												<div class="icon-box-icon-block">
													<a href="javascript:void(0)">
														<div class="icon-box-round">
															<i class="lni-map-marker"></i>
														</div>
														<div class="icon-box-text">
															Landmark <?php echo e($i + 1); ?>

														</div>
													</a>
												</div>
											</li>
											<?php
											}
											?>
											
										</ul>
									</div>
									
								</div>
						
								<!-- Tags -->
								<div class="tr-single-box">
									<div class="tr-single-header">
										<h4><i class="lni-tag"></i> Tags</h4>
									</div>
									
									<div class="tr-single-body">
										<ul class="extra-service half">
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="lni-car-alt"></i>
														</div>
														<div class="icon-box-text">
															Car Parking
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="lni-signal"></i>
														</div>
														<div class="icon-box-text">
															Wifi
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="lni-emoji-happy"></i>
														</div>
														<div class="icon-box-text">
															Wait Staff
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="lni-wheelchair"></i>
														</div>
														<div class="icon-box-text">
															Wheelchair
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="lni-music"></i>
														</div>
														<div class="icon-box-text">
															Music & Bar
														</div>
													</a>
												</div>
											</li>
											
											<li>
												<div class="icon-box-icon-block">
													<a href="#">
														<div class="icon-box-round">
															<i class="ti-widget"></i>
														</div>
														<div class="icon-box-text">
															Swimming
														</div>
													</a>
												</div>
											</li>
											
										</ul>
									</div>
									
								</div>								
							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Property Detail End ================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\etuk-web\resources\views/apartment.blade.php ENDPATH**/ ?>