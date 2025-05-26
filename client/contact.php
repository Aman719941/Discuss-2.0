<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Discuss_2.0</title>

    <?php
    // Include common CSS and JavaScript files for consistent styling and functionality.
    include("./client/common.php");
    ?>
    <style>
        /* Styling for all paragraph descriptions within the question container */
        .question-container p {
            font-size: 1.1em !important; /* Adjust as needed */
            line-height: 1.6 !important; /* Slightly increased line-height for better readability */
            margin-bottom: 15px !important; /* Space between paragraphs */
        }

        /* Custom CSS for the map container */
        .map-container {
            height: 400px !important; /* Fixed height for the map display area */
            border-radius: .25rem !important; /* Rounded corners */
            overflow: hidden !important; /* Ensures the map iframe respects the border-radius */
        }

        /* Styles for the Google Map iframe to fill its container */
        .map-container iframe {
            width: 100% !important;
            height: 100% !important;
            border: 0 !important; /* Removes default iframe border */
        }

        /* Styles for the icons in the contact information section */
        .contact-info i {
            margin-right: 10px !important; /* Adds space between icon and text */
            color: #0d6efd !important; /* Sets icon color to Bootstrap's primary blue */
        }
    </style>

</head>

<body>

    <main class="container">
        <?php
        // This block checks for 'status' parameters in the URL
        // and displays appropriate Bootstrap alert messages to the user.
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo '<div class="alert alert-success mt-3" role="alert">Your message has been sent successfully!</div>';
            } elseif ($_GET['status'] == 'error') {
                echo '<div class="alert alert-danger mt-3" role="alert">Oops! Something went wrong. Please try again later.</div>';
            } elseif ($_GET['status'] == 'invalid_email') {
                echo '<div class="alert alert-warning mt-3" role="alert">Please enter a valid email address.</div>';
            } elseif ($_GET['status'] == 'missing_fields') {
                echo '<div class="alert alert-warning mt-3" role="alert">Please fill in all required fields.</div>';
            }
        }
        ?>

        <h1 class="heading mt-5 mb-5">Contact Us </h1>

        <section class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="mb-4">Send us a message</h2>
                    <!-- The contact form.
                         'action="../server/process_contact.php"' correctly points to the backend script
                         relative to the current file's location (client/contact.php).
                         'method="POST"' is used for sending form data securely. -->
                    <form action="../server/process_contact.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label bold">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label bold">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label bold">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label bold">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <!-- Submit button for the form.
                             'name="send_message"' is used by the PHP script to identify form submission. -->
                        <button type="submit" class="btn btn-primary bold" name="send_message">Send Message</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h2 class="mb-4">Our Information</h2>
                    <div class="contact-info mb-4">
                        <p><i class="bi bi-geo-alt-fill"></i> Behind City Garden, Baberu Road, Kalukuwan Chauraha,
                            BANDA, 210001</p>
                        <p><i class="bi bi-telephone-fill"></i> +91 9236203136</p>
                        <p><i class="bi bi-envelope-fill"></i> Aman719941@gmail.com</p>
                        <p><i class="bi bi-clock-fill"></i> Mon - Fri: 9:00 AM - 5:00 PM</p>
                    </div>

                    <h3 class="mb-3 mt-4">Find Us on Map</h3>
                    <div class="map-container">
                        <!-- IMPORTANT: You need to replace the 'src' attribute below with your actual Google Maps embed code.
                             To get this:
                             1. Go to Google Maps (maps.google.com).
                             2. Search for your address (e.g., "Behind City Garden, Baberu Road, Kalukuwan Chauraha, BANDA, 210001").
                             3. Click the "Share" button.
                             4. Select the "Embed a map" tab.
                             5. Copy the entire <iframe> HTML code and paste it here. -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1800.8974543439017!2d80.3433193266392!3d25.47852290117274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399cceddb785e20d%3A0x6394b3ccf7206373!2sSPOT%20ON%2046911%20City%20Garden!5e0!3m2!1sen!2sin!4v1748223787405!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
