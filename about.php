<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | TechZone Electronics</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --secondary: #1a1a2e;
            --accent: #00f5d4;
            --accent-dark: #00c4a7;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --dark: #121212;
            --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --glow: 0 0 15px rgba(58, 134, 255, 0.5);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light);
            color: var(--secondary);
            line-height: 1.7;
            overflow-x: hidden;
        }

        .tech-font {
            font-family: 'Orbitron', sans-serif;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        section {
            padding: 100px 0;
        }

        h1, h2, h3, h4 {
            margin-bottom: 1.2rem;
            line-height: 1.3;
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 700;
        }

        h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 3.5rem;
            position: relative;
        }

        h2:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 2px;
        }

        p {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .btn {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: linear-gradient(135deg, var(--accent), var(--primary));
            transition: var(--transition);
            z-index: -1;
        }

        .btn:hover:before {
            width: 100%;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        /* Header Styles */
        header {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo i {
            margin-right: 10px;
            color: var(--accent);
            font-size: 2.2rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
            position: relative;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 500;
            transition: var(--transition);
            padding: 5px 0;
        }

        .nav-links a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: var(--transition);
        }

        .nav-links a:hover:after, .nav-links a.active:after {
            width: 100%;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--primary);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--primary);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--dark) 100%);
            color: white;
            padding: 180px 0 120px;
            position: relative;
            overflow: hidden;
        }

        .hero:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--accent);
            color: var(--accent);
        }

        .btn-outline:before {
            background: var(--accent);
        }

        .btn-outline:hover {
            color: var(--secondary);
        }

        /* Mission & Vision Section */
        .mission-vision {
            background-color: white;
        }

        .mission-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
        }

        .mission-card, .vision-card {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid var(--light-gray);
        }

        .mission-card:before, .vision-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
            transition: var(--transition);
        }

        .mission-card:hover:before, .vision-card:hover:before {
            width: 100%;
            opacity: 0.05;
        }

        .mission-card:hover, .vision-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .mission-card i, .vision-card i {
            font-size: 4rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* History Section */
        .history {
            background: linear-gradient(135deg, var(--light) 0%, white 100%);
            position: relative;
            overflow: hidden;
        }

        .history:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, var(--primary) 0%, transparent 70%);
            border-radius: 0 0 0 100%;
            opacity: 0.1;
        }

        .history-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .history-text {
            padding-right: 20px;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
        }

        .timeline-item {
            position: relative;
            margin-bottom: 40px;
            padding-left: 30px;
        }

        .timeline-item:before {
            content: '';
            position: absolute;
            left: -36px;
            top: 5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 5px white, 0 0 0 7px var(--accent);
        }

        .timeline-year {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .history-image {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            height: 500px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            font-weight: 600;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .history-image:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
        }

        .history-image-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        .history-image-content  img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Values Section */
        .values {
            background-color: var(--secondary);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .values:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjAyKSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
        }

        .values h2 {
            color: white;
        }

        .values h2:after {
            background: linear-gradient(90deg, var(--accent), white);
        }

        .values-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            position: relative;
            z-index: 1;
        }

        .value-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            border-color: var(--accent);
        }

        .value-card i {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--accent), white);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Products Section */
        .products {
            background-color: white;
        }

        .products-content {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .product-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .product-category {
            background: var(--light);
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .product-category:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .product-category i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        /* Why Choose Us Section */
        .why-choose-us {
            background: linear-gradient(135deg, var(--light) 0%, white 100%);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }

        .feature {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature i {
            font-size: 2.5rem;
            color: var(--accent);
            margin-top: 5px;
            flex-shrink: 0;
        }

        /* Team Section */
        .team {
            background-color: white;
        }

        .team-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .team-member {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
            position: relative;
        }

        .team-member:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .member-image {
            height: 300px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 5rem;
            position: relative;
            overflow: hidden;
        }

        .member-image:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
        }

        .member-info {
            padding: 30px 25px;
        }
        .member-image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .member-info h3 {
            margin-bottom: 5px;
        }

        .member-info .position {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .member-info p {
            color: var(--gray);
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--light);
            border-radius: 50%;
            color: var(--primary);
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Contact Section */
        .contact {
            background: linear-gradient(135deg, var(--secondary) 0%, var(--dark) 100%);
            color: white;
        }

        .contact h2 {
            color: white;
        }

        .contact h2:after {
            background: linear-gradient(90deg, var(--accent), white);
        }

        .contact-content {
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .contact-item {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-item:hover {
            transform: translateY(-10px);
            border-color: var(--accent);
        }

        .contact-item i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--accent);
        }

        /* Social Proof Section */
        .social-proof {
            background-color: white;
        }

        .awards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .award {
            background: var(--light);
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
        }

        .award:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .award i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        /* Footer */
        footer {
            background-color: var(--secondary);
            color: white;
            padding: 80px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            margin-bottom: 25px;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--light-gray);
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--accent);
            transform: translateX(5px);
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            transition: var(--transition);
        }

        .social-icons a:hover {
            background: var(--accent);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--light-gray);
            font-size: 0.9rem;
        }

        /* Back to Top Button - FIXED */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            z-index: 999;
            text-decoration: none;
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background: var(--accent);
            transform: translateY(-5px);
        }

        /* Responsive Styles */
        @media (max-width: 1100px) {
            h1 {
                font-size: 3rem;
            }
            
            h2 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 992px) {
            .history-content {
                grid-template-columns: 1fr;
            }
            
            .history-text {
                padding-right: 0;
            }
            
            .hero h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .nav-links li {
                margin: 10px 0;
            }
            
            .mobile-menu {
                display: block;
            }
            
            h1 {
                font-size: 2.5rem;
            }
            
            h2 {
                font-size: 2rem;
            }
            
            .hero {
                padding: 150px 0 100px;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            section {
                padding: 80px 0;
            }
            
            .mission-container, .values-container, .team-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .hero-btns {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
                text-align: center;
            }
            
            .history-image {
                height: 350px;
            }
            
            .feature {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-laptop"></i>
                    <span class="tech-font">Abyssinya Market</span>
                </a>
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Deals</a></li>
                    <li><a href="#" class="active">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#" class="btn">Shop Now</a></li>
                </ul>
                <div class="mobile-menu">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="tech-font">About Abyssiniya Market</h1>
                <p>Your trusted partner for cutting-edge electronics and technology solutions. We're passionate about bringing the latest tech innovations to your doorstep with unmatched quality and service.</p>
                <div class="hero-btns">
                    <a href="#products" class="btn">Explore Our Products</a>
                    <a href="#contact" class="btn btn-outline">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision">
        <div class="container">
            <div class="mission-container">
                <div class="mission-card">
                    <i class="fas fa-bullseye"></i>
                    <h3>Our Mission</h3>
                    <p>To make cutting-edge technology accessible, affordable, and easy to shop for everyone. We believe that technology should enhance lives, not complicate them.</p>
                </div>
                <div class="vision-card">
                    <i class="fas fa-eye"></i>
                    <h3>Our Vision</h3>
                    <p>To be the most trusted electronics retailer, bringing innovation and quality to homes worldwide. We envision a future where technology seamlessly integrates into everyday life.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="history">
        <div class="container">
            <h2>Our Journey</h2>
            <div class="history-content">
                <div class="history-text">
                    <p>Founded in 2018 by a group of tech enthusiasts, Abyssiniya Market began as a small local store with a big vision. Our founders noticed a gap in the market for a retailer that combined expert knowledge with competitive pricing.</p>
                    
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">2018</div>
                            <h4>Company Founded</h4>
                            <p>TechZone was established with a single storefront and a passionate team of 5 people.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2019</div>
                            <h4>Online Expansion</h4>
                            <p>Launched our e-commerce platform, reaching customers nationwide for the first time.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2021</div>
                            <h4>International Shipping</h4>
                            <p>Expanded our services to include international shipping to over 50 countries.</p>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-year">2023</div>
                            <h4>Product Line Launch</h4>
                            <p>Introduced our exclusive TechZone product line with innovative tech accessories.</p>
                        </div>
                    </div>
                    
                    <p>Today, we serve over 50,000 satisfied customers and continue to grow, constantly innovating to provide the best shopping experience in the electronics industry.</p>
                </div>
                <div class="history-image">
                    <div class="history-image-content">
                        <img src="growth.jpeg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <h2>Our Core Values</h2>
            <div class="values-container">
                <div class="value-card">
                    <i class="fas fa-users"></i>
                    <h3>Customer First</h3>
                    <p>Our customers are at the heart of everything we do. We listen, adapt, and go the extra mile to ensure satisfaction.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Transparency</h3>
                    <p>We believe in honest business practices, clear communication, and building trust through transparency.</p>
                </div>
                <!-- <div class="value-card">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Innovation</h3>
                    <p>We stay ahead of the curve, constantly exploring new technologies and better ways to serve our customers.</p>
                </div> -->
                <div class="value-card">
                    <i class="fas fa-award"></i>
                    <h3>Reliability</h3>
                    <p>We deliver on our promises with consistent quality, dependable service, and products you can count on.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <div class="container">
            <h2>Our Products</h2>
            <div class="products-content">
                <p>We offer a comprehensive range of electronics including smartphones, laptops, wearables, smart TVs, gaming consoles, and accessories from top global brands. Our carefully curated selection ensures that you get the best devices that suit your lifestyle and budget.</p>
                <p>From everyday essentials to specialty gadgets, we're constantly updating our inventory to include the latest innovations in the tech world.</p>
                
                <div class="product-categories">
                    <div class="product-category">
                        <i class="fas fa-mobile-alt"></i>
                        <h4>Smartphones</h4>
                    </div>
                    <div class="product-category">
                        <i class="fas fa-laptop"></i>
                        <h4>Laptops</h4>
                    </div>
                    <div class="product-category">
                        <i class="fas fa-tablet"></i>
                        <h4>Tablets</h4>
                    </div>
                    <!-- <div class="product-category">
                        <i class="fas fa-gamepad"></i>
                        <h4>Gaming</h4>
                    </div> -->
                    <!-- <div class="product-category">
                        <i class="fas fa-headphones"></i>
                        <h4>Audio</h4>
                    </div> -->
                    <!-- <div class="product-category">
                        <i class="fas fa-home"></i>
                        <h4>Smart Home</h4>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <h2>Why Choose Abyssiniya Market?</h2>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <h3>100% Genuine Products</h3>
                        <p>All our products are sourced directly from authorized dealers and manufacturers with complete authenticity guarantees.</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-tag"></i>
                    <div>
                        <h3>Competitive Prices</h3>
                        <p>We offer the best value with competitive pricing, regular promotions, and exclusive member discounts.</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-shipping-fast"></i>
                    <div>
                        <h3>Fast & Secure Shipping</h3>
                        <p>Quick delivery with secure packaging and real-time tracking to ensure your products arrive safely and on time.</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-undo"></i>
                    <div>
                        <h3>Easy Returns & Warranty</h3>
                        <p>Hassle-free 30-day returns and comprehensive warranty support from manufacturers for your peace of mind.</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-headset"></i>
                    <div>
                        <h3>Dedicated Customer Service</h3>
                        <p>Our knowledgeable support team is available 24/7 to assist you with any questions or concerns.</p>
                    </div>
                </div>
                <div class="feature">
                    <i class="fas fa-lock"></i>
                    <div>
                        <h3>Secure Shopping</h3>
                        <p>Your data and transactions are protected with advanced SSL encryption and security measures.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="team-container">
                <div class="team-member">
                    <div class="member-image">
                        <img src="ephi.jpg" alt="ephi">
                        <!-- <i class="fas fa-user"></i> -->
                    </div>
                    <div class="member-info">
                        <h3>Ephrem Demtse</h3>
                        <p class="position">Web Devloper</p>
                        <p>Tech enthusiast with 3 years in the electronics industry. Sarah's vision drives our innovation and growth.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="bre.jpg" alt="">
                    </div>
                    <div class="member-info">
                        <h3>Berhan Melese</h3>
                        <p class="position">Web Designer</p>
                        <p>Expert in emerging technologies and product development with a passion for cutting-edge innovation.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="dago.jpg" alt="">
                    </div>
                    <div class="member-info">
                        <h3>Degaga Ararsa</h3>
                        <p class="position">Web Devloper</p>
                        <p>Creative strategist who drives brand growth and customer engagement through innovative campaigns.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                       <img src="rahwa.jpg" alt="">
                    </div>
                    <div class="member-info">
                        <h3>Rahwa Awet</h3>
                        <p class="position">Web Devloper</p>
                        <p>Ensures seamless logistics and customer service excellence across all our operations and channels.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <img src="abr.png" alt="">
                    </div>
                    <div class="member-info">
                        <h3>Abrham Abebe</h3>
                        <p class="position">Web Devloper</p>
                        <p>Dedicated to creating exceptional shopping experiences and building lasting customer relationships.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2>Contact Support</h2>
            <div class="contact-content">
                <p>Have questions about our products or need assistance with your order? Our dedicated support team is here to help.</p>
                <p>Visit our <a href="#" style="color: var(--accent);">Contact Us</a> page or email us directly at <strong>support@abyssiniya_market.com</strong>. We typically respond within 2 hours during business hours.</p>
                <a href="#" class="btn">Contact Support</a>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Visit Our Store</h3>
                        <p> Bole Road<br>Addis Ababa Ethiopia</p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <h3>Call Us</h3>
                        <p>+251-924-67-76-21<br>Mon-Fri, 9am-6pm PST</p>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <h3>Email Us</h3>
                        <p>support@abyssiniya.com<br>sales@abyssiniya.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Proof Section -->
    <section class="social-proof">
        <div class="container">
            <h2>Awards & Recognition</h2>
            <p>Our commitment to excellence has been recognized by industry leaders and customers alike.</p>
            <div class="awards">
                <div class="award">
                    <i class="fas fa-trophy"></i>
                    <h3>Top 10 Online Electronics Retailers</h3>
                    <p>Tech Review Magazine</p>
                </div>
                <div class="award">
                    <i class="fas fa-award"></i>
                    <h3>Best Customer Service 2023</h3>
                    <p>E-Commerce Excellence Awards</p>
                </div>
                <div class="award">
                    <i class="fas fa-medal"></i>
                    <h3>Innovation in Retail 2023</h3>
                    <p>Digital Commerce Association</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Abyssiniya Market</h3>
                    <p>Your trusted partner for cutting-edge electronics and technology solutions. We bring innovation to your doorstep.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Deals</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul class="footer-links">
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Returns & Refunds</a></li>
                        <li><a href="#">Warranty Information</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support Center</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Info</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i>Bole Road, Addis Ababa Ethiopia</li>
                        <li><i class="fas fa-phone"></i> +251-923-65-89-53</li>
                        <li><i class="fas fa-envelope"></i> support@abyssinya_market.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Abyssiniya Electronics. All rights reserved. | Designed with <i class="fas fa-heart" style="color: var(--accent);"></i> for tech enthusiasts</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button - FIXED -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                // Skip if it's the back-to-top button
                if(this.classList.contains('back-to-top')) return;
                
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    document.querySelector('.nav-links').classList.remove('active');
                }
            });
        });

        // Back to top button - FIXED
        const backToTopButton = document.querySelector('.back-to-top');
        
        // Show/hide back to top button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });
        
        // Back to top functionality - FIXED
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.pageYOffset > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = '0 5px 20px rgba(0, 0, 0, 0.1)';
            }
        });

        // Animation on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.mission-card, .vision-card, .value-card, .feature, .team-member, .award, .contact-item');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if(elementPosition < screenPosition) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }
            });
        }

        // Set initial state for animated elements
        document.querySelectorAll('.mission-card, .vision-card, .value-card, .feature, .team-member, .award, .contact-item').forEach(element => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        });

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);
    </script>
</body>
</html>