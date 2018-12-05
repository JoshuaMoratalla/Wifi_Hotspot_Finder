<?php
function label($name, $label) {
    echo "<label for = \"$name\">$label</label>";
    echo '<br>';
}

function posted_value($name) {
    if(isset($_POST[$name])) {
        return htmlspecialchars($_POST[$name]);
    }
}

function error_label($errors, $name) {
    echo "<br> <span id=\"$name\" class=\"error_message\">";

    if (isset($errors[$name])) {
        echo $errors[$name];
    }
    echo '</span>';
}

function input_text($errors, $name, $label, $pattern, $title, $required) {
    echo '<div class="required_field">';
    label($name, $label);
    $value = posted_value($name);
    echo "<input type=\"text\" name=\"$name\" pattern=\"$pattern\"".
        " title=\"$title\" value=\"$value\" onkeypress=\"hide_error_message('$name')\" $required>";
    error_label($errors, $name);
    echo '</div>';
}

function input_email($errors, $name, $label) {
    echo '<div class = "required_field">';
    label($name, $label);
    $value = posted_value($name);
    echo "<input type=\"email\" name=\"$name\" value=\"$value\"".
        " placeholder=\"Example@email.com\" onkeypress=\"hide_error_message('$name')\" required>";
    error_label($errors, $name);
    echo '</div>';
}

function input_date($errors, $name, $label) {
    echo '<div class="required_field">';
    label($name, $label);
    $value = posted_value($name);
    $today = date("Y-m-d");
    echo "<input type=\"Date\" name=\"$name\" value=\"$value\" placeholder='dd/mm/yyyy'".
           " max=\"$today\" min=\"1900-12-12\" onchange=\"hide_error_message('$name')\" required>";
    error_label($errors, $name);
    echo '</div>';
}

function input_select($errors, $name, $label, $values, $required) {
    echo '<div class="required_field">';
    label($name, $label);
    $value = posted_value($name);
    echo "<select name = \"$name\" onchange=\"hide_error_message('$name')\" $required>";
    echo "<option value = \"\"> Select an option below...</option>";
    foreach ($values as $value => $display) {
        $selected = ($value==posted_value($name))?'selected="selected"':'';
        echo "<option $selected value=\"$value\">$display</option>";
    }
    echo '</select>';
    error_label($errors, $name);
    echo '</div>';
}

function input_password($errors, $name, $label, $pattern, $title) {
    echo '<div class="required_field">';
    label($name, $label);
    echo "<input type=\"password\" name=\"$name\" pattern=\"$pattern\"".
        " title=\"$title\" onkeypress=\"hide_error_message('$name')\" required>";
    error_label($errors, $name);
    echo '</div>';
}

function input_submit_account($value) {
    echo "<div class=\"submit_button_holder\">";
    echo "<input name=\"$value\" type=\"submit\" class=\"submit_account\" value=\"$value\">";
    echo '</div>';
}

function input_review_box ($errors, $name) {
    $value = posted_value($name);

    echo "<textarea name='$name' placeholder='Enter your review here...'>";

    echo $value;

    echo '</textarea>';

    error_label($errors, $name);
}

function input_checkbox($errors, $name, $label, $onclick) {
    echo '<div class="required_field">';
    echo "<label for = \"$name\">$label</label>";
    echo "<input type = \"checkbox\" name=\"$name\" onclick='$onclick'>";
    error_label($errors, $name);
    echo '</div>';
}

function input_review_select($errors, $name, $label, $values, $required) {
    echo '<span class = "star_rating">';
    echo '<div class="required_field">';
    echo "<label for = \"$name\">$label</label>";
    $value = posted_value($name);
    echo " <select name = \"$name\" onchange=\"hide_error_message('$name')\" $required>";
    echo "<option value = \"\"> Select an option below...</option>";
    foreach ($values as $value => $display) {
        $selected = ($value==posted_value($name))?'selected="selected"':'';
        echo "<option $selected value=\"$value\">$display</option>";
    }
    echo '</select>';
    error_label($errors, $name);
    echo '</div>';
    echo '</span>';
}
?>