<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name')); ?></title>

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>;
        </script>
    </head>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
        }

        #frame {
            margin: 5% 5% 0% 5%;
        }

        #pagination {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        #pagination ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            text-align: center;
        }

        #pagination li {
            float: left;
            display: inline;
        }

        #pagination li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #pagination li span {
            display: inline-block;
            color: grey;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        #pagination li a:hover {
            background-color: #111;
        }
    </style>
    <body>
        <div id="app">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\alflex\resources\views/layouts/app.blade.php ENDPATH**/ ?>