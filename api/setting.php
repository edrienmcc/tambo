<?php
    $query1 = "SELECT * FROM tbl_setting";
    $sql1 = mysqli_query($conn, $query1);
    $ads = array();

    while ($set = mysqli_fetch_assoc($sql1)) {
        $row['ads'] = $set['ads'];
        $row['startapplivemode'] = $set['startapplivemode'];
        $row['startappaccountid'] = $set['startappaccountid'];
        $row['androidappid'] = $set['androidappid'];
        $row['iosappid'] = $set['iosappid'];
        $row['admobreward'] = $set['admobreward'];
        $row['banner'] = $set['banner'];
        $row['interstitial'] = $set['interstisial'];
        $row['unitylivemode'] = $set['unitylivemode'];
        $row['unitygameid'] = $set['unitygameid'];
        $row['unitybanner'] = $set['unitybanner'];
        $row['unityinterstitial'] = $set['unityinterstisial'];
        $row['unityreward'] = $set['unityreward'];

        array_push($ads, $row);
    }

    header( 'Content-Type: application/json; charset=utf-8' );
    echo $val= str_replace('\\/', '/', json_encode($ads,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    die();
?>