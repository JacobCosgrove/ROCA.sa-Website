<?php

//To Handle Session Variables on This Page
session_start();
echo "<link rel='stylesheet' type='text/css' href='home-style.css' />";
// echo "<link rel='stylesheet' type='text/css' href='login-pick-style.css' />";

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>List of Jobs | ROCA.sa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    body {
      text-align: center;
    }
    .content-wrapper {
      margin-left: 10px;
      margin-right: 10px;
      margin-top: 30px;
    }

    #searchBar {
      font-size: 20px;
      width: 20%;
      margin: 5px auto;
      display: inline-block;
    }

  .dropbtn {
    background-color: #455075;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown1-content, .dropdown2-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown1-content a, .dropdown2-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown1-content a:hover, .dropdown2-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown1-content, .dropdown:hover .dropdown2-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #2f3b63;
}
  </style>
</head>
<body>

  <div class= "topnav">
    <b onclick="location.href='index.php'">ROCA.sa</b>
    <a href="../logout.php">Logout</a>
    <a href="user/index.php">Dashboard</a>
  </div>

  <h2><i>Latest Jobs</i></h2>

  <div class="content-wrapper">

    <input type="text" id="searchBar" class="form-control" placeholder="Search job">
    <span class="input-group-btn">
      <button id="searchBtn" type="button" class="btn btn-info btn-flat" style="background:#455075">Go!</button>
    </span>

          <h3 class="box-title">Filters</h3>
            <div class="dropdown">
              <button class="dropbtn">City</button>
                <div class="dropdown1-content">
                  <a href=""  class="citySearch" data-target="New Orleans"> New Orleans</a>
                  <a href="" class="citySearch" data-target="Baton Rouge"> Baton Rouge</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Experience</button>
                <div class="dropdown2-content">
                  <a href="" class="experienceSearch" data-target='1'> 1 Years</a>
                  <a href="" class="experienceSearch" data-target='2'> 2 Years</a>
                  <a href="" class="experienceSearch" data-target='3'> 3 Years</a>
                  <a href="" class="experienceSearch" data-target='4'> 4 Years</a>
                  <a href="" class="experienceSearch" data-target='5'> 5 Years</a>
                </div>
            </div>
          <br><br><br><br><br><br><br>


          <?php

          $limit = 4;

          $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
            $row = $result->fetch_assoc();
            $total_records = $row['id'];
            $total_pages = ceil($total_records / $limit);
          } else {
            $total_pages = 1;
          }

          ?>
            <div id="target-content">
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
            </div>

    </div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

<script>
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("jobwindow.php?page="+page);
      }
    });
  }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".citySearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "city";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>
