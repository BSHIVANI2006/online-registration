ONLINE APPLICATION / REGISTRATION FORM
=======================================

FILES
-----
index.php   HTML form, PHP server-side validation and success display
style.css   Page design and responsive styling
script.js   JavaScript/jQuery client-side validation

REQUIREMENTS
------------
- PHP installed on your computer
- Visual Studio Code
- A web browser
- Internet connection to load jQuery from its CDN

RUN IN VS CODE (WINDOWS)
------------------------
1. Extract the downloaded ZIP file.
2. Open VS Code.
3. Select File > Open Folder.
4. Select the "online-registration-form" folder (the folder containing index.php).
5. Select Terminal > New Terminal.
6. Check PHP is installed:
       php -v
7. If PHP is recognized, start the local PHP server:
       php -S localhost:8000
8. Keep the terminal running.
9. Open your browser and visit:
       http://localhost:8000

IMPORTANT:
Do not double-click index.php to open it. PHP must run through a PHP-enabled
web server. If "php is not recognized", install PHP and add its folder to
the Windows PATH, then restart VS Code.

HOW THE PROJECT WORKS
---------------------
1. HTML creates the registration form.
2. CSS styles the form and the confirmation page.
3. JavaScript and jQuery validate the fields in the browser.
4. The form submits using POST to index.php.
5. PHP validates the data again on the server.
6. On success, PHP displays the submitted information in a formatted page.

CLOUD HOSTING
-------------
Use a hosting provider that supports PHP. Upload index.php, style.css and
script.js, preserving their paths, then visit the public URL provided by
the host. GitHub Pages alone does not run PHP.

This is a demonstration project. It displays the submitted details but does
not store them in a database or send email. Do not use it for real sensitive
information without adding HTTPS, secure database storage and privacy controls.
