use asm2;


create table supplier
(
	supplierid int primary key auto_increment,
    companyname nvarchar(50) not null,
	address nvarchar(50) not null,
    region nvarchar(50) not null,
    phone nvarchar(50)
);

create table category
(
	categoryid int primary key auto_increment,
    categoryname nvarchar(50) not null,
    description text
);

create table product 
(
	productid int primary key auto_increment,
    productname nvarchar(50) not null ,
    productimage text,
    supplierid int,
	categoryid int,
    price float,
    discount float,
    constraint fk_product_category foreign key (categoryid) references category(categoryid),
    constraint fk_product_supplier foreign key (supplierid) references supplier(supplierid)
);








create table roles
(
	roleid int not null auto_increment primary key,
    rolename varchar(50) not null
);

alter table userLogin add foreign key (role) references roles(role);

create table userlogin
(
	username varchar(50) primary key,
	password varchar(50) not null,
    fullname varchar(50) not null,
    phone varchar(50),
    email varchar(50),
    role varchar(50)
);

use asm2;
create table temporaryCart (
	username varchar(50),
    productid int,
    timebuy date,
    qty int
);
    
create table orders (
	orderid int auto_increment primary key,
    username varchar(50) not null,
	orderdate datetime,
	constraint fk_orders_user foreign key (username) references userLogin(username)
    
);    

    
create table orderdetail (
	orderid int ,
    productid int,
    qty int,
    primary key(orderid, productid),
    constraint fk_order_orders foreign key (orderid) references orders(orderid),
	constraint fk_order_product foreign key (productid) references product(productid)
);

use asm2;
create table productrating (
	productid int,
    username varchar(50),
    rate float,
    feedback text,
    date datetime,
	primary key (productid, username),
    foreign key (productid) references product(productid),
    foreign key (username) references userLogin(username)
);
    
 use asm2;
 
 SELECT rate,count(*) from productrating group by rating,productid having productid = '1';