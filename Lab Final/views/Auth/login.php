<h2>Login</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
<a href="/index.php?controller=auth&action=register">Register</a>
Register (views/auth/register.php)
html
Copy code
<h2>Register</h2>
<form method="POST">
    <input type="text" name="employer_name" placeholder="Employer Name" required>
    <input type="text" name="company_name" placeholder="Company Name" required>
    <input type="text" name="contact_no" placeholder="Contact No" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
<a href="/index.php">Login</a>