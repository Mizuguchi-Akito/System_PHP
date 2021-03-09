create table book (
	id int auto_increment primary key,
	name varchar(100) not null,
	costomer_id int not null,
	now(),
);

create table customer (
	id int auto_increment primary key,
	name varchar(30) not null,
	password varchar(30) not null
);

create table borrow (
	id int not null primary key,
	customer_id int not null,
	foreign key(customer_id) references customer(id)
);

create table borrow_detail (
	borrow_id int not null,
	book_id int not null,
	count int not null,
	primary key(borrow_id, book_id),
	foreign key(borrow_id) references borrow(id),
	foreign key(book_id) references book(id)
);

create table favorite (
	customer_id int not null,
	book_id int not null,
	primary key(customer_id, book_id),
	foreign key(customer_id) references customer(id),
	foreign key(book_id) references book(id)
);

INSERT INTO `book` (`id`, `name`, `costomer_id`, `date`, `period`) VALUES
(1, '小説', 2, ),
(2, '漫画', 2),
(3, 'ビジネス本', 3),
(4, '伝記', 3),
(5, '絵本', 3),
(6, '図鑑', null),
(7, '百科事典', null),
(8, '詩歌', null),
(9, '参考書', null),
(10, '哲学書', null);

INSERT INTO `customer` (`id`, `name`, `password`) VALUES
(1, '大原一郎', 'abc'),
(2, '中原二郎', 'def'),
(3, '小原三郎', 'ghi');