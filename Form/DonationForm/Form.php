<?php

$errors = [];
$values = [
    "firstName" => "","lastName" => "","company" => "","address1" => "",
    "address2" => "","city" => "","state" => "","zipCode" => "",
    "country" => "","phone" => "","fax" => "","email" => "",
    "amount" => "", "otherAmount" => "","monthlyCredit" => "",
    "memorial" => "",
    "memorialName" => "",
    "ackDonation" => "","memAddress" => "","memCity" => "",
    "memState" => "", "memZip" => "",
    "adName" => "","comments" => "",
    "contactEmail" => "", "contactMail" => "","contactPhone" => "", "contactFax" => "",
    "newsEmail" => "","newsMail" => "","volunteer" => "",
    "anonymous" => "","employer" => "","noMail" => ""
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($values as $field => $val) {
        if (isset($_POST[$field])) {
            $values[$field] = htmlspecialchars(trim($_POST[$field]));
        }
    }

    
 
if (empty($values["firstName"])) {
    $errors["firstName"] = "First name is required";
} elseif (!preg_match("/^[a-zA-Z]+$/", $values["firstName"])) {
    $errors["firstName"] = "First name must contain only letters";
}

 
if (empty($values["lastName"])) {
    $errors["lastName"] = "Last name is required";
} elseif (!preg_match("/^[a-zA-Z]+$/", $values["lastName"])) {
    $errors["lastName"] = "Last name must contain only letters";
}



    if (empty($values["address1"])) $errors["address1"] = "Address 1 is required";
     

      if (empty($values["city"])) $errors["city"] = "City is required";
    if (empty($values["state"])) $errors["state"] = "State is required";


    if (empty($values["zipCode"])) {
    $errors["zipCode"] = "Zip Code is required";
   } elseif (!empty($values["zipCode"])) {
    if (!is_numeric($values["zipCode"])) {
        $errors["zipCode"] = "Must be a number.";
    }
  }


    if (empty($values["country"])) $errors["country"] = "Country is required";

    if (empty($values["email"])) {
        $errors["email"] = "Email is required";
    } elseif (!filter_var($values["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    if (empty($values["amount"]) && empty($values["otherAmount"])) {
        $errors["amount"] = "Donation amount is required";
    } elseif ($values["amount"] == "Other" && (!is_numeric($values["otherAmount"]) || $values["otherAmount"] <= 0)) {
        $errors["amount"] = "Other amount must be a positive number";
    }

    if (!empty($values["phone"]) && !preg_match("/^[0-9]{11}$/", $values["phone"])) {
        $errors["phone"] = "Phone number must be 11 digits";
    }

    if (empty($errors)) {
        echo "<h2>✅ Thank you for your donation!</h2>";
        echo "<p>We have received your information successfully.</p>";
        exit;
    }
    if (empty($values["volunteer"])) $errors["volunteer"] = "Must be Click";
}

function showError($field, $errors) {
    return isset($errors[$field]) ? "<span style='color:red;font-size:14px;'>".$errors[$field]."</span>" : "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Donation Form</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<form method="post" action="" class="donation-form">

<p><b>*</b> = Denotes Required Information</p>
<p class="steps">> 1 Donation &nbsp; > 2 Confirmation &nbsp; > Thank You!</p>

<h2>Donor Information</h2>

<div class="form-group">
    <label>First Name*:</label>
    <input type="text" name="firstName" value="<?= $values['firstName'] ?>">
    <?= showError("firstName", $errors) ?>
</div>

<div class="form-group">
    <label>Last Name*:</label>
    <input type="text" name="lastName" value="<?= $values['lastName'] ?>">
    <?= showError("lastName", $errors) ?>
</div>

<div class="form-group">
    <label>Company:</label>
    <input type="text" name="company" value="<?= $values['company'] ?>">
</div>

<div class="form-group">
    <label>Address 1*:</label>
    <input type="text" name="address1" value="<?= $values['address1'] ?>">
    <?= showError("address1", $errors) ?>
</div>

<div class="form-group">
    <label>Address 2:</label>
    <input type="text" name="address2" value="<?= $values['address2'] ?>">
</div>

<div class="form-group">
    <label>City*:</label>
    <input type="text" name="city" value="<?= $values['city'] ?>">
    <?= showError("city", $errors) ?>
</div>

<div class="form-group">
    <label>State*:</label>
    <select name="state">
        <option value="">Select a State</option>
        <option <?= $values["state"]=="Dhaka"?"selected":"" ?>>Dhaka</option>
        <option <?= $values["state"]=="Rangpur"?"selected":"" ?>>Rangpur</option>
        <option <?= $values["state"]=="Chittagong"?"selected":"" ?>>Chittagong</option>
    </select>
    <?= showError("state", $errors) ?>
</div>

<div class="form-group">
    <label>Zip Code*:</label>
    <input type="text" name="zipCode" value="<?= $values['zipCode'] ?>">
    <?= showError("zipCode", $errors) ?>
</div>

<div class="form-group">
    <label>Country*:</label>
    <select name="country">
        <option value="">Select a Country</option>
        <option <?= $values["country"]=="Bangladesh"?"selected":"" ?>>Bangladesh</option>
        <option <?= $values["country"]=="China"?"selected":"" ?>>China</option>
        <option <?= $values["country"]=="Bhutan"?"selected":"" ?>>Bhutan</option>
    </select>
    <?= showError("country", $errors) ?>
</div>

<div class="form-group">
    <label>Phone:</label>
    <input type="text" name="phone" value="<?= $values['phone'] ?>">
    <?= showError("phone", $errors) ?>
</div>

<div class="form-group">
    <label>Fax:</label>
    <input type="text" name="fax" value="<?= $values['fax'] ?>">
</div>

<div class="form-group">
    <label>Email*:</label>
    <input type="email" name="email" value="<?= $values['email'] ?>">
    <?= showError("email", $errors) ?>
</div>

<h2>Donation Amount</h2>
<div class="form-group full">
    <div class="inline-radio">
        <label><input type="radio" name="amount" value="None" <?= $values['amount']=="None"?"checked":"" ?>> None</label>
        <label><input type="radio" name="amount" value="50" <?= $values['amount']=="50"?"checked":"" ?>> $50</label>
        <label><input type="radio" name="amount" value="75" <?= $values['amount']=="75"?"checked":"" ?>> $75</label>
        <label><input type="radio" name="amount" value="100" <?= $values['amount']=="100"?"checked":"" ?>> $100</label>
        <label><input type="radio" name="amount" value="250" <?= $values['amount']=="250"?"checked":"" ?>> $250</label>
        <label><input type="radio" name="amount" value="Other" <?= $values['amount']=="Other"?"checked":"" ?>> Other</label>
        <label>Other Amount $<input type="text" name="otherAmount" value="<?= $values['otherAmount'] ?>" style="width:80px;"></label>
    </div>
    <?= showError("amount", $errors) ?>
</div>

<h2>Honorarium and Memorial Donation Information</h2>
<div class="form-group full">
    <label>I would like to make this donation:</label>
    <label><input type="radio" name="memorial" value="honor" <?= $values['memorial']=="honor"?"checked":"" ?>> To Honor</label>
    <label><input type="radio" name="memorial" value="memory" <?= $values['memorial']=="memory"?"checked":"" ?>> In Memory of</label>
</div>

<div class="form-group"><label>Name:</label><input type="text" name="memorialName" value="<?= $values['memorialName'] ?>"></div>
<div class="form-group"><label>Acknowledge Donation to:</label><input type="text" name="ackDonation" value="<?= $values['ackDonation'] ?>"></div>
<div class="form-group"><label>Address:</label><input type="text" name="memAddress" value="<?= $values['memAddress'] ?>"></div>
<div class="form-group"><label>City:</label><input type="text" name="memCity" value="<?= $values['memCity'] ?>"></div>
<div class="form-group"><label>State:</label><input type="text" name="memState" value="<?= $values['memState'] ?>"></div>
<div class="form-group"><label>Zip:</label><input type="text" name="memZip" value="<?= $values['memZip'] ?>"></div>

<h2>Additional Information</h2>
<div class="form-group"><label>Name:</label><input type="text" name="adName" value="<?= $values['adName'] ?>"></div>

<div class="form-group full">
    <label><input type="checkbox" name="anonymous" <?= $values['anonymous']?"checked":"" ?>> I would like my gift to remain anonymous.</label><br>
    <label><input type="checkbox" name="employer" <?= $values['employer']?"checked":"" ?>> My employer offers a matching gift program.</label><br>
    <label><input type="checkbox" name="noMail" <?= $values['noMail']?"checked":"" ?>> Please save the cost of acknowledging this gift by not mailing a thank you letter.</label>
</div>

<div class="form-group full">
    <label>Comments</label><br>
    <textarea name="comments" rows="4" cols="60"><?= $values['comments'] ?></textarea>
</div>

<div class="form-group full">
    <p><b>How may we contact you?</b></p>
    <label><input type="checkbox" name="contactEmail" <?= $values['contactEmail']?"checked":"" ?>> E-mail</label>
    <label><input type="checkbox" name="contactMail" <?= $values['contactMail']?"checked":"" ?>> Postal Mail</label>
    <label><input type="checkbox" name="contactPhone" <?= $values['contactPhone']?"checked":"" ?>> Telephone</label>
    <label><input type="checkbox" name="contactFax" <?= $values['contactFax']?"checked":"" ?>> Fax</label>
</div>

<div class="form-group full">
    <p>I would like to receive newsletters and information about special events by:</p>
    <label><input type="checkbox" name="newsEmail" <?= $values['newsEmail']?"checked":"" ?>> E-mail</label>
    <label><input type="checkbox" name="newsMail" <?= $values['newsMail']?"checked":"" ?>> Postal Mail</label>
</div>

<div class="form-group full">
    <label><input type="checkbox" name="volunteer" <?= $values['volunteer']?"checked":"" ?>> I would like information about volunteering</label>
</div>

<div class="form-group full">
    <button type="reset">Reset</button>
    <button type="submit">Continue</button>
</div>

</form>
</body>
</html>
