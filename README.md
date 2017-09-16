"# employees" 
# **Development Setup**

Step 1: clone the repo

> git clone https://github.com/bitsofrishabh/employees.git

Step 2: Create database user, database, and load the data from a dump


> mysql>create database employees;
> mysql>use database employees;
> create table employees (EID int NOT NULL AUTO_INCREMENT,name varchar(255) ,title varchar(255),int manager_id,PRIMARY KEY (EID));

