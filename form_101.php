<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <?php 
    // GET
    // http://localhost/SE_CAMP/form_101.php?q=1
    // POST 
    ?>
    <form action="" method="">
        <input type="text" name="my_val" />
        <button type="submit">บันทึก</button>
    </form>
    <h1><?php 
    print_r($_REQUEST);
    if(isset($_POST['my_val'])){
        echo $_POST['my_val'];
    } ?></h1>
</body>

</html>