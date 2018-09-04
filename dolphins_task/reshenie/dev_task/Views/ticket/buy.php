
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Tickets</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../Views/css/style.css">


    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>

    <nav>
        <div class="logo">
            <img src="../Views/img/logo.png" alt="">
        </div>
    </nav>

    <div class="bg-container">
        <div id="video-container">
            <video src="../Views/vid/background-video.mp4"  autoplay="autoplay" type="video/mp4" loop="loop"></video>
        </div>

        <!-- <div class="advert">
            <div class="discount">
                <h3 class="">
                    <span>15%</span>
                    <span>Отстъпка</span>
                </h3>
            </div>
            <div class="open-hours">
                <h3>
                    <span>Всеки ден</span>без понеделник</h3>
            </div>
        </div> -->

        <section class="main-content">

            <?php if($this->success) : ?>

            <div style="display: block; font-size: 3em;" >Билетите са закупени успешно!</div>

            <a href="./all" style="display: block; font-size: 2em; ">Вижте всички билети</a>
            <a href="./buy" style="display: block; font-size: 2em;" >Купете нови билети</a>

            <?php else : ?>

            <form action="./buy" method="POST">
                <div class="title">
                    <h1>Купи билети онлайн</h1>
                    <a href="" class="lng-btn">en</a>
                </div>

                <div class="input-section">
                    <div class="top-input-fields">
                        <div class="input-data user-inp">
                            <label for="names">Имена</label>
                            <input type="text" id="names" name="names">
                        </div>
                        <div class="input-data user-inp">
                            <label for="email">Имейл</label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="input-data user-inp">
                            <label for="date">Дата</label>
                            <div class="input-icon">
                                <input type="text" name="date-visit" value="10/24/1984" id="datepicker" />
                                <i class="far fa-calendar-alt"></i>
                            </div>
                        </div>
                        <div class="input-data user-inp">
                            <label for="email">Час</label>
                            <div class="input-icon">
                                
                                <input type="text" name="time" id="time_input" autocomplete="off" >
                               
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="times" id="times">
                                    
                                    </div>
                        </div>
                    
                            <div class="input-data">
                                    <h3>Шоу с делфини</h3>
                                </div>
                        <div class="input-data lbl">
                            <div class="lbl-2">
                                <span class="pricing">5 лв.</span>
                                <div class="pricing-label">Право за снимане</div>
                            </div>
                            <div class="count">
                                <input type="text" id="allow_photo" value="1" name="count-photo">
                                <div class="arrows">
                                    <i class="fas fa-chevron-up" onclick='updateCount("allow_photo", "up")'></i>
                                    <i class="fas fa-chevron-down" onclick='updateCount("allow_photo", "down")'></i>
                                </div>
                            </div>
                        </div>

                        <div class="input-data lbl">
                            <div class="lbl-2">
                                <span class="pricing">17 лв.</span>
                                <div class="pricing-label">Възрастни</div>
                            </div>
                            <div class="count">
                                <input type="text" id="adult_count" value="0" name="adult-count">
                                <div class="arrows">
                                    <i class="fas fa-chevron-up" onclick='updateCount("adult_count", "up")'></i>
                                    <i class="fas fa-chevron-down" onclick='updateCount("adult_count", "down")'></i>
                                </div>
                            </div>
                        </div>
                        <div class="input-data lbl">
                            <div class="lbl-2">
                                <span class="pricing">11.90 лв.</span>
                                <div class="pricing-label">Деца</div>
                            </div>
                            <div class="count">
                                <input type="text" id="children_count" value="0" name="children-count">
                                <div class="arrows">
                                    <i class="fas fa-chevron-up" id="child_arrow_up" onclick='updateCount("children_count", "up")'></i>
                                    <i class="fas fa-chevron-down" id="child_arrow_down" onclick='updateCount("children_count", "down")'></i>
                                </div>
                            </div>
                        </div>

                        <div style="width: 100%; clear: both"></div>

                    </div>


                    <div class="agree-section">
                        <label class="check-btn-container">
                            <input type="radio" onclick="toggleCheck(this)" name="terms" id="terms">
                            <span class="circle" id="circle"></span>
                        </label>

                        <p>Съгласен с
                            <span>условията за резервация</span>
                        </p>
                    </div>

                    <div class="bottom-btn">
                        <div class="input-data">
                            <div class="total">
                                <label for="">Общо</label>
                                <input type="text" readonly="true" class="pricing" value="0лв." id="total_price">
                            </div>
                        </div>
                        <div class="input-data">
                            <input type="submit" value="Към плащане" name="pay" onclick="validate(event)">
                        </div>

                        <div style="width: 100%; clear: both"></div>
                    </div>
                </div>

            </form>

            <?php endif; ?>

            <section class="pay-methods">
                <div class="paypal-logo">
                    <img src="../Views/img/paypal-logo.png" alt="">
                </div>

                <div class="payment-cards">
                    <ul>
                        <li>
                            <img class="paypal-logo" src="../Views/img/mastercard.png" alt="">
                        </li>
                        <li>
                            <img class="visa-logo" src="../Views/img/visa.png" alt="">
                        </li>
                        <li>
                            <img class="express-logo" src="../Views/img/america-ex.png" alt="">
                        </li>
                        <li>
                            <img class="discover-logo" src="../Views/img/discover.png" alt="">
                        </li>
                    </ul>
                </div>

                <div class="address">
                    <ul>
                        <li>
                            <span>адрес: </span>Приморски парк, местност "Салтанат", 9000, гр.Варна
                        </li>
                        <li>
                            <span>тел/факс: </span>+359 52 302199
                        </li>
                        <li>
                            <span>имейл: </span>@dolphinariumvarna.bg
                        </li>
                        <li>
                            <span>GPS: </span>+ 43 211 1213 1123123 123
                        </li>
                    </ul>
                </div>
            </section>
        </section>


    </div>

    <script>
        $(function () {
            $('#datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'), 10),

            });
        });
    </script>


</body>

<script src="../Views/js/script.js"></script>



</html>