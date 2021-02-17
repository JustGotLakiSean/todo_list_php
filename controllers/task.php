<?php
include('config/db.php');
$connection = new db();
date_default_timezone_set('Asia/Manila');

if(isset($_POST['btn_add_task']))
{
  $txt_task = $_POST['txt_task'];
  $txt_taskby_uid = $_POST['txt_taskby_uid'];
  $txt_taskby_username = $_POST['txt_taskby_username'];
  $txt_date_added = $_POST['txt_date_added'];
  $txt_date_completed = $_POST['txt_date_completed'];
  $db = $connection->getConnection();

  $is_task_completed = "";
  $show_completed_task = "";
  $task_deleted = "";

  $_txt_task = "";
  $_txt_taskby_uid = "";
  $_txt_taskby_username = "";
  $_txt_date_added = "";
  $_txt_date_completed = "";

  $sql = "";

  if(!empty($txt_task))
  {
    $_txt_task = mysqli_real_escape_string($db, $txt_task);
    $_txt_taskby_uid = mysqli_real_escape_string($db, $txt_taskby_uid);
    $_txt_taskby_username = mysqli_real_escape_string($db, $txt_taskby_username);
    $_txt_date_added = mysqli_real_escape_string($db, $txt_date_added);
    $_txt_date_completed = mysqli_real_escape_string($db, $txt_date_completed);
    $is_task_completed = 0;
    $date_added = date("F j, y");
    $date_completed = "0";
    $show_completed_task = 1; // display the completed task by default if it's completed
    $task_deleted = 1; // data still in the db by default

    $sql = $connection->addTask($_txt_taskby_uid, $_txt_taskby_username, $_txt_task, $is_task_completed, $_txt_date_added, $_txt_date_completed, $show_completed_task, $task_deleted);
    if($sql){
      echo '<p>Done</p>';
    } else {
      echo '<p>Not Save.</p>';
    }
  }
}
?>