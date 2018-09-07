
<?php
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';
$sql = "CREATE TABLE image_tbl( ".
        "table_id INT NOT NULL AUTO_INCREMENT, ".
        "image_id VARCHAR(100) NOT NULL, ".
        "image_path VARCHAR(100) NOT NULL, ".
		"return_value VARCHAR(100) NOT NULL, ".
        "submission_date VARCHAR(100) NOT NULL, ".
        "PRIMARY KEY ( table_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_select_db( $conn, 'mydata' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('数据表创建失败: ' . mysqli_error($conn));
}
echo "数据表创建成功\n";
mysqli_close($conn);
?>

