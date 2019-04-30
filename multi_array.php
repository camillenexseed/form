<?php
    // 多次元配列とは
    // 配列の中に配列が入っている配列のこと

    $team_a = array('A', 'B', 'C');
    $team_b = array('D', 'E');
    $team_c = array('F', 'G', 'H', 'I');

    $league_a = array($team_a, $team_b, $team_c); // 2次元の配列

    echo $league_a[0][0];
    echo '<br>';
    echo $league_a[2][3];
    echo '<br>';
    echo $league_a[1][1];
    echo '<br>';

    for ($i=0; $i < 3; $i++) { 
        $c = count($league_a[$i]);
        for ($j=0; $j < $c; $j++) { 
            echo $league_a[$i][$j];
            echo '<br>';
        }
    }

    // foreach文を使う方法も
?>












