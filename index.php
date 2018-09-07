<?php
    getzuhe();
    /**
     * 获取组合
     */
    function getzuhe(){
        $a = 'electric Hoist';
        $b = ['2','ton','Rope','Crane','Trolley','Price','Demag'];
        for ($i=1;$i<count($b)+1;$i++) {
            combine_increase($b,0,[],$i,$i,7,$a);
        }
    }

    //arr为原始数组
    //start为遍历起始位置
    //result保存结果，为一维数组
    //count为result数组的索引值，起辅助作用
    //NUM为要选取的元素个数
    //arr_len为原始数组的长度，为定值
    function combine_increase($arr,$start,$result,$count,$num,$arr_len,$a) {
        $i = 0;
        for ($i = $start;$i<$arr_len+1-$count;$i++){
            $result[$count-1] = $i;
            if($count-1 == 0) {
                $j = 0;
                $data = [];
                for ($j = $num-1;$j>=0;$j--) {
                    $index = "$result[$j]";
                    $data[] = $arr[$index];
                }
                getAllArr($data,$a);
            }else{
                combine_increase($arr,$i+1,$result,$count-1,$num,$arr_len,$a);
            }
        }
    }

    /**
     * 获取当前数组的所有组合方式
     * @param $b
     * @param $a
     */
    function getAllArr($b,$a) {


//    public function getAllArr() {
//        $a = 'gantry crane';
////        $b = ['system','100','t','2','5','10ton','diagram'];
////        $b = ['10ton','system','100','t','2','5','diagram'];
//        $b = ['10ton','100','5','t'];


        if(count($b) == 1) {
            pjzf($b,$a);
            return;
        }
        $source = $b;
        sort($source); //保证初始数组是有序的
        $last = count($source) - 1; //$source尾部元素下标
        $x = $last;
        $count = 1; //组合个数统计
        pjzf($source,$a);
        while (true) {
            $y = $x--; //相邻的两个元素
//            echo '<br>';
//            var_dump($source);echo '<br>';
//            echo '<br>';
            if ($source[$x] < $source[$y]) { //如果前一个元素的值小于后一个元素的值
                $z = $last;
                while ($source[$x] > $source[$z]) { //从尾部开始，找到第一个大于 $x 元素的值
                    $z--;
                }
                /* 交换 $x 和 $z 元素的值 */
                list($source[$x], $source[$z]) = array($source[$z], $source[$x]);
                /* 将 $y 之后的元素全部逆向排列 */
                for ($i = $last; $i > $y; $i--, $y++) {
                    list($source[$i], $source[$y]) = array($source[$y], $source[$i]);
                }
                pjzf($source,$a);
                $x = $last;
                $count++;
//                if($count>20) {
//                    exit();
//                }
            }

            if ($x == 0) { //全部组合完毕
                break;
            }
        }
    }

    function pjzf($arr,$a) {
        $d = $arr;
//        echo implode(' ', $arr).' '.$a, "<br>"; //输出组合
        for ($i=0;$i<=count($arr);$i++) {
            $d = $arr;
            array_splice($d, $i, 0, $a);
            echo implode(' ', $d), "<br>"; //输出组合
        }
    }
