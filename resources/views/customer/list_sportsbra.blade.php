@extends('customer.layouts.master')
@section('content')
<section class="create-account--header plp-header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs">
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Womens</a>
                            </li>
                            <li>
                                <a href="JavaScript:Void(0);" class="active">Womens Running Shoes</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="br-mainheading">Women's Sports Bras</h1>
                    <div class="sub-info">
                        A great sports bra can transform your workout. Shop styles for every body type and activity level.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="plp-container">
        <div class="wrapper">
            <div class="row">
                <div class="col-3 tab-4 mobile-plp--filter plp-mob-filter__control">
                    <div class="mobile-plp--main">
                        <div class="mobile-plp--close">
                            <span class="icon-close"></span>
                        </div>
                        <div class="plp-filter">
                            <ul class="plp-filter--wrapper">
                                <li class="filter-menu">
                                    <label class="label br-mainheading category-heading">Categories</label>
                                    <ul class="filter-list filter-list--category clearfix">
                                        <li class="fullbox-filter category">
                                            High Impact Sports Bras
                                        </li>
                                        <li class="fullbox-filter category">
                                            Medium Impact Sports Bras
                                        </li>
                                        <li class="fullbox-filter category selected">
                                            Low Impact Sports Bras
                                        </li>
                                        <li class="fullbox-filter category sale">
                                            Sale Sports Bras
                                        </li>
                                    </ul>
                                </li>
                                <li class="filter-heading">
                                    <h3>Filter</h3>
                                </li>
                                <li class="filter-menu">
                                    <label class="label">COLOR</label>
                                    <ul class="filter-list clearfix">
                                        <li class="fullbox-filter color-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Black">
                                                      <label for="Black">
                                                              <div class="mark" style="background-color: black"><span></span></div>
                                                              <div class="text">Black</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter color-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Blue">
                                                      <label for="Blue">
                                                              <div class="mark" style="background-color: blue"><span></span></div>
                                                              <div class="text">Blue</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter color-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Green">
                                                      <label for="Green">
                                                              <div class="mark" style="background-color: green"><span></span></div>
                                                              <div class="text">Green</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter color-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Red">
                                                      <label for="Red">
                                                              <div class="mark" style="background-color: red"><span></span></div>
                                                              <div class="text">Red</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                    </ul>
                                </li>
                                <li class="filter-menu">
                                    <label class="label">IMPACT LEVEL</label>
                                    <ul class="filter-list clearfix">
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Low Impact">
                                                      <label for="Low Impact">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">Low Impact</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Medium Impact" checked="checked">
                                                      <label for="Medium Impact">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">Medium Impact</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="High Impact" checked="checked">
                                                      <label for="High Impact">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">High Impact</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                    </ul>
                                </li>
                                <li class="filter-menu">
                                    <label class="label">Cup Size</label>
                                    <ul class="filter-list clearfix">
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">A</a>
                                        </li>
                                        <li class="size-filter selected">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">B</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">C</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">E</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">F</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="filter-menu">
                                    <label class="label">Band Size</label>
                                    <ul class="filter-list clearfix">
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">30</a>
                                        </li>
                                        <li class="size-filter selected">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">32</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">36</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">38</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">40</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="filter-menu">
                                    <label class="label">Alpha Size</label>
                                    <ul class="filter-list clearfix">
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">XS</a>
                                        </li>
                                        <li class="size-filter selected">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">S</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">M</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">L</a>
                                        </li>
                                        <li class="size-filter">
                                            <a href="#" data-filter-attribute="size" data-filter-value=" ">XL</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="filter-menu">
                                    <label class="label">Features</label>
                                    <ul class="filter-list clearfix">
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Adjustable Straps">
                                                      <label for="Adjustable Straps">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">Adjustable Straps</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="Back Closure" checked="checked">
                                                      <label for="Back Closure">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">Back Closure</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="B-Normal 1">
                                                      <label for="B-Normal 1">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">B-Normal 1</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                        <li class="fullbox-filter">
                                            <div class="input-wrapper">
                                                  <div class="checklist-inline">
                                                        <input type="checkbox" id="d-wide 3" checked="checked">
                                                      <label for="d-wide 3">
                                                              <div class="mark"><span></span></div>
                                                              <div class="text">d-wide 3</div>
                                                       </label>
                                                  </div>
                                            </div>	
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-9 tab-8">
                    <div class="row">
                        <div class="col-6 tab-5 mob-12 hidden-mob">
                            <div class="all-product--count">
                                <p>Women's Sports Bras (34)</p>
                            </div>
                        </div>
                        <div class="col-2 tab-1 mob-6">
                            <div class="input-wrapper sort-by visible-mob" id="mob-filter--popup">
                                <label for="">Filter</label>
                                <div class="plp-filter-mob" >Filters</div>
                            </div>
                        </div>
                        <div class="col-4 tab-6 mob-6">
                            <div class="input-wrapper sort-by">
                                <label for="">SORT BY</label>
                                <div class="custom-select">
                                   <div class = "select-box">
                                        <div class = "label-heading">
                                            - - -
                                        </div>
                                        <div class="sel-icon bottom">&#9660;</div>
                                        <ul class="select-option--wrapper">
                                            <li class="option-value" value="">- - -</li>
                                            <li class="option-value" value="">Price (High To Low)</li>
                                            <li class="option-value" value="">Price (Low To High)</li>
                                            <li class="option-value" value="">Product Name (A To Z)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="plp-wrapper-container">
                            <div class="mob-6 col-4 plp-wrapper__sub">
                                <div class="plp-product">
                                    <div class="offer-info">
                                        <span>NEW</span>
                                        <span class="sale">SALE</span>
                                    </div>
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
                                        <div class="info">
                                            <h3>Adrenaline GTS 18</h3>
                                            <div class="price">
                                                <span><strike>&dollar;89.95</strike></span>
                                                <span class="red">&dollar;89.95</span>
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
                                        <div class="info">
                                            <h3>Adrenaline GTS 18</h3>
                                            <div class="price">
                                                <span><strike>&dollar;89.95</strike></span>
                                                <span class="red">&dollar;89.95-&dollar;89.95</span>
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                    <a href="detail.php">
                                        <div class="img">
                                            <img id="plp-img" src="/images/bras/bras1-listing.jpg" alt="">
                                        </div>
                                    </a>
                                    <div class="more-color--container">
                                        <span class="icon-style icon-back-arrow prev"></span>
                                        <div class="owl-carousel owl-theme">
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras2-swatches.jpg" data-big="images/bras/bras2-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                          <div class="item">
                                               <img src="/images/bras/bras1-swatches.jpg" data-big="images/bras/bras1-listing.jpg" class="plp-thumb" alt="">
                                          </div>
                                        </div>
                                        <span class="icon-style icon-next-arrow next"></span>
                                    </div>
                                    <a href="detail.php">
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
                                <a href="#">Load More</a>
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
@endsection