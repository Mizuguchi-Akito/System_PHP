create table book (
	id int auto_increment primary key,
	name varchar(100) not null,
	customer_id int not null,
	date date,
	foreign key(customer_id) references customer(id)
);

create table customer (
	id int auto_increment primary key,
	name varchar(30) not null,
	password varchar(30) not null
);

create table borrow (
	customer_id int not null,
	book_id int not null,
	date date,
	primary key(customer_id, book_id),
	foreign key(customer_id) references customer(id),
	foreign key(book_id) references book(id)
);

create table favorite (
	customer_id int not null,
	book_id int not null,
	primary key(customer_id, book_id),
	foreign key(customer_id) references customer(id),
	foreign key(book_id) references book(id)
);

INSERT INTO `book` (`id`, `name`, `customer_id`, `date`) VALUES
(1, '小説', , ),
(2, '漫画', , ),
(3, 'ビジネス本', , ),
(4, '伝記', , ),
(5, '絵本', , ),
(6, '図鑑', , ),
(7, '百科事典', , ),
(8, '詩歌', , ),
(9, '参考書', , ),
(10, '哲学書', , );

INSERT INTO `customer` (`id`, `name`, `password`) VALUES
(1, '大原一郎', 'abc'),
(2, '中原二郎', 'def'),
(3, '小原三郎', 'ghi');