<?php
/**
 * Created by PhpStorm.
 * User: lasyuri
 * Date: 2019/01/31
 * Time: 0:10
 */


require 'controller.php';

$index = new indexController();

$output_data = $index->index();
?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
    <h1>潜水艦シミュレーター</h1>
    <div class="row">
        <form action="index.php" method="post">
            <div class="form-inline">
                <input type="text" class="form-control mx-2" name="search" placeholder="探索">
                <input type="text" class="form-control mx-2" name="collection" placeholder="収集">
                <input type="text" class="form-control mx-2" name="speed" placeholder="巡航速度">
                <input type="text" class="form-control mx-2" name="cruising_distance" placeholder="航続距離">
                <input type="text" class="form-control mx-2" name="luck" placeholder="運">
            </div>
            <button type="submit" class="btn btn-primary m-2">Submit</button>
        </form>

        <div class="container-fluid">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>組み合わせ</th>
                    <th>探索</th>
                    <th>収集</th>
                    <th>巡航速度</th>
                    <th>航続距離</th>
                    <th>運</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($output_data as $key => $val) { ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $val['探査']; ?></td>
                        <td><?php echo $val['収集']; ?></td>
                        <td><?php echo $val['巡航速度']; ?></td>
                        <td><?php echo $val['航続距離']; ?></td>
                        <td><?php echo $val['運']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>


            </table>
        </div>
    </div>

</div>

</body>

</html>
