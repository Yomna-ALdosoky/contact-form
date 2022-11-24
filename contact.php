<?php
    //check if user coming form a request 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        //assing variable
        $user = filter_var($_POST["Username"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $cell = filter_var($_POST["cellphone"], FILTER_SANITIZE_NUMBER_INT);
        $mag = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

        
        //CREATING ARRAY OF ERRORA
        $formerror= array();
        if (strlen($user) <= 3){
            $formerror[] = "User Must Be Larger Than <strong>3</strong> Characters";
        }
        if (strlen($mag) < 10){
            $formerror[] = "Massage Cant Be Less Than <strong>10</strong> Chacters";
            }

            
    //if no error sand the email [mail(t0, subject, message, headers, parameters)]

    $headers = 'from: '. $email . '\r\n'; 
    $myeail = 'yomnadosoky@gmail.com';
    $subject = 'Contact form';

    if (empty($formerro)){
        mail($myeail, $subject, $mag, $headers);
    }

    }

?>
<!DOCTYPE html>
<html b:js='false'; lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css" />

    <!-- font awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <!-- start form -->
    
    <div class="container">
            <h1 class="text-center">Contact Me</h1>
            <form class="contact-form" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

            <?php if(!empty($formerror)) {?>
                <div class="alert alert-danger alert-dismissible"role="start">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?php
                    foreach($formerror as $error){
                        echo $error . "<br>";
                    }
                    ?>
                </div>
            <?php } ?>
            <div class="form-group">
                <input 
                    class="username form-control" 
                    type="text"
                    name="Username" 
                    placeholder="Type Your Username"
                    value="<?php if(isset($user)) { echo $user;} ?>"/>
                    <i class="fa fa-user fa-fw"></i>
                    <span class="astrisx">*</span>
                    <div class="alert alert-danger custom-alert">
                    User Must Be Larger Than <strong>3</strong> Characters
                    </div>
            </div>
            <div class="form-group">
                <input 
                    class="email form-control" 
                    type="email" 
                    name="email"
                    placeholder="Plsease Type a Valid Email"
                    value="<?php if(isset($email)) {echo $email;}?>"/>
                    <i class="fa-solid fa-envelope fa-fw"></i>
                    <span class="astrisx">*</span>
                    <div class="alert alert-danger custom-alert">
                        Email Can't Be <strong>Empty</strong> Character
                    </div>
                </div>
            <input 
                class="form-control" 
                type="text" 
                name="cellphone" 
                placeholder="Type Your Cell Phone"
                value="<?php if(isset($cell)) {echo $cell;}?>"/>
                <i class="fa-solid fa-phone fa-fw"></i>

                <div class="form-group">
                    <textarea 
                    class="message form-control"
                    name="message"  
                    placeholder="Your Massage"><?php if(isset($mag)) {echo $mag;}?></textarea>
                    <span class="astrisx"> * </span>
                    <div class="alert alert-danger custom-alert">
                        Massage Cant Be Less Than <strong>10</strong> Chacters
                    </div>
                </div>
                
            <input 
                class="btn btn-success" 
                type="submit" 
                value="Send Massage"/>
                <i class="fa-solid fa-paper-plane fa-fw send-icon"></i>
       
        </form>

</div>
<!-- end form -->

    <script src="js/jquery-3.6.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/custiom.js"></script>
</body>
</html>

