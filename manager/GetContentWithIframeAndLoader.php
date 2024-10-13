<!DOCTYPE html>
<html>
<head>
<title>jQuery Demo - IFRAME Loader</title>
<style>
#frameWrap {
    position:relative;
    height: 360px;
    width: 640px;
    background:#ffffff;
}

#iframe1 {
    height: 360px;
    width: 640px;
    margin:0;
    padding:0;
    border:0;
}

#loader1 {
    position:absolute;
    left:40%;
    top:35%;
    padding:25px;
   
    background:#ffffff;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
error_reporting(0);
<div id="frameWrap">
<img id="loader1" src="loadings.gif" width="100" height="100" alt="loading gif"/>
<iframe id="iframe1" src="salesall.php" ></iframe>
</div>
<script>
    $(document).ready(function () {
        $('#iframe1').on('load', function () {
            $('#loader1').hide();
        });
    });
</script>

</body>
</html>