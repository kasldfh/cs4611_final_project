CREATE TABLE Product_type
(type_id  int AUTO_INCREMENT,
type_name  varchar(20) NOT NULL,
PRIMARY KEY (type_id)
);

CREATE TABLE Producer
(member_id varchar(10),
name varchar(32) NOT NULL,
phone_number varchar(15) NOT NULL,
street varchar(32) NOT NULL,
city   varchar(32) NOT NULL,
state varchar(2) NOT NULL,
email varchar(80) NOT NULL,
PRIMARY KEY (member_id),
CHECK (lower(state) IN ('mn', 'mi', 'wi', 'oh', 'pa', 'ny', 'vt', 'me', 'ct', 'ma',
        'nh', '')),
ON DELETE CASCADE
);

CREATE TABLE Product
(product_id int AUTO_INCREMENT,
post_date  DATE,
day_produced DATE,
member_id varchar(10),
batch_id varchar(80) UNIQUE,
price float NOT NULL,
quantity float NOT NULL,
use_by DATE,
product_type_id int,
PRIMARY KEY (product_id),
FOREIGN KEY (member_id) REFERENCES Producer(member_id),
FOREIGN KEY (product_type_id) REFERENCES Product_type(type_id)
);

CREATE TABLE Reserve
(reserve_id integer AUTO_INCREMENT, 
product_id  int,
reciever_id varchar(10),
date_sent DATE NOT NULL,
quantity float NOT NULL,
expected_arrival  DATE,
PRIMARY KEY (reserve_id),
FOREIGN KEY (reciever_id) REFERENCES Producer(member_id),
FOREIGN KEY (product_id) REFERENCES Product(product_id)
);

