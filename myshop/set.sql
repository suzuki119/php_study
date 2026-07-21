create table sets (
    id int AUTO_INCREMENT PRIMARY KEY,
    menu_text text not null,
    price int not null
);

create table setmenu (
    id int AUTO_INCREMENT PRIMARY KEY,
    set_id int not null,
    product_id int not null
);