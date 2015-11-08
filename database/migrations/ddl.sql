CREATE TABLE Producer
(member_id varchar(10),
name varchar(32) NOT NULL,
phone_number varchar(15) NOT NULL,
street varchar(32) NOT NULL,
city   varchar(32) NOT NULL,
state varchar(2) NOT NULL,
password varchar(60) NOT NULL,
remember_token varchar(100),
PRIMARY KEY (member_id),
CHECK (lower(state) IN ('mn', 'mi', 'wi', 'oh', 'pa', 'ny', 'vt', 'me', 'ct', 'ma',
        'nh', ''))
);

CREATE TABLE Product
(product_id int AUTO_INCREMENT,
day_produced DATE,
member_id varchar(10),
quantity float NOT NULL,
use_by DATE,
product_type varchar(5),
CHECK (lower(product_type) IN ('sap', 'syrup')),
PRIMARY KEY (product_id),
FOREIGN KEY (member_id) REFERENCES Producer(member_id)
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

