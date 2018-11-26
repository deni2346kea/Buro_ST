<?php
session_id("session1");
session_start();
echo session_id();
$_SESSION["name"] = "1";


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginT.php');
}


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginT.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Listing</title>

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.common.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.rtl.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.silver.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.mobile.all.min.css"/>

    <link rel="stylesheet" href="../styles/kendo.rtl.min.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.3.1018/js/kendo.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="RapporteStyle.css" />

    <link rel="icon" href="../media/Buro.png" type="image/gif" sizes="16x16">

    <link rel="stylesheet" href="../style2.css">



    <style>




    </style>

</head>
<body>


<header>
    <div class="container">
        <div id="branding">
          <a href="../loginT/indexT.php">  <img id="logo" src="../media/Buro.png" sizes="70%"> </a>
            <h1 id="moto">BOOK YOUR DREAM CAR</h1>
        </div>
        <div id="barring">
            <nav>
                <ul id="nav1">
                    <li class="current"><a href="../index.html">List your car</a  ></li>
                    <li><a href="blog.html">Learn more</a></li>
                    <li style="float:right"> <a  id="logoutPossition" href="../loginT/indexT.php?logout='1'">Log out</a> </li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>

<?php endif ?>

<!-- logged in user information -->
<?php  if (isset($_SESSION['username'])) : ?>

<!--
    <a href="../loginT/indexT.php"><img id="menuIcone" src="../media/menu.png"></a>
    <p> <a  id="logoutPossition" href="../loginT/indexT.php?logout='1'">logout</a> </p>
  -->

<?php endif ?>


<div style="height:150px;
        background-color:red;
        font-size:36px">
    <img src="../media/ll.png", height="100%", width="100%">
</div>

<style>
    label{display:block;width:25em;position:relative;line-height:2.6;}
    label > .k-textbox, label > .k-button, label > .k-widget{position:absolute;right:0;width:15em;}
    label > .checkbox{position:absolute;right:12.4em;top:.3em;font-size:1.1em;}
    #grid{margin:2em 0 0;}
</style>

<div id="example">

    <form id="gridEditor">

        <label>ID:<input  name="idRecords" data-bind="value: idlistCar"  class="k-textbox" placeholder="keep_blank"  /></label>

        <label>Location:<input  name="location" data-bind="value: location"  class="k-textbox"/></label>
        <label>Make:<input  name="make" data-bind="value: make"  class="k-textbox"/></label>
        <label>Model:<input  name="model" data-bind="value: model"  class="k-textbox" /></label>


        <label>avaSStart:<input type="Date" name="avaStart"   data-bind="value: avaStart" data-role="datepicker"  required="true" class="k-textbox" /></label>
        <label>avaEnd:<input type="Date" name="avaEnd"   data-bind="value: avaEnd" data-role="datepicker"  required="true" class="k-textbox" /></label>

        <label>price:<input  name="price" data-bind="value: price"  class="k-textbox" /></label>


        <!--

        <label>Class:<input id="comboboxClasses" type="text" name="Classes"  data-bind="value: Classes" required="true" class="k-textbox" /></label>
        <label>Course:<input id="comboboxCourses" type="text" name="Courses"  data-bind="value: Courses" required="true" class="k-textbox" /></label>
        <label>Hours:<input type="number" name="Hours" data-role="numerictextbox" required="true" min="0" data-bind="value: Hours" /></label>
        <label>Generate code <button OnClick="GetRandom()" type="button" id="generateCode" class="k-button">Generate</button></label>
        <label>Code <input id="gcID" type="text" name="gc" data-bind="value: Code" required="true" class="k-textbox"/></label>
        <span class="k-invalid-msg" data-for="idRecords"></span>
        <span class="k-invalid-msg" data-for="Date"></span>

        -->



        <label>Save changes <button  type="button"  id="saveChanges" class="k-button">Submit</button></label>
    </form>






    <!-- Kendo comboBox - CLASSES -->
    <script>
        $(document).ready(function() {
            var crudServiceBaseUrl = "CRUDClasses.php",
                dataSource = new kendo.data.DataSource({
                    transport: {
                        read: {
                            url: crudServiceBaseUrl + "?type=read",
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            dataType: "json"
                        }
                    },
                    schema: {
                        data: "data",
                        total: "total",
                        model: {
                            id: "idClasses",
                            fields: {
                                idClasses:{}
                            }
                        }

                    }

                });

            $("#comboboxClasses").kendoComboBox({
                columns: [
                    {field: "idClasses"}
                ],
                dataSource: dataSource,
                dataTextField: "idClasses",
                dataValueField: "idClasses"
            });
        });
    </script>









    <!-- Kendo comboBox - COURSES -->
    <script>
        $(document).ready(function() {
            var crudServiceBaseUrl = "CRUDCourses.php",
                dataSource = new kendo.data.DataSource({
                    transport: {
                        read: {
                            url: crudServiceBaseUrl + "?type=read",
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            dataType: "json"
                        }
                    },
                    schema: {
                        data: "data",
                        total: "total",
                        model: {
                            id: "idCourses",
                            fields: {
                                idCourses:{}
                            }
                        }

                    }

                });

            $("#comboboxCourses").kendoComboBox({
                columns: [
                    {field: "idCourses"}
                ],
                dataSource: dataSource,
                dataTextField: "idCourses",
                dataValueField: "idCourses"
            });
        });
    </script>










    <!-- Kendo GRID -->
    <div id="grid"></div>
    <script>
        $(document).ready(function () {

            var crudServiceBaseUrl = "CRUDlistCar.php",
                dataSource = new kendo.data.DataSource({
                    transport: {
                        read:  {
                            url: crudServiceBaseUrl + "?type=read",
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            dataType: "json"
                        },
                        update: {
                            url: crudServiceBaseUrl + "?type=update",
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            dataType: "json"
                        },
                        destroy: {
                            url: crudServiceBaseUrl + "?type=destroy",
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            dataType: "json"
                        },
                        create: {
                            url: crudServiceBaseUrl + "?type=create",
                            contentType: "application/json; charset=utf-8",
                            type: "POST",
                            dataType: "json"
                        },
                        parameterMap: function(options, operation) {
                            if (operation !== "read" && options.models) {
                                return {models: kendo.stringify(options.models)};
                            }
                        },
                        parameterMap: function(data) {
                            return kendo.stringify(data);
                        }
                    },
                    batch: true,
                    pageSize: 10,
                    sortable: true,
                    filterable: true,
                    schema: {
                        data: "data",
                        total: "total",
                        model: {
                            id: "idlistCar",
                            fields: {
                                idRecords: { editable: false, nullable: false },
                                location: { type: "string" },
                                make: { type: "string" },
                                model: { type: "string"},
                                avaStart: { type: "date" },
                                avaEnd: { type: "date" },
                                price: { type: "string"}


                            }
                        }
                    }
                });

            var selectedRow = null;

            $("#gridEditor").kendoValidator();

            var grid = $("#grid").kendoGrid({


                dataSource: dataSource,
                change: function(e){
                    selectedRow = e.sender.select();
                    var item = e.sender.dataItem(selectedRow);
                    kendo.bind($("#gridEditor"), item);
                },
                dataBound: function(e){
                    if (selectedRow) {
                        var tr = $("[data-uid='"+ selectedRow.attr("data-uid") +"']");
                        e.sender.select(tr);
                    }
                    if (!selectedRow || !tr[0]) {
                        grid.select(grid.tbody.children().eq(0));
                    }
                },
                batch: true,
                pageable: true,
                selectable: true,
                sortable:true,
                filterable: true,
                height: 400,
                toolbar: [{template: "<button id='addNew' type='button' class='k-button'>Add new record</button>"}],
                columns: [

                    { field: "idlistCar", title: "idlistCar", width: 5 },
                    { field: "location", width: 12},
                    { field: "make", width: 10},
                    { field: "model" ,width: 10},
                    { field: "avaStart", title: "Date", width: 6, format:"{0:dd.MM.yyyy}" },
                    { field: "avaEnd", title: "Date", width: 6, format:"{0:dd.MM.yyyy}" },
                    { field: "price" ,width: 10},
                    { command: "destroy", title: " ", width: 7 }],
                editable: true
            }).data("kendoGrid");

            $("#addNew").click(function(){
                var newItem = grid.dataSource.insert({},0);
                grid.dataSource.page(1);
                grid.select($("[data-uid='"+ newItem.uid +"']"));
            });

            $("#saveChanges").click(function(){
                grid.dataSource.one("requestEnd", function(e) {
                    alert("Success");
                });
                grid.saveChanges();
            });

        });


    </script>

    <script>
        function GetRandom()
        {
            var myElement = document.getElementById("gcID")
            myElement.value =  Math.floor(Math.random() * 90000) + 10000;
        }
    </script>

</div>
</body>
</html>
