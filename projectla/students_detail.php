<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$sql = 'SELECT * FROM `students` WHERE `ID` = "' . $_GET['id'] . '"';
mysqli_select_db($conn, 'la');
$retval = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
if (!$retval) {
    die('Could not get data: ' . mysqli_error($conn));
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
                <div className="student-detail">
                    <h1 class="title">Details of student</h1>
                    <Row className="detail-wrapper">
                        <section class="detail-header">
                            <div class="header-left">
                                <Image src="style/avatar.png" style="width: 200px;height: auto;"/>
                            </div>
                            <div class="header-center">
                                <h1><?= $row['FirstName'] . ' ' . $row['LastName'] ?><br /><small><?= $row['UserName'] ?></small></h1>
                                <ul>
                                    <li><?= ($row['gender'] == 'M') ? 'Male' : 'Female' ?></li>
                                    <li><?= $row['Age'] ?> Years old</li>
                                    <li><?= $row['Phone'] ?></li>
                                    <li><?= $row['Email'] ?></li>
                                </ul>
                            </div>
                            <div class="header-right">
                                <ul>
                                    <li><b>Nationality : </b><br/><?= $row['Nationality'] ?></li>
                                    <li><b>Place of birth : </b><br/><?= $row['PlaceOfBirth'] ?></li>
                                    <li><b>State : </b><br/><?= $row['State'] ?></li>
                                    <li><b>City : </b><br/><?= $row['City'] ?></li>
                                    <li><b>Address : </b><br/><?= $row['Address'] ?></li>
                                </ul>
                            </div>
                        </section>
                        <br/>
                        <section className="detail-body">

                            <h1 class="title">School information of <?= $row['FirstName'] ?></h1>

                            <div className="comment success" style="border: 3px double #E7746F;padding: 10px;text-align: center;">
                                <h4>Total Mark</h4>
                                <p className="message" style="padding-bottom: 0px;">
                                    This student's grade is <strong><?= $row['Class'] ?></strong>.
                                </p>
                            </div>
                            <table class="relationtbl">
                                <tr>
                                    <th colspan="2" style="width: 50%;">Relationship with this student's parent</th>
                                    <th>Academic background</th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?= $row['Relation'] ?> is more responsible for this student.
                                    </td>
                                    <td>
                                        This student takes <?= $row['Semester'] ?> semester, and current grade level is <?= $row['GradeID'] ?> in the <?= $row['StageID'] ?> education stage.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Did this student's parent answer a survey: 
                                    </td>
                                    <td><?= $row['ParentAnsweringSurvey'] ?></td>
                                    <td>
                                        This student belongs to the class room <?= $row['SectionID'] ?>, and is interested in the topic <?= $row['Topic'] ?>.
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Parent's satisfaction: 
                                    </td>
                                    <td><?= $row['ParentschoolSatisfaction'] ?></td><td>
                                        This student has <?= $row['StudentAbsenceDays'] ?> absence days.
                                    </td>
                                </tr>
                            </table>
                            <table class="relationtbl">
                                <tr>
                                    <th>Behaviour background</th>
                                </tr>
                                <tr>
                                    <td>
                                        This student does  :
                                    </td>
                                </tr>
                                <tr><td><b><?= $row['RaisedHands'] ?></b> times in raised hands</td></tr>
                                <tr><td><b><?= $row['VisitedResources'] ?></b> times in visited resources </td></tr>
                                <tr><td><b><?= $row['AnnouncementsView'] ?></b> times in announcements view</td></tr>
                                <tr><td><b><?= $row['Discussion'] ?></b> times in discussion</td></tr>
                            </table>
                            <script src="js/highcharts.js"></script>
                            <script src="js/modules/exporting.js"></script>
                            <script src="js/modules/export-data.js"></script>
                            <div>
                                <div id="container" <!--style="width: 49%; height: 400px; margin: 0 auto;float: left;border: 1px solid #ccc;margin-right: 5px;"-->></div>
                            </div>
                            <script type="text/javascript">
                                Highcharts.chart('container', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Total Count of <?= $row['FirstName'] ?>'
                                    },
                                    xAxis: {
                                        type: 'category',
                                        labels: {
                                            rotation: -45,
                                            style: {
                                                fontSize: '13px',
                                                fontFamily: 'Verdana, sans-serif'
                                            }
                                        }
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Times'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    tooltip: {
                                        pointFormat: '<b>{point.y:.1f}</b>'
                                    },
                                    series: [{
                                            name: 'Total Count',
                                            data: [
                                                ['Raised Hand', <?= $row['RaisedHands'] ?>],
                                                ['Visited Resources', <?= $row['VisitedResources'] ?>],
                                                ['Announcements View', <?= $row['AnnouncementsView'] ?>],
                                                ['Discussion', <?= $row['Discussion'] ?>]
                                            ],
                                            dataLabels: {
                                                enabled: true,
                                                rotation: -90,
                                                color: '#FFFFFF',
                                                align: 'right',
                                                format: '{point.y:.0f}', // one decimal
                                                y: 10, // 10 pixels down from the top
                                                style: {
                                                    fontSize: '13px',
                                                    fontFamily: 'Verdana, sans-serif'
                                                }
                                            }
                                        }],
                                    plotOptions: {
                                        column: {
                                            colorByPoint: true
                                        }
                                    },
                                    colors: [
                                        '#95CEFF',
                                        '#FFBC75',
                                        '#A9FF97',
                                        '#90B1D8'
                                    ]
                                });
//                                Highcharts.chart('container', {
//                                    chart: {
//                                        type: 'column'
//                                    },
//                                    title: {
//                                        text: 
//                                    },
//                                    xAxis: {
//                                        categories: [
//                                            'Raised Hands',
//                                            'Visited Resources',
//                                            'Announcements View',
//                                            'Discussion'
//                                        ],
//                                        crosshair: true
//                                    },
//                                    yAxis: {
//                                        min: 0,
//                                        title: {
//                                            text: 'Number'
//                                        }
//                                    },
//                                    tooltip: {
//                                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//                                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
//                                                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
//                                        footerFormat: '</table>',
//                                        shared: true,
//                                        useHTML: true
//                                    },
//                                    plotOptions: {
//                                        column: {
//                                            pointPadding: 0.2,
//                                            borderWidth: 0
//                                        }
//                                    },
//                                    series: [{
//                                            name: 'Raised Hand',
//                                            data: [<?= $row['RaisedHands'] ?>,0,0,0],
//                                            color: 'rgba(165,170,217,1)'
//
//                                        }, {
//                                            name: 'Visited Resources',
//                                            data: [0, <?= $row['VisitedResources'] ?>, 0,0,],
//                                            color: 'rgba(165,170,217,1)'
//
//                                        }, {
//                                            name: 'Announcements View',
//                                            data: [0, 0, <?= $row['AnnouncementsView'] ?>, 0],
//                                            color: 'rgba(165,170,217,1)'
//
//                                        }, {
//                                            name: 'Discussion',
//                                            data: [0,0,0,<?= $row['Discussion'] ?>],
//                                            color: 'rgba(165,170,217,1)'
//
//                                        }]
//                                });
                            </script>

                            <!--
                            
                                                        <Row className="chart">
                                                            <Col md={8} mdOffset={2}>
                                                            <h4>Chart: Total Count of <?= $row['FirstName'] ?></h4>
                                                            <Bar data={ behaviourCountData } options={ options.barChart(true, false) } />
                                                                 </Col>
                                                        </Row>
                            
                                                        <div className="chart">
                                                            <h4>Chart: Comparision of Total Count with School Average</h4>
                                                            <Radar data={ behaviourMeanData } options={ options.radarChart() } />
                                                    </div>
                            
                                                    <hr className="dotted" />
                            
                                                    <h4>School Staistics</h4>
                                                    <BehaviourStats statistics={ statistics } />
                            
                                            </section>
                            
                                        </Row>
                            
                                    </div>
                                    <Table striped bordered condensed hover className="behaviour-stats">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Minimum</th>
                                                <th>Maximum</th>
                                                <th>Mean</th>
                                                <th>Median</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Raised Hands</td>
                                                <td>{ statistics.RaisedHands.min }</td>
                                                <td>{ statistics.RaisedHands.max }</td>
                                                <td>{ statistics.RaisedHands.mean }</td>
                                                <td>{ statistics.RaisedHands.median }</td>
                                            </tr>
                                            <tr>
                                                <td>Visited Resources</td>
                                                <td>{ statistics.VisitedResources.min }</td>
                                                <td>{ statistics.VisitedResources.max }</td>
                                                <td>{ statistics.VisitedResources.mean }</td>
                                                <td>{ statistics.VisitedResources.median }</td>
                                            </tr>
                                            <tr>
                                                <td>Announcements View</td>
                                                <td>{ statistics.AnnouncementsView.min }</td>
                                                <td>{ statistics.AnnouncementsView.max }</td>
                                                <td>{ statistics.AnnouncementsView.mean }</td>
                                                <td>{ statistics.AnnouncementsView.median }</td>
                                            </tr>
                                            <tr>
                                                <td>Discussion</td>
                                                <td>{ statistics.Discussion.min }</td>
                                                <td>{ statistics.Discussion.max }</td>
                                                <td>{ statistics.Discussion.mean }</td>
                                                <td>{ statistics.Discussion.median }</td>
                                            </tr>
                                        </tbody>
                                    </Table>-->
                        </section>
                    </row>
                </div>
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