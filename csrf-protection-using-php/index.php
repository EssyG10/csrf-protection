<?php
use Phppot\MailService;
session_start();
if (! empty($_POST['send'])) {
    require_once __DIR__ . '/lib/SecurityService.php';
    $antiCSRF = new \Phppot\SecurityService\securityService();
    $csrfResponse = $antiCSRF->validate();
    if (! empty($csrfResponse)) {
        require_once __DIR__ . '/lib/MailService.php';
        $mailService = new MailService();
        $response = $mailService->sendContactMail($_POST);
        if (! empty($response)) {
            $message = "Hi, we have received your message. Thank you.";
            $type = "success";
        } else {
            $message = "Unable to send email.";
            $type = "error";
        }
    } else {
        $message = "Security Alert: Unable to process your request.";
        $type = "error";
    }
}

?>
<html>
<head>
<title>CSRF Protection using PHP</title>
<link rel="stylesheet" type="text/css"
	href="assets/css/phppot-style.css" />
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<style>
.error-field {
	border: 1px solid #d96557;
}

.send-button {
	cursor: pointer;
	background: #3cb73c;
	border: #36a536 1px solid;
	color: #FFF;
	font-size: 1em;
	width: 100px;
}
</style>
</head>
<body>
	<div class="phppot-container">
		<h1>CSRF Protection using PHP</h1>
		<form name="frmContact" id="cnt-frm" class="phppot-form"
			frmContact"" method="post" action="" enctype="multipart/form-data"
			onsubmit="return validateContactForm()">

			<div class="phppot-row">
				<div class="label">
					Name <span id="userName-info" class="validation-message"></span>
				</div>
				<input type="text" class="phppot-input" name="userName"
					id="userName"
					value="<?php if(!empty($_POST['userName'])&& $type == 'error'){ echo $_POST['userName'];}?>" />
			</div>
			<div class="phppot-row">
				<div class="label">
					Email <span id="userEmail-info" class="validation-message"></span>
				</div>
				<input type="text" class="phppot-input" name="userEmail"
					id="userEmail"
					value="<?php if(!empty($_POST['userEmail'])&& $type == 'error'){ echo $_POST['userEmail'];}?>" />
			</div>
			<div class="phppot-row">
				<div class="label">
					Subject <span id="subject-info" class="validation-message"></span>
				</div>
				<input type="text" class="phppot-input" name="subject" id="subject"
					value="<?php if(!empty($_POST['subject'])&& $type == 'error'){ echo $_POST['subject'];}?>" />
			</div>
			<div class="phppot-row">
				<div class="label">
					Message <span id="userMessage-info" class="validation-message"></span>
				</div>
				<textarea name="content" id="content" class="phppot-input" cols="60"
					rows="6"><?php if(!empty($_POST['content'])&& $type == 'error'){ echo $_POST['content'];}?></textarea>
			</div>
			<div class="phppot-row">
				<input type="submit" name="send" class="send-button" value="Send" />
			</div>

			<?php require_once __DIR__ . '/view/framework/form-footer.php';?>

		</form>
		<?php if(!empty($message)) { ?>
		<div id="phppot-message" class="<?php  echo $type; ?>"><?php if(isset($message)){ ?>
				    <?php echo $message; }}?>
                    </div>
	</div>
	<script src="assets/js/validate.js"></script>
</body>
</html>
<?php
session_write_close();
?>