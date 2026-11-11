<?php
function e($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
$fields = ['full_name'=>'','email'=>'','phone'=>'','dob'=>'','gender'=>'','course'=>'','address'=>''];
$data = $fields; $errors = []; $success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($fields as $key => $_) $data[$key] = trim($_POST[$key] ?? '');

    if ($data['full_name'] === '') $errors[] = 'Enter your full name.';
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
    if (!preg_match('/^[0-9+\-\s()]{7,20}$/', $data['phone'])) $errors[] = 'Enter a valid phone number.';
    if ($data['dob'] === '') $errors[] = 'Select your date of birth.';
    if (!in_array($data['gender'], ['Female','Male','Other'], true)) $errors[] = 'Select your gender.';
    if (!in_array($data['course'], ['Computer Science','Electronics and Communication','Mechanical Engineering','Civil Engineering','Business Administration','Other'], true)) $errors[] = 'Select a course.';
    if ($data['address'] === '') $errors[] = 'Enter your address.';
    if (!isset($_POST['terms'])) $errors[] = 'Accept the declaration.';
    $success = empty($errors);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Application Form</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="script.js" defer></script>
</head>
<body>
<main class="page">
<header class="header">
  <div class="logo">OA</div>
  <div><p class="eyebrow">ONLINE PORTAL</p><h1>Application / Registration Form</h1>
  <p class="subtitle">Complete the form below to submit your application.</p></div>
</header>

<?php if ($success): ?>
<section class="card success" aria-live="polite">
  <div class="check">✓</div><p class="eyebrow">SUBMISSION SUCCESSFUL</p>
  <h2>Thank you, <?= e($data['full_name']) ?>!</h2>
  <p class="muted">Your application has been received. Submitted details:</p>
  <div class="details">
    <div><span>Full name</span><strong><?= e($data['full_name']) ?></strong></div>
    <div><span>Email</span><strong><?= e($data['email']) ?></strong></div>
    <div><span>Phone</span><strong><?= e($data['phone']) ?></strong></div>
    <div><span>Date of birth</span><strong><?= e($data['dob']) ?></strong></div>
    <div><span>Gender</span><strong><?= e($data['gender']) ?></strong></div>
    <div><span>Course</span><strong><?= e($data['course']) ?></strong></div>
    <div class="wide"><span>Address</span><strong><?= nl2br(e($data['address'])) ?></strong></div>
  </div>
  <p class="success-note">Your form was processed successfully by PHP.</p>
  <a class="button secondary" href="index.php">Submit another application</a>
</section>
<?php else: ?>
<?php if ($errors): ?>
<div class="error-box"><strong>Please correct these errors:</strong><ul>
<?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?>
</ul></div>
<?php endif; ?>

<form id="registrationForm" class="card" method="POST" action="index.php" novalidate>
  <div class="form-heading"><div><p class="eyebrow">PERSONAL INFORMATION</p><h2>Applicant details</h2></div><small>* Required fields</small></div>
  <div class="grid">
    <div class="group"><label for="full_name">Full name *</label><input id="full_name" name="full_name" value="<?= e($data['full_name']) ?>" placeholder="Enter your full name" required><small class="field-error"></small></div>
    <div class="group"><label for="email">Email address *</label><input type="email" id="email" name="email" value="<?= e($data['email']) ?>" placeholder="example@email.com" required><small class="field-error"></small></div>
    <div class="group"><label for="phone">Phone number *</label><input type="tel" id="phone" name="phone" value="<?= e($data['phone']) ?>" placeholder="Enter phone number" required><small class="field-error"></small></div>
    <div class="group"><label for="dob">Date of birth *</label><input type="date" id="dob" name="dob" value="<?= e($data['dob']) ?>" required><small class="field-error"></small></div>
    <div class="group"><label for="gender">Gender *</label><select id="gender" name="gender" required><option value="">Select gender</option><?php foreach (['Female','Male','Other'] as $v): ?><option <?= $data['gender']===$v?'selected':'' ?> value="<?= e($v) ?>"><?= e($v) ?></option><?php endforeach; ?></select><small class="field-error"></small></div>
    <div class="group"><label for="course">Course / Program *</label><select id="course" name="course" required><option value="">Choose a course</option><?php foreach (['Computer Science','Electronics and Communication','Mechanical Engineering','Civil Engineering','Business Administration','Other'] as $v): ?><option <?= $data['course']===$v?'selected':'' ?> value="<?= e($v) ?>"><?= e($v) ?></option><?php endforeach; ?></select><small class="field-error"></small></div>
    <div class="group wide"><label for="address">Residential address *</label><textarea id="address" name="address" rows="3" placeholder="Enter your complete address" required><?= e($data['address']) ?></textarea><small class="field-error"></small></div>
  </div>
  <label class="terms"><input type="checkbox" name="terms" id="terms" value="yes"><span>I confirm that the information provided above is correct. *</span></label>
  <small class="field-error terms-error"></small>
  <div class="actions"><button type="reset" class="button secondary">Clear form</button><button type="submit" class="button primary">Submit application →</button></div>
  <p class="note">Demo only: submitted information is displayed but is not saved in a database.</p>
</form>
<?php endif; ?>
<footer>Online Application Portal · HTML · CSS · JavaScript · jQuery · PHP</footer>
</main>
</body></html>
