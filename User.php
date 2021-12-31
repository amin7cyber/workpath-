<?php
// set variable database 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// get id client
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
if($id == '')
{
    $mess = "id not found";
}
// connection database 
$connection = mysqli_connect($servername,$username,$password,$dbname);

$method = $_SERVER['REQUEST_METHOD'];

if (!$connection) 
{
    die("Connection Failed: " . mysqli_connect_error());
}
echo "<br/>";

switch($method)
{
    case 'GET':
    $ViewQuery = "SELECT * FROM user WHERE id = $id";
    break;

}
// run sql
$Result = mysqli_query($connection,$ViewQuery);

// run sql failed
if(!$Result)
{
    die(mysqli_error($connection));

}

if($method == 'GET')
{
    if(!$id) echo '[';
    for($i=0 ; $i<mysqli_num_rows($Result);$i++)
    {
        echo ($i>0 ?'</br>':'').json_encode(mysqli_fetch_object($Result));
    }
    if(!$id) echo ']';
}
elseif($method=='POST')
{
    echo json_encode($Result);
}
else 
{ 
    echo mysqli_affected_rows($connection); 
}

// while ($row =  
// {
    
//     echo "ID:" . $row['id'] . "<br/>";
//     echo "NAME:" . $row['name'] . "<br/>";
//     echo "FAMILY:" . $row['family'] . "<br/>";
//     echo "EMAIL:" . $row['email'] . "<br/>";
//     echo "<br/>";
// }
echo "</br>" , "<a href='showUser.html'>بازگشت به صفحه اصلی</a>";
?>