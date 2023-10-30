@extends('layouts.frontendmaster')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
    </head>

    <body>
        <header>
            <h1>Contact Us</h1>
        </header>
        <section>
            <h2>Contact Information</h2>
            <p>If you have any questions or feedback, feel free to get in touch with us:</p>
            <ul>
                <li>Email: <a href="mailto:contact@example.com">contact@example.com</a></li>
                <li>Phone: <a href="tel:+1234567890">123-456-7890</a></li>
            </ul>
        </section>
        <section>
            <h2>Contact Form</h2>
            <p>You can also reach us by filling out the form below:</p>
            <form action="submit_contact_form.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea><br>

                <button type="submit">Submit</button>
                <h3>
                    This is App Name: {{ env('APP_NAME') }}
                </h3>
                <h3>
                    This is App Name: {{ env('APP_DESC') }}
                </h3>
            </form>
        </section>
        <footer>
            &copy; 2023 Your Company Name
        </footer>
    </body>

    </html>
@endsection
