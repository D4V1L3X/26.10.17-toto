<!DOCTYPE html>

<html lang="en">
    <head>
        <title>26.10.2017 - Toto Project</title>
        <style>
            body {
                font-family: sans-serif;
            }
            ul {
                list-style-type: none;
            }
            ul li {
                display: inline-block;
                margin-right: 10px;
                padding: 0;
                width: 212px;
            }
            ul li a {
                text-decoration: none;
                color: #000;
                border: 1px solid #000;
                padding: 5px;

                text-align: center;
                display: block;
                width: 200px;
            }
            ul li a:hover, th a:hover {
                background-color: #000;
                color: #FFF;
            }
            ul li a:hover {
                color: #F00;
            }
            table {
                border: 2px solid black;
            }
            th {
                background-color: #888;
            }
            table th {
                padding: 5px 0;
            }
            table th, th, td {
                padding: 5px 15px;
            }
            table th a {
                padding: 5px 70px;

                color: #000;
                text-decoration: none;
            }
            td {
                background-color: #CCC;
            }
            form {
                width: 400px;
            }
            form fieldset label input {
                width: 300px;
            }
            form fieldset#RadioButtonInput label input {
                width: 20px;
            }
            form fieldset label span.error {
                font-size: .8rem;
                color: red;
                text-shadow: #000 0 0 8px;
            }
        </style>
        <script>
            function years()
            {
                //I
                var years = document.getElementById("years");
                var thisYear = (new Date()).getFullYear();
                var max = thisYear-50;
                var output = "<option <?= isset($formInvalid) && !empty($_POST['nStuBirthdateY']) ? '' : 'selected' ; ?> disabled>-- Year --</option>";

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
                    output += "<option value='" + i +"'" + selected + ">" + i +"</option>";
                }
                //O
                years.innerHTML= output;
            }
            function months()
            {
                //I
                var month = document.getElementById("months");
                var max = 12;
                var output = "<option <?= isset($formInvalid) && !empty($_POST['nStuBirthdateM']) ? '' : 'selected' ; ?> disabled>-- Month --</option>";

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
                var output = "<option <?= isset($formInvalid) && !empty($_POST['nStuBirthdateD']) ? '' : 'selected' ; ?> disabled>-- Day --</option>";

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
        <header></header>
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./index.php">All the sessions</a></li>
                <li><a href="./list.php">All students</a></li>
                <li><a href="./add.php">Add a student</a></li>
            </ul>
        </nav>
