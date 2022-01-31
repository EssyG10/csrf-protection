function validateContactForm() {
	var valid = true;
	$("#userName").removeClass("error-field");
	$("#userEmail").removeClass("error-field");
	$("#subject").removeClass("error-field");
	$("#content").removeClass("error-field");

	$("#userName-info").html("").hide();
	$("#userEmail-info").html("").hide();
	$("#subject-info").html("").hide();
	$("#content-info").html("").hide();

	$(".validation-message").html("");
	$(".phppot-input").css('border', '#e0dfdf 1px solid');

	var userName = $("#userName").val();
	var userEmail = $("#userEmail").val();
	var subject = $("#subject").val();
	var content = $("#content").val();

	if (userName.trim() == "") {
		$("#userName-info").html("required.").css("color", "#ee0000").show();
		$("#userName").css('border', '#e66262 1px solid');
		$("#userName").addClass("error-field");

		valid = false;
	}
	if (userEmail.trim() == "") {
		$("#userEmail-info").html("required.").css("color", "#ee0000").show();
		$("#userEmail").css('border', '#e66262 1px solid');
		$("#userEmail").addClass("error-field");

		valid = false;
	}
	if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("invalid email address.").css("color",
				"#ee0000").show();

		$("#userEmail").css('border', '#e66262 1px solid');
		$("#userEmail").addClass("error-field");

		valid = false;
	}

	if (subject == "") {
		$("#subject-info").html("required.").css("color", "#ee0000").show();
		$("#subject").css('border', '#e66262 1px solid');
		$("#subject").addClass("error-field");

		valid = false;
	}
	if (content == "") {
		$("#userMessage-info").html("required.").css("color", "#ee0000").show();
		$("#content").css('border', '#e66262 1px solid');
		$("#content").addClass("error-field");

		valid = false;
	}

	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
