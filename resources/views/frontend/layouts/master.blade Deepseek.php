<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    
    <title>@yield('title', $setting->site_name ?? 'Betikrom Trade') | Global Commerce</title>
    
    <meta name="description" content="@yield('meta_description', $setting->meta_description ?? 'Betikrom Trade - Your strategic partner in global trade, premium sourcing, and supply chain excellence.')">
    <meta name="keywords" content="@yield('meta_keywords', $setting->meta_keywords ?? 'global trade, commodity sourcing, logistics, Betikrom')">
    <meta name="author" content="{{ $setting->site_name ?? 'Betikrom Trade' }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', $setting->site_name ?? 'Betikrom Trade')">
    <meta property="og:description" content="@yield('meta_description', $setting->meta_description ?? '')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:type" content="website">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --deep-blue: #0a2540;
            --accent-gold: #c7a34b;
            --accent-gold-hover: #dbb552;
            --soft-gray: #f8fafc;
            --text-dark: #1e293b;
            --text-muted: #64748b;
            --border-light: #e2e8f0;
            --gradient-hero: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #ffffff;
            color: var(--text-dark);
            line-height: 1.6;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        
        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            letter-spacing: -0.02em;
        }
        
        .text-gold {
            color: var(--accent-gold) !important;
        }
        
        .bg-deep {
            background-color: var(--deep-blue);
        }
        
        /* Buttons */
        .btn-gold {
            background-color: var(--accent-gold);
            border: 2px solid var(--accent-gold);
            color: #0a2540;
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.3px;
            text-transform: uppercase;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(199, 163, 75, 0.3);
        }
        
        .btn-gold:hover {
            background-color: var(--accent-gold-hover);
            border-color: var(--accent-gold-hover);
            color: #0a2540;
            box-shadow: 0 8px 25px rgba(199, 163, 75, 0.4);
            transform: translateY(-2px);
        }
        
        .btn-outline-gold {
            background: transparent;
            border: 2px solid var(--accent-gold);
            color: var(--accent-gold);
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
        }
        
        .btn-outline-gold:hover {
            background: var(--accent-gold);
            color: #0a2540;
            transform: translateY(-2px);
        }
        
        .btn-white {
            background-color: #ffffff;
            border: 2px solid #ffffff;
            color: var(--deep-blue);
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-white:hover {
            background-color: transparent;
            color: #ffffff;
            border-color: #ffffff;
        }
        
        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled {
            padding: 0.7rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.75rem;
            color: var(--deep-blue) !important;
            letter-spacing: -0.5px;
        }
        
        .navbar-brand span {
            color: var(--accent-gold);
        }
        
        .nav-link {
            color: #475569 !important;
            font-weight: 500;
            margin: 0 0.4rem;
            padding: 0.5rem 1rem !important;
            transition: all 0.2s ease;
            border-radius: 8px;
            position: relative;
        }
        
        .nav-link:hover,
        .nav-link.active {
            color: var(--deep-blue) !important;
            background-color: rgba(199, 163, 75, 0.08);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent-gold);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 60%;
        }
        
        /* Hero Section */
        .hero-section {
            background: var(--gradient-hero);
            padding: 6rem 0 7rem;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -200px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(199, 163, 75, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.15;
            color: var(--deep-blue);
            margin-bottom: 1.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            color: var(--text-muted);
            max-width: 550px;
            margin-bottom: 2rem;
        }
        
        /* Stats Badge */
        .stats-badge {
            background: white;
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        
        /* Section Titles */
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--deep-blue);
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 600px;
        }
        
        /* Service Cards */
        .service-card {
            background: #ffffff;
            border: 1px solid var(--border-light);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--accent-gold);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }
        
        .service-card:hover {
            border-color: var(--accent-gold);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            transform: translateY(-8px);
        }
        
        .service-card:hover::before {
            transform: scaleX(1);
        }
        
        .icon-wrapper {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(199, 163, 75, 0.12) 0%, rgba(199, 163, 75, 0.05) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--accent-gold);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .service-card:hover .icon-wrapper {
            background: var(--accent-gold);
            color: white;
            transform: rotateY(360deg);
        }
        
        /* Testimonial Cards */
        .testimonial-card {
            background: var(--soft-gray);
            border-radius: 20px;
            padding: 2.5rem;
            border: 1px solid #e9eef2;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .testimonial-card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.06);
            transform: translateY(-4px);
        }
        
        .quote-icon {
            font-size: 3rem;
            color: var(--accent-gold);
            opacity: 0.3;
            position: absolute;
            top: 20px;
            right: 30px;
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--deep-blue) 0%, #1a3a5c 100%);
            position: relative;
            overflow: hidden;
        }
        
        .stats-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(199, 163, 75, 0.1) 0%, transparent 70%);
        }
        
        .stat-item {
            text-align: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--accent-gold);
            margin-bottom: 0.5rem;
        }
        
        /* Footer */
        .footer {
            background: var(--deep-blue);
            color: #cbd5e1;
            padding: 4rem 0 2rem;
            position: relative;
        }
        
        .footer h5 {
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }
        
        .footer a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-block;
            padding: 0.2rem 0;
        }
        
        .footer a:hover {
            color: var(--accent-gold);
            transform: translateX(5px);
        }
        
        .footer .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .footer .social-icons a:hover {
            background: var(--accent-gold);
            color: var(--deep-blue);
            transform: translateY(-3px);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            .hero-section {
                padding: 4rem 0 5rem;
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--accent-gold);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-gold-hover);
        }
        
        /* Additional utility classes */
        .bg-light-soft {
            background-color: var(--soft-gray);
        }
        
        .rounded-4 {
            border-radius: 24px !important;
        }
        
        .shadow-hover {
            transition: box-shadow 0.3s ease;
        }
        
        .shadow-hover:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @include('frontend.layouts.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('frontend.layouts.footer')
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
    
    @stack('scripts')
</body>
</html>