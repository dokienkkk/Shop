<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body {
            height: 700px;
        }
        #header {
            /* background-color: pink; */
            height: 20%;
        }
        #content {
            /* background-color: pink; */
            height: 70%;
        }#footer {
            background-color: pink;
            height: 10%;
        }
        #item {
            width: 33.33%;
            float: left;
            height: 200px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php include 'header.php' ?>
    <?php include 'content.php' ?>
    <?php include 'footer.php' ?>
</body>
</html>