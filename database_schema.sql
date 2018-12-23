-----------Creation-----------

create database Disasters
Go

use Disasters;

---------Table Creation---------

create table Disaster
(
  name varchar(20),
  possible_causes text,
  precautions text,
  no_of_prev_occur int default 0,
  primary key (name)
)

create table Incident
(
  id int identity(1,1),
  eco_loss int default 0,
  year int not null check (year < 2019),
  month int not null check (month > 0 AND month < 13),
  day int not null check (day > 0 AND day < 32),
  description text,
  location varchar(60) not null,
  name varchar(20),
  type varchar(20),
  primary key (id),
  foreign key (type) references Disaster
  on delete set null on update cascade
)

create table Natural_Disaster
  (
    id int,
    freq int default 1,
    physical_parameters text,
    primary key (id),
    foreign key (id) references Incident
    on delete cascade on update cascade
  )

create table Human_Made
  (
    id int,
    causes text,
    primary key (id),
    foreign key (id) references Incident
    on delete cascade on update cascade
  )

create table Person
  (
    ssn varchar(14),
    name varchar(20) not null,
    age int,
    gender int check (gender in (0,1)),
    address varchar(60),
    primary key (ssn)
  )

create table Criminal
  (
    ssn varchar(14),
    no_of_crimes int default 1,
    current_state int check (current_state in (0,1)),
    no_of_victims int default 0,
    primary key (ssn),
    foreign key (ssn) references Person
    on delete cascade on update cascade
  )

create table Casualty
  (
    ssn varchar(14),
    deg_of_loss varchar(10) not null,
    primary key (ssn),
    foreign key (ssn) references Person
    on delete cascade on update cascade
  )

create table Government_Representative
  (
    ssn varchar(14),
    username varchar(20) not null,
    password varchar(60) not null,
    data_of_join datetime default GETDATE(),
    primary key (ssn),
    foreign key (ssn) references Person
    on delete no action on update no action
  )

create table Citizen
  (
    ssn varchar(14),
    username varchar(20) not null,
    password varchar(60) not null,
    data_of_join datetime default GETDATE(),
    trust_level int not null default 0,
    primary key (ssn),
    foreign key (ssn) references Person
    on delete cascade on update cascade
  )

create table Admin
  (
    ssn varchar(14),
    username varchar(20) not null,
    password varchar(60) not null,
    no_banned_users int default 0,
    no_added_admins int default 0,
    primary key (ssn),
    foreign key (ssn) references Person
    on delete cascade on update cascade
  )

create table Report
  (
    report_id int identity(1,1),
    content text not null,
    report_date datetime default GETDATE(),
    incident_id int,
    govn_ssn varchar(14),
    citizen_ssn varchar(14),
    primary key (report_id),
    foreign key (incident_id) references Incident on delete cascade on update cascade,
    foreign key (govn_ssn) references Government_Representative on delete no action on update no action,
    foreign key (citizen_ssn) references Citizen on delete set null on update cascade
  )

create table Discussion
  (
    dics_id int identity(1,1),
    answer text,
    question text not null,
    incident_id int,
    govn_ssn varchar(14),
    citizen_ssn varchar(14),
    primary key (dics_id),
    foreign key (incident_id) references Incident on delete cascade on update cascade,
    foreign key (govn_ssn) references Government_Representative on delete no action on update no action,
    foreign key (citizen_ssn) references Citizen on delete set null on update cascade
  )

create table Casualty_Incident
  (
    incident_id int,
    casualty_ssn varchar(14),
    primary key ( incident_id , casualty_ssn),
    foreign key (incident_id) references Incident on delete cascade on update cascade,
    foreign key (casualty_ssn) references Casualty on delete cascade on update cascade
  )

create table Criminal_HM_Incident
    (
      criminal_ssn varchar(14),
      hm_incident_id int,
      primary key ( criminal_ssn , hm_incident_id),
      foreign key (criminal_ssn) references Criminal on delete cascade on update cascade,
      foreign key (hm_incident_id) references Human_Made on delete cascade on update cascade
    )
