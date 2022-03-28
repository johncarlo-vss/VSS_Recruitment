<?php
include('process/db_connect.php');

// Put Limit in Query
$vacancy = $conn->query("SELECT * FROM vacancy order by date(date_created) desc ");
while($row = $vacancy->fetch_assoc()):
    $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
    unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
    $desc = strtr(html_entity_decode($row['description']),$trans);
    $desc=str_replace(array("<li>","</li>"), array("",","), $desc);


  $output .= "<div id='list' style='padding-bottom: 20px'>
              <div class='col-lg-12'>
                <div class='card1 vacancy-list col-12' style='color: #E5E5E5;font-family: poppins;max-height: 185px;inline-size: 850px; overflow: hidden;display: block;  margin-right: auto;'data-id='" . echo $row['id'] . "'>
                  <div class='' style='padding-top:25px; margin-left: 25px'>
                    <h3 class='card-title filter-txt'>" . echo $row["position"] . "<sub><span class='badge badge-secondary float-right' style='font-size: 13px; text-align: center;'> Available Slot: " . echo $row["availability"] . "</span></sub></h3>
                    <h6 style='font-size: 12px; color: #ACACAC;'>Posted on " . echo $row["date_created"] . " <span style='font-size: 12px; margin-left: 25px'>Status: </span>
                    " . if( $row ["status"]== '1') echo "<span class='badge rounded-pill badge-success' style='letter-spacing: 1.2px; font-weight: 600;'>Hiring</span>" . ;
                    else echo "<span class='badge rounded-pill badge-danger' style='letter-spacing: 1.2px; font-weight: 600;'>Closed</span>". ; ."</h6>
                  </div>
                  <div class='card-body' style='max-height: 180px; margin-left: 10px'>
                    <br>
                    <div style='justify-content: center; align-items: center; display: flex;'>
                      <hr class='divider my-4'  style='max-width: calc(90%); background-color: #FD6161; padding: 0.7px;'>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          " . endwhile; . ""
