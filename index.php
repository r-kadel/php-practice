<?php
    $msg = '';
    $msgClass = '';

    if(filter_has_var(INPUT_POST, 'submit')) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars(trim($_POST['message']));

        if(!empty($email) && !empty($name) && !empty($message)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $msg = 'Please fill in all fields';
                $msgClass = 'alert-danger';
            } else {
                echo 'Sucess';
            }
        } else {
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">    
          <a class="navbar-brand" href="index.php">My Website</a>
        </div>
      </div>
    </nav>
    <div class="container">	
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="form-group">
		      <label>Name</label>
		      <input type="text" 
                name="name" 
                class="form-control" 
                value="<?php echo isset($_POST['name']) ? $name : ''; ?> 
                ">
	      </div>
	      <div class="form-group">
	      	<label>Email</label>
	      	<input type="text" 
              name="email" 
              class="form-control" 
              value="<?php echo isset($_POST['email']) ? $email : ''; ?> ">
	      </div>
	      <div class="form-group">
	      	<label>Message</label>
	      	<textarea name="message" class="form-control">
              <?php echo isset($_POST['message']) ? $message : ''; ?> 
              </textarea>
	      </div>
	      <br>
	      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>
