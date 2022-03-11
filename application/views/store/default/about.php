<section class="about-page">
  <div class="container">
     <div class="row">
	   <div class="col-12 col-md-12 col-lg-4 col-xl-6">
	   	<?php 
	   		$aboutimage = $store_setting['aboutimage'] ? base_url('assets/images/site/'. $store_setting['aboutimage']) : base_url('assets/store/default/img/about-img.png');
	   		?>

	     <img src="<?=$aboutimage;?>" class="img-fluid img-about-main mt-4" alt="<?= __('store.image') ?>">
	   </div>
	   <div class="col-12 col-md-12 col-lg-8 col-xl-6">
	      <div class="about-top-text">
		    <h2><?= __('store.about_us') ?></h2>
			<img src="<?= base_url('assets/store/default/'); ?>img/popline.png" class="cn-titlebar mx-0"  alt="<?= __('store.image') ?>">
			<?= !empty($store_setting['about_content']) ? $store_setting['about_content'] : __('store.about_us_if_not_exist'); ?>
			<a href="<?= $base_url ?>contact"><?= __('store.contact_us') ?></a>
		  </div>
	   </div>
	 </div> 
  </div>
</section>

<!-- <section class="about-stats">
  <div class="container">
     <h2>What is Lorem Ipsum?</h2>
     <div class="about-stats-row">
	    <div class="about-stats-box">
		
		   <div class="stats-box">
		      <div class="stats-img">
			     <img src="<?//= base_url('assets/store/default/'); ?>img/ab-stats2.png" alt="image">
			  </div>
			  <div class="stats-content">
			     <h3>Lorem Ipsum</h3>
				 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			  </div>			  
		   </div>
		   
		   <div class="stats-box">
		      <div class="stats-img">
			     <img src="<?//= base_url('assets/store/default/'); ?>img/ab-stats1.png" alt="image">
			  </div>
			  <div class="stats-content">
			     <h3>Lorem Ipsum</h3>
				 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			  </div>			  
		   </div>
		   
		   <div class="stats-box">
		      <div class="stats-img">
			     <img src="<?//= base_url('assets/store/default/'); ?>img/ab-stats.png" alt="image">
			  </div>
			  <div class="stats-content">
			     <h3>Lorem Ipsum</h3>
				 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			  </div>			  
		   </div>
		   
		</div>
	 </div>
  </div>
</section>

<section class="about-team">
   <div class="container">
      <h2>What is Lorem Ipsum?</h2>
	  <div class="team-row">
	  
	     <div class="team-col">
		    <img src="<?//= base_url('assets/store/default/'); ?>img/team1.png" alt="image">
			<h5>Metehan</h5>
			<p>CEO</p>
		 </div>
		 
		 <div class="team-col">
		    <img src="<?//= base_url('assets/store/default/'); ?>img/team2.png" alt="image">
			<h5>Natan</h5>
			<p>Founder</p>
		 </div>
		 
		 <div class="team-col">
		    <img src="<?//= base_url('assets/store/default/'); ?>img/team3.png" alt="image">
			<h5>Metehan</h5>
			<p>CEO</p>
		 </div>
		 
		 <div class="team-col">
		    <img src="<?//= base_url('assets/store/default/'); ?>img/team4.png" alt="image">
			<h5>Metehan</h5>
			<p>CEO</p>
		 </div>
		 
	  </div>
   </div>
</section> -->