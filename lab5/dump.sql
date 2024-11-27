CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          name VARCHAR(255) NOT NULL,
                          price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
                          description TEXT NOT NULL,
                          discount INT DEFAULT NULL
);

CREATE TABLE categories (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            name VARCHAR(255) NOT NULL
);

CREATE TABLE category_product (
                                  category_id INT NOT NULL,
                                  product_id INT NOT NULL,
                                  PRIMARY KEY (category_id, product_id),
                                  FOREIGN KEY (category_id) REFERENCES categories(id),
                                  FOREIGN KEY (product_id) REFERENCES products(id)
);

