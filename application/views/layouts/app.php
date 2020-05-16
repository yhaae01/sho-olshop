<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?= $title; ?> - Shojiru</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?> " rel="stylesheet">
    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
    <!-- JQuery Number -->
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.nice-number.min.css'); ?>">
</head>

<body>
    <!-- Navbar -->
        <?php $this->load->view('layouts/navbar'); ?>
    <!-- End of Navbar -->

    <!-- Content -->
        <?php $this->load->view($page); ?>
    <!-- End Content -->

    <!-- Javascript -->
    <script src="<?= base_url('assets/js/jquery-3.4.1.min.js'); ?>"> </script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"> </script>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.nice-number.js') ?>"></script>
    <script type="text/javascript">
        $(function(){
            $('input[type="number"]').niceNumber();
        });
    </script>
    <script type="text/javascript">
        $('input[type="number"]').niceNumber({
            // auto resize the number input
            autoSize: true,
            // the number of extra character
            autoSizeBuffer: 1,
            // custom button text
            buttonDecrement: "-",
            buttonIncrement: "+",
            // buttonDecrement: "<i class='fas fa-minus-circle' style='border-radius: 5px'></i>",
            // buttonIncrement: "<i class='fas fa-plus-circle' style='border-radius: 5px'></i>",
            // 'around', 'left', or 'right'
            buttonPosition: 'around'
        });
    </script>

    </body>

</html>