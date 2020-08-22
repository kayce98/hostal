use hospedaje;

create table persons(
	id int unsigned not null auto_increment primary key,
    name varchar(250),
    surname varchar(250),
    dni int unsigned unique
);

create table customers(
	id int unsigned not null auto_increment primary key,
    observaciones varchar(500),
    tipo varchar(10),
    frequency int,
    person_id int unsigned,
    foreign key(person_id) references persons(id)
);

create table receptionists(
	id int unsigned not null auto_increment primary key,
    user varchar(50),
    pasword varchar(8),
    is_enabled bool, 
    person_id int unsigned,
    foreign key(person_id) references persons(id)
);

create table manager(
	id int unsigned not null auto_increment primary key,
    user varchar(50),
    pasword varchar(8),
    is_enable bool,
    person_id int unsigned,
    foreign key(person_id) references persons(id)
);

create table bedrooms(
	id int unsigned not null auto_increment primary key,
    nro int unsigned,
    nro_beds int unsigned,
    size_beds varchar(20),
    floor int unsigned,
    is_bath bool,
    price double
);

create table recervations(
	id int unsigned not null auto_increment primary key,
    nro_persons int,
    phone varchar(30),
    attention datetime,
    place_of_origin varchar(250),
    stay date,
    departure date,
    estado varchar(50),
    customer_id int unsigned,
    foreign key(customer_id) references customers(id),
    receptionist_id int unsigned,
    foreign key(receptionist_id)references receptionists(id)
);

create table bedrooms_recervations(
	id int unsigned not null auto_increment primary key,
    recervation_id int unsigned,
    foreign key(recervation_id)references recervations(id),
    bedroom_id int unsigned,
    foreign key(bedroom_id) references bedrooms(id)
);

create table logbook(
	id int unsigned not null auto_increment primary key,
    place_of_origin varchar(250),
	observations varchar(250),
    
    stay date,
    entry datetime,
    departure datetime,
    
    bedroom_id int unsigned,
    foreign key(bedroom_id) references bedrooms(id),
    customer_id int unsigned,
    foreign key(customer_id) references customers(id),
    receptionist_id int unsigned,
    foreign key(receptionist_id)references receptionists(id)
);

create table payments(
	id int unsigned not null auto_increment primary key,
    datetime_payment datetime,
	customer_id int unsigned,
    foreign key(customer_id) references customers(id),
    receptionist_id int unsigned,
    foreign key(receptionist_id)references receptionists(id)
);

create table bedrooms_payments(
	id int unsigned not null auto_increment primary key,
    bedroom_id int unsigned,
    foreign key(bedroom_id) references bedrooms(id),
    payment_id int unsigned,
    foreign key(payment_id)references payments(id)
);

create table bedrooms_payments_stay(
	id int unsigned not null auto_increment primary key,
    fecha date,
    bedroom_amount double,
    additional_amount double,
    total_amount double,
    bedroom_payment_id int unsigned not null,
    foreign key(bedroom_payment_id) references bedrooms_payments(id)
);
