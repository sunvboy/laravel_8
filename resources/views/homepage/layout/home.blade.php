<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title><?php echo isset($seo['meta_title']) ? $seo['meta_title'] : ''; ?></title>
    <meta name="description" content="<?php echo isset($seo['meta_description']) ? $seo['meta_description'] : ''; ?>" />
    <!-- META FOR FACEBOOK -->
    <meta property="og:site_name" content="<?php echo (isset(fcSystem()['homepage_company'])) ? fcSystem()['homepage_company'] : ''; ?>" />
    <meta property="og:rich_attachment" content="true" />
    <meta property="og:type" content="website" />
    <meta property="og:url" itemprop="url" content="<?php echo isset($seo['canonical']) ? $seo['canonical'] : ''; ?>" />
    <meta property="og:image" itemprop="thumbnailUrl" content="<?php echo (isset($seo['meta_image']) && !empty($seo['meta_image'])) ? asset($seo['meta_image']) : asset(fcSystem()['homepage_logo']) ?>" />
    <meta property="og:image:width" content="800" />
    <meta property="og:image:height" content="354" />
    <meta content="<?php echo isset($seo['meta_title']) ? $seo['meta_title'] : ''; ?>" itemprop="headline" property="og:title" />
    <meta content="<?php echo isset($seo['meta_description']) ? $seo['meta_description'] : ''; ?>" itemprop="description" property="og:description" />
    <!-- Twitter Card -->
    <meta name="twitter:card" value="summary" />
    <meta name="twitter:url" content="<?php echo isset($seo['canonical']) ? $seo['canonical'] : ''; ?>" />
    <meta name="twitter:title" content="<?php echo isset($seo['meta_title']) ? $seo['meta_title'] : ''; ?>" />
    <meta name="twitter:description" content="<?php echo isset($seo['meta_description']) ? $seo['meta_description'] : ''; ?>" />
    <meta name="twitter:image" content="<<?php echo (isset($seo['meta_image']) && !empty($seo['meta_image'])) ? asset($seo['meta_image']) : asset(fcSystem()['homepage_logo']) ?>" />
    <meta name="twitter:site" content="<?php echo (isset(fcSystem()['homepage_company'])) ? fcSystem()['homepage_company'] : ''; ?>" />
    <meta name="twitter:creator" content="<?php echo (isset(fcSystem()['homepage_brandname'])) ? fcSystem()['homepage_brandname'] : ''; ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="{{fcSystem()['homepage_favicon']}}" />
    <!-- head-->
    @include('homepage.common.head')

</head>

<body>
    @include('homepage.common.header')
    @yield('content')
    @include('homepage.common.footer')
    @stack('custom-scripts')
</body>

</html>