$(function () {
    const $form = $("#registrationForm");

    function error($field, message) {
        $field.addClass("invalid");
        $field.closest(".group").find(".field-error").text(message);
    }

    function clearError($field) {
        $field.removeClass("invalid");
        $field.closest(".group").find(".field-error").text("");
    }

    $form.find("input, select, textarea").on("input change", function () {
        clearError($(this));
    });

    $form.on("submit", function (event) {
        let valid = true;
        $form.find(".invalid").removeClass("invalid");
        $form.find(".field-error").text("");

        const $name = $("#full_name"), $email = $("#email"), $phone = $("#phone");
        const $dob = $("#dob"), $gender = $("#gender"), $course = $("#course"), $address = $("#address");

        if ($.trim($name.val()) === "") { error($name, "Enter your full name."); valid = false; }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($.trim($email.val()))) { error($email, "Enter a valid email."); valid = false; }
        if (!/^[0-9+\-\s()]{7,20}$/.test($.trim($phone.val()))) { error($phone, "Enter a valid phone number."); valid = false; }
        if (!$dob.val()) { error($dob, "Select your date of birth."); valid = false; }
        if (!$gender.val()) { error($gender, "Select your gender."); valid = false; }
        if (!$course.val()) { error($course, "Select a course."); valid = false; }
        if ($.trim($address.val()) === "") { error($address, "Enter your address."); valid = false; }

        if (!$("#terms").is(":checked")) {
            $(".terms-error").text("Please accept the declaration.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
            $(".invalid").first().trigger("focus");
        }
        // A valid form is sent to index.php; PHP performs server-side validation.
    });

    $form.on("reset", function () {
        setTimeout(function () {
            $form.find(".invalid").removeClass("invalid");
            $form.find(".field-error").text("");
        }, 0);
    });
});
