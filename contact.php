<?php
$conn = mysqli_connect("localhost", "root", "", "php_e-comm");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$site_phone = '09019648094';
$site_location = '8, Adebari, street, Meiran, Lagos';
$site_email = 'oluwasanmisolatowoju.com';

$success = '';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') $errors[] = 'Name is required.';
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
    if ($message === '') $errors[] = 'Please enter your message.';

    if (empty($errors)) {
        // Insert using prepared statement (assumes a `contacts` table already exists)
        $stmt = mysqli_prepare($conn, "INSERT INTO contacts (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sssss', $name, $email, $phone, $subject, $message);
            $ok = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if ($ok) {
                $success = 'Thank you — your message was received and saved.';
            } else {
                $errors[] = 'Failed to save your message. Please try again later.';
            }
        } else {
            $errors[] = 'Database error: could not prepare statement.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - My Ecommerce Site</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa fa-bars"></i>
        </label>
        <label class="my_logo">My Ecommerce Site</label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="home/register.php">Register</a></li>
9            <li><a href="#">Login</a></li>
        </ul>
    </nav>

    <main style="padding: 40px 20px;">
        <h1 style="text-align:center; margin-bottom: 20px;">Contact Us</h1>

        <div style="max-width: 1100px; margin: 0 auto; display: flex; gap: 30px; flex-wrap: wrap; justify-content: center; align-items: flex-start;">
            <!-- Contact info -->
            <div class="card glass-card" style="flex: 1 1 320px; max-width: 380px;">
                <h3>Get in touch</h3>
                <p><strong>Phone:</strong> <?php echo $site_phone; ?></p>
                <p><strong>Location:</strong> <?php echo $site_location; ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $site_email; ?>"><?php echo $site_email; ?></a></p>
                <hr style="margin: 16px 0; border-color: rgba(255,255,255,0.06);">
                <p>Our team typically replies within 1-2 business days.</p>
            </div>

            <!-- Contact form -->
            <div class="card glass-card" style="flex: 1 1 520px; max-width: 620px;">
                <?php if (!empty($success)) : ?>
                    <div style="background: rgba(0,128,0,0.1); color: #0a0; padding: 12px; border-radius: 8px; margin-bottom: 12px;">
                        <?php echo htmlspecialchars($success); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)) : ?>
                    <div style="background: rgba(255,0,0,0.06); color: #900; padding: 12px; border-radius: 8px; margin-bottom: 12px;">
                        <?php foreach ($errors as $err) echo htmlspecialchars($err) . '<br>'; ?>
                    </div>
                <?php endif; ?>

                <form action="contact.php" method="post">
                    <div class="input_deg">
                        <label>Name:</label>
                        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    </div>

                    <div class="input_deg">
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                    <div class="input_deg">
                        <label>Phone:</label>
                        <input type="text" name="phone" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    </div>

                    <div class="input_deg">
                        <label>Subject:</label>
                        <input type="text" name="subject" value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                    </div>

                    <div class="input_deg">
                        <label>Message:</label>
                        <textarea name="message"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>

                    <div class="input_deg">
                        <label></label>
                        <input type="submit" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer_title"><h3>My Ecommerce Site</h3></div>
        <div class="footer_content">
            <div>
                <h4>Services</h4>
                <p><a href="#">Web</a></p>
                <p><a href="#">App</a></p>
                <p><a href="#">Digital</a></p>
            </div>
            <div>
                <h4>Social links</h4>
                <p><a href="#">Facebook</a></p>
                <p><a href="#">X</a></p>
                <p><a href="#">Instagram</a></p>
            </div>
            <div>
                <h4>Quick links</h4>
                <p><a href="index.php">Home</a></p>
                <p><a href="index.php#products">Products</a></p>
                <p><a href="contact.php">Contact</a></p>
            </div>
            <div>
                <h4>Location</h4>
                <p>8, Adebari, street, Meiran Lagos</p>
                <p>Email: <?php echo $site_email; ?></p>
                <p>Phone: <?php echo $site_phone; ?></p>
            </div>
        </div>

        <footer>
            <hr/>
            <h3>Copyright @charles 2025</h3>
        </footer>
    </footer>
</body>
</html>