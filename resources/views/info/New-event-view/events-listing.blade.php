@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/main.css">
<style>
  @media only screen and (min-device-width: 480px) 
                   and (max-device-width: 640px) 
                   and (orientation: landscape) {

.visible-mob-landscape{
        display:block !important;
    }
} 
@media only screen and (max-width: 767px) {
    .visible-mob-landscape{
        display:block !important;
    }
    .more-color--container-landscape{
        display:none !important;
    }
}
    </style>
<div class="create-account--header plp-header category__hero">
 
        <div class="row">
            <div class="m-block--hero m-block--hero--basic--collection mob-12 col-6 tab-12">
                <div class="m-block--hero--collection__content">
                    <div class="m-block--hero__content__copy">
                    <div class="about-header">
                        <div class="breadcrumbs">
                                    <ul>
                                        <li>
                                            <a href="/">Home</a>
                                        </li>
                                        <li>
                                            <a href="JavaScript:Void(0);" class="active">Abstract Collection Adrenaline &amp; Ghost</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <h1 class="large">Abstract Collection Adrenaline &amp; Ghost</h1>
                       
                        <p class="type">Shop the limited-release Adrenaline GTS 19 and Ghost 11</p>
                    </div>
                </div>
                <div class="collection-hero-overlay hidden-mob"></div>
            </div>
            <div class="category__hero__image mob-12 col-6 tab-12 pr-0 pl-0">
                <img src="/images/Limited-Edition/gts19-ghost11-camo_le-categoryimage.jpg">
            </div>
        </div>
</div>
<div class="create-account--header plp-header collection-intro">
  <div class="wrapper">
    <div class="row">
    <div class="col-2"></div>
      <div class="col-8">
      	<div class="about-header">
            <h1 class="br-mainheading">Take a closer look.</h1>
            <p>These limited-release shoes layer colour in ways that defy expectations. Now you can run with the Adrenaline GTS 19’s holistic GuideRails support and the Ghost 11’s smooth ride in bold style, with subtle details you don’t see until you look again. But that shouldn’t be too surprising. After all, what else rewards persistence like running?</p>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</div>
<section class="plp-container">
	<div class="wrapper">
		<div class="row">
			<div class="col-12 tab-12">
				<div class="row">
					<div class="plp-wrapper-container">
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="mob-6 col-4 plp-wrapper__sub">
							<div class="plp-product">
								<div class="offer-info">
									<span>NEW</span>
									<span class="sale">SALE</span>
								</div>
								<a href="detail-shoes.php" class="hidden-mob">
									<div class="img img-shoes">
										<img id="plp-img" src="images/shoes/shoes1-listing.jpg" alt="">
									</div>
								</a>
								<div class="more-color--container">
									<span class="icon-style icon-back-arrow prev"></span>
									<div class="owl-carousel owl-theme">
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Widths Available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes2-listing.jpg">
									        <img src="images/shoes/shoes2-swatches.jpg" data-big="images/shoes/shoes2-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									  <div class="item">
									  	 <picture>
									        <source media="(max-width: 667px)" srcset="images/shoes/shoes1-listing.jpg">
									        <img src="images/shoes/shoes1-swatches.jpg" data-big="images/shoes/shoes1-listing.jpg" class="plp-thumb" alt="">
									      </picture>
									  	 <div class="plp-mob--info visible-mob">
									  	 	<a href="detail-apparel.php">
									  	 		<ul>
										  	 		<li>3 Colours</li>
										  	 		<li class="no-pad">Width available</li>
										  	 	</ul>
									  	 	</a>
									  	 </div>
									  </div>
									</div>
									<span class="icon-style icon-next-arrow next"></span>
								</div>
								<a href="detail-shoes.php">
									<div class="info">
										<h3>Adrenaline GTS 18</h3>
										<div class="price">
											<span>&dollar;89.95</span>
										</div>
										<div class="shoes-type">Women's Running Tops</div>
									</div>
									<div class="info-sub">
										<div class="row">
											<div class="mob-6">
												<p>Neutral Speed</p>
											</div>
											<div class="mob-6">
												<p class="right">Width Available</p>
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="plp-load-more">
							<a href="#">Load More (15 Remaining)</a>
						</div>
					</div>
			    </div>
			</div>
			<div class="filter-mob--apply plp-mob-filter__control">
				<a href="#">Apply</a>
			</div>
	    </div>
	</div>
</section>

<!-- /Updated Section -->
    
@endsection       
      

