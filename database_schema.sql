CREATE DATABASE IF NOT EXISTS crochet_onlineshop CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE crochet_onlineshop;

-- ============================================
-- TABLE 1: USERS
-- Purpose: Store customer and admin account information
-- ============================================
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(20),
  password VARCHAR(255) NOT NULL,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  full_name VARCHAR(100),
  address TEXT,
  is_admin TINYINT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM;

-- Add unique constraints
ALTER TABLE users ADD UNIQUE KEY(username);
ALTER TABLE users ADD UNIQUE KEY(email);

-- ============================================
-- TABLE 2: PRODUCTS
-- Purpose: Store product catalog information
-- ============================================
CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  category VARCHAR(100) NOT NULL,
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM;

-- ============================================
-- TABLE 3: CART
-- Purpose: Store temporary shopping cart items
-- ============================================
CREATE TABLE cart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM;

-- ============================================
-- TABLE 4: ORDERS
-- Purpose: Store completed order information
-- ============================================
CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  total_amount DECIMAL(10,2) NOT NULL,
  shipping_address TEXT NOT NULL,
  payment_method VARCHAR(50) NOT NULL,
  gcash_number VARCHAR(20),
  status VARCHAR(50) DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM;

-- ============================================
-- TABLE 5: ORDER_ITEMS
-- Purpose: Store individual products within each order
-- ============================================
CREATE TABLE order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  product_name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  quantity INT NOT NULL,
  subtotal DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM;

-- ============================================
-- SAMPLE DATA - PRODUCTS
-- ============================================

-- Insert Keychains
INSERT INTO products (name, description, price, stock, category, image) VALUES
('Flower Keychain', 'Cute and handy, perfect for adding charm to your everyday essentials', 50.00, 15, 'Keychains', 'K1.jpg'),
('Ribbon Keychain', 'Cute and handy, perfect for adding charm to your everyday essentials', 65.00, 15, 'Keychains', 'K2.jpg'),
('Baby Octie', 'Cute and handy, perfect for adding charm to your everyday essentials', 55.00, 15, 'Keychains', 'K3.jpg'),
('Tiny Froggo', 'Cute and handy, perfect for adding charm to your everyday essentials', 50.00, 15, 'Keychains', 'K4.jpg'),
('Psyduck', 'Cute and handy, perfect for adding charm to your everyday essentials', 65.00, 15, 'Keychains', 'K5.jpg'),
('Chibby Charm', 'Cute and handy, perfect for adding charm to your everyday essentials', 65.00, 15, 'Keychains', 'K6.jpg'),
('Mini Tulips', 'Cute and handy, perfect for adding charm to your everyday essentials', 65.00, 15, 'Keychains', 'K7.jpg'),
('Bear Head', 'Cute and handy, perfect for adding charm to your everyday essentials', 65.00, 15, 'Keychains', 'K8.jpg'),
('Starla', 'Cute and handy, perfect for adding charm to your everyday essentials', 45.00, 15, 'Keychains', 'K9.jpg');

-- Insert Hats
INSERT INTO products (name, description, price, stock, category, image) VALUES
('Daisy', 'Warm and stylish, made to keep you cozy in every season', 250.00, 10, 'Hats', 'C1.jpg'),
('Strawberry', 'Warm and stylish, made to keep you cozy in every season', 280.00, 10, 'Hats', 'C2.jpg'),
('Cherry', 'Warm and stylish, made to keep you cozy in every season', 270.00, 10, 'Hats', 'C3.jpg'),
('Psyduck', 'Warm and stylish, made to keep you cozy in every season', 270.00, 10, 'Hats', 'C4.jpg'),
('Pompompurin', 'Warm and stylish, made to keep you cozy in every season', 270.00, 10, 'Hats', 'C5.jpg'),
('Urigumi Froggy', 'Warm and stylish, made to keep you cozy in every season', 260.00, 10, 'Hats', 'C6.jpg'),
('Monsters', 'Warm and stylish, made to keep you cozy in every season', 290.00, 10, 'Hats', 'C7.jpg'),
('Fluffy Dragon Head', 'Warm and stylish, made to keep you cozy in every season', 290.00, 10, 'Hats', 'C8.jpg'),
('Spider Man', 'Warm and stylish, made to keep you cozy in every season', 200.00, 10, 'Hats', 'C9.jpg');

-- Insert Bouquets
INSERT INTO products (name, description, price, stock, category, image) VALUES
('Rose Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 165.00, 20, 'Bouquets', 'B1.jpg'),
('Sunflower Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 235.00, 20, 'Bouquets', 'B2.jpg'),
('Daisy Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 75.00, 20, 'Bouquets', 'B3.jpg'),
('Tulip Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 130.00, 20, 'Bouquets', 'B4.jpg'),
('Carnation Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 240.00, 20, 'Bouquets', 'B5.jpg'),
('Lavender Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 120.00, 20, 'Bouquets', 'B6.jpg'),
('Lily Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 230.00, 20, 'Bouquets', 'B7.jpg'),
('Mini Flower Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 449.00, 15, 'Bouquets', 'B8.jpg'),
('Mixed Flower Bouquet', 'Everlasting blooms, beautifully handcrafted to brighten any moment', 650.00, 15, 'Bouquets', 'B9.jpg');

-- ============================================
-- SAMPLE DATA - TEST USER (ADMIN)
-- ============================================
-- Password: password
INSERT INTO users (username, email, password, first_name, last_name, phone, is_admin) VALUES
('admin', 'admin@trishascrochet.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'User', '09123456789', 1);
