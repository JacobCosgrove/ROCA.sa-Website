<?php

session_start();

require_once("database.php");

$limit = 4;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM job_post LIMIT $start_from, $limit";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc())
                {
             ?>

		   <div class="attachment-block clearfix">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="viewjob.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['city']; ?> | Experience <?php echo $row['experience']; ?> Years</strong><br><?php echo $row['description']; ?> Max Salary: $<?php echo $row['maximumsalary']; ?></div>
										<br><hr>
                </div>
              </div>
            </div>

		<?php
			}
		}
	}
}

$conn->close();
