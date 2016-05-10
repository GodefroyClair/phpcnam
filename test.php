<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="scripts/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="scripts/bootstrap.min.css"/>
</head>
<body>

<div class="container">
  <h3>Vertical Pills</h3>
  <ul class="nav nav-pills" role="tab">
    <li class="active"><a href="#"  role="tab" data-toggle="tab">Home</a></li>
    <li><a href="#" role="tab" data-toggle="tab">Menu 1</a></li>
    <li><a href="#" role="tab" data-toggle="tab">Menu 2</a></li>
    <li><a href="#" role="tab" data-toggle="tab">Menu 3</a></li>
  </ul>
</div>
  <script>
        $('.next').click(function(){
            console.log("clic !");
            $('.nav-tabs > .active').next('li.mtab').find('a').trigger('click');
        });
$('.previous').click(function(){
    console.log("clic !");
    $('.nav-tabs > .active').prev('li.mtab').find('a').trigger('click');
});
    </script>
    <script src="scripts/jquery-2.1.4.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>

</body>
</html>

