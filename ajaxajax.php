<?php
    // VIllas is editing something HERE!
    $per_page_record = 10;  // Number of entries to show in a page.
    // Look for a GET variable page if not found default is 1.
    if (isset($_GET["page"])) {
        $page  = $_GET["page"];
    }
    else {
      $page=1;
    }

    $start_from = ($page-1) * $per_page_record;

    if (isset($_GET['search'])) {
      $searching = $_GET['search'];
    } else {
      $searching = "";
    }
    // $_POST["searching"] = 0;


    include('process/db_connect.php');

    $vacancy = $conn->query("SELECT * FROM vacancy WHERE position LIKE '%$searching%' ORDER BY DATE(date_created) DESC LIMIT $start_from, $per_page_record");
    while($row = $vacancy->fetch_assoc()):
        // $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
        // unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
        // $desc = strtr(html_entity_decode($row['description']),$trans);
        // $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
    ?>
    <div id="list" style="padding-bottom: 20px">
      <div class="col-lg-12">
        <div class="card1 vacancy-list col-12" style="color: #E5E5E5;font-family: poppins;max-height: 185px;inline-size: 850px; overflow: hidden;display: block;  margin-right: auto;"data-id="<?php echo $row['id'] ?>">
          <div class="" style="padding-top:25px; margin-left: 25px">
            <h3 class="card-title filter-txt"><?php echo $row['position'] ?> <sub><span class="badge badge-secondary float-right" style="font-size: 13px; text-align: center;"> Available Slot:  <?php echo $row['availability'] ?></span></sub></h3>
            <h6 style="font-size: 12px; color: #ACACAC;">Posted on <?php echo $row['date_created'] ?>  <span style="font-size: 12px; margin-left: 25px ">Status: </span>
            <?php if( $row ['status']== "1") echo '<span class="badge rounded-pill badge-success" style="letter-spacing: 1.2px; font-weight: 600;">Hiring</span>' ;
            else echo '<span class="badge rounded-pill badge-danger" style="letter-spacing: 1.2px; font-weight: 600;">Closed</span>' ; ?></h6>


          </div>
          <div class="card-body" style="max-height: 180px; margin-left: 10px">

            <!-- <h6 class="text truncate" style="overflow: hidden !important; text-overflow: ellipsis; color: #ACACAC"><?php echo strip_tags($desc) ?></h6> -->
            <br>
            <div style="justify-content: center; align-items: center; display: flex;">

              <hr class="divider my-4"  style="max-width: calc(90%); background-color: #FD6161; padding: 0.7px;">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <!-- Pagination Here -->
    <div class="pagination">
     <?php
       $query = "SELECT COUNT(*) FROM vacancy WHERE position LIKE '%$searching%'";
       $rs_result = mysqli_query($conn, $query);
       $row = mysqli_fetch_row($rs_result);
       $total_records = $row[0];

       echo "</br>";
       // Number of pages required.
       $total_pages = ceil($total_records / $per_page_record);
       $pagLink = "";

       if($page>=2){
           echo "<a style='cursor: pointer;' onclick=\"ajaxajax('" . $searching . "', '" . $page - 1 . "')\">  Prev </a>";
       }


       for ($i=1; $i<=$total_pages; $i++) {
         if ($i == $page) {
             $pagLink .= "<a class='active' style='cursor: pointer;' onclick=\"ajaxajax('" . $searching . "', '" . $i . "')\">" . $i ."</a>";
         }
         else  {
             $pagLink .= "<a style='cursor: pointer;' onclick=\"ajaxajax('" . $searching . "', '" . $i . "')\">" . $i ."</a>";
         }
       };
       echo $pagLink;

       if($page<$total_pages){
           echo "<a style='cursor: pointer;' onclick=\"ajaxajax('" . $searching . "', '" . $page + 1 . "')\">  Next </a>";
       }

     ?>
     </div>

     <div class="inline">
       <input id="page" type="number" min="1" max="<?php echo $total_pages?>"
       placeholder="<?php echo $page."/".$total_pages; ?>" required>
       <button onClick="go2Page();">Go</button>
     </div>

    <script>
      function go2Page() {
          var page = document.getElementById("page").value;
          page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
          ajaxajax(<?php $searching ?>, page);
      }
    </script>
