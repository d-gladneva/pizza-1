<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
        />
        <title>{{ settings('title') }}</title>
        <meta name="description" content="{{ settings('description') }}" />
        <meta name="keywords" content="{{ settings('keywords') }}" />
        <link rel="stylesheet" href="public/static/css/style.css" />
    </head>
    <body>
    <div id="scroll"></div>
    <div id="root">
        <!-- Header block -->
        <header class="global-header">
            <div class="header__wrapper" id="headerWrapper">
                <a href="/" class="global-logo"></a>
                <nav class="navigation__wrapper">
                    <ul class="navigation__menu">
                    @foreach($categories as $category)
                        <li class="navigation__item">
                            <a class="navigation__link" to="{{ $category->code }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                    </ul>
                </nav>
                <div class="navigation__burger">
                    <span class="navigation__burger-top"></span>
                    <span class="navigation__burger-center"></span>
                    <span class="navigation__burger-bottom"></span>
                </div>

                <a class="global-phone header__phone" href="callto:{{ settings('phone') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M497.39 361.8l-112-48a24 24 0 00-28 6.9l-49.6 60.6A370.66 370.66 0 01130.6 204.11l60.6-49.6a23.94 23.94 0 006.9-28l-48-112A24.16 24.16 0 00122.6.61l-104 24A24 24 0 000 48c0 256.5 207.9 464 464 464a24 24 0 0023.4-18.6l24-104a24.29 24.29 0 00-14.01-27.6z"
                        />
                    </svg>
                    {{ settings('phone') }}
                </a>
                <a class="header__phone_icon" href="callto:{{ settings('phone') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path
                            d="M497.39 361.8l-112-48a24 24 0 00-28 6.9l-49.6 60.6A370.66 370.66 0 01130.6 204.11l60.6-49.6a23.94 23.94 0 006.9-28l-48-112A24.16 24.16 0 00122.6.61l-104 24A24 24 0 000 48c0 256.5 207.9 464 464 464a24 24 0 0023.4-18.6l24-104a24.29 24.29 0 00-14.01-27.6z"
                        />
                    </svg>
                </a>
                <div class="phone__body" id="phoneBody">
                    <p>Адрес: {{ settings('address') }}</p>
                    <p>{{ settings('phone') }}</p>
                    <p>E-mail: {{ settings('email') }}</p>
                </div>
                <div class="tooltipCart__wrapper" id="tooltipCart">
                    <span class="tooltipCart__text">Товар успешно добавлен</span>
                </div>
                <div class="cart__wrapper">
                    <button class="cart__button" id="cartButton">
                        <svg viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.6202 17.6104C18.2385 17.6104 18.7537 17.8255 19.1659 18.2559C19.5781 18.6863 19.7842 19.2113 19.7842 19.831C19.7842 20.4507 19.5781 20.9672 19.1659 21.3803C18.7537 21.7935 18.2299 22 17.5945 22C16.959 22 16.4352 21.7935 16.0231 21.3803C15.6109 20.9672 15.4048 20.4421 15.4048 19.8052C15.4048 19.1683 15.6109 18.6432 16.0231 18.2301C16.4352 17.8169 16.9676 17.6104 17.6202 17.6104ZM-0.000488281 0H3.60607L4.63651 2.16901H20.9175C21.2267 2.20344 21.4843 2.32394 21.6904 2.53052C21.8965 2.73709 21.9995 2.9953 21.9995 3.30516C21.9995 3.47731 21.948 3.64945 21.8449 3.8216L17.9293 10.9484C17.7232 11.2926 17.457 11.5681 17.1307 11.7746C16.8043 11.9812 16.4351 12.0845 16.0229 12.0845H7.83089L6.85197 13.892L6.80045 14.0469C6.80045 14.2191 6.88632 14.3052 7.05806 14.3052H19.7841V16.5258H6.59436C5.97609 16.4914 5.46087 16.2676 5.04869 15.8545C4.63651 15.4413 4.43043 14.9249 4.43043 14.3052C4.43043 13.9264 4.51629 13.5822 4.68804 13.2723L6.18218 10.5352L2.21497 2.16901H-0.000488281V0ZM6.5946 17.6104C7.21287 17.6104 7.73667 17.8255 8.16603 18.2559C8.59538 18.6863 8.81005 19.2113 8.81005 19.831C8.81005 20.4507 8.59538 20.9672 8.16603 21.3803C7.73667 21.7935 7.21287 22 6.5946 22C5.97633 22 5.46111 21.7935 5.04893 21.3803C4.63675 20.9672 4.43066 20.4421 4.43066 19.8052C4.43066 19.1683 4.63675 18.6432 5.04893 18.2301C5.46111 17.8169 5.97633 17.6104 6.5946 17.6104ZM16.4003 9.87138L19.467 4.38965H5.66699L8.22255 9.87138H16.4003Z"
                            ></path>
                        </svg>
                        <span>Корзина</span>
                        <p class="cart__sum">
                            <span id="cartSum">0</span><span> &#8381;</span>
                        </p>
                    </button>
                </div>
                <div class="cart__body" id="cartBody"></div>
                <div class="tooltipCart__wrapper" id="tooltipCart">
                    <span class="tooltipCart__text">Товар успешно добавлен</span>
                </div>
            </div>
        </header>
        <!-- Header block -->

        <!-- Main block -->
        <main class="global-main">
            <div id="slider" class="slider">
                <div class="container">
                    <ul class="slider-content" id="all-progects">
                        <li class="slider-item slider-item-active">
                            <img src="public/static/images/banners/slide1.jpg" alt="slider" />
                        </li>
                        <li class="slider-item">
                            <img src="public/static/images/banners/slide2.jpg" alt="slider" />
                        </li>
                        <li class="slider-item">
                            <img src="public/static/images/banners/slide3.jpg" alt="slider" />
                        </li>
                        <a href="#" class="slider-btn prev" id="arrow-left"></a>
                        <a href="#" class="slider-btn next" id="arrow-right"></a>
                        <ul class="slider-dots"></ul>
                    </ul>
                </div>
            </div>

            <div class="main__wrapper" id="mainWrapper">
                <nav class="popup-menu" id="popupMenu">
                    <div><span class="popup-menu__close" id="close">&times;</span></div>
                    <ul>
                    @foreach($categories as $category)
                        <li class="scroll">
                            <a class="test" the="{{ $category->code }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                    </ul>
                </nav>

                <!-- Products -->
                <div id="productsWrapper"></div>
                <!-- Products -->
            </div>
        </main>
        <!-- Main block -->

        <!-- Footer block -->
        <footer class="global-footer">
            <div class="footer__wrapper">
                <div class="footer_wrapper__left">
                    <div class="footer__list">
                        <p class="footer__item">Режим работы</p>
                        <p class="footer__item">с 11:00 до 22:00</p>
                    </div>
                    <div class="footer__list">
                        <p class="footer__item">Контакты</p>
                        <p class="footer__item">
                            Адрес: {{ settings('address') }}
                        </p>
                    </div>
                </div>
                <div class="footer_wrapper__right">
                    <div class="info__wrap">
                        <div class="footer__icons">
                            <a class="footer__iconsItem" href="#">
                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.64 0h6.72C13.92 0 16 2.08 16 4.64v6.72A4.64 4.64 0 0 1 11.36 16H4.64C2.08 16 0 13.92 0 11.36V4.64A4.64 4.64 0 0 1 4.64 0zm-.16 1.6A2.88 2.88 0 0 0 1.6 4.48v7.04a2.878 2.878 0 0 0 2.88 2.88h7.04a2.88 2.88 0 0 0 2.88-2.88V4.48a2.878 2.878 0 0 0-2.88-2.88H4.48zm8.72 2.2a1 1 0 1 0-2 0 1 1 0 0 0 2 0zM8 4a4 4 0 1 1 0 8 4 4 0 0 1 0-8zM5.6 8a2.4 2.4 0 1 1 4.8 0 2.4 2.4 0 0 1-4.8 0z"
                                    ></path>
                                </svg>
                            </a>
                            <a class="footer__iconsItem" href="#">
                                <svg viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0v3.192H6.393a.707.707 0 0 0-.599.395 1.714 1.714 0 0 0-.187.807v1.991H8v3.23H5.607V16H2.393V9.615H0v-3.23h2.393V3.192c.024-.9.336-1.652.934-2.253C3.925.338 4.685.025 5.607 0H8z"
                                    ></path>
                                </svg>
                            </a>
                            <a class="footer__iconsItem" href="#">
                                <svg viewBox="0 0 17 14" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.415 13.151l.266-3.906 7.208-6.424c.148-.144.163-.239.045-.282-.118-.043-.295-.007-.531.109L4.47 8.203.622 6.988c-.442-.116-.649-.29-.62-.521.03-.231.296-.463.797-.694L15.879.087c.354-.145.65-.109.885.108.236.217.295.586.177 1.107l-2.565 11.85c-.206.838-.678 1.055-1.415.65l-3.892-2.821-1.902 1.78c-.088.115-.191.21-.31.282a.833.833 0 0 1-.442.108z"
                                    ></path>
                                </svg>
                            </a>
                            <a class="footer__iconsItem" href="#">
                                <svg viewBox="0 0 20 14" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.84 4.07c-.06-.8-.15-1.43-.28-1.9-.25-.9-.83-1.48-1.73-1.73C16.8.16 14.19 0 10 0L8.41.06c-1.1 0-2.29.03-3.59.1C3.5.22 2.64.31 2.17.44 1.27.69.69 1.27.44 2.17.16 3.2 0 4.81 0 7l.06.84c0 .6.03 1.29.1 2.09.06.8.15 1.43.28 1.9.25.9.83 1.48 1.73 1.73 1.03.28 3.64.44 7.83.44l1.59-.06c1.1 0 2.29-.03 3.59-.1 1.32-.06 2.18-.15 2.65-.28.9-.25 1.48-.83 1.73-1.73.28-1.03.44-2.64.44-4.83l-.06-.84c0-.6-.03-1.29-.1-2.09zM13.19 7L8 10V4l5.19 3z"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                        <div>
                            <a class="phone footer__phone" href="callto:{{ settings('phone') }}"
                            >{{ settings('phone') }}</a
                            >
                            <span class="footer__phoneDescription"
                            >Телефон горячей линии</span
                            >
                        </div>
                        <p class="footer__email">
                            E-mail:
                            <a class="footer__emailAddress" href="mailto:{{ settings('email') }}">{{ settings('email') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer block -->

        <!-- Modules -->
        <div id="myModal" class="modal__overlay">
            <div id="modalContent" class="modal__content"></div>
        </div>
        <div class="tooltip__wrapper" id="tooltip">
            <span class="tooltip__text">Состав: </span>
        </div>
        <div class="upButton__wrapper">
            <a href="#scroll">
                <button class="up_button" id="upButton">Наверх &#8593;</button>
            </a>
        </div>
        <div id="myOrder" class="order__overlay">
            <div id="orderContent" class="order__content">111111111</div>
        </div>

        <!-- Modules -->
    </div>
    <script type="text/javascript" src="public/controllers/bundle.js"></script>
    </body>
</html>
