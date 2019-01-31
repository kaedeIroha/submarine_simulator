<?php
/**
 * Created by PhpStorm.
 * User: lasyuri
 * Date: 2019/01/31
 * Time: 23:35
 */

require "const.php";

class indexController
{
    public function index()
    {
        if (isset($_POST)) {
            $submarine_data = $this->createSubmarineData();
            $output_data = [];
            foreach ($submarine_data as $key => $val) {
                if ($val['探査'] >= $_POST['search'] && $val['収集'] >= $_POST['collection'] && $val['巡航速度'] >= $_POST['speed'] && $val['航続距離'] >= $_POST['cruising_distance'] && $val['運'] >= $_POST['luck']) {
                    $output_data[$key] = $val;
                }
            }
            return $output_data;
        }

    }

    public function createSubmarineData() {
        require "const.php";

        $base = [];
        foreach ($submarine_body_data as $base_name => $submarine_body_val) {
            foreach ($submarine_front_data as $front_name => $submarine_front_val) {
                foreach ($submarine_tail_data as $tail_name => $submarine_tail_val) {
                    foreach ($submarine_bridge_data as $bridge_name => $submarine_bridge_val) {
                        $key = $base_name . '+' . $front_name . '+' . $tail_name . '+' . $bridge_name;
                        $base[$key]['探査'] = $submarine_body_val[0] + $submarine_front_val[0] + $submarine_tail_val[0] + $submarine_bridge_val[0];
                        $base[$key]['収集'] = $submarine_body_val[1] + $submarine_front_val[1] + $submarine_tail_val[1] + $submarine_bridge_val[1];
                        $base[$key]['巡航速度'] = $submarine_body_val[2] + $submarine_front_val[2] + $submarine_tail_val[2] + $submarine_bridge_val[2];
                        $base[$key]['航続距離'] = $submarine_body_val[3] + $submarine_front_val[3] + $submarine_tail_val[3] + $submarine_bridge_val[3];
                        $base[$key]['運'] = $submarine_body_val[4] + $submarine_front_val[4] + $submarine_tail_val[4] + $submarine_bridge_val[4];
                    }
                }
            }
        }
        return $base;
    }
}