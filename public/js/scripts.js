$(document).ready(
    function()
    {
        function getStuById(stuId)
        {

            $.ajax(
                {
                    url : 'http://onyx.lu/fit4coding/26.10.17-toto/public/ajax/student.php',
                    method : 'POST',
                    data :
                    {
                        stuId
                    },
                    dataType : 'html'
                }
            ).done(
                function(answer)
                {
                    $('#popupStudent').html(answer).show();
                    $('#popupClose').on('click',
                        function()
                        {
                            $('#popupStudent').hide();
                        }
                    );
                    console.log('Success');
                }
            ).fail(
                function()
                {
                    console.log('bad  news ... ERROR!');
                }
            ).always(
                function()
                {
                    console.log('Ajax execution done');
                }
            );
        }

        $('button.stuDetails').on('click',
            function()
            {
                getStuById($(this).val());
            }
        );

        $('#newStu').on('submit',
            function(e)
            {
                e.preventDefault();

                var nStuData = $(this).serializeArray();

                $.ajax(
                    {
                        url : 'http://onyx.lu/fit4coding/26.10.17-toto/public/ajax/add.php',
                        method : 'POST',
                        data : nStuData,
                        dataType : 'html'
                    }
                ).done(
                    function(answer)
                    {
                        console.log('Success');
                        console.log(answer);

                        if (answer.charAt(0) == 0)
                        {
                            getStuById(answer.substring(2));
                            $('#lNameError').hide();
                            $('#fNameError').hide();
                            $('#emailError').hide();
                        }
                        else if (answer == 1)
                        {
                            $('#lNameError').show();
                        }
                        else if (answer == 3)
                        {
                            $('#fNameError').show();
                        }
                        else if (answer == 4)
                        {
                            $('#lNameError').show();
                            $('#fNameError').show();
                        }
                        else if (answer == 5)
                        {
                            $('#emailError').show();
                        }
                        else if (answer == 6)
                        {
                            $('#lNameError').show();
                            $('#emailError').show();

                        }
                        else if (answer == 8)
                        {
                            $('#fNameError').show();
                            $('#emailError').show();
                        }
                        else if (answer == 9)
                        {
                            $('#lNameError').show();
                            $('#fNameError').show();
                            $('#emailError').show();
                        }
                    }
                ).fail(
                    function()
                    {
                        console.log('bad  news ... ERROR!');
                    }
                ).always(
                    function()
                    {
                        console.log('Ajax execution done');
                    }
                );
            }
        );

        $('#newStu input[name="nStuLastname"]').on('focus',
            function()
            {
                $('#lNameError').hide();
            }
        );
        $('#newStu input[name="nStuFirstname"]').on('focus',
            function()
            {
                $('#fNameError').hide();
            }
        );
        $('#newStu input[name="nStuEmail"]').on('focus',
            function()
            {
                $('#emailError').hide();
            }
        );
    }
);