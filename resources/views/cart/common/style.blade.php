<style>
    /* .card-home */
    .card-home .version-product ul {
        list-style: none;
        display: flex;
        padding: 0px;
    }

    .card-home .swatch-option {
        border: 1px solid #dddddd;
        margin-right: 10px;
        padding: 10px;
        cursor: default;
    }

    .card-home .swatch-option.selected {
        font-weight: bold;
        border: 1px solid #000;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAxNiAxNSIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTAuMjg1MTU2IDE0LjQ0NjNMMTUuMTYwMiAwLjQ0NjI4OVYxNC40NDYzSDAuMjg1MTU2WiIgZmlsbD0iIzMzM0Y0OCIvPgo8ZyBjbGlwLXBhdGg9InVybCgjY2xpcDApIj4KPHBhdGggZD0iTTguOTgyMDcgMTEuMzgwMUw3LjEyNjAxIDkuNTUxNjlMNi41MDczMiAxMC4xNjExTDguOTgyMDcgMTIuNTk5TDE0LjI4NTEgNy4zNzUwOEwxMy42NjY0IDYuNzY1NjJMOC45ODIwNyAxMS4zODAxWiIgZmlsbD0id2hpdGUiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMCI+CjxyZWN0IHdpZHRoPSI4Ljc1IiBoZWlnaHQ9IjguNzUiIGZpbGw9IndoaXRlIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg1LjUzNTE2IDQuODIxMjkpIi8+CjwvY2xpcFBhdGg+CjwvZGVmcz4KPC9zdmc+Cg==);
        background-repeat: no-repeat;
        background-position: right -1px bottom -1px;
        background-size: 14px 14px;
    }

    .card-home .uk-flex {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
    }

    .card-home .uk-flex-middle {
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .card-home .uk-flex-space-between {
        -ms-flex-pack: justify;
        -webkit-justify-content: space-between;
        justify-content: space-between;
    }

    .card-home .quantity {
        display: flex;
        align-items: center;
    }

    .card-home .quantity input,
    .card-home .quantity .btn-card {
        height: 36px !important;
    }

    .card-home .btn-card {
        outline: none;
        cursor: pointer;
        font-size: .875rem;
        font-weight: 300;
        line-height: 1;
        letter-spacing: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color .1s cubic-bezier(.4, 0, .6, 1);
        border: 1px solid rgba(0, 0, 0, .09);
        border-radius: 2px;
        background: transparent;
        color: rgba(0, 0, 0, .8);
        width: 32px;
        height: 32px;
    }

    .card-home .btn-card:first-child {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .card-home .fc-cart-update {
        border: 1px solid #dddddd;
        border-left: 0;
        border-right: 0;
        font-size: 16px;
        font-weight: 400;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        text-align: center;
        cursor: text;
        border-radius: 0;
        -webkit-appearance: none;
        width: 50px !important;
        height: 32px !important;
    }

    .card-home .btn-card .shopee-svg-icon {
        font-size: 10px;
        width: 10px;
        height: 10px;
        flex-shrink: 0;
    }

    .card-home .list-version.selected {
        -webkit-animation: shake 1s ease 1;
        animation: shake 1s ease 1;
    }

    @-webkit-keyframes shake {

        0%,
        100% {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px);
        }

        20%,
        40%,
        60%,
        80% {
            -webkit-transform: translateX(10px);
            transform: translateX(10px);
        }
    }

    @keyframes shake {

        0%,
        100% {
            -webkit-transform: translateX(0);
            -ms-transform: translateX(0);
            transform: translateX(0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            -webkit-transform: translateX(-10px);
            -ms-transform: translateX(-10px);
            transform: translateX(-10px);
        }

        20%,
        40%,
        60%,
        80% {
            -webkit-transform: translateX(10px);
            -ms-transform: translateX(10px);
            transform: translateX(10px);
        }
    }

    .shake {
        -webkit-animation-name: shake;
        animation-name: shake;
    }
</style>

<style>
    .cart-discount {
        background-color: rgba(122, 156, 89, .2);
        font-size: .85em;
    }

    a {
        color: #000;
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

    .button-continue-shopping {
        border: 2px solid currentColor;
        background-color: transparent;
        color: #446084;
        border-radius: 0px;
    }

    .shop_table .actions {
        border: 0;
        padding: 15px 0 10px;
    }

    .pull-left {
        float: left;
    }

    input[type=email],
    input[type=date],
    input[type=search],
    input[type=number],
    input[type=text],
    input[type=tel],
    input[type=url],
    input[type=password],
    textarea,
    select,
    .select-resize-ghost,
    .select2-container .select2-choice,
    .select2-container .select2-selection {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border: 1px solid #ddd;
        padding: 0 0.75em;
        height: 2.507em;
        font-size: .97em;
        border-radius: 0;
        max-width: 100%;
        width: 100%;
        vertical-align: middle;
        background-color: #fff;
        color: #333;
        -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
        box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
        -webkit-transition: color .3s, border .3s, background .3s, opacity .3s;
        -o-transition: color .3s, border .3s, background .3s, opacity .3s;
        transition: color .3s, border .3s, background .3s, opacity .3s;
    }

    .shop_table .cart_item td {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .shop_table .cart_item td {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    td.product-remove {
        width: 20px;
        padding: 0;
    }

    td.product-thumbnail {
        min-width: 60px;
        max-width: 90px;
        width: 90px;
    }

    td.product-name {
        word-break: break-word;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
    }

    .shop_table tr td:last-of-type {
        text-align: right;
    }

    #main-cart a.remove,
    #main-cart a.icon-remove {
        display: block;
        width: 24px;
        height: 24px;
        font-size: 15px !important;
        line-height: 19px !important;
        border-radius: 100%;
        color: #ccc;
        font-weight: bold;
        text-align: center;
        border: 2px solid currentColor;
    }

    td img {
        min-width: 60px;
        max-width: 90px;
        width: 90px;
        height: 90px;
    }

    @media (min-width: 550px) {
        .show-for-small {
            display: none !important;
        }
    }

    .quantity {
        opacity: 1;
        display: inline-block;
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        margin-right: 1em;
        white-space: nowrap;
        vertical-align: top;
    }

    .shop_table .quantity {
        margin: 0;
    }

    .quantity .button.minus {
        border-right: 0 !important;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    .quantity input[type=number] {
        width: 36px;
        text-align: center;
        border-radius: 0 !important;

    }

    .quantity input {
        padding-left: 0;
        padding-right: 0;
        margin: 0;
    }

    .quantity .button.plus {
        border-left: 0 !important;
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    input[type=button].is-form {
        overflow: hidden;
        position: relative;
        background-color: #f9f9f9;
        text-shadow: 1px 1px 1px #fff;
        color: #666;
        border: 1px solid #ddd;
        text-transform: none;
        font-weight: normal;
        width: 25px;
    }

    input[type=button].is-form:hover {
        cursor: pointer;
    }

    .screen-reader-text {
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        -webkit-clip-path: inset(50%);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        word-wrap: normal !important;
    }

    .screen-reader-text {
        clip: rect(1px, 1px, 1px, 1px);
        position: absolute !important;
        height: 1px;
        width: 1px;
        overflow: hidden;
    }

    .apply_counpon {
        position: relative;
    }

    #coupon_code {
        border-radius: 0px;
        margin-bottom: 20px;
    }

    #apply_coupon {
        overflow: hidden;
        position: absolute;
        right: 0px;
        top: 0px;
        background-color: #000;
        color: #fff;
        border: 1px solid #ddd;
        border-radius: 0px;
        padding: 5px 10px;
        height: 38px;
        letter-spacing: 1px;
        font-weight: 400;

    }

    h3.widget-title {
        border-bottom: 3px solid #ececec;
        font-size: .95em;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    .product-name {
        line-height: 1.05;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 15px;
    }

    table {
        width: 100%;
        margin-bottom: 1em;
        border-color: #ececec;
        border-spacing: 0;
    }

    .cart_totals tbody th {
        text-transform: inherit;
        letter-spacing: 0;
        font-weight: normal;
    }

    span.amount {
        white-space: nowrap;
        color: #111;
        font-weight: bold;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
        border-bottom: 1px solid #ececec;
        line-height: 1.3;
    }

    th:first-child,
    td:first-child {
        padding-left: 0;
    }

    .shop_table tr td:last-of-type {
        text-align: right;
    }

    .cart_totals .checkout {
        margin: 15px 0;
    }

    .checkout-button {
        background-color: #000;
        min-width: 100%;
        margin-right: 0;
        display: block;
        font-size: 16px;
        letter-spacing: 3px;
        color: #fff;
        text-transform: uppercase;
        border-radius: 0px;
        font-weight: bold;
    }

    @media (max-width: 549px) {
        .shop_table .product-price {
            display: none;
        }

        .shop_table .product-subtotal {
            display: none;
        }
    }

    form.checkout h3 {
        font-size: 1.1em;
        overflow: hidden;
        padding-top: 10px;
        font-weight: bolder;
        text-transform: uppercase;
    }

    .payment-item {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-pack: justify;
        justify-content: space-between;
        font-weight: 500;
        font-size: 14px;
        line-height: 21px;
    }

    .cart-payment {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .payment-item label {
        width: 100%;
        position: relative;
    }

    .payment-item input[type=radio] {
        opacity: 0;
        position: absolute;
    }

    .payment-item input[type=radio]+span {
        border: 1px dashed #c8c7cc;
        display: block;
        padding: 10px 16px;
        padding-right: 45px;
        color: #333f48;
        font-size: 14px;
        line-height: 16px;
        cursor: pointer;
        position: relative;
        margin-bottom: 5px;
    }

    .payment-item input[type=radio]:checked+span {
        background-color: #f6f6f6;
        border: 1px solid #333f48;
        opacity: 1;
    }

    .payment-item input[type=radio]+span:before {
        content: "";
        width: 16px;
        height: 16px;
        display: block;
        border-radius: 100%;
        border: 2px solid #bdbdbd;
        position: absolute;
        left: 0;
        top: 0;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 8px 8px;
    }
    .payment-item-child input[type=radio]+span:before {
       
        left: 20px !important;
        right: auto !important;
      
    }
    .payment-item-child input[type=radio]+span{
        padding-left: 50px;padding-right: 0px;
    }
    .payment-item input[type=radio]+span:before {
        width: 24px;
        height: 24px;
        border: 1px solid #c8c7cc;
        border-radius: 100%;
        position: absolute;
        right: 20px;
        top: 50%;
        margin-top: -12px;
        left: auto;
    }

    .payment-item input[type=radio]:checked+span:before {
        border: 1px solid #333f48;
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTQiIGhlaWdodD0iOSIgdmlld0JveD0iMCAwIDE0IDkiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0xMi41IDFMNS4xNjY2MyA4TDEuNSA0LjUiIHN0cm9rZT0iIzMzM0Y0OCIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K);
        background-size: 14px 9px;
    }

    .payment-item .small {
        display: block;
        font-weight: 400;
        font-size: 14px;
        line-height: 16px;
        margin-top: 8px;
    }
    .red{
        color: red;
    }
  
    th, td{
        font-weight: 400;
    }
</style>