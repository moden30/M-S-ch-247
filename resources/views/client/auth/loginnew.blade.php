<!DOCTYPE html><!-- Last Published: Sat Apr 08 2023 17:46:29 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="parallax-bgsprod.webflow.io" data-wf-page="607bec7082b450588fbea82d"
    data-wf-site="607bec7082b45011f6bea82e">

<head>
    <meta charset="utf-8" />
    <title>Mê Sách 247</title>
    <meta content="Jerome Bergamaschi - Webdesigner Freelance" name="description" />
    <meta content="BGSPROD" property="og:title" />
    <meta content="Jerome Bergamaschi - Webdesigner Freelance" property="og:description" />
    <meta content="https://assets.website-files.com/606047427fdaa4c2fa5f5ac5/607ad548a2a7b278f790d92f_opengraph.png"
        property="og:image" />
    <meta content="BGSPROD" property="twitter:title" />
    <meta content="Jerome Bergamaschi - Webdesigner Freelance" property="twitter:description" />
    <meta content="https://assets.website-files.com/606047427fdaa4c2fa5f5ac5/607ad548a2a7b278f790d92f_opengraph.png"
        property="twitter:image" />
    <meta property="og:type" content="website" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script type="text/javascript">WebFont.load({ google: { families: ["Poppins:regular,500,600,700"] } });</script>
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
    <link href="{{ asset('assets/client/logo.png') }}"
        rel="shortcut icon" type="image/x-icon" />
    <link href="https://assets.website-files.com/607bec7082b45011f6bea82e/607bec7082b4502c87bea84c_webclip.png"
        rel="apple-touch-icon" />
</head>
<style>
    /* Existing CSS */
    *,
    *:before,
    *:after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
    /* background-image: url('/bbb.png');  */
    background-image: url('{{asset('assets/client/img/bbb.png')}}');
    background-size: cover; /* Đảm bảo hình ảnh phủ kín toàn bộ màn hình */
    background-repeat: no-repeat; /* Không lặp lại hình ảnh */
    background-position: center; /* Căn giữa hình ảnh */
    font-family: Poppins, sans-serif;
    color: #000000;
    font-size: 16px;
    line-height: 24px;
    font-weight: 400;
    overflow: hidden;
}


    input,
    button {
        border: none;
        outline: none;
        background: none;
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    }

    .tip {
        font-size: 20px;
        margin: 40px auto 50px;
        text-align: center;
    }

    .cont {

        position: relative;
        /* hoặc absolute/fixed */
        z-index: 9999;
        /* Đặt một giá trị lớn để đảm bảo nằm trên cùng */
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        width: 900px;
        height: 550px;
        margin: 0 auto 100px;
        background: #fff;
        box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.3), 10px 10px 15px rgba(70, 70, 70, 0.15), inset -10px -10px 15px rgba(255, 255, 255, 0.3), inset 10px 10px 15px rgba(70, 70, 70, 0.15);
    }

    .form {
        position: relative;
        width: 640px;
        height: 100%;
        transition: transform 1.2s ease-in-out;
        padding: 50px 30px 0;
    }

    .sub-cont {
        overflow: hidden;
        position: absolute;
        left: 640px;
        top: 0;
        width: 900px;
        height: 100%;
        padding-left: 260px;
        background: #fff;
        transition: transform 1.2s ease-in-out;
    }

    .cont.s--signup .sub-cont {
        transform: translate3d(-640px, 0, 0);
    }

    button {
        display: block;
        margin: 0 auto;
        width: 260px;
        height: 36px;
        border-radius: 30px;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
    }

    .img {
        overflow: hidden;
        z-index: 2;
        position: absolute;
        left: 0;
        top: 0;
        width: 260px;
        height: 100%;
        padding-top: 360px;
    }

    .img:before {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        width: 900px;
        height: 100%;
        background-image: url("ext.jpg");
        opacity: .8;
        background-size: cover;
        transition: transform 1.2s ease-in-out;
    }

    .img:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(100, 6, 78, 0.6);
    }

    .cont.s--signup .img:before {
        transform: translate3d(640px, 0, 0);
    }

    .img__text {
        z-index: 2;
        position: absolute;
        left: 0;
        top: 50px;
        width: 100%;
        padding: 0 20px;
        text-align: center;
        color: #fff;
        -webkit-transition: -webkit-transform 1.2s ease-in-out;
        transition: -webkit-transform 1.2s ease-in-out;
        transition: transform 1.2s ease-in-out;
        transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
    }

    .img__text h2 {
        margin-bottom: 10px;
        font-weight: normal;
    }

    .img__text p {
        font-size: 14px;
        line-height: 1.5;
    }

    .cont.s--signup .img__text.m--up {
        -webkit-transform: translateX(520px);
        transform: translateX(520px);
    }

    .img__text.m--in {
        -webkit-transform: translateX(-520px);
        transform: translateX(-520px);
    }

    .cont.s--signup .img__text.m--in {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }

    .img__btn {
        overflow: hidden;
        z-index: 2;
        position: relative;
        width: 100px;
        height: 36px;
        margin: 0 auto;
        background: transparent;
        color: #fff;
        text-transform: uppercase;
        font-size: 15px;
        cursor: pointer;
    }

    .img__btn:after {
        content: '';
        z-index: 2;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border: 2px solid #fff;
        border-radius: 30px;
    }

    .img__btn span {
        position: absolute;
        left: 0;
        top: 0;
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        width: 100%;
        height: 100%;
        -webkit-transition: -webkit-transform 1.2s;
        transition: -webkit-transform 1.2s;
        transition: transform 1.2s;
        transition: transform 1.2s, -webkit-transform 1.2s;
    }

    .img__btn span.m--in {
        -webkit-transform: translateY(-72px);
        transform: translateY(-72px);
    }

    .cont.s--signup .img__btn span.m--in {
        -webkit-transform: translateY(0);
        transform: translateY(0);
    }

    .cont.s--signup .img__btn span.m--up {
        -webkit-transform: translateY(72px);
        transform: translateY(72px);
    }

    h2 {
        width: 100%;
        font-size: 26px;
        text-align: center;
    }

    label {
        display: block;
        width: 260px;
        margin: 25px auto 0;
        text-align: center;
    }

    label span {
        font-size: 12px;
        color: #cfcfcf;
        text-transform: uppercase;
    }

    input {
        display: block;
        width: 100%;
        margin-top: 5px;
        padding-bottom: 5px;
        font-size: 16px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.4);
        text-align: center;
    }





    .submit {
        margin-top: 40px;
        margin-bottom: 20px;
        background: #d4af7a;
        text-transform: uppercase;
    }

    .hidden {
        display: none;
    }

    .back-to-login {
        display: block;
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #cfcfcf;
        cursor: pointer;
        text-decoration: none;
        transition: color 0.3s;
    }

    .back-to-login:hover {
        color: #a5a5a5;
    }


    .forgot-pass {
        display: block;
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #cfcfcf;
        cursor: pointer;
        text-decoration: none;
        transition: color 0.3s;
    }

    .forgot-pass:hover {
        color: #a5a5a5;
    }

    .main-wrapper {
        flex-direction: column;
        align-items: center;
    }

    .section_hero {
        position: relative;
        display: flex;
        overflow: hidden;
        width: 100%;
        height: auto;
        margin-right: auto;
        margin-left: auto;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        text-align: center;
    }

    .padding-global {
        width: 100%;
        height: auto;
        max-width: 80rem;
        margin-right: auto;
        margin-left: auto;
        padding-right: 2rem;
        padding-left: 2rem;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .link-socialold {
        position: relative;
        display: flex;
        width: 48px;
        height: 48px;
        justify-content: center;
        align-items: center;
        background-color: transparent;
        font-family: 'Fa brands 400', sans-serif;
        color: #f2e5d9;
        font-size: 1rem;
        font-weight: 400;
        text-decoration: none;
    }

    .container-wrap {
        display: flex;
        width: 100%;
        height: auto;
        flex-wrap: wrap;
        align-items: center;
        grid-column-gap: 0.5rem;
        grid-row-gap: 0.5rem;
    }

    .tag {
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        background-color: #531431;
        color: #e4b3a3;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
    }

    .tag:hover {
        background-color: #702d4c;
        color: #f2e5d9;
    }

    .social {
        z-index: 6;
        display: flex;
        flex-direction: row;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        grid-column-gap: 1rem;
        grid-row-gap: 1rem;
    }

    .social__wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Fa brands 400', sans-serif;
        color: #e4b3a3;
        font-size: 1.2rem;
        line-height: 1;
    }

    .icon-bg {
        position: absolute;
        z-index: 1;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background-color: #531431;
    }

    .icon {
        position: relative;
        z-index: 3;
        color: #e4b3a3;
    }

    .social__icon-link {
        display: flex;
        width: 48px;
        height: 48px;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        text-decoration: none;
    }

    .icon-bg-over {
        position: absolute;
        z-index: 2;
        display: none;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background-color: #cb7f65;
    }

    .section-footer {
        position: relative;
        display: flex;
        overflow: hidden;
        width: 100%;
        height: auto;
        margin-right: auto;
        margin-left: auto;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        background-color: #020016;
    }

    .heading-content-h2 {
        margin-bottom: 0rem;
        background-image: url("https://assets.website-files.com/607bec7082b45011f6bea82e/607bec7082b450b3cabea838_bg.png");
        background-position: 50% 0%;
        background-size: cover;
        background-attachment: scroll;
        font-size: 8rem;
        line-height: 7rem;
        font-weight: 700;
        text-transform: uppercase;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .container-footer {
        position: absolute;
        z-index: 1;
        display: flex;
        width: 100%;
        height: 100%;
        max-width: 80rem;
        margin-right: auto;
        margin-left: auto;
        padding-top: 2rem;
        padding-bottom: 2rem;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        text-align: center;
    }

    .button__magnetic {
        position: relative;
    }

    .button__magnetic.ghost1 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 90;
        margin: 1px;
        border-radius: 32px;
        background-color: #d26066;
        opacity: 0.5;
    }

    .button__magnetic.ghosting {
        display: flex;
        min-height: 64px;
        justify-content: center;
        align-items: center;
        color: #f2e5d9;
    }

    .button__magnetic.ghost2 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 80;
        margin: 1px;
        border-radius: 32px;
        background-color: #d26066;
        opacity: 0.5;
    }

    .button__magnetic.ghost3 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 70;
        margin: 1px;
        border-radius: 32px;
        background-color: #d26066;
        opacity: 0.5;
    }

    .button__magnetic-content {
        display: flex;
        min-height: 64px;
        padding: 0px 64px;
        justify-content: center;
        align-items: center;
        background-color: #531431;
        color: #e4b3a3;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .button__magnetic-link {
        position: relative;
        z-index: 100;
        overflow: hidden;
        border: 1px solid #ddd;
        border-radius: 5px;
        color: #333;
        text-decoration: none;
    }

    .button__magnetic-link.default {
        border: 0px none transparent;
        border-radius: 1000px;
    }

    .section-content {
        z-index: 1;
        display: flex;
        width: 100%;
        height: auto;
        padding-top: 4rem;
        padding-bottom: 4rem;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        background-image: linear-gradient(180deg, #2f122e, #020016);
    }

    .preloader {
        position: fixed;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 9000;
        display: none;
        width: 100vw;
        height: 100vh;
        justify-content: center;
        align-items: center;
        background-color: rgba(2, 0, 22, 0.5);
        color: #531431;
    }

    .preloader__img-logo {
        color: #cb7f65;
    }

    .preloader__item {
        position: relative;
        z-index: 10;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .preloader__loading {
        position: relative;
        display: flex;
        overflow: hidden;
        width: 140px;
        height: 2px;
        margin-top: 32px;
        border-radius: 2px;
    }

    .preloader__progressbar {
        width: 100%;
        height: auto;
        background-color: #cb7f65;
    }

    .preloader__bg-bottom {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 0;
        background-color: rgba(2, 0, 22, 0.5);
    }

    .preloader__bg-middle {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 1;
        background-color: rgba(2, 0, 22, 0.5);
    }

    .preloader__bg-top {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 2;
        background-color: #020016;
    }

    .link {
        color: #e4b3a3;
        text-decoration: none;
    }

    .link:hover {
        text-decoration: underline;
    }

    .page-wrapper {
        font-size: 1rem;
        line-height: 1.5rem;
    }

    .heading-content-h1 {
        margin-bottom: 0rem;
        font-size: 4rem;
        line-height: 4rem;
        text-transform: uppercase;
    }

    .container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .container.text-align-left {
        justify-content: flex-start;
        align-items: flex-start;
        text-align: left;
    }

    .container.align-center {
        align-items: center;
        text-align: center;
    }

    .body-small {
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .padding-large {
        padding: 2rem;
    }

    .hero-wrapper {
        position: relative;
        display: flex;
        overflow: hidden;
        width: 100%;
        height: auto;
        max-width: 120rem;
        margin-right: auto;
        margin-left: auto;
        justify-content: center;
        align-items: center;
    }

    .footer-background {
        position: relative;
        left: auto;
        top: 0%;
        right: auto;
        bottom: 0%;
        z-index: 0;
        display: flex;
        width: 100%;
        height: auto;
        max-width: 120rem;
        margin-right: auto;
        margin-left: auto;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
    }

    .padding-normal {
        padding: 1rem;
    }

    .section {
        width: 100%;
        height: auto;
        margin-right: auto;
        margin-left: auto;
        padding-top: 4rem;
        padding-bottom: 4rem;
    }

    .heading-style-h2 {
        margin-bottom: 0rem;
        font-size: 2rem;
        line-height: 2.5rem;
        font-weight: 700;
    }

    .heading-style-h2.color-style-white {
        color: #ececec;
    }

    .text-size-regular {
        margin-bottom: 0rem;
    }

    .grid-3col {
        width: 100%;
        height: auto;
        grid-column-gap: 0rem;
        grid-row-gap: 0rem;
        -ms-grid-columns: 1fr 1fr 1fr;
        grid-template-columns: 1fr 1fr 1fr;
        -ms-grid-rows: auto;
        grid-template-rows: auto;
    }

    .grid-3col.gap-small {
        grid-column-gap: 1rem;
        grid-row-gap: 1rem;
    }

    .styleguide_label {
        padding: 0.25rem 0.5rem;
        background-color: #2d85f9;
        color: #fff;
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .styleguide_label.is-html-tag {
        background-color: #be4aa5;
    }

    .heading-style-h4 {
        margin-bottom: 0rem;
        font-size: 1.25rem;
        line-height: 1.75rem;
        font-weight: 700;
    }

    .heading-style-h3 {
        margin-bottom: 0rem;
        font-size: 1.5rem;
        line-height: 2rem;
        font-weight: 700;
    }

    .heading-style-h1 {
        margin-bottom: 0rem;
        font-size: 2.5rem;
        line-height: 3rem;
        font-weight: 700;
    }

    .padding-small {
        padding: 0.5rem;
    }

    .heading {
        font-size: 2rem;
        line-height: 2.5rem;
    }

    .heading-style-h5 {
        margin-bottom: 0rem;
        font-size: 1rem;
        line-height: 1.5rem;
        font-weight: 700;
    }

    .heading-style-h6 {
        margin-bottom: 0rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 700;
    }

    .text-size-medium {
        margin-bottom: 0rem;
        font-size: 1.125rem;
        line-height: 1.625rem;
    }

    .text-size-large {
        margin-bottom: 0rem;
        font-size: 1.25rem;
        line-height: 1.75rem;
    }

    .text-size-xlarge {
        margin-bottom: 0rem;
        font-size: 1.5rem;
        line-height: 2rem;
    }

    .text-size-xlarge.color-style-white {
        color: #ececec;
    }

    .text-size-tiny {
        margin-bottom: 0rem;
        font-size: 0.75rem;
        line-height: 1rem;
    }

    .text-size-small {
        margin-bottom: 0rem;
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .text-size-small.text-style-italic {
        font-style: italic;
    }

    .grid-2col {
        width: 100%;
        height: auto;
        grid-column-gap: 0rem;
        grid-row-gap: 0rem;
        -ms-grid-rows: auto;
        grid-template-rows: auto;
    }

    .grid-2col.gap-large {
        grid-column-gap: 8rem;
        grid-row-gap: 8rem;
    }

    .text-weight-semibold {
        font-weight: 600;
    }

    .bg-footer {
        width: 100%;
        height: auto;
    }

    .hero-01 {
        position: relative;
        z-index: 1;
        width: 100%;
        height: auto;
    }

    .hero-02 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 2;
        width: 100%;
        height: auto;
    }

    .hero-03 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 3;
        width: 100%;
        height: auto;
    }

    .hero-04 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 4;
        width: 100%;
        height: auto;
    }

    .hero-05 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 5;
        width: 100%;
        height: auto;
    }

    .hero-06 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 6;
        width: 100%;
        height: auto;
    }

    .hero-cloud1 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 7;
        width: 100%;
        height: auto;
    }

    .hero-cloud2 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 8;
        width: 100%;
        height: auto;
    }

    .hero-cloud3 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 9;
        width: 100%;
        height: auto;
    }

    .hero-cloud4 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 10;
        width: 100%;
        height: auto;
    }

    .hero-cloud5 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 11;
        width: 100%;
        height: auto;
    }

    .hero-cloud6 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 12;
        width: 100%;
        height: auto;
    }

    .hero-cloud7 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 13;
        width: 100%;
        height: auto;
    }

    .hero-cloud8 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 14;
        width: 100%;
        height: auto;
    }

    .hero-07 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 15;
        width: 100%;
        height: auto;
    }

    .hero-08 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 16;
        width: 100%;
        height: auto;
    }

    .hero-09 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 17;
        width: 100%;
        height: auto;
    }

    .hero-10 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 18;
        width: 100%;
        height: auto;
    }

    .hero-11 {
        position: absolute;
        left: 0%;
        top: 0%;
        right: 0%;
        bottom: 0%;
        z-index: 19;
        width: 100%;
        height: auto;
        transform: translate(0px, 2px);
    }
    .content-image {
        margin-left: 95px;
    position: absolute; /* Định vị hình ảnh */
    bottom: 0; /* Căn vào dưới cùng */
    left: 0; /* Căn vào bên trái */
    width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng, nếu muốn */
    height: auto; /* Giữ tỉ lệ khung hình */
    max-width: 450px; /* Giới hạn chiều rộng tối đa nếu cần */
}
</style>

<body>
    <div class="page-wrapper">
        <div class="main-wrapper">



            <div class="cont" style="margin-top: 100px;">
                <div class="form sign-in">
                    <h2>Đăng nhập</h2>
                    <label>
                        <span>Email</span>
                        <input type="email" />
                    </label>
                    <label>
                        <span>Mật khẩu</span>
                        <input type="password" />
                    </label>
                    <button type="button" class="submit">Đăng nhập</button>
                    <a class="forgot-pass">Quên mật khẩu</a>

                        {{-- <img style="width:450px; height:auto;" src="{{asset('assets/client/img/aaa.png')}}" alt="Mô tả hình ảnh" class="content-image"> --}}

                </div>

                <div class="form forgot-password hidden">
                    <form action="">
                        <h2>Quên mật khẩu</h2>
                        <label>
                            <span>Email</span>
                            <input type="email" />
                        </label>
                        <button type="button" class="submit">Gửi yêu cầu</button>
                        <a class="back-to-login">Trở lại Đăng nhập</a>
                    </form>
                </div>

                <div class="sub-cont">
                    <div class="img">
                        <div class="img__text m--up">
                            <h3>Bạn chưa có tài khoản?</h3>
                            <h6>Hãy đăng ký tài khoản ngay để đọc hàng ngàn bộ truyện tranh miễn phí.</h6>
                        </div>
                        <div class="img__text m--in">
                            <h3>Bạn đã có tài khoản ?</h3>
                            <h6>Hãy đăng nhập để tiếp tục đọc truyện tranh yêu thích của bạn.</h6>
                        </div>
                        <div class="img__btn">
                            <span class="m--up">Đăng ký</span>
                            <span class="m--in">Đăng nhập</span>
                        </div>
                    </div>

                    <div class="form sign-up">
                        <h2>Đăng ký</h2>
                        <label>
                            <span>Tên của bạn</span>
                            <input type="text" />
                        </label>
                        <label>
                            <span>Email</span>
                            <input type="email" />
                        </label>
                        <label>
                            <span>Mật khẩu</span>
                            <input type="password" />
                        </label>
                        <label>
                            <span>Nhập lại mật khẩu</span>
                            <input type="password" />
                        </label>
                        <button type="button" class="submit">Đăng ký</button>
                    </div>
                </div>

            </div>


            <img src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed366f416b50ef4198f_hero-10.png"
                loading="eager" data-w-id="e6ede762-e50a-a9be-d4be-c870057d80f6"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed366f416b50ef4198f_hero-10-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed366f416b50ef4198f_hero-10-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed366f416b50ef4198f_hero-10-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed366f416b50ef4198f_hero-10-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed366f416b50ef4198f_hero-10.png 1920w"
                alt="" class="hero-10" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fb84ec9ed360_hero-09.png"
                loading="eager" data-w-id="0743b281-3e58-55cd-e58c-7dd682958590"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fb84ec9ed360_hero-09-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fb84ec9ed360_hero-09-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fb84ec9ed360_hero-09-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fb84ec9ed360_hero-09-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fb84ec9ed360_hero-09.png 1920w"
                alt="" class="hero-09" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fbbe789ed35f_hero-08.png"
                loading="eager" data-w-id="a543dead-f79e-976a-1641-604f578fbbef"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fbbe789ed35f_hero-08-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fbbe789ed35f_hero-08-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fbbe789ed35f_hero-08-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fbbe789ed35f_hero-08-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36949fbbe789ed35f_hero-08.png 1920w"
                alt="" class="hero-08" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191c368bca9158_hero-07.png"
                loading="eager" data-w-id="4e679f3b-ca09-d650-de73-8dbc04cbe44a"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191c368bca9158_hero-07-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191c368bca9158_hero-07-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191c368bca9158_hero-07-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191c368bca9158_hero-07-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191c368bca9158_hero-07.png 1920w"
                alt="" class="hero-07" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3caead8945493f05f_hero-cloud8.png"
                loading="eager"
                style="-webkit-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-16%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="6712b825-59e1-55f7-828a-e2b711e65696"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3caead8945493f05f_hero-cloud8-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3caead8945493f05f_hero-cloud8-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3caead8945493f05f_hero-cloud8-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3caead8945493f05f_hero-cloud8-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3caead8945493f05f_hero-cloud8.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud8" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed39835782b05d9c892_hero-cloud7.png"
                loading="eager"
                style="-webkit-transform:translate3d(-14%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-14%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-14%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-14%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="acb7e9a8-d063-f979-0591-5929e169ba15"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed39835782b05d9c892_hero-cloud7-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed39835782b05d9c892_hero-cloud7-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed39835782b05d9c892_hero-cloud7-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed39835782b05d9c892_hero-cloud7-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed39835782b05d9c892_hero-cloud7.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud7" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3e9b474918e176deb_hero-cloud6.png"
                loading="eager"
                style="-webkit-transform:translate3d(-12%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-12%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-12%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-12%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="733154d0-2d0d-955d-7f34-8e0f5c16c08a"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3e9b474918e176deb_hero-cloud6-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3e9b474918e176deb_hero-cloud6-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3e9b474918e176deb_hero-cloud6-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3e9b474918e176deb_hero-cloud6-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3e9b474918e176deb_hero-cloud6.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud6" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed38defc05f3ac4f408_hero-cloud5.png"
                loading="eager"
                style="-webkit-transform:translate3d(-10%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-10%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-10%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-10%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="26697736-c1df-9275-b944-5e2d003a2e1f"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed38defc05f3ac4f408_hero-cloud5-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed38defc05f3ac4f408_hero-cloud5-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed38defc05f3ac4f408_hero-cloud5-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed38defc05f3ac4f408_hero-cloud5-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed38defc05f3ac4f408_hero-cloud5.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud5" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bf9aaf762de4bde4_hero-cloud4.png"
                loading="eager"
                style="-webkit-transform:translate3d(-8%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-8%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-8%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-8%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="b3fd6dd3-19f4-c359-99ee-294be676e363"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bf9aaf762de4bde4_hero-cloud4-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bf9aaf762de4bde4_hero-cloud4-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bf9aaf762de4bde4_hero-cloud4-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bf9aaf762de4bde4_hero-cloud4-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bf9aaf762de4bde4_hero-cloud4.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud4" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed336cbb3ecdd8978a8_hero-cloud3.png"
                loading="eager"
                style="-webkit-transform:translate3d(-6%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-6%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-6%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-6%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="73d2ea55-928f-4ee8-9599-765915f4912a"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed336cbb3ecdd8978a8_hero-cloud3-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed336cbb3ecdd8978a8_hero-cloud3-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed336cbb3ecdd8978a8_hero-cloud3-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed336cbb3ecdd8978a8_hero-cloud3-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed336cbb3ecdd8978a8_hero-cloud3.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud3" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9cf952a5d681_hero-cloud2.png"
                loading="eager"
                style="-webkit-transform:translate3d(-4%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-4%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-4%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-4%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="01c6313c-a834-1af1-1b6c-a72487819679"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9cf952a5d681_hero-cloud2-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9cf952a5d681_hero-cloud2-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9cf952a5d681_hero-cloud2-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9cf952a5d681_hero-cloud2-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9cf952a5d681_hero-cloud2.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud2" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3882c7f5fe64bf2fe_hero-cloud1.png"
                loading="eager"
                style="-webkit-transform:translate3d(-2%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(-2%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(-2%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(-2%, 0, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                data-w-id="1642748a-6600-fe7e-b4d0-0972a54e29d1"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3882c7f5fe64bf2fe_hero-cloud1-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3882c7f5fe64bf2fe_hero-cloud1-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3882c7f5fe64bf2fe_hero-cloud1-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3882c7f5fe64bf2fe_hero-cloud1-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3882c7f5fe64bf2fe_hero-cloud1.png 1920w"
                sizes="(max-width: 1920px) 100vw, 1920px" alt="" class="hero-cloud1" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed35158510034bf8a33_hero-06.png"
                loading="eager" data-w-id="48e62a5f-d176-741d-b088-b8f4e58cbb14"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed35158510034bf8a33_hero-06-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed35158510034bf8a33_hero-06-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed35158510034bf8a33_hero-06-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed35158510034bf8a33_hero-06-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed35158510034bf8a33_hero-06.png 1920w"
                alt="" class="hero-06" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc011b052418a_hero-05.png"
                loading="eager" data-w-id="5c7e17ad-e0de-d9b9-db3e-4b167a486636"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc011b052418a_hero-05-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc011b052418a_hero-05-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc011b052418a_hero-05-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc011b052418a_hero-05-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc011b052418a_hero-05.png 1920w"
                alt="" class="hero-05" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc061a2524188_hero-04.png"
                loading="eager" data-w-id="2d7243dd-41e3-69b3-8873-354e8d0abe74"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc061a2524188_hero-04-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc061a2524188_hero-04-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc061a2524188_hero-04-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc061a2524188_hero-04-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed36affc061a2524188_hero-04.png 1920w"
                alt="" class="hero-04" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191cf21fca9159_hero-03.png"
                loading="eager" data-w-id="9d46970b-47a1-a7e6-5032-f28adc3e0f4c"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191cf21fca9159_hero-03-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191cf21fca9159_hero-03-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191cf21fca9159_hero-03-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191cf21fca9159_hero-03-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed37a191cf21fca9159_hero-03.png 1920w"
                alt="" class="hero-03" /><img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bcb1918d5dd3608d_hero-02.png"
                loading="eager" data-w-id="1aafa651-59a3-244c-daa4-1d06eac3a3f9"
                sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bcb1918d5dd3608d_hero-02-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bcb1918d5dd3608d_hero-02-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bcb1918d5dd3608d_hero-02-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bcb1918d5dd3608d_hero-02-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3bcb1918d5dd3608d_hero-02.png 1920w"
                alt="" class="hero-02" />
            <img
                src="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9c40f9a5d680_hero-01.png"
                loading="eager" sizes="(max-width: 1920px) 100vw, 1920px"
                srcset="https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9c40f9a5d680_hero-01-p-500.png 500w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9c40f9a5d680_hero-01-p-800.png 800w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9c40f9a5d680_hero-01-p-1080.png 1080w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9c40f9a5d680_hero-01-p-1600.png 1600w, https://assets.website-files.com/607bec7082b45011f6bea82e/639d6ed3598a9c40f9a5d680_hero-01.png 1920w"
                alt="" class="hero-01" />

            <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

<script>
    document.querySelector('.img__btn').addEventListener('click', function () {
        document.querySelector('.cont').classList.toggle('s--signup');
    });

    document.querySelector('.forgot-pass').addEventListener('click', function () {
        document.querySelector('.sign-in').classList.add('hidden');
        document.querySelector('.forgot-password').classList.remove('hidden');
    });

    document.querySelector('.back-to-login').addEventListener('click', function () {
        document.querySelector('.forgot-password').classList.add('hidden');
        document.querySelector('.sign-in').classList.remove('hidden');
    });
</script>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=607bec7082b45011f6bea82e"
    type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script src="https://assets.website-files.com/607bec7082b45011f6bea82e/js/parallax-bgsprod.2df621b96.js"
    type="text/javascript"></script>

</html>
