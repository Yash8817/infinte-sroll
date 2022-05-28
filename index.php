<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite scroll project</title>
    <style>
        .box {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="content"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        var oset = 0;
        var item_load = 1;
        var holdLoad = false;
        $(function() {
            LoadArt(7);
        });


        $(window).scroll(function() {
            if ($(window).scrollTop() >= $(document).height() - $(window).height() - 100) {
                LoadArt(1);
            }
        })


        function LoadArt(a) {
            if (!holdLoad) {
                var holder = {
                    oset: oset,
                    iload: a
                };
                holdLoad = true;

                $.ajax({
                    url: "api.php",
                    type: "POST",
                    data: holder,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        for (var i = 0; i < data.content.length; i++) {
                            oset++;
                            var item = data.content[i];

                            var html = '<div class="box">' + item.id + ' ' + item.content + ' ' + item.date + '</div>';

                            $("#content").append(html);


                        }
                        holdLoad = false;
                        if(data.content.length == 0)
                        {
                            holdLoad = true;
                        }
                    }
                })
            }
        }
    </script>
</body>

</html>