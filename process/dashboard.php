<?php
//From interns, this file is used to get the number of application on each application status.

include('db_connect.php');

$select_applicants_query = "SELECT recruitment_status.status_label, COUNT(application.process_id) AS count, (SELECT COUNT(id) FROM application) as applicants FROM recruitment_status LEFT JOIN application ON recruitment_status.id = application.process_id GROUP BY status_label";
$result = $conn->query($select_applicants_query);
$applicants_stat = "";

if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $width = ($row["count"] / $row["applicants"]) * 100;
    $applicants_stat = $applicants_stat . "<li class='widget-list-item widget-list-item-green'>
                                           <span class='widget-list-item-icon'><i class='material-icons-outlined'>" . $row["status_label"] . "</i></span>
                                           <span class='widget-list-item-description'>
                                           <a href='#' class='widget-list-item-description-title'>" . $row["count"] . "</a>
                                           <span class='widget-list-item-description-progress'>
                                           <div class='progress'>
                                           <div class='progress-bar' role='progressbar' style='width: " . $width . "%;' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100'></div>
                                           </div>
                                           </span>
                                           </span>
                                           </li>";
  }
}

echo $applicants_stat;

?>
