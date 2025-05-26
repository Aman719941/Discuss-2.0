<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Discuss_2.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Optional: Custom CSS for map and spacing */
        .map-container {
            height: 400px;
            /* Adjust map height as needed */
            background-color: #e9ecef;
            /* Light gray placeholder background */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 1.2rem;
            border-radius: .25rem;
            /* Match Bootstrap's border-radius */
        }

        .contact-info i {
            margin-right: 10px;
            color: #0d6efd;
            /* Bootstrap primary color */
        }
    </style>
</head>

<body>

    <main class="container">
        <h1 class="heading mt-5  mb-5">Contact Us </h1>
        <section class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="mb-4">Send us a message</h2>
                    <!-- Contact form to send messages to the site administrator.
                         The form action is set to "process_contact.php", which should handle the form submission.
                         Method is POST for secure data transmission. -->
                    <form action="process_contact.php" method="POST">
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
                        <!-- Placeholder for Google Map.
                             The actual Google Maps embed code should be placed here. -->
                        <p>Google Map Placeholder [coming soon.....]</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
