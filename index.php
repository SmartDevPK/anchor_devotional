<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Anchor Devotional - Daily Spiritual Nourishment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Global Variables and Reset */
        :root {
            --primary: #ad3128;
            /* Maroon as primary */
            --secondary: #2c3e50;
            /* Blue for buttons */
            --accent: #2c3e50;
            /* Blue as accent */
            --light: #f8f9fa;
            --dark: #212529;
            --text: #333;
            --text-light: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --font-main: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-heading: 'Georgia', serif;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 20px rgba(0, 0, 0, 0.15);
            --transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: var(--text);
            background-color: #fff;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate {
            animation: fadeIn 1s ease forwards;
        }

        .animate-up {
            animation: slideUp 0.8s ease forwards;
        }

        /* Utility Classes */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            font-family: var(--font-heading);
            color: var(--primary);
            position: relative;
            font-size: 2.5rem;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--primary);
            margin: 20px auto;
            border-radius: 2px;
        }

        .btn {
            display: inline-block;
            padding: 14px 30px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            text-align: center;
            cursor: pointer;
            border: none;
            font-size: 1rem;
            box-shadow: var(--shadow);
        }

        .btn-primary {
            background-color: var(--secondary);
            color: white;
            border: 2px solid var(--secondary);
        }

        .btn-primary:hover {
            background-color: transparent;
            color: var(--secondary);
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .btn-white {
            background-color: white;
            color: var(--primary);
            border: 2px solid white;
        }

        .btn-white:hover {
            background-color: transparent;
            color: white;
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow);
            z-index: 1000;
            transition: var(--transition);
            padding: 15px 0;
        }

        .header-scrolled {
            background-color: rgba(255, 255, 255, 0.98);
            padding: 10px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 15px;
        }

        .logo-img {
            height: 50px;
            width: auto;
            transition: var(--transition);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .logo-main {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            font-family: var(--font-heading);
        }

        .logo-sub {
            font-size: 0.9rem;
            color: var(--secondary);
            font-weight: 500;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            font-size: 1rem;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: var(--primary);
            bottom: -5px;
            left: 0;
            transition: var(--transition);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
        }

        /* Video Hero Section */
        .video-hero {
            position: relative;
            height: 100vh;
            min-height: 600px;
            overflow: hidden;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 0 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s ease forwards 0.3s, slideUp 0.8s ease forwards 0.3s;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-family: var(--font-heading);
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            line-height: 1.8;
            max-width: 800px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Devotion Page Layout */
        .devotion-page {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 40px;
            margin-top: 60px;
        }

        .devotion-cover {
            position: relative;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            margin-bottom: 30px;
            transition: var(--transition);
        }

        .devotion-cover:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .cover-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .devotion-cover:hover .cover-image {
            transform: scale(1.05);
        }

        .cover-content {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 30px;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
        }

        .cover-topic {
            font-size: 2rem;
            margin-bottom: 10px;
            font-family: var(--font-heading);
        }

        .cover-date {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        .devotion-content {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .devotion-content:hover {
            box-shadow: var(--shadow-lg);
        }

        .devotion-title {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--primary);
            font-family: var(--font-heading);
        }

        .devotion-verse {
            font-style: italic;
            margin-bottom: 30px;
            color: var(--primary);
            font-weight: 500;
            font-size: 1.2rem;
            border-left: 4px solid var(--primary);
            padding-left: 20px;
        }

        .devotion-text {
            margin-bottom: 30px;
            line-height: 1.8;
            font-size: 1.1rem;
            color: var(--text);
        }

        .devotion-text p {
            margin-bottom: 20px;
        }

        .devotion-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .see-more-devotions {
            text-align: center;
            margin-top: 60px;
        }

        .download-btn {
            background-color: var(--success);
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: var(--shadow);
        }

        .download-btn:hover {
            background-color: #219653;
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .social-share {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .social-share span {
            font-weight: 500;
        }

        .social-share a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #f5f5f5;
            border-radius: 50%;
            color: var(--dark);
            transition: var(--transition);
        }

        .social-share a:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Comment Section Styles */
        .comments-section {
            margin-top: 60px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .comments-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .comments-title {
            font-size: 1.5rem;
            color: var(--primary);
            font-family: var(--font-heading);
        }

        .comment-count {
            background: var(--primary);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .comment-form-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .comment-form-btn:hover {
            background-color: #8a2520;
            transform: translateY(-3px);
            box-shadow: var(--shadow);
        }

        .comments-list {
            margin-top: 30px;
        }

        .comment {
            display: flex;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }

        .comment:last-child {
            border-bottom: none;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: bold;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .comment-content {
            flex-grow: 1;
        }

        .comment-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .comment-author {
            font-weight: 600;
            color: var(--primary);
        }

        .comment-date {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .comment-text {
            line-height: 1.6;
            color: var(--text);
        }

        .no-comments {
            text-align: center;
            padding: 30px;
            color: var(--text-light);
            font-style: italic;
        }

        /* Author Column */
        .author-column {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            height: fit-content;
            position: sticky;
            top: 100px;
            transition: var(--transition);
        }

        .author-column:hover {
            box-shadow: var(--shadow-lg);
        }

        .author-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .author-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--light);
            margin: 0 auto 15px;
            display: block;
            transition: var(--transition);
        }

        .author-avatar:hover {
            transform: scale(1.05);
        }

        .author-name {
            font-size: 1.4rem;
            color: var(--primary);
            margin-bottom: 5px;
            font-family: var(--font-heading);
        }

        .author-title {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .author-bio {
            line-height: 1.7;
            margin-bottom: 25px;
            color: var(--text);
        }

        .author-contact {
            margin-bottom: 25px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: var(--text);
        }

        .contact-item i {
            margin-right: 10px;
            color: var(--primary);
            width: 20px;
            text-align: center;
        }

        .author-social {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .author-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #f5f5f5;
            border-radius: 50%;
            color: var(--dark);
            transition: var(--transition);
        }

        .author-social a:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Prayer Request Section */
        .prayer {
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)),
                url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .prayer-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            max-width: 800px;
            margin: 0 auto;
            transition: var(--transition);
        }

        .prayer-form:hover {
            box-shadow: var(--shadow-lg);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--primary);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: var(--font-main);
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(173, 49, 40, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        /* Testimonies Section */
        .testimonies {
            background-color: #f5f7fa;
        }

        .testimony-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimony-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .testimony-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .testimony-meta {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .testimony-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .testimony-name {
            font-weight: 600;
            color: var(--primary);
        }

        .testimony-date {
            font-size: 0.8rem;
            color: var(--text-light);
        }

        .testimony-content {
            line-height: 1.7;
            color: var(--text);
        }

        /* Subscribe Section */
        .subscribe {
            background-color: var(--primary);
            color: white;
            text-align: center;
        }

        .subscribe-form {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .subscribe-input {
            flex: 1;
            min-width: 300px;
            padding: 15px;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
        }

        .subscribe-btn {
            padding: 15px 30px;
            border-radius: 0 50px 50px 0;
            background-color: var(--secondary);
            color: white;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .subscribe-btn:hover {
            background-color: #1a2a3a;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 80px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: var(--transition);
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 0.9rem;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-container {
            background-color: white;
            border-radius: 10px;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            position: relative;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }

        .modal-overlay.active .modal-container {
            transform: scale(1);
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-light);
            transition: var(--transition);
        }

        .modal-close:hover {
            color: var(--primary);
            transform: rotate(90deg);
        }

        .modal-content {
            text-align: center;
        }

        .modal-content h2 {
            color: var(--primary);
            margin-bottom: 15px;
            font-family: var(--font-heading);
        }

        .modal-content p {
            margin-bottom: 25px;
            color: var(--text);
        }

        .modal-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .modal-form .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .modal-form .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: var(--font-main);
        }

        .modal-form label {
            font-size: 0.9rem;
            color: var(--text-light);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-form label input {
            margin: 0;
        }

        .modal-note {
            font-size: 0.8rem;
            color: var(--text-light);
            margin-top: 20px;
        }

        /* Comment Modal */
        .comment-modal .modal-content {
            text-align: left;
        }

        .comment-modal .modal-content h2 {
            text-align: center;
        }

        .comment-modal textarea {
            min-height: 150px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.8rem;
            }

            .section {
                padding: 80px 0;
            }

            .devotion-page {
                grid-template-columns: 1fr;
            }

            .author-column {
                position: static;
                margin-top: 40px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background-color: white;
                flex-direction: column;
                align-items: center;
                padding: 40px 0;
                transition: var(--transition);
                box-shadow: var(--shadow);
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                margin: 15px 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .logo-text {
                display: none;
            }

            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }

            .cta-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn {
                width: 100%;
            }

            .devotion-cover {
                height: 300px;
            }

            .cover-topic {
                font-size: 1.5rem;
            }

            .devotion-content {
                padding: 30px 20px;
            }

            .devotion-actions {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .comments-section {
                padding: 20px;
            }

            .comment {
                flex-direction: column;
                gap: 15px;
            }

            .comment-meta {
                flex-direction: column;
                gap: 5px;
            }
        }

        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .cover-content {
                padding: 20px;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header with Logo Image -->
    <header id="header">
        <div class="container">
            <nav>
                <a href="index.php" class="logo-container">
                    <img src="the anch logo.png" alt="The Anchor Devotional Logo" class="logo-img">
                    <div class="logo-text">
                        <span class="logo-main">The Anchor</span>
                        <span class="logo-sub">Daily Devotional</span>
                    </div>
                </a>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="nav-links" id="navLinks">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="todays-devotion.php">Devotions</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="prayer.php">Prayer</a></li>
                    <li><a href="#subscribe">Subscribe</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    $host = "localhost";
    $port = 3307;
    $username = "root";
    $password = "";
    $database = "prayer_db";

    $conn = new mysqli($host, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the latest devotion
    $result = $conn->query("SELECT * FROM devotion ORDER BY id DESC LIMIT 1");
    $devotion = $result->fetch_assoc();
    $conn->close();
    ?>

    <!-- Video Hero Section -->
    <section class="video-hero" id="home">
        <video class="video-background" autoplay muted loop>
            <source src="hero video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="video-overlay"></div>
        <div class="hero-content">
            <h1>Daily Spiritual Nourishment</h1>
            <p>Anchor your soul in God's Word with our daily devotionals. Each day brings fresh insight, biblical
                wisdom, and practical application for your spiritual journey.</p>
            <div class="cta-buttons">
                <a href="todays-devotion.php" class="btn btn-white">Today's Devotion</a>
                <a href="#subscribe" class="btn btn-secondary">Subscribe Daily</a>
            </div>
        </div>
    </section>

    <!-- Devotion Page Content -->
    <section class="section" id="devotion">
        <div class="container">
            <div class="devotion-page">
                <div class="devotion-main">
                    <!-- Devotion Cover -->
                    <div class="devotion-cover" data-aos="fade-up">
                        <img src="<?= htmlspecialchars($devotion['image_path']) ?>" alt="Today's Devotion"
                            class="cover-image">
                        <div class="cover-content">
                            <h2 class="cover-topic">
                                <?= htmlspecialchars($devotion['topic']) ?>
                            </h2>
                            <p class="cover-date">
                                <span>
                                    The Anchor - <?= date("F j, Y", strtotime($devotion['date'])) ?>
                                </span>
                            </p>
                            <?php
                            $pdfPath = !empty($devotion['pdf_path']) ? htmlspecialchars($devotion['pdf_path']) : '#';
                            $disabled = empty($devotion['pdf_path']) ? 'disabled' : '';
                            ?>
                            <a href="<?= $pdfPath ?>" class="download-btn" <?= $disabled ? 'aria-disabled="true" onclick="return false;"' : 'download' ?>>
                                <i class="fas fa-download"></i> Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Devotion Content -->
            <div class="devotion-content" data-aos="fade-up" data-aos-delay="100">
                <h3 class="devotion-title">Surviving the HEAT</h3>
                <p class="devotion-verse">Blessed is
                    the man that trusteth in the Lord,
                    and whose hope the Lord is. [8]
                    For he shall be as a tree planted
                    by the waters, and that
                    spreadeth out her roots by the
                    river, and shall not see (FEAR)
                    when heat cometh, but her leaf
                    shall be green; and shall not be
                    careful (WORRIED) in the year of
                    drought, neither shall cease from
                    yielding fruit. -Jeremiah 17:7-8 </p>

                <div class="devotion-text">
                    <p>Heat in the Bible and in life generally signifies trouble, hardship, suffering,
                        adversity, and trails.</p>

                    <p>In life, we all encounter different levels, dissensions and intensity of heat. However,
                        we should be encouraged that God has also made a way of escape for those who trust and
                        hope in him.</p>

                    <p>" Thou shalt be hid from the scourge of the tongue: neither shalt thou be afraid of
                        destruction when it cometh " (Job 5:21).</p>

                    <p>Yet, Scripture reminds us that in Christ, we have an anchor for our souls (Hebrews 6:19).
                        This anchor doesn't prevent the storms from coming, but it does keep us secure when they
                        do. The peace of God is not the absence of trouble, but the presence of Christ in the
                        midst of it.</p>

                    <p>When Paul wrote to the Philippians about "the peace of God," he was in prison, facing
                        possible execution. His circumstances were anything but peaceful, yet he could testify
                        to a peace that "surpasses all understanding." This peace comes not from positive
                        thinking or denial of reality, but from a deep trust in God's character and promises.
                    </p>

                    <p>Today, if you're facing a storm, remember that your anchor holds. Take time to meditate
                        on God's promises in Scripture. Bring your anxieties to Him in prayer (Philippians 4:6).
                        And rest in the truth that the same power that calmed the storm on the Sea of Galilee is
                        at work in your life today.</p>

                    <p>Peace isn't found in the absence of the storm, but in the presence of the Savior who
                        walks with us through it.</p>
                </div>

                <div class="devotion-actions">
                    <a href="#" class="download-btn">
                        <i class="fas fa-download"></i> Download Full Devotional
                    </a>
                    <div class="social-share">
                        <span>Share this devotion:</span>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            <!-- Comment Section -->
            <div class="comments-section" data-aos="fade-up">
                <div class="comments-header">
                    <h3 class="comments-title">Comments <span class="comment-count" id="commentCount">0</span>
                    </h3>
                    <button class="comment-form-btn" id="commentFormBtn">
                        <i class="fas fa-comment"></i> Leave a Comment
                    </button>
                </div>

                <div class="comments-list" id="commentsList">
                    <div class="no-comments">No comments yet. Be the first to share your thoughts!</div>
                </div>
            </div>

            <div class="see-more-devotions" data-aos="fade-up">
                <a href="past-devotions.php" class="btn btn-primary">
                    <i class="fas fa-book-open"></i> See More Devotions
                </a>
            </div>
        </div>

        <!-- Author Column -->
        <div class="author-column" data-aos="fade-left" data-aos-delay="200">
            <div class="author-header">
                <img src="PROFILE DADDY 1.png" alt="Author" class="author-avatar">
                <h3 class="author-name">Maj Gen (Dr) Ezra Jahadi Jakko (Rtd)</h3>
                <p class="author-title">Pastor/General Overseer<br>Gospel Believers mission</p>
            </div>

            <div class="author-bio">
                <p>Pastor has been writing daily devotionals for years. His insights into Scripture have helped
                    thousands grow in their faith journey.</p>
            </div>

            <div class="author-contact">
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>pastor@theanchor.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span>+234 812 345 6789</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Abuja, Nigeria </span>
                </div>
            </div>

            <div class="author-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- Prayer Request Section -->
    <section class="section prayer" id="prayer">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Prayer Requests</h2>
            <div class="prayer-form" data-aos="fade-up" data-aos-delay="100">
                <form id="prayerRequestForm" action="submit_prayer.php" method="POST">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email (optional)</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="request">Prayer Request</label>
                        <textarea id="request" name="prayer" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" id="sharePublicly" name="sharePublicly" value="1"> Share this request
                            publicly (anonymous)
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Testimonies Section -->
    <section class="section testimonies" id="testimonies">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Recent Testimonies</h2>
            <div class="testimony-grid">
                <div class="testimony-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimony-meta">
                        <div class="testimony-avatar">JD</div>
                        <div>
                            <div class="testimony-name">John D.</div>
                            <div class="testimony-date">June 8, 2023</div>
                        </div>
                    </div>
                    <div class="testimony-content">
                        <p>After praying with the devotional community, my mother's health improved miraculously. The
                            doctors can't explain it, but we know God answered our prayers!</p>
                    </div>
                </div>
                <div class="testimony-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimony-meta">
                        <div class="testimony-avatar">SM</div>
                        <div>
                            <div class="testimony-name">Sarah M.</div>
                            <div class="testimony-date">June 5, 2023</div>
                        </div>
                    </div>
                    <div class="testimony-content">
                        <p>The devotional on Philippians 4:6-7 came exactly when I needed it. I was anxious about my job
                            situation, but God gave me peace and then provided a better position!</p>
                    </div>
                </div>
                <div class="testimony-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimony-meta">
                        <div class="testimony-avatar">TP</div>
                        <div>
                            <div class="testimony-name">Thomas P.</div>
                            <div class="testimony-date">May 28, 2023</div>
                        </div>
                    </div>
                    <div class="testimony-content">
                        <p>I've been using these devotionals for my family's morning prayer time. My children are now
                            excited about reading the Bible every day!</p>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 40px;" data-aos="fade-up">
                <a href="testimonies.php" class="btn btn-secondary">View More Testimonies</a>
            </div>
        </div>
    </section>

    <!-- Subscribe Section -->
    <section class="section subscribe" id="subscribe">
        <div class="container">
            <h2 class="section-title" style="color: white;" data-aos="fade-up">Stay Connected</h2>
            <p style="text-align: center; margin-bottom: 30px; max-width: 700px; margin-left: auto; margin-right: auto;"
                data-aos="fade-up">
                Receive daily devotionals directly in your inbox. Join our community of believers growing together in
                faith.
            </p>
            <form class="subscribe-form" id="subscribeForm" data-aos="fade-up" data-aos-delay="100">
                <input type="email" class="subscribe-input" placeholder="Your email address" required>
                <button type="submit" class="subscribe-btn">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column" data-aos="fade-up">
                    <h3>The Anchor</h3>
                    <p>A daily devotional ministry committed to helping believers anchor their faith in God's Word
                        through daily spiritual nourishment.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-column" data-aos="fade-up" data-aos-delay="100">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="todays-devotion.php">Today's Devotion</a></li>
                        <li><a href="past-devotions.php">Past Devotions</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="prayer.php">Prayer Requests</a></li>
                    </ul>
                </div>

                <div class="footer-column" data-aos="fade-up" data-aos-delay="200">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        <li><a href="bible-reading-plans.php">Bible Reading Plans</a></li>
                        <li><a href="downloads.php">Free Downloads</a></li>
                        <li><a href="books.php">Recommended Books</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="faq.php">FAQs</a></li>
                    </ul>
                </div>

                <div class="footer-column" data-aos="fade-up" data-aos-delay="300">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> Gospel Believers Mission HQ, Abuja, Nigeria</li>
                        <li><i class="fas fa-phone"></i> +234 812 345 6789</li>
                        <li><i class="fas fa-envelope"></i> info@theanchor.com</li>
                    </ul>
                </div>
            </div>

            <div class="copyright" data-aos="fade-up">
                <p>&copy; 2023 The Anchor Devotional. All Rights Reserved. | <a href="privacy.php"
                        style="color: #bbb;">Privacy Policy</a> | <a href="terms.php" style="color: #bbb;">Terms of
                        Use</a></p>
            </div>
        </div>
    </footer>

    <!-- Comment Modal -->
    <div class="modal-overlay comment-modal" id="commentModal">
        <div class="modal-container" data-aos="zoom-in">
            <button class="modal-close" id="commentModalClose">&times;</button>
            <div class="modal-content">
                <h2>Leave a Comment</h2>
                <p>Share your thoughts about this devotion with our community.</p>
                <form class="modal-form" id="commentForm">
                    <div class="form-group">
                        <label for="commentName">Your Name</label>
                        <input type="text" id="commentName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="commentText">Your Comment</label>
                        <textarea id="commentText" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </form>
                <p class="modal-note">Comments will be visible to everyone after submission.</p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileMenuBtn.innerHTML = navLinks.classList.contains('active') ?
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        });

        // Form Submissions (would be connected to backend in production)
        document.getElementById('prayerRequestForm').addEventListener('submit', function (e) {
            e.preventDefault(); // prevent default form submission

            const form = e.target;
            const formData = new FormData(form);

            // Send form data to submit.php
            fetch('submit.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    // Optional: log the server response
                    console.log('Server response:', data);

                    // Show thank you alert regardless of server response
                    alert('Thank you for your prayer request. Our team will pray for this need.');

                    // Reset the form
                    form.reset();
                })
                .catch(error => {
                    console.error('Submission error:', error);
                    alert('There was a problem submitting your request. Please try again.');
                });
        });

        document.getElementById('subscribeForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Thank you for subscribing to The Anchor Devotional! You will receive your first devotional tomorrow morning.');
            this.reset();
        });

        // Comment Section Functionality
        const commentFormBtn = document.getElementById('commentFormBtn');
        const commentModal = document.getElementById('commentModal');
        const commentModalClose = document.getElementById('commentModalClose');
        const commentForm = document.getElementById('commentForm');
        const commentsList = document.getElementById('commentsList');
        const commentCount = document.getElementById('commentCount');

        // Array to store comments (in a real app, this would be from a database)
        let comments = [];

        // Open comment modal
        commentFormBtn.addEventListener('click', () => {
            commentModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        // Close comment modal
        commentModalClose.addEventListener('click', () => {
            commentModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        // Close modal when clicking outside
        commentModal.addEventListener('click', (e) => {
            if (e.target === commentModal) {
                commentModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Handle comment submission
        commentForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = document.getElementById('commentName').value.trim();
            const text = document.getElementById('commentText').value.trim();

            if (name && text) {
                // Create new comment object
                const newComment = {
                    id: Date.now(),
                    name: name,
                    text: text,
                    date: new Date().toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    })
                };

                // Add to comments array
                comments.unshift(newComment);

                // Update UI
                renderComments();

                // Reset form and close modal
                commentForm.reset();
                commentModal.classList.remove('active');
                document.body.style.overflow = 'auto';

                // Show success message
                alert('Thank you for your comment! It has been posted.');
            }
        });

        // Render comments to the page
        function renderComments() {
            if (comments.length === 0) {
                commentsList.innerHTML = '<div class="no-comments">No comments yet. Be the first to share your thoughts!</div>';
                commentCount.textContent = '0';
                return;
            }

            // Clear existing comments
            commentsList.innerHTML = '';

            // Update comment count
            commentCount.textContent = comments.length;

            // Create HTML for each comment
            comments.forEach(comment => {
                const commentDiv = document.createElement('div');
                commentDiv.className = 'comment';
                commentDiv.innerHTML = `
                    <div class="comment-avatar">${comment.name.charAt(0).toUpperCase()}</div>
                    <div class="comment-content">
                        <div class="comment-meta">
                            <span class="comment-author">${comment.name}</span>
                            <span class="comment-date">${comment.date}</span>
                        </div>
                        <div class="comment-text">${comment.text}</div>
                    </div>
                `;

                commentsList.appendChild(commentDiv);
            });
        }

        // Initial render
        renderComments();
    </script>
</body>

</html>