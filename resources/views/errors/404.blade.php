<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"> 404</h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
            <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="/">return to home</a>.
            </p>

        </div><!-- /.error-content -->
    </div><!-- /.error-page -->

</section><!-- /.content -->
<style>
    h1,
    h2,
    h3 {
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .error-page {
        width: 600px;
        margin: 20px auto 0 auto;
    }

    @media screen and (max-width: 767px) {
        .error-page {
            width: 100%;
        }
    }

    .error-page>.headline {
        float: left;
        font-size: 100px;
        font-weight: 300;
    }

    @media screen and (max-width: 767px) {
        .error-page>.headline {
            float: none;
            text-align: center;
        }
    }

    .error-page>.error-content {
        margin-left: 190px;
        display: block;
    }

    @media screen and (max-width: 767px) {
        .error-page>.error-content {
            margin-left: 0;
        }
    }

    .error-page>.error-content>h3 {
        font-weight: 300;
        font-size: 25px;
    }

    @media screen and (max-width: 767px) {
        .error-page>.error-content>h3 {
            text-align: center;
        }
    }

    .error-page:before,
    .error-page:after {
        display: table;
        content: " ";
    }

    .error-page:after {
        clear: both;
    }

    .text-info {
        color: #31708f;
    }
</style>