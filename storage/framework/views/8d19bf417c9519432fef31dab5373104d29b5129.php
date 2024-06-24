<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Yoga Meditation Plus:: <?php echo e(ucfirst(request()->segment(1) ?? 'home')); ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('frontend/img/favicon/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('frontend/img/favicon/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('frontend/img/favicon/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('frontend/img/favicon/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('frontend/img/favicon/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('frontend/img/favicon/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('frontend/img/favicon/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('frontend/img/favicon/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('frontend/img/favicon/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('frontend/img/favicon/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('frontend/img/favicon/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('frontend/img/favicon/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('frontend/img/favicon/favicon-16x16.png')); ?>">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('frontend/img/favicon/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

    <table style="width: 100%; font-family: 'Montserrat',Arial, Helvetica, sans-serif;"cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="background-color: #483904;padding:32px;">
                    <img src="<?php echo e(asset('frontend/img/logo.png')); ?>">
                </td>
                <td style="background-color: #483904;padding:32px;">
                    <div style="float: inline-end;">
                        <h2
                            style="font-size: 48px;font-weight:600;color: #fff;text-transform: uppercase;margin-bottom: 13px;">
                            INVOICE</h2>
                        <h3 style="font-size: 36px;font-weight:500;color: #fff;text-transform: capitalize;">#LoremIpsum
                        </h3>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>

    <table style="width:100%;font-family: 'Montserrat',Arial, Helvetica, sans-serif;" cellpadding="0" cellspacing="0">
        <tbody>
            <tr style="vertical-align:top">
                <td style="padding-left: 50px;border-right: 1px solid #EAEAEA">
                    <table style="width:100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <div>
                                    <h3 style="color: #1F1F1F; font-size: 24px;font-weight: 600;">Issued</h3>
                                    <p style="color: #1F1F1F;font-size: 18px;font-weight: 500;">29 Apr, 2024</p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <h3 style="color: #1F1F1F; font-size: 24px;font-weight: 600;">Due</h3>
                                    <p style="color: #1F1F1F;font-size: 18px;font-weight: 500;">15 May, 2024</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-right: 1px solid #EAEAEA;padding-left: 50px;">
                    <div>
                        <h3 style="color: #1F1F1F; font-size: 24px;font-weight: 600;">Billed to</h3>
                        <p style="color: #1F1F1F;font-size: 18px;font-weight: 500;">Company Name</p>
                    </div>
                </td>
                <td style=" padding-left: 50px;">
                    <div>
                        <h3 style="color: #1F1F1F; font-size: 24px;font-weight: 600;">From</h3>
                        <p style="color: #1F1F1F;font-size: 18px;font-weight: 500;">29 Apr, 2024</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <table style="width:95%;margin: auto;font-family: 'Montserrat',Arial, Helvetica, sans-serif;" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td
                    style="background-color:rgba(203, 214, 255, 0.46);padding: 30px;color: #1F1F1F;font-size: 24px;font-weight: 600;">
                    Product
                </td>
                <td
                    style="background-color:rgba(203, 214, 255, 0.46);padding: 30px;color: #1F1F1F;font-size: 24px;font-weight: 600;text-align: right;">
                    Subtotal
                </td>
            </tr>
            <tr>
                <td style="color:#1F1F1F;font-size: 18px;font-weight: 600;padding: 25px;border-bottom: 1px solid #000;">
                    One to one session with Umang x 2</td>
                <td
                    style="color:#1F1F1F;font-size: 18px;font-weight: 600;text-align: right;padding: 25px;border-bottom: 1px solid #000;">
                    $ 300.00</td>

            </tr>
            <tr>
                <td style="color:#1F1F1F;font-size: 18px;font-weight: 600;padding: 25px;border-bottom: 1px solid #000;">
                    OB Test x 3</td>
                <td
                    style="color:#1F1F1F;font-size: 18px;font-weight: 600;text-align: right;padding: 25px;border-bottom: 1px solid #000;">
                    $ 300.00</td>

            </tr>
            <tr>
                <td colspan="2">
                    <table style="width: 50%;margin-left: auto;">
                        <tr>
                            <td
                                style="text-align: left;padding: 25px;border-bottom: 1px solid #1F1F1F;font-size: 18px;font-weight: 600;color: #1F1F1F;">
                                Subtotal</td>
                            <td
                                style="text-align: right;padding: 25px;border-bottom: 1px solid #1F1F1F;font-size: 18px;font-weight: 600;color: #1F1F1F;">
                                $ 303.00</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: left;padding: 25px;border-bottom: 1px solid #062FC0;font-size: 18px;font-weight: 600;color: #1F1F1F;">
                                Total</td>
                            <td
                                style="text-align: right;padding: 25px;border-bottom: 1px solid #062FC0;font-size: 18px;font-weight: 600;color: #1F1F1F;">
                                $ 303.00</td>
                        </tr>
                        <tr>
                            <td
                                style="text-align: left;padding: 25px;border-bottom: 1px solid #062FC0;font-size: 18px;font-weight: 600;color: #062FC0;">
                                Amount Due</td>
                            <td
                                style="text-align: right;padding: 25px;border-bottom: 1px solid #062FC0;font-size: 18px;font-weight: 600;color: #062FC0;">
                                $ 303.00</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>

    <table style="width:100%;font-family: 'Montserrat',Arial, Helvetica, sans-serif;" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td style="padding-left:50px;border-bottom: 1px solid #EAEAEA;padding-bottom: 20px;">
                    <p style="color:#1F1F1F;font-size:18px;font-weight: 600;margin: 0 0 10px 0;">Thank you for your
                        order</p>
                    <p style="color:#1F1F1F;font-size:18px;font-weight: 600;margin: 0;">Please within 15 days of
                        receiving this invoice</p>

                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>

    <table style="width:40%;font-family: 'Montserrat',Arial, Helvetica, sans-serif;margin-left:auto;text-align: right;" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>
                    <p style="font-size:18px;color:#1F1F1F;font-weight: 500;margin: 0;">+919036215678</p>
                </td>
                <td style="padding-right: 48px;">
                    <p style="font-size:18px;color:#1F1F1F;font-weight: 500;margin: 0;">namaste@yogameditationplus.com
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.matchHeight-min.js"></script>
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/theia-sticky-sidebar.js"></script>
    <script src="js/script.js"></script> -->

</body>

</html>
<?php /**PATH /home/ymp/web/ymp.dev.obdemo.com/public_html/resources/views/frontend/invoice.blade.php ENDPATH**/ ?>