<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('/images/logo.png'); ?>">

    <title>MyHospital</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('/css/app.css'); ?>" />
</head>

<body id="main">
    <?= $this->renderSection('main') ?>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('/js/bootstrap.min.js'); ?>"></script>

    <?= $this->renderSection('pageScripts') ?>
</body>

</html>