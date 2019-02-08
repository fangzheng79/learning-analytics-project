<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$sql = 'SELECT * FROM `students`';
mysqli_select_db($conn, 'la');
$retval = mysqli_query($conn, $sql);

if (!$retval) {
    die('Could not get data: ' . mysqli_error());
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Student Academic Performance</title>
        <meta name="description" content="website description" />
        <meta name="keywords" content="website keywords, website keywords" />
        <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
        <link rel="stylesheet" type="text/css" href="style/style.css" />
        <link rel="stylesheet" href="style/fontawesome/css/all.css">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/fancyTable.js"></script>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <div id="logo">
                    <div id="logo_text">
                        <!-- class="logo_colour", allows you to change the colour of the text -->
                        <!--<h1><a href="index.html">textured_<span class="logo_colour">orbs</span></a></h1>-->
                        <h1>Student Academic Performance</h1>
                    </div>
                </div>
                <div id="menubar">
                    <ul id="menu">
                        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                        <li><a href="index.html"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="DataSets.html"><i class="fas fa-database"></i> DataSets</a></li>
                        <li class="selected"><a href="students.php"><i class="fas fa-chalkboard-teacher"></i> Students</a></li>
                        <li><a href="Analysis.html"><i class="fas fa-chart-bar"></i> Analysis</a></li>
                        <!--<li><a href="contact.html">Contact Us</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="content">
                <!-- insert the page content here -->
                <h1 class="title">Overview of students</h1>
                <div class="students-overview">
                    <div class="panel-body">
                        <p>The data is collected using a learner activity tracker tool, which called experience API (xAPI). The xAPI is a component of the training and learning architecture (TLA) that enables to monitor learning progress and learner's actions like reading an article or watching a training video. The experience API helps the learning activity providers to determine the learner, activity and objects that describe a learning experience.</p>
                        <ul>
                            <li>There are 480 students in total</li>
                            <li>Students consist of 305 males and 175 females</li>
                            <li><span>179 students are from Kuwait, </span>
                                <span>17 students are from Lebanon, </span>
                                <span>9 students are from Egypt, </span>
                                <span>11 students are from Saudi Arabia, </span>
                                <span>6 students are from USA, </span>
                                <span>172 students are from Jordan, </span>
                                <span>1 student are from Venzuela, </span>
                                <span>6 students are from Iran, </span>
                                <span>12 students are from Tunis, </span>
                                <span>4 students are from Morocco, </span>
                                <span>7 students are from Syria, </span>
                                <span>28 students are from Palestine, </span>
                                <span>22 students are from Iraq, </span>
                                <span>6 students are from Lybia</span></li>
                        </ul>
                    </div>
                </div>
                <div role="alert" class="alert alert-danger">
                    <strong><i class="fas fa-info-circle"></i> Note:</strong> We used some fake information such as username, user id, full name, phone, location, and etc.</div>
                <br/>
                <section>
                    <h1 class="title">List of students</h1>
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group"><span class="input-group">
                                    <!--<input placeholder="Enter text" type="text" id="select-filter-studentsTable" class="form-control" value="">-->
                                    <!--<span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-times fa-fw" aria-hidden="true"></i></button></span></span>-->
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <form class="form-inline">
                                <div class="form-group"> 
                                    <!--<select name="form-control-pagination" placeholder="select" id="formGroupPagination" class="form-control">204080100<option value="20" selected="">20</option><option value="40">40</option><option value="80">80</option><option value="100">100</option></select> rows</div></form></div>-->
                                    <div class="text-right col-md-4 col-xs-12">
                                        <center>
                                            <table class="table-datatable students-tbl"  id="students-tbl">
                                                <thead class="thead-default">
                                                    <tr class="thead-tr-default">
                                                        <th class="thead-th-default">Last Name<span class="pull-right"></span></th>
                                                        <th class="thead-th-default">First Name<span class="pull-right"></span></th>
                                                        <th class="thead-th-default">Educational Stage<span class="pull-right"></span></th>
                                                        <th class="thead-th-default">Grade Level<span class="pull-right"></span></th>
                                                        <th class="thead-th-default">Class Room<span class="pull-right"></span></th>
                                                        <th class="thead-th-default">Topic<span class="pull-right"></span></th>
                                                        <th class="thead-th-default">Action<span class="pull-right"></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tbody-default">
                                                    <?php
                                                    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                                                        ?>
                                                        <tr class="tbody-tr-default">
                                                            <td class="tbody-td-default"><?= $row['LastName'] ?></td>
                                                            <td class="tbody-td-default"><?= $row['FirstName'] ?></td>
                                                            <td class="tbody-td-default"><?= $row['StageID'] ?></td>
                                                            <td class="tbody-td-default"><?= $row['GradeID'] ?></td>
                                                            <td class="tbody-td-default"><?= $row['SectionID'] ?></td>
                                                            <td class="tbody-td-default"><?= $row['Topic'] ?></td>
                                                            <td class="tbody-td-default viewTd">
                                                                <a href="students_detail.php?id=<?= $row['ID'] ?>">
                                                                    <i class="fas fa-search"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </center>
                                    </div>
                                </div>
                        </div>
                </section>
                <script type="text/javascript">
                    $("#students-tbl").fancyTable({
                        sortColumn: 0,
                        sortable: true,
                        pagination: true, // default: false
                        searchable: true,
                        globalSearch: true
                    });
                </script>
            </div>
            <div id="content_footer"></div>
            <div id="footer">
                <p><a>Fangzheng Ji</a> | <a>Jihao Zhang</a> | <a>Damera Ritesh</a> | <a>Shahrzad Amini</a> | <a>Jaleh Ghorbani</a> </p>
            </div>
        </div>
    </body>
</html>
<?php
mysqli_close($conn);
?>