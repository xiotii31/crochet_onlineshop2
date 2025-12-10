<?php
session_start();
require_once './config/database.php';
require_once './includes/shopalgorithms.php';

$shop = new ShopAlgorithms($pdo);
$featuredProducts = $shop->getFeaturedProducts(6); // Fetch 6 products
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trisha's Cozy Crochet | Handmade with Love</title>
    <!-- External CSS and Fonts from index.html -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
    <style>
        /* Social Media Section */
        .social-section {
            background: linear-gradient(135deg, #fffbf7 0%, #ffe8f0 50%, #ffd9e8 100%);
            padding: 60px 0;
            text-align: center;
        }

        .social-header {
            margin-bottom: 40px;
        }

        .social-header h2 {
            font-size: 2.5rem;
            color: var(--text-dark);
            margin-bottom: 15px;
            background: linear-gradient(135deg, #ffb3c9 0%, #ff8fb3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .social-header p {
            font-size: 1.1rem;
            color: var(--text-medium);
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .social-card {
            background: white;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(255, 143, 179, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            min-width: 200px;
        }

        .social-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 30px rgba(255, 143, 179, 0.3);
        }

        .social-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            transition: all 0.3s ease;
        }

        .social-card.messenger .social-icon {
            background: linear-gradient(135deg, #00B2FF 0%, #006AFF 100%);
        }

        .social-card.instagram .social-icon {
            background: linear-gradient(135deg, #FD5949 0%, #D6249F 50%, #285AEB 100%);
        }

        .social-card:hover .social-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .social-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .social-description {
            font-size: 0.95rem;
            color: var(--text-medium);
            text-align: center;
        }

        .social-card.messenger:hover {
            border: 2px solid #00B2FF;
        }

        .social-card.instagram:hover {
            border: 2px solid #D6249F;
        }

        /* Footer Social Icons */
        .footer-social {
            margin: 30px 0 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer-social a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .footer-social a.messenger {
            background: linear-gradient(135deg, #00B2FF 0%, #006AFF 100%);
        }

        .footer-social a.instagram {
            background: linear-gradient(135deg, #FD5949 0%, #D6249F 50%, #285AEB 100%);
        }

        .footer-social a:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.3);
        }

        @media (max-width: 768px) {
            .social-links {
                flex-direction: column;
                align-items: center;
            }

            .social-card {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="index.php" class="logo">
                <div class="logo-icon">
                    <!-- SVG Logo from index.html -->
                    <svg width="50" height="50" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="35" fill="#ffc1d4" opacity="0.3"/>
                        <circle cx="50" cy="50" r="28" fill="#ffaac8"/>
                        <path d="M 30 35 Q 40 30, 50 35" stroke="#ff8fb3" stroke-width="2" fill="none"/>
                        <path d="M 35 45 Q 45 40, 55 45" stroke="#ff8fb3" stroke-width="2" fill="none"/>
                        <path d="M 40 55 Q 50 50, 60 55" stroke="#ff8fb3" stroke-width="2" fill="none"/>
                        <path d="M 35 65 Q 45 60, 55 65" stroke="#ff8fb3" stroke-width="2" fill="none"/>
                        <line x1="65" y1="25" x2="75" y2="15" stroke="#d4a574" stroke-width="3" stroke-linecap="round"/>
                        <path d="M 75 15 Q 78 12, 75 9" stroke="#d4a574" stroke-width="3" fill="none" stroke-linecap="round"/>
                        <path d="M 70 70 C 70 67, 72 65, 74 65 C 76 65, 78 67, 78 70 C 78 75, 74 78, 74 78 C 74 78, 70 75, 70 70 Z" fill="#ff6b9d"/>
                    </svg>
                </div>
                <div class="logo-text">
                    <span class="logo-name">Trisha's</span>
                    <span class="logo-tagline">Cozy Crochet</span>
                </div>
            </a>
            
            <nav id="mainNav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pages/shop.php">Shop now</a></li>
                    <li><a href="#about">About</a></li>
                </ul>
            </nav>
            
            <div class="header-icons">
                <!-- User Icon Logic -->
                <div class="user">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="pages/account.php" title="My Account"><i class="fas fa-user"></i></a>
                    <?php else: ?>
                        <a href="pages/login.php" title="Login"><i class="fas fa-user"></i></a>
                    <?php endif; ?>
                </div>

                <!-- Cart Icon Logic -->
                <div class="cart">
                    <a href="pages/cart.php">
                        <i class="fas fa-shopping-bag"></i>
                        <?php if (isset($_SESSION['cart_count']) && $_SESSION['cart_count'] > 0): ?>
                            <!-- Using style.css .cart-count class if available, or inline style for visibility -->
                            <span class="cart-count" style="display: flex;"><?= $_SESSION['cart_count'] ?></span>
                        <?php endif; ?>
                    </a>
                </div>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="logout" style="margin-left: 10px;">
                        <a href="pages/logout.php" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Hero Section (From index.html) -->
    <section class="hero" id="home">
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        <div class="container hero-content">
            <div class="hero-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="currentColor"/>
                </svg>
                Handcrafted with Love
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="currentColor"/>
                </svg>
            </div>
            <h1>Every Stitch is a Hug</h1>
            <p>Discover handmade crochet treasures crafted with the softest yarns and overflowing with love. Each piece is unique, thoughtful, and made just for you.</p>
            <div class="hero-buttons">
                <a href="#about" class="btn btn-secondary">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="featured" id="featured">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Bestsellers</span>
                <h2>Featured Products</h2>
                <p>Each piece tells a story of warmth and care</p>
            </div>
            
            <div class="products-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <div class="product-badge">Bestseller</div>
                        <img src="kc.jpg" alt="Crochet Blanket" class="product-img">
                        <div class="product-hover-actions">
          
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-meta">
                            <span class="product-category">Keychains</span>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                        <h3 class="product-title">Amigurumi</h3>
                        <p class="product-description">Cute and handy, perfect for adding charm to your everyday essentials.</p>
                        <div class="product-footer">
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <div class="product-badge new">Bestseller</div>
                        <img src="bh.jpg" alt="Amigurumi" class="product-img">
                        <div class="product-hover-actions">
                            
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-meta">
                            <span class="product-category">Hats</span>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                        <h3 class="product-title">Beanie Hats</h3>
                        <p class="product-description">Warm and stylish, made to keep you cozy in every season.</p>
                        <div class="product-footer">
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <div class="product-badge sale">Bestseller</div>
                        <img src="boq.png" alt="Tote Bag" class="product-img">
                        <div class="product-hover-actions">
                           
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-meta">
                            <span class="product-category">Bouquets</span>
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                        <h3 class="product-title">Flower Bouquets</h3>
                        <p class="product-description">Everlasting blooms, beautifully handcrafted to brighten any moment.</p>
                        <div class="product-footer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="view-all">
                <a href="pages/shop.php" class="btn btn-outline">View All Products</a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us (From index.html) -->
    <section class="why-choose">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Why Us</span>
                <h2>What Makes Us Special</h2>
                <p>More than just crochet - it's a labor of love</p>
            </div>

            <div class="features-grid">
                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="60" height="60" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 25 L60 45 L82 48 L66 63 L70 85 L50 74 L30 85 L34 63 L18 48 L40 45 Z" fill="#ffb3c9" stroke="#ff8fb3" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Premium Quality</h3>
                    <p>We use only the finest, softest yarns sourced from trusted suppliers</p>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="60" height="60" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <path d="M50 30 C30 30, 20 40, 20 55 C20 75, 40 85, 50 90 C60 85, 80 75, 80 55 C80 40, 70 30, 50 30 Z" fill="#ffb3c9" stroke="#ff8fb3" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3>Made with Love</h3>
                    <p>Every stitch carries warmth, care, and attention to detail</p>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="60" height="60" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="30" fill="#ffb3c9" stroke="#ff8fb3" stroke-width="2"/>
                            <path d="M40 50 L48 58 L62 40" stroke="#ff8fb3" stroke-width="4" fill="none" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3>Unique Designs</h3>
                    <p>One-of-a-kind pieces you won't find anywhere else</p>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <svg width="60" height="60" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <rect x="25" y="30" width="50" height="45" rx="5" fill="#ffb3c9" stroke="#ff8fb3" stroke-width="2"/>
                            <path d="M35 30 L35 25 Q35 20, 40 20 L60 20 Q65 20, 65 25 L65 30" stroke="#ff8fb3" stroke-width="2" fill="none"/>
                        </svg>
                    </div>
                    <h3>Custom Orders</h3>
                    <p>Have something special in mind? We'd love to bring it to life</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section (From index.html) -->
    <section class="about" id="about">
        <div class="container">
            <div class="about-wrapper">
                <div class="about-image">
                    <div class="image-decoration"></div>
                    <!-- Ensure you have this image or change the src -->
                    <img src="c.png" alt="About Us"> 
                </div>
                <div class="about-content">
                    <span class="section-badge">Our Story</span>
                    <h2>Where Passion Meets Craft</h2>
                    <p>Hi, I'm Trisha! What started as a simple hobby during cozy winter evenings has blossomed into a heartfelt journey of creating handmade treasures. Each piece I make is infused with love, patience, and the joy of bringing warmth into people's lives.</p>
                    <p>I believe that handmade items carry a special magic - they're not just products, but stories woven with care. Every stitch represents a moment of mindfulness, creativity, and the desire to share something truly special with you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social-section" id="contact">
        <div class="container">
            <div class="social-header">
                <span class="section-badge">Let's Connect</span>
                <h2>Visit or Message Us</h2>
                <p>Follow us on social media or send us a message - we'd love to hear from you!</p>
            </div>

            <div class="social-links">
                <!-- Facebook Messenger Card -->
                <a href="https://www.facebook.com/share/1TyEabp4CQ/" target="_blank" class="social-card messenger">
                    <div class="social-icon">
                        <i class="fab fa-facebook-messenger"></i>
                    </div>
                    <div class="social-name">Messenger</div>
                    <div class="social-description">Chat with us directly on Facebook Messenger</div>
                </a>

                <!-- Instagram Card -->
                <a href="https://www.instagram.com/_tr.xia?igsh=OHBuNmcxdTRldTJo" target="_blank" class="social-card instagram">
                    <div class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="social-name">Instagram</div>
                    <div class="social-description">Follow us for daily crochet inspiration</div>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
           
            <div class="footer-bottom">
                <p>&copy; 2025 Trisha's Cozy Crochet. All rights reserved. Made with <i class="fas fa-heart"></i></p>
            </div>
        </div>
    </footer>

</body>
</html>