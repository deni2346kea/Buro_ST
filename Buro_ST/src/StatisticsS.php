<?php
session_id("session2");
session_start();
$_SESSION["name"] = "2";

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginS.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: loginS.php");
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Rapporte</title>

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.common.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.rtl.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.silver.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.mobile.all.min.css"/>

    <link rel="stylesheet" href="../styles/kendo.rtl.min.css" />

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.3.1018/js/kendo.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="RapporteStyle.css" />

    <link rel="icon" href="../media/letter.png" type="image/gif" sizes="16x16">


</head>
<body>





<style>
    label{display:block;width:25em;position:relative;line-height:2.6;}
    label > .k-textbox, label > .k-button, label > .k-widget{position:absolute;right:0;width:15em;}
    label > .checkbox{position:absolute;right:12.4em;top:.3em;font-size:1.1em;}
    #grid{margin:2em 0 0;}
</style>

<div id="example">






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

            var crudServiceBaseUrl = "CRUDRecordsS.php",
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
                            id: "idRecordsS",
                            fields: {
                                idRecords: { editable: false, nullable: false },
                                Student: { type: "string" },
                                Date: { type: "date" },
                                Classes: { type: "string" },
                                Courses: { type: "string"},
                                Hours: { type: "int" },
                                Code: { type: "string" }


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
                columns: [

                    { field: "idRecordsS", title: "Record",width: 5 },
                    { field: "Date", title: "Date", width: 6, format:"{0:dd.MM.yyyy}" },
                    { field: "Courses", width: 10},
                    { field: "Hours" ,width: 10},
                    { field: "Code", width: 5 },
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
</div>
</body>
</html>
