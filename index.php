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

$color_set['シャーク'] = "class='text-danger'";
$color_set['ウンキウ'] = "class='text-secondary'";
$color_set['ホエール'] = "class='text-primary'";
$color_set['シーラカンス'] = "class='text-success'";
$color_set['シルドラ'] = "class='text-info'";
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
                <input type="text" class="form-control form-control-sm mx-2" value="<?php echo $_POST['search']; ?>" name="search" placeholder="探索">
                <input type="text" class="form-control form-control-sm mx-2" value="<?php echo $_POST['collection']; ?>" name="collection" placeholder="収集">
                <input type="text" class="form-control form-control-sm mx-2" value="<?php echo $_POST['speed']; ?>" name="speed" placeholder="巡航速度">
                <input type="text" class="form-control form-control-sm mx-2" value="<?php echo $_POST['cruising_distance']; ?>" name="cruising_distance" placeholder="航続距離">
                <input type="text" class="form-control form-control-sm mx-2" value="<?php echo $_POST['luck']; ?>" name="luck" placeholder="運">
            </div>
            <button type="submit" class="btn btn-primary m-2">Submit</button>
        </form>

        <div class="container-fluid">
            <table class="table table-sm table-striped">
                <thead>
                <tr>
                    <th colspan="4">組み合わせ</th>
                    <th rowspan="2">探索</th>
                    <th rowspan="2">収集</th>
                    <th rowspan="2">巡航速度</th>
                    <th rowspan="2">航続距離</th>
                    <th rowspan="2">運</th>
                    <th rowspan="2">合計</th>
                </tr>
                <tr>
                    <th>艦体</th>
                    <th>艦首</th>
                    <th>艦尾</th>
                    <th>艦橋</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($output_data as $key => $val) { ?>
                    <?php
                    $body_color = $color_set[$val['艦体']];
                    $front_color = $color_set[$val['艦首']];
                    $tail_color = $color_set[$val['艦尾']];
                    $bridge_color = $color_set[$val['艦橋']];
                    ?>
                    <tr>
                        <td <?php echo $body_color; ?>><?php echo $val['艦体']; ?></td>
                        <td <?php echo $front_color; ?>><?php echo $val['艦首']; ?></td>
                        <td <?php echo $tail_color; ?>><?php echo $val['艦尾']; ?></td>
                        <td <?php echo $bridge_color; ?>><?php echo $val['艦橋']; ?></td>
                        <td><?php echo $val['探査']; ?></td>
                        <td><?php echo $val['収集']; ?></td>
                        <td><?php echo $val['巡航速度']; ?></td>
                        <td><?php echo $val['航続距離']; ?></td>
                        <td><?php echo $val['運']; ?></td>
                        <td><?php echo $val['合計']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>


            </table>
        </div>
    </div>

</div>

</body>

</html>
