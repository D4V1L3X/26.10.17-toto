<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>26.10.2017 - Toto Project</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <!-- My css -->
        <link rel="stylesheet" href="./css/styles.css">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- My JS -->
        <script src="./js/scripts.js" type="text/javascript"></script>
        <!-- I need to leave this JS part here, because I modified it through php, and i still need to revert that -->
        <script>
            function years()
            {
                //I
                var years = document.getElementById("years");
                var thisYear = (new Date()).getFullYear();
                var max = thisYear-30;
                var output = "<option value=''<?= isset($formInvalid) && !empty($_POST['nStuBirthdateY']) ? '' : 'selected' ; ?> disabled>-- Year --</option>";

                var selected = '';
                //P
                for (var i = thisYear; i >= max; i--)
                {
                    <?php if (isset($formInvalid) && !empty($_POST['nStuBirthdateY'])) { ?>
                    if (i == <?= !empty($_POST['nStuBirthdateY']) ? $_POST['nStuBirthdateY'] : 0 ; ?>)
                    {
                        selected = 'selected';
                    }
                    else
                    {
                        selected = '';
                    }
                    <?php } ?>
                    output += "<option value='" + i + "'" + selected + ">" + i + "</option>";
                }
                //O
                years.innerHTML= output;
            }

            function months()
            {
                //I
                var month = document.getElementById("months");
                var max = 12;
                var output = "<option value=''<?= isset($formInvalid) && !empty($_POST['nStuBirthdateM']) ? '' : 'selected' ; ?> disabled>-- Month --</option>";

                var selected = '';
                //P
                for (var i = 1; i <= max; i++)
                {
                    <?php if (isset($formInvalid) && !empty($_POST['nStuBirthdateM'])) { ?>
                    if (i == <?= !empty($_POST['nStuBirthdateM']) ? $_POST['nStuBirthdateM'] : 0 ; ?>)
                    {
                        selected = 'selected';
                    }
                    else
                    {
                        selected = '';
                    }
                    <?php } ?>
                    output += "<option value='" + i + "'" + selected + ">" + i + "</option>";
                }
                //O
                month.innerHTML= output;
            }

            function days(max)
            {
                //I
                var days = document.getElementById("days");
                var index = days.selectedIndex;
                var output = "<option value=''<?= isset($formInvalid) && !empty($_POST['nStuBirthdateD']) ? '' : 'selected' ; ?> disabled>-- Day --</option>";

                var selected = '';
                //P
                for (var i = 1; i <= max; i++)
                {
                    <?php if (isset($formInvalid) && !empty($_POST['nStuBirthdateY'])) { ?>
                        if (i == <?= !empty($_POST['nStuBirthdateD']) ? $_POST['nStuBirthdateD'] : 0 ; ?>)
                        {
                            selected = 'selected';
                        }
                        else
                        {
                            selected = '';
                        }
                    <?php } ?>
                    if (i === index)
                    {
                        selected = "selected";
                    }
                    output += "<option " + selected + " value='" + i +"'>" + i +"</option>";
                    selected = "";
                }
                //O
                days.innerHTML= output;
            }

            function isLeapYear(year)
            {
                return ((year%400===0)||((year%4===0)&&(year%100!==0)));
            }

            function howManyDays()
            {
                //I
                var years = document.getElementById("years");
                var valueY = years.options[years.selectedIndex].value;
                var months = document.getElementById("months");
                var valueM = months.options[months.selectedIndex].value;
                //P
                if (valueY !== "" && valueM !== "")
                {
                    if (valueM === "1" || valueM === "3" || valueM === "5" || valueM === "7" || valueM === "8" || valueM === "10" || valueM === "12")
                    {
                        days(31);
                    }
                    else if (valueM === "4" || valueM === "6" || valueM === "9" || valueM === "11")
                    {
                        days(30);
                    }
                    else if (isLeapYear(valueY) === true && valueM === "2")
                    {
                        days(29);
                    }
                    else if (valueM === "2")
                    {
                        days(28);
                    }
                }
                else
                {
                    days(0);
                }
                //O
            }
        </script>
    </head>
    <body>
        <div id="flex-container">
            <header></header>
            <nav>
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="./index.php">All the sessions</a></li>
                    <li><a href="./list.php">All students</a></li>
                    <li><a href="./add.php">Add a student</a></li>
                </ul>
            </nav>
