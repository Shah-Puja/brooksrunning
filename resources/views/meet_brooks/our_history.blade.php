@extends('customer.layouts.master')
@section('content')
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="/css/history.css">

<div class="brooksourhistory">
<div id="meet-history">
        <section id="top" class="meet">
            <p class="meet-title center">
                Our History
            </p>
            <img id="header_small" src="/images/Meet-Brooks-Refresh/history_header_mobile.png" alt="Over one-hundred years of thinking on our feet.">
            <img id="header_large" src="/images/Meet-Brooks-Refresh/history_header.png" alt="Over one-hundred years of thinking on our feet.">
        </section>
        <section id="timeline">
            <div class="timeline-nav center">
                <div id="section-one" class="timeline-nav__item">
                    <a class="small--bold nav-link nav-link--active">Our Start in Footwear
                        </br>
                        <span class="nav-date">1914 – 1971</span></a>
                </div>
                <div class="nav-divider"> </div>
                <div id="section-two" class="timeline-nav__item">
                    <a class="small--bold nav-link">Rise of Running
                        </br>
                        <span class="nav-date">1972 – 2000</span></a>
                </div>
                <div class="nav-divider"> </div>
                <div id="section-three" class="timeline-nav__item">
                    <a class="small--bold nav-link">Focus on the Run
                        </br>
                        <span class="nav-date">2001 – Today</span></a>
                </div>
            </div>
        </section>
        <div class="wrapper" style="margin-top:5%;">
        <div class="row">
        <div id="start">
            <section class="meet">
                <div class="center">
                    <p class="timeline-date center large">1914</p>
                </div>
            </section>
            <section id="ballet" class="meet timeline-entry timeline-entry--left">
                <picture class="img-top">
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/ballet.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/ballet_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/ballet_mobile.png" alt="Vintage Brooks bathing shoes">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Bath and Ballet Shoes
                    </p>
                    <p class="graf">
                        Brooks begins in a small factory in Philadelphia that makes ballet slippers and bathing shoes. While we can’t take much credit for revolutionizing the ballet or bath shoe industries, we remain just as committed to specialized gear for a specialized activity.
                    </p>
                </div>
            </section>
            <section class="meet">
                <div class="center">
                    <p class="timeline-date center large">1921</p>
                </div>
            </section>
            <section id="baseball" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/baseball.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/baseball_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/baseball_mobile.png" alt="First Brooks baseball cleats">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Baseball Cleats
                    </p>
                    <p class="graf ">
                        We move into mainstream sports with the development of our first baseball cleats, which will go on to be worn by championship teams and famous athletes like Mickey Mantle. Our past business was America’s Favorite Pastime.
                    </p>
                </div>
            </section>
            <section class="meet">
                    <div class="center">
                        <p class="timeline-date center large">1929</p>
                    </div>
            </section>
            <section id="skates" class="timeline-entry">
                    <picture>
                        <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/roller_skates.png">
                        <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/roller_skates_med.png">
                        <img srcset="/images/Meet-Brooks-Refresh/roller_skates_mobile.png" alt="Bumper on roller skates">
                    </picture>
                    <div class="timeline-text">
                        <p class="medium subhed">
                            Roller Skates
                        </p>
                        <p class="graf ">
                            You know that little bumper on the front of your roller skates that sometimes,
                            but not often enough, prevents you from crashing into parked cars? That's us.
                        </p>
                    </div>
                </section>
            <section class="meet">
                <div class="center">
                    <p class="timeline-date center large">1930</p>
                </div>
            </section>
            <section id="football" class="timeline-entry timeline-entry--left">
                <picture class="img-top-big">
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/football.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/football_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/football_mobile.png" alt="Brooks football cleats">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Football Cleats
                    </p>
                    <p class="graf ">
                        Brooks makes one of its first innovations for serious athletes: Natural Bend Arch Support.
                        It quickly becomes a favorite technology among players. Another patent, Lock Tight, helps
                        reduce
                        injury by preventing cleats from coming off during the game.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1938</p>
            </div>
            <section id="childrens" class="timeline-entry">
                <div>
                    <p class="medium center subhed subhed--no-img">
                        Children's Shoes
                    </p>
                    <p class="graf graf--center">
                        Many are surprised to learn we no longer make pint-sized ped-wear. At one point, we launched a line called “Pedicraft” that was scientifically engineered for children. We eventually grew out of them, as did all the children who wore them.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large ">1940</p>
            </div>
            <section id="softball" class="timeline-entry timeline-entry--left">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/softball.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/softball_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/softball_med.png" alt="Brooks softball cleats">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Softball Cleats
                    </p>
                    <p class="graf ">
                        Brooks develops shoes with soft rubber cleats for softball. They become extremely popular,
                        alongside an extensive and growing lineup that also includes ice skates, gym, bowling,
                        basketball,
                        baseball, soccer, boxing and wrestling shoes.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1962</p>
            </div>
            <section id="mickey" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/mantle.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/mantle_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/mantle_mobile.png" alt="Mickey Mantle and Roger Maris">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        A Moment with Mickey
                    </p>
                    <p class="graf ">
                        Long before Brooks could take part in major sports endorsements, then-CEO Jerry Turner made his
                        way
                        into the Yankees' locker room with a box of Brooks cleats under each arm. He asked Roger Maris
                        and
                        Mickey Mantle
                        if they'd like to try them on. Maris declined, but Mantle tried them, loved them and bought
                        both
                        pairs with a check for $44.
                    </p>
                </div>
            </section>
            <section class="next-button">
                <!-- <div class="center center-y">
                    <button id="risebutton" class="a-btn a-btn--secondary small--bold  ">NEXT:
                            Rise of Running</button>
                </div> -->
                <div class="center center-y shoes-detail-btn ">
                    <button id="risebutton" class="secondary-button small--bold ">NEXT:
                            Rise of Running</button>
                </div>
            </section>
        </div>
        <div id="rise" class="is-hidden">
            <div class="center">
                <p class="timeline-date center large">1972</p>
            </div>
            <section id="boom" class="timeline-entry timeline-entry--left">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/shorter.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/shorter_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/shorter_mobile.png"  alt="Frank Shorter">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Things Change in Munich
                    </p>
                    <p class="graf ">
                        It could be said that Brooks' focus on running shoes actually began
                        in 1972, when Yale graduate Frank Shorter won the Olympic marathon. Running suddenly captivates the world’s attention. Instead of making anything — from athletic shoes to combat boots — that would keep the factory turning, Brooks starts to think about limiting its focus.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1974</p>
            </div>
            <section id="villanova" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/villanova.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/villanova_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/villanova_mobile.png" alt="Brooks Villanova shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Villanova
                    </p>
                    <p class="graf ">
                        Brooks begins its true commitment to innovation through runner insight by
                        developing the Villanova with feedback from Olympic middle-distance runner
                        Marty Liquori. The shoe puts Brooks in a league with the other big names in
                        running of the time.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1977</p>
            </div>
            <section id="vantage" class="timeline-entry timeline-entry--left">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/vantage.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/vantage_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/vantage_mobile.png"  alt="Brooks Vantage shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Vantage
                    </p>
                    <p class="graf">
                        Brooks' first shoe to hit #1 in <span class="graf--italic">Runner's World</span>. In addition
                        to
                        developing the industry-first
                        use of EVA (which replaced slow-rebounding rubber in midsoles), the Vantage
                        features a removable sockliner that molds to the runner's foot and the Varus Wedge.
                        President Jimmy Carter orders a pair.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1980</p>
            </div>
            <section id="hugger" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/hugger.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/hugger_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/hugger_mobile.png" alt="Brooks Hugger GT shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Hugger GT
                    </p>
                    <p class="graf ">
                        Despite its friendly name, the Hugger GT is an aggressive step forward in running shoes. The innovative shoe is the first to feature a breathable GORE-TEX upper; it also features a heel-hugging side strap that makes your foot “a more biomechanically efficient (and less injury-prone) structure.”
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1981</p>
            </div>
            <section id="varus" class="timeline-entry">
                <div>
                    <p class="medium center subhed">
                        Varus Wedge
                    </p>
                    <p class="graf graf--center">
                        Rated the best running shoe in the world by <span class="italic">Running Times</span>, the Brooks Nighthawk features the
                        Varus Wedge, which solves a big problem for runners by reducing overpronation.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1982</p>
            </div>
            <section id="rollbar" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/rollbar.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/rollbar_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/rollbar_mobile.png"  alt="Brooks Chariot shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Diagonal Rollbar
                    </p>
                    <p class="graf">
                        The Chariot uses two different density foams instead of the Varus Wedge — a denser foam
                        on the inside of the shoe to keep runners from rotating inward and toward the outside, softer
                        EVA to keep the shoe from tilting awkwardly for walkers. Brooks calls this innovation the
                        Diagonal
                        Rollbar. The Chariot also features an ultra-sturdy heel counter that wraps around the heel and
                        extends
                        to the ball of the foot. A third game-changer — a dual-density rubber outsole — features hard
                        rubber
                        on the edges for stability and softer rubber in the middle to absorb impact.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1987</p>
            </div>
            <section id="kinetic" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/kinetic.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/kinetic_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/kinetic_mobile.png"  alt="Kinectic Wedge Cushioning Technology">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Kinetic Wedge
                    </p>
                    <p class="graf ">
                        Brooks releases a new cushioning technology designed to stabilize the forefoot: a piece of
                        soft,
                        flexible material
                        under the ball of the foot. The Kinetic Wedge allows the foot to arch more naturally, reducing
                        stress-related injuries. This
                        development is said to be the first of several innovations that makes Brooks for Women the first
                        shoes designed to be
                        anatomically correct for women.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1989</p>
            </div>
            <section id="hydroflow" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/hydroflow.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/hydroflow_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/hydroflow_mobile.png" alt="HydroFlow Technology">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        HydroFlow
                    </p>
                    <p class="graf ">
                        Like a hydraulic shock absorber, HydroFlow reacts uniquely to each runner’s weight and gait. This technology starts as a two-chambered system that moves silicone fluid from a rear chamber into a front chamber of the shoe with each heel strike and then springs back when the heel lifts. In 1991, HydroFlow wins the American Podiatric Medical Association Seal of Acceptance. Later, HydroFlow is improved to dampen impact by moving a silicone-oil compound from the center of the pad to the edges.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1992</p>
            </div>
            <section id="beast" class="timeline-entry timeline-entry--left">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/beast.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/beast_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/beast_mobile.png"  alt="Brooks Beast shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Beast
                    </p>
                    <p class="graf ">
                        Brooks’ next big shoe takes motion control to a new level with improvements to the Diagonal Rollbar. Doctors prescribe the Beast for runners with shin splints and other injuries. The Beast and the Addiction (the “Baby Beast”) go on to become some of Brooks’ most successful shoes.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1995</p>
            </div>
            <section id="podular" class="timeline-entry">
                <div>
                    <p class="medium center subhed subhed--no-img">
                        Podular Technology
                    </p>
                    <p class="graf graf--center">
                        A new Brooks concept makes the outsole more flexible than ever. Instead of linear grooves, Podular Technology introduces pods on the outsole, allowing the shoe to bend in every direction. The innovation is now so common, it seems strange to think of it as revolutionary so recently.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">1999</p>
            </div>
            <section id="adrenaline" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/adrenaline.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/adrenaline_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/adrenaline_mobile.png" alt="Brooks first GTS (go-to-shoe)">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Adrenaline GTS 1
                    </p>
                    <p class="graf">
                        One of Brooks’ all-time best sellers hits the market, marking Brooks’ first big move into the fast-growing stability category. The Adrenaline GTS (Go-To Shoe) is developed through feedback from running retailers seeking a go-to shoe that was supportive but more flexible and responsive than the Addiction. The Adrenaline adds flexibility to the forefoot, smoother transitions from heel strike to toe-off and flex grooves that offer the right amount of support and traction, among other innovations.
                    </p>
                </div>
            </section>
            <section id="substance" class="timeline-entry">
                    <div>
                        <p class="medium center subhed subhed--no-img">
                            Substance 257
                        </p>
                        <p class="graf graf--center">
                                Brooks introduces another cushioning innovation. Substance 257 was 25 percent rubber and 75 percent ethylene vinyl acetate (EVA). This compound makes the midsole more durable and simultaneously cushy.
                        </p>
                    </div>
                </section>
            <section class="next-button">
                <div class="center center-y shoes-detail-btn">
                    <a href="#timeline"><button id="focusbutton" class="secondary-button small--bold">NEXT: Focus
                            on the Run</button></a>
                </div>
            </section>
        </div>
        <div id="focus" class="is-hidden">
            <div class="center">
                <p class="timeline-date center large">2001</p>
            </div>
            <section id="commitment" class="meet timeline-entry timeline-entry--left">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/running_hand.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/running_hand.png">
                    <img srcset="/images/Meet-Brooks-Refresh/running_hand_mobile.png" alt="Running fist-bump">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Full Commitment to the Run
                    </p>
                    <p class="graf ">
                        When you focus on what you do best, you do it even better. Brooks enters the new millennium
                        focused on one thing: running.
                        We're proud of our heritage. We're grateful for all the wearers of Brooks sporting goods over
                        the
                        years. But now we're singular in our pursuit.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2002</p>
            </div>
            <section id="adrenaline-four" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/gts4.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/gts4_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/gts4_med.png"  alt="Brooks Adrenaline GTS 4 shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Adrenaline GTS 4
                    </p>
                    <p class=" graf ">
                        A new last "tunes" the fit, balance and ride of the Adrenaline GTS to perfection.
                        The Progressive Diagonal Rollbar is introduced, using triple-density foam contoured not only to prevent pronation from the outside in, but also to gradually
                        guide the foot forward from heel strike to toe-off. These innovations lead the Adrenaline GTS 4
                        to <span class="graf--italic">Runner's World</span>'s "Best Update" award and Running Network's
                        "Best Renovation"
                        Gold Medal; it also becomes Brooks' best-selling shoe.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2006</p>
            </div>
            <section id="mogo" class="timeline-entry">
                <div>
                    <p class="medium center subhed subhed--no-img">
                        MoGo
                    </p>
                    <p class="graf graf--center">
                            A whole new polymer-based substance represents a complete update to the industry standard EVA foam midsole. MoGo gives runners more cushioning, more rebound, more durability and more energy return. A more efficient and environmentally friendly compression-molded preform process cuts waste in half.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2007</p>
            </div>
            <section id="biomogo" class="timeline-entry">
                <div>
                    <p class="medium center subhed subhed--no-img">
                        BioMoGo
                    </p>
                    <p class="graf graf--center">
                            Brooks improves upon the revolutionary MoGo midsole by making the world’s first fully biodegradable midsole cushioning material. Tests show that BioMoGo breaks down 50x faster than EVA, with the potential to save landfills nearly 30 million pounds of waste over a 20-year period. And then Brooks does the unthinkable by freely sharing BioMoGo’s formula with the competition.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2011</p>
            </div>
            <section id="pureproject" class="timeline-entry timeline-entry--left">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/pure_project.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/pure_project_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/pure_project_mobile.png" alt="Brooks PureConnect shoe">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        PureProject
                    </p>
                        <p class="graf ">
                            While never adopting the "less is more" philosophy of the minimalist running boom,
                            the PureProject line delivers a more biomechanically sound product in a lighter package.
                            <span class="graf--italic">Runner's World</span> says in its review of the PureConnect that
                            it
                            "strikes a balance between barefoot-inspired minimalism and cushioning-required training
                            ... it
                            has
                            a
                            lightweight, barely-there feel yet is substantive enough to handle long tempo runs."
                        </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2013</p>
            </div>
            <section id="guiderails" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/guiderails.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/guiderails_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/guiderails_mobile.png" alt="Brooks Transcend Shoe with GuideRails Technology">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        Transcend
                    </p>
                    <p class="graf ">
                        Instead of trying to “correct” a runner’s gait, Brooks embraces emerging biomechanics research
                        that the “right way” to run is as individual as runners themselves. The Transcend is the first
                        shoe to feature GuideRails technology.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2017</p>
            </div>
            <section id="dnaamp" class="timeline-entry timeline-entry--left">
                <picture>
                        <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/dna_amp.jpg">
                            <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/dna_amp.jpg">
                            <img srcset="/images/Meet-Brooks-Refresh/dna_amp.jpg" alt="Brooks DNA Amp">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        DNA AMP
                    </p>
                    <p class="graf ">
                        Brooks launches its most responsive midsole ever, featuring technology that returns
                        more energy to the runner than any shoe from leading competitors. DNA AMP absorbs the impact of
                        the
                        foot strike
                        and returns it directly upward, so energy expelled by runners is translated back into longer,
                        faster runs.
                    </p>
                </div>
            </section>
            <div class="center">
                <p class="timeline-date center large">2018</p>
            </div>
            <section id="dnaloft" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/dna_loft.png">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/dna_loft_med.png">
                    <img srcset="/images/Meet-Brooks-Refresh/dna_loft_mobile.png" alt="Brooks DNA LOFT cushioning technology">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        DNA LOFT
                    </p>
                    <div>
                        <p class="graf ">
                            The softest midsole ever created by Brooks hits the market. With a balance of foam, air,
                            and
                            rubber that disperses impact away from the body, runners are offered a plush, comfortable
                            ride without sacrificing responsiveness or durability.
                        </p>
                    </div>
                </div>
            </section>
            <section id="guiderails-two" class="timeline-entry">
                <picture>
                    <source media="(min-width: 900px)" srcset="/images/Meet-Brooks-Refresh/guiderails_legs.jpg">
                    <source media="(min-width: 600px)" srcset="/images/Meet-Brooks-Refresh/guiderails_legs.jpg">
                    <img class="center" srcset="/images/Meet-Brooks-Refresh/guiderails_legs.jpg" alt="Brooks DNA LOFT cushioning technology">
                </picture>
                <div class="timeline-text">
                    <p class="medium subhed">
                        GuideRails 2.0
                    </p>
                    <p class="graf ">
                            Brooks unveils a whole new approach to support technology that embraces the individuality inherent in each runner’s stride. GuideRails are specialized plates that allow runners’ hips, knees and joints to move through their own unique Habitual Motion Path, only intervening when the runner exceeds this zone. This holistic approach to support takes into account the natural coupling between the feet and the joints, recognizing that no shoe could hope to outsmart the human body.
                    </p>
                </div>
            </section>
        </div>
        </div>
        </div>
        <section id="links" class="meet">
            <p class="medium center subhed subhed--large">
                Get to know us better
            </p>
            <p class="graf center graf--wide">
                We're proud of who we are and where we come from. Read on to learn more.
            </p>
            <div class="bottom-links center">
                <div class="center bottom-link">
                        <a href="/meet_brooks/our_purpose" class="a-text-btn a-text-btn--secondary small--bold">Our Purpose
                        <img id="br-home" src="/images/home/link-arrow--icon.png" alt=""></a>
                </div>
            </div>
        </section>
        <div class="slide-in-left slide-in-right slide-in-topleft"></div>
</div>

</div>

<script src="/js/history.js"></script>
@endsection