<link href="{{asset('product/rating/bootstrap-rating.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel='stylesheet' href="{{asset('product/product-gallery-slider/slick.css')}}">
<link rel='stylesheet' href="{{asset('product/product-gallery-slider/jquery.fancybox.min.css')}}">
<style>
    /* rating */
    .fa-star {
        font-size: 20px;
    }

    .rating-color {
        color: #fbc634 !important
    }

    .count-cmt {
        padding-left: 10px;
    }

    .product-add-form {
        margin-top: 20px;
    }

    .product-add-form .addtocart-btn {
        background-color: #ff7132;
        font-size: 20px;
        color: #fff;
        height: 48px;
        width: 240px;
        max-width: 100%;
    }

    .product-add-form #qty {
        height: 48px;
        width: 48px;
        border-radius: 8px;
        padding: 0px;
        font-size: 16px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid;
    }

    .product-add-form .qty-minus,
    .product-add-form .qty-plus {

        border-radius: 8px;
        background-color: rgba(0, 186, 242, .3);
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        width: 48px;
        height: 48px;
        display: inline-block;
        text-decoration: none;
        position: relative;
        font-size: 30px;
    }

    .product-service .info {
        display: inline-block;
        vertical-align: top;
        padding: 15px 10px;
        border-radius: 1rem;
        border: solid 0.1rem rgba(112, 112, 112, .3);
    }

    .product-service .info-text {
        line-height: 1.25;
        color: #616161;
        margin-bottom: 25px;
    }

    .product-service .info-text:last-child {
        margin-bottom: 0px;
    }

    .product-service .info-img {
        -webkit-display: flex;
        -moz-display: flex;
        -ms-display: flex;
        display: flex;
        -webkit-align-items: flex-start;
        -moz-align-items: flex-start;
        -ms-align-items: flex-start;
        align-items: center;
        margin-bottom: 5px;
    }

    .product-service .info-img p:last-child {
        font-size: 16px;
        -webkit-display: flex;
        -moz-display: flex;
        -ms-display: flex;
        display: flex;
        -webkit-align-items: flex-end;
        -moz-align-items: flex-end;
        -ms-align-items: flex-end;
        align-items: flex-end;
        color: #616161;
        margin-left: 1.2rem;
    }

    .product-service p:last-child {
        margin: 0;
    }

    .product-price-final {
        font-size: 38px;
        color: #ff4332;
        font-weight: 700;
        white-space: nowrap;
        line-height: 1;
    }

    .product-price-old {
        text-decoration: line-through;
        font-size: 20px;
        padding-right: 10px;
    }

    .product-price-box {
        margin-top: 15px;
        min-height: 107px;
        padding: 15px;
        background-color: #eee;
        border-radius: 6px;
    }

    .product-share a {
        color: #000;
    }

    .product-share .to-share {
        margin-right: 10px;
    }

    .product-share .to-share i {
        padding-right: 5px;
    }

    .product-share .to-wishlist i,
    .product-share .to-share i {
        font-size: 25px;
        color: #007bff !important
    }

    .product-top h1 {
        color: #003189;
        font-weight: 700;
        font-size: 24px;
        line-height: 1.33;
    }

    .flex {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        align-items: center;
    }

    .product-brand {
        margin-right: 20px;
    }

    .uk-flex-space-between {
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
    }




    /* product-same */
    .product-same {
        margin: 20px 0px;
    }

    .product-same h2 {
        color: #003189;
        font-weight: 700;
        font-size: 24px;
        line-height: 1.33;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    /* .product-detail */
    .product-detail {
        margin: 20px 0px;
    }

    .product-detail-value h2 {
        font-size: 20px;
    }

    .product-detail-value h3 {
        font-size: 18px;
    }

    .product-detail-value p {
        margin-bottom: 5px;
    }

    .product-detail>h3 {
        color: #003189;
        font-weight: 700;
        font-size: 24px;
        line-height: 1.33;
        border-bottom: 1px solid;
        padding-bottom: 5px;
    }

    .product-detail-value {
        padding: 20px 0px;
        position: relative;

    }

    .gradient-bottom {
        max-height: 670px;
        overflow: hidden;
        transition: height .3s ease-in-out;
        -webkit-transition: height .3s ease-in-out;
    }

    .product-show .btn,
    .btn-cmt {
        background-image: none;
        background: #00baf2;
        border: 1px solid #00baf2;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        margin: 0;
        line-height: normal;
        box-sizing: border-box;
        vertical-align: middle;
        width: 328px;
        max-width: 100%;
    }

    .product-show {
        display: block;
        padding-top: 10px;
        text-align: center;
    }

    .product-detail-value.gradient-bottom:after {
        content: "";
        background: rgba(255, 255, 255, 0);
        background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 0%, #fff 90%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255, 255, 255, 0)), color-stop(90%, #fff));
        background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 0%, #fff 90%);
        background: -o-linear-gradient(top, rgba(255, 255, 255, 0) 0%, #fff 90%);
        background: -ms-linear-gradient(top, rgba(255, 255, 255, 0) 0%, #fff 90%);
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #fff 90%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ffffff', GradientType=0);
        display: block;
        height: 6rem;
        bottom: 0;
        width: 100%;
        position: absolute;
        left: 0;
    }

    .additional-attributes tr th:first-child {
        padding: 0px !important;
    }

    /*đánh giá*/
    .review-rating__summary {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
    }

    .review-rating__point {
        font-size: 32px;
        line-height: 40px;
        font-weight: 700;
        white-space: nowrap;
        margin: 0px 16px 0px 0px;
    }

    .review-rating__level {
        display: flex;
        margin: 4px 0px;
        -webkit-box-align: center;
        align-items: center;
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
    }

    .review-rating__detail {
        margin: 12px 0px 12px;
    }

    .review-rating__width {
        width: 200px;
        height: 6px;
        background-color: rgb(245, 245, 250);
        position: relative;
        z-index: 1;
        margin: 0px 8px;
        border-radius: 99em;
    }

    .review-rating__width>div {
        position: absolute;
        left: 0px;
        top: 0px;
        bottom: 0px;
        background-color: rgb(128, 128, 137);
        border-radius: 99em;
    }

    .review-rating__number {
        font-size: 11px;
        line-height: 16px;
        color: rgb(128, 128, 137);
    }

    .review-rating__star .fa-star {
        font-size: 15px;
    }

    .review-rating__stars .fa-star, .review-rating__stars .fa-star-o {
        font-size: 30px;
    }

    /* filter-review */
    .filter-review {
        display: flex;
        padding: 20px 0px;
    }

    .filter-review__label {
        flex-shrink: 0;
        font-size: 15px;
        line-height: 24px;
        margin: 0px 16px 0px 0px;
        padding-top: 4px;
        color: rgb(56, 56, 61);
        font-weight: 400;
    }

    .filter-review__inner {
        -webkit-box-flex: 1;
        flex-grow: 1;
        display: flex;
        flex-wrap: wrap;
    }

    .filter-review__item {
        height: 32px;
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        padding: 6px 12px;
        border-radius: 100px;
        color: rgb(56, 56, 61);
        background: rgb(245, 245, 250);
        margin: 0px 16px 12px 0px;
        cursor: pointer;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        user-select: none;
    }

    .filter-review__check {
        display: none;
        width: 18px;
        height: 18px;
        margin-right: 11px;
    }

    .filter-review__item.active .filter-review__check {
        display: block !important;
    }

    .filter-review__item.active {
        background: rgb(240, 248, 255);
        border: 1px solid rgb(26, 148, 255);
    }

    /* review_images */
    .review-images__heading {
        margin: 0px 0px 16px;
        font-size: 17px;
        line-height: 24px;
        font-weight: 500;
    }

    .review-images__inner {
        display: flex;
    }

    .review-images__item {
        width: 120px;
        height: 120px;
        margin: 0px 16px 0px 0px;
        cursor: pointer;
    }

    .review-images__img {
        background-size: cover;
        border-radius: 4px;
        height: 100%;
        width: 100%;
        background-position: center center;
    }

    .review-images__item:last-child {
        position: relative;
        z-index: 1;
        margin: 0px;
    }

    .review-images__total {
        background-color: rgba(36, 36, 36, 0.7);
        font-size: 17px;
        font-weight: 500;
        position: absolute;
        inset: 0px;
        line-height: 120px;
        text-align: center;
        color: rgb(255, 255, 255);
        border-radius: 4px;
    }

    .review-comment__user-inner {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
    }

    .review-comment__user-avatar {
        margin: 0px 12px 0px 0px;
        width: 48px;
        height: 48px;
        background-size: cover;
        border-radius: 50%;
        position: relative;
        z-index: 1;
    }

    .has-character {
        position: relative;
        padding-top: 100%;
        background-color: rgb(242, 242, 242);
        border-radius: 50%;
        overflow: hidden;
    }

    .has-character span {
        position: absolute;
        inset: 0px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        font-size: 100%;
        font-weight: 500;
        color: rgb(153, 153, 153);
    }

    .review-comment__rating-title {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        margin: 0px 0px 4px;
    }

    .review-comment__title {
        margin: 0px 0px 0px 12px;
        font-size: 15px;
        line-height: 24px;
        font-weight: 500;
        color: rgb(36, 36, 36);
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
    }

    .review-comment__rating {
        flex-shrink: 0;
        position: relative;
        z-index: 1;
        display: inline-block;
    }

    .review-comment__seller-name-attributes {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        margin: 0px 0px 16px;
    }

    .review-comment__seller-name {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        font-size: 13px;
        font-weight: 400;
        line-height: 20px;
        color: rgb(0, 171, 86);
    }

    .review-comment__check-icon {
        display: block;
        width: 14px;
        height: 14px;
        background-color: rgb(0, 171, 86);
        border-radius: 50%;
        position: relative;
        z-index: 1;
        margin: 0px 6px 0px 0px;
    }

    .review-comment__check-icon::before {
        content: "";
        width: 6px;
        height: 3px;
        border-left: 1px solid rgb(255, 255, 255);
        border-bottom: 1px solid rgb(255, 255, 255);
        position: absolute;
        display: block;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -70%) rotate(-45deg);
    }

    .review-comment__content {
        font-size: 13px;
        font-weight: 400;
        line-height: 20px;
        margin: 0px 0px 8px;
    }

    .review-comment__images {
        display: flex;
        flex-wrap: wrap;
        margin: 0px -6px;
    }

    .review-comment__image {
        width: 152px;
        height: 152px;
        border-radius: 4px;
        background-size: cover;
        background-position: center center;
        margin: 0px 6px 8px;
        cursor: pointer;
    }

    .review-comment__created-date {
        font-size: 13px;
        line-height: 20px;
        margin: 0px 0px 16px;
        color: rgb(128, 128, 137);
    }

    .review-comment__thank {
        padding: 8px 16px;
        font-size: 14px;
        line-height: 20px;
        color: rgb(11, 116, 229);
        border: 1px solid rgb(11, 116, 229);
        font-weight: 500;
        border-radius: 4px;
        margin: 0px 24px 0px 0px;
        cursor: pointer;
        display: inline-block;
        user-select: none;
    }

    .review-comment__thank>svg {
        margin: 0px 8px 0px 0px;
    }

    .review-comment__thank>svg,
    .review-comment__thank>span {
        display: inline-block;
        vertical-align: middle;
    }

    .review-comment__thank--active {
        background-color: rgb(219, 238, 255);
        border-color: transparent;
    }

    .review-comment__reply {
        padding: 8px 16px;
        font-size: 14px;
        line-height: 20px;
        color: rgb(11, 116, 229);
        font-weight: 500;
        cursor: pointer;
        display: inline-block;
        user-select: none;
    }

    /* reply-comment */
    .reply-comment {
        margin: 12px 0px;
    }

    .reply-comment__outer {
        display: flex;
        align-items: center;
    }

    .reply-comment__avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-size: cover;
        background-position: center center;
        flex-shrink: 0;
        margin: 0px 8px 0px 0px;
    }

    .reply-comment__avatar img {
        display: block;
        border-radius: 50%;
        background-color: rgb(242, 242, 242);
    }

    .reply-comment__wrapper {
        position: relative;
        z-index: 1;
        -webkit-box-flex: 1;
        flex-grow: 1;
    }

    .reply-comment__input {
        border: 1px solid rgb(238, 238, 238);
        padding: 10px 40px 10px 12px;
        border-radius: 12px;
        width: 100%;
        outline: 0px;
        font-size: 13px;
        line-height: 20px;
        resize: none;
        overflow: hidden;
    }

    .reply-comment__wrapper>div {
        min-height: 40px;
    }

    .reply-comment__wrapper>div>span {
        font-weight: bold;

    }

    .reply-comment__submit:focus {
        outline: 0px;
    }

    .reply-comment__error.danger {
        color: rgb(255, 66, 78);
        margin: 0px 0px 12px;
    }

    .reply-comment__error.success {
        color: rgb(0, 171, 86);
        margin: 0px 0px 12px;
    }

    .reply-comment__submit {
        position: absolute;
        z-index: 1;
        width: 17px;
        right: 12px;
        bottom: 16px;
        cursor: pointer;
        background: transparent;
        border: 0px;
        padding: 0px;
    }

    .review-comment-item {
        padding: 32px 0px;
        border-top: 1px solid rgb(242, 242, 242);
    }

    .btn-cmt {
        width: 100% !important;
    }

    .write-review__product {
        display: flex;
        padding: 0px 40px 0px 0px;
        -webkit-box-align: center;
        align-items: center;
        margin: 0px 0px 32px;
    }

    .write-review__product-img {
        width: 40px;
        margin: 0px 12px 0px 0px;
    }

    .write-review__product-wrap {
        display: flex;
        flex-direction: column;
        -webkit-box-pack: justify;
        justify-content: space-between;
        width: 100%;
        height: 40px;
        padding: 0px 40px 0px 0px;
    }

    .write-review__product-name {
        font-size: 14px;
        line-height: 20px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        flex: 1 1 0%;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 600px;
        }
    }

    .write-review__heading {
        font-size: 18px;
        line-height: 24px;
        font-weight: 500;
        text-align: center;
        margin: 0px 0px 12px;
    }

    .write-review__stars {
        text-align: center;
    }

    .write-review__stars .fa-star ,.write-review__stars .fa-star-o{
        font-size: 35px;
        margin: 0px 5px;
    }

    .write-review__buttons {
        flex: 1 1 0%;
        align-items: flex-end;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        padding: 0px 0px 16px;
        margin: 0px;
    }

    .write-review__input {
        border: 1px solid rgb(238, 238, 238);
        padding: 12px;
        border-radius: 4px;
        resize: none;
        width: 100%;
        outline: 0px;
        margin: 12px 0px 12px;
    }

    .write-review__file {
        position: absolute;
        height: 0px;
        width: 0px;
        visibility: hidden;
        opacity: 0;
        clip: rect(0px, 0px, 0px, 0px);
    }

    .write-review__button {
        width: 49%;
        height: 36px;
        border: 0px;
        background: 0px center;
        padding: 0px;
        line-height: 36px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        outline: 0px;
    }

    .write-review__button--image {
        color: rgb(11, 116, 229);
        border: 1px solid rgb(11, 116, 229);
    }

    .write-review__button--image img {
        width: 15px;
        margin: 0px 4px 0px 0px;
    }

    .write-review__button--submit {
        background-color: rgb(11, 116, 229);
        color: rgb(255, 255, 255);
    }

    .write-review__images {
        text-align: left;
        margin: 0px 0px 12px;
    }

    .write-review__image {
        display: inline-block;
        width: 48px;
        height: 48px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        margin: 0px 12px 0px 0px;
        border: 1px solid rgb(224, 224, 224);
        border-radius: 4px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .write-review__image-close {
        width: 21px;
        height: 21px;
        background-color: rgb(255, 255, 255);
        border-radius: 50%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
        line-height: 21px;
        font-size: 18px;
        display: none;
        text-align: center;
    }

    .write-review__image:hover .write-review__image-close {
        display: block;
    }

    .write-review__image:hover::after {
        content: "";
        position: absolute;
        inset: 0px;
        background-color: rgba(36, 36, 36, 0.7);
    }

    .write-review__info {
        flex: 1 1 0%;
        align-items: flex-end;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        margin: 12px 0px 0px;
    }

    .write-review__info input {
        width: 49%;
        height: 36px;
        background: 0px center;

        line-height: 36px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        outline: 0px;
    }

    /**sub cmt */
    .review-comment__sub-comments {
        margin: 16px 0px 0px;
    }

    .review-sub-comment {
        margin: 8px 0px 0px;
        display: flex;
    }

    .review-sub-comment:first-child {
        margin: 20px 0px 0px;
    }

    .review-sub-comment__avatar-thumb {
        width: 32px;
        height: 32px;
        background-size: cover;
        margin: 0px 8px 0px 0px;
        border-radius: 50%;
        min-width: 32px;
    }

    .has-character {
        position: relative;
        padding-top: 100%;
        background-color: rgb(242, 242, 242);
    }

    .has-character span {
        position: absolute;
        inset: 0px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        font-size: 100%;
        font-weight: 500;
        color: rgb(153, 153, 153);
    }

    .review-sub-comment__inner {
        padding: 10px 12px;
        border: 1px solid rgb(242, 242, 242);
        background-color: rgb(250, 250, 250);
        border-radius: 12px;
        -webkit-box-flex: 1;
        flex-grow: 1;
    }

    .review-sub-comment__avatar {
        display: flex;
        -webkit-box-align: center;
        align-items: center;
    }

    .review-sub-comment__avatar-name {
        font-size: 13px;
        line-height: 20px;
        font-weight: 500;
        text-transform: capitalize;
    }

    .review-sub-comment__avatar-date {
        color: rgb(128, 128, 137);
        margin: 0px 0px 0px 6px;
        padding: 0px 0px 0px 8px;
        position: relative;
        z-index: 1;
        font-size: 13px;
        line-height: 20px;
        font-weight: 400;
    }

    .review-sub-comment__avatar-date::before {
        content: "";
        height: 2px;
        width: 2px;
        background-color: rgb(128, 128, 137);
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 0px;
        margin: -1px 0px 0px;
    }

    .review-sub-comment__content {
        font-size: 13px;
        line-height: 20px;
        margin: 4px 0px 0px;
        margin-bottom: 10px;
    }

    /**album anhr cmt */
    .slick-active.is-active .cSlider__item_child_2 {
        border: 2px solid red;
    }

    .UNFVx .main-slide-wrapper .main-slide-container {
        /* height: calc(100% - 30px); */
        width: 550px;
        margin: auto;
        position: relative;
    }

    .cSlider--single .slick-slide img {
        margin: 0px auto;
        display: block;
    }


    .cSlider--nav {
        margin-top: 10px;
    }

    .fLNLeB {
        object-fit: contain;
        width: 550px !important;
        height: 700px !important;
        background-color: #fff;
    }

    .cSlider__item_child {
        background: #fff;
        margin: 0px 2px;
    }

    .kipMhU {
        display: inline-block;
        height: 75px;
        width: 100%;
        object-fit: contain;
        position: relative;
    }

    .UNFVx .main-slide-wrapper {
        flex: 1 1 0%;
        position: relative;
    }


    .UNFVx .slide-nav-wrapper {
        flex: 0 0 130px;
    }

    .UNFVx .slide-nav-wrapper .container {
        width: 948px;
        margin: auto;
    }

    .UNFVx .slide-nav-wrapper .tab .tab-item {
        color: rgb(255, 255, 255);
        font-size: 18px;
        font-weight: 300;
        cursor: pointer;
        display: inline-block;
        padding: 0px 0px 3px;
        text-decoration: none;
        margin-right: 10px;
    }

    .UNFVx .slide-nav-wrapper .tab .tab-item.actived {
        text-decoration: none;
        border-bottom: 2px solid rgb(0, 127, 240);
    }

    .UNFVx {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        background-color: rgba(0, 0, 0, 0.95);
        z-index: 999;
    }

    .UNFVx .btn-close {
        cursor: pointer;
        position: absolute;
        top: 24px;
        right: 40px;
        z-index: 1;
        display: flex;
        flex-direction: column;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        color: rgb(204, 204, 204) !important;
        font-size: 40px;
    }

    .UNFVx .btn-close span {
        font-size: 14px;
    }
    .fa.fa-star-o,.fa.fa-star{
        color: #fbc634 !important;
    }
</style>