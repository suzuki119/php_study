create table review (
    id int AUTO_INCREMENT PRIMARY KEY,
    customer_id int not null,
    product_id int not null,
    rating tinyint not null,
    review_text text not null,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);