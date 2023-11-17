CREATE TABLE tbl_products_a189479 (
    fld_product_num varchar(255) NOT NULL DEFAULT '',
    fld_product_name varchar(255)  DEFAULT NULL,
    fld_product_price float DEFAULT NULL,
    fld_product_brand varchar(255) DEFAULT NULL,
    fld_product_condition varchar(255) DEFAULT NULL,
    fld_product_year int(11) DEFAULT NULL,
    fld_product_quantity int(11) DEFAULT NULL,
    fld_product_image varchar(255) NOT NULL,
    PRIMARY KEY (fld_product_num)
);

