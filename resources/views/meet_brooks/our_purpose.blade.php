@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/purpose.css">

<div class="brooksourpurpose">
<section id="top" class="meet">
	<p class="meet-title center">
			Our Purpose
	</p>
	<img class ="hidden-col hidden-tab visible-mob" id="header_small" src="/images/Meet-Brooks-Refresh/purpose_header_mobile.png" alt="We believe a run can change a day, a life, the world.">
	<img class="hidden-mob" id="header_large" src="/images/Meet-Brooks-Refresh/purpose_header.png" alt="We believe a run can change a day, a life, the world.">
</section>

<section id="purpose-video">
	<div class="wrapper">
	<div class="row">
	<div class="col-12 tab-12">
	<div class="component-content">
								<script>
									$(document).ready(function () {
										console.log('### START ###');
										console.log('### documen.ready() VideoPlayer View ###');
										window.br = {
											site: "br.com",
											property: "",
											videoContainer: "#benefits-video_",
											init: function () {
												console.log('init window.br.init fn')
											},
											end: function () {
												console.log('end window.br.end fn')
											},

											parseVideo: function (url) {
												url.match(/(http:\/\/|https:\/\/|)(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);
												var type = null;
												if (RegExp.$3.indexOf('youtu') > -1) {
													type = 'youtube';
												} else if (RegExp.$3.indexOf('vimeo') > -1) {
													type = 'vimeo';
												}
												return {
													type: type,
													id: RegExp.$6
												};
											},
											keyboardBtnClick: function (id) {
												br.videoContainer = "#benefits-video_" + id;
												// hide the overlay
												console.log('keyboardBtnClick click');
												// hide overlay div
												$('#m-block_' + id).addClass('hide');
												// hide image
												$("#isLoading_" + id).hide().addClass('hide');
												//play video
												$(br.videoContainer)[0].src += "&autoplay=1";
												//ev.preventDefault();;
												console.log('get video source');
												var src = $(br.videoContainer)[0].src;
												var sourceV = br.parseVideo(src);
												console.log(sourceV.type);
												console.log(sourceV.id);
												console.log('end video source');
											}
										}
										// init br class
										br.init();
										console.log('### END ###');
									});
								</script>
								<figure class="m-block--video-player m-block--flexible-module ratio-container ratio-container--benefits col-sm-2--site__wrapper col-md-4--site__wrapper col-10 no-float site__wrapper--margin" style="margin-bottom: 0;">
									<picture>
										<source media="(min-width: 549px)" srcset="/images/Meet-Brooks-Refresh/meet_video_still.jpg">
										<img alt="benefits" src="/images/Meet-Brooks-Refresh/meet_video_still_sm.png" data-loaded="true" class="isLoading loaded" id="isLoading_de1c1a0e-f52c-4410-a1c0-0a3a1d975f53">
									</picture>
									<noscript>
										<img src="/images/Meet-Brooks-Refresh/meet_video_still.jpg" />
									</noscript>
									<div class="m-block--video-player--overlay" id="m-block_de1c1a0e-f52c-4410-a1c0-0a3a1d975f53">
										<div class="play__btn x-small--bold">
											<svg class="icon icon-video-play" id="icon-video-play-svg" onclick="br.keyboardBtnClick('de1c1a0e-f52c-4410-a1c0-0a3a1d975f53')">
												<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-video-play">
													<symbol id="icon-video-play" viewBox="0 0 32 32">
														<title>video-play</title>
														<path fill="" style="" d="M31.549 16.045c0 8.712-7.063 15.775-15.775 15.775s-15.775-7.063-15.775-15.775c0-8.712 7.063-15.775 15.775-15.775s15.775 7.063 15.775 15.775z"></path>
														<path fill="#fff" style="" d="M13.564 11.707c0-0.496 0.328-0.663 0.731-0.375l5.745 4.113c0.404 0.289 0.402 0.758 0 1.046l-5.745 4.113c-0.404 0.289-0.731 0.119-0.731-0.375v-8.524z"></path>
													</symbol>
												</use>
											</svg>
										</div>
										<div class="m-block--video-player__video--overlay">
											<svg class="icon icon-video-pause"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-video-pause"></use></svg>
										</div>
										<div class="m-block--video-player--overlay__meta site__wrapper--padding">
											<span class="medium black"></span>
											<span class="type black"></span>
										</div>
									</div>
									<figure class="m-block--video-player m-block--flexible-module ratio-container ratio-container--benefits col-sm-2--site__wrapper col-md-4--site__wrapper col-10 no-float site__wrapper--margin" style="margin-bottom: 0;">
										<iframe id="benefits-video_de1c1a0e-f52c-4410-a1c0-0a3a1d975f53" allow="autoplay; encrypted-media" class="product-container__video-youtube" data-id="dLnuE7m62U0" src="https://www.youtube.com/embed/WNjZp6HVsIg?rel=0&amp;amp;controls=0&amp;amp;showinfo=0&quot; frameborder=&quot;0&quot; allow=&quot;autoplay; &amp;enablejsapi=1&amp;origin=https%3A%2F%2Fwww.brooksrunning.com" frameborder="0" data-aspectratio="0.562494938735338" data-gtm-yt-inspected-2174125_976="true"></iframe>
									</figure>
								</figure>

								<!-- DEBUG VIEW -->
								<section class="br-video-player-data-container red hide">
									<div> TBN Desktop: https://content.brooksrunning.com:443/-/media/Project/Brooks-Running/Content/Evergreen/Meet-Brooks-Refresh/meet_video_still.jpg</div>
								<div> TBN Mobile : https://content.brooksrunning.com:443/-/media/Project/Brooks-Running/Content/Evergreen/Meet-Brooks-Refresh/meet_video_still_sm.png</div>
								<div> Video : https://www.youtube.com/embed/WNjZp6HVsIg?rel=0&amp;amp;controls=0&amp;amp;showinfo=0" frameborder="0" allow="autoplay; </div>
								<div> Title : </div>
								<div> Subtitle : </div>
								<div> Font Color : black</div>
								</section>
								<!-- DEBUG VIEW -->
							</div>
	</div>
	</div>
	</div>
</section>

<section id="the-run">
			<img src="/images/Meet-Brooks-Refresh/MeetBrooks_mobile_595x1200_1.jpg" alt="">
				<div class="section_block _top">
					<p class="large center subhed--center subhed--wide">
							We live by the following:
					</p>
			<br/>
					<div class="center meet">
							<p class="timeline-date center large">1</p>
					</div>
					<p class="large center subhed subhed--wide">
							Running is a gift. Run happy.
					</p>
					<p class="center graf">
							Every day with a run is better. Every run brings you closer to your best self. And you end every run in
							a better place than you started.
					</p>
				</div>
</section>

<section id="one-thing" class="meet">
	<div class="center meet">
	<p class="timeline-date center large" style="color: #ffffff;">2</p>
	</div>
	<p class="large center subhed subhed--white subhed--wide">
			We do one thing: build great running gear.
	</p>
	<p class="center graf graf--white">
			When you focus on what you do best, you do it better. Our goal is to make each run better than the
			last. This guides every engineering choice we make.
	</p>
</section>

<section id="third-sect">
	<img id="runners" src="/images/Meet-Brooks-Refresh/3_purpose_mobile.png" alt="Two females training at a Brooks event">
	<div class="section_block">
			<div class="center meet">
					<p class="timeline-date timeline-date--white center large">3</p>
			</div>
			<p class="large center subhed subhed--wide subhed--white">
					We're obsessed with the body in motion.
			</p>
			<p class="center graf graf--white">
					We engineer our gear in the lab, but we bring it to life on the unique, real-world humans who will
					wear it. This is the result of tireless biomechanical research with runners of every size, strength
					and experience. But most of all, it’s the result of listening.
			</p>
	</div>
</section>

<section id="sweat">
	<img src="/images/Meet-Brooks-Refresh/MeetBrooks_mobile_595x1200_3.jpg" alt="">
		<div class="sweat-text">
				<div class="center meet">
						<p class="timeline-date timeline-date--white center large">4</p>
				</div>
				<p class="large center subhed subhed--white">
						We sweat every detail.
				</p>
				<p class="center _left graf graf--white">
						Our process is simple: create solutions for runners, test them over miles, assess feedback and
						repeat. Every groove in the soles of your shoes, every inch of fabric in your gear and every single
						stitch has a reason to exist. If it doesn’t improve your run, you won’t see it in our gear.
				</p>
		</div>
</section>

<section id="community">
	<img src="/images/Meet-Brooks-Refresh/MeetBrooks_mobile_595x1200_4.jpg" alt="">
		<div class="section_block mid">
				<div class="center meet">
						<p class="timeline-date timeline-date--white center large">5</p>
				</div>
				<p class="large center subhed subhed--wide subhed--white">
						The planet is our home.
				</p>
				<p class="center graf graf--white">
						More than 100 million people run outside, so it’s critical we care for the world we share. That
						means working to minimize our environmental impact, creating positive social impact, and being
						transparent about areas where we can do better. All the while, we give back and lift causes that
						get people moving.
				</p>
		</div>
</section>

<section id="we-run">
	<img src="/images/Meet-Brooks-Refresh/MeetBrooks_mobile_595x1200_5.jpg" alt="">
	<div class="section_block">
		<div class="center meet">
				<p class="timeline-date center large">6</p>
		</div>
		<p class="large center subhed">
				We're runners, too.
		</p>
		<p class="center graf">
				This is as much for us as it is for you. Our offices have locker rooms. We run at lunch. In between
				meetings. Pretty much anytime we can. Put simply, we make the best running gear on the planet because
				we want to go running in it.
		</p>
	</div>
</section>

<section id="message" class="meet">
	<p class="medium center graf">
			Welcome to Brooks
	</p>
	<p class="graf graf--center">
			Running: put one foot in front of the other and then repeat! At Brooks, we’re passionate about our
			daily run.
	</p>
	<p class="graf graf--center">
			Running is primal; we were all born to run. It is the most inclusive sport the world has ever known.
	</p>
	<p class="graf graf--center">
			We think about our first toddling steps as a kids – free, joyous, fun. Years later we live for that
			feeling, and on a great day, running still delivers it.
	</p>
	<p class="graf graf--center">
			We are fortunate, because since 2001, we’ve been able to focus exclusively on the pursuit we love more
			than any other. We challenge ourselves to make the best running gear in the world because we want to
			run in it, too.
	</p>
	<p class="graf graf--center">
			Our brand aspires to reflect the truth in running. Technology is only valid when it helps you run.
			Customization is only worthwhile if it improves function before form. Narratives are only useful when
			they connect with you and inspire you.
	</p>
	<p class="graf graf--center">
			The proof is in the run, not marketing speak. When we deliver on our promises, you have a better run.
	</p>
	<p class="graf graf--center">
			Let’s celebrate together the transformative power of the run. And let’s shine a spotlight on those who
			inspire us not just to run, but to be better people as a result.
	</p>
	<p class="graf graf--center">
			Run Happy!
	</p>
	<div class="center meet">
			<img class="center" src="/images/Meet-Brooks-Refresh/signature.png" alt="Jim Weber, Brooks Running CEO signature">
	</div>
	<p class="center graf">Jim Weber, Brooks Running CEO</p>
</section>

<section id="links" class="meet">
	<p class="medium center subhed subhed--large">
			Get to know us better
	</p>
	<p class="graf center graf--wide">
			We're proud of who we are and where we come from. Read on to learn more.
	</p>
	<div class="bottom-links center">
			
			<div class="center bottom-link">
					<a href="/meet_brooks/our_history/" class="a-text-btn a-text-btn--secondary small--bold">Our History
					<img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
			</div>
	</div>
</section>

</div>

@endsection