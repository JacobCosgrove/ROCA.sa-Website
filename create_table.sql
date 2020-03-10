-- Create tables with primary keys

CREATE TABLE associations(
    association_id INT not null,
    name VARCHAR(30),
    description VARCHAR(200),
    address VARCHAR(50),
    PRIMARY KEY (association_id)
)

CREATE TABLE companies(
    id_number INT not null,
    name VARCHAR(30),
    address VARCHAR(50),
    description VARCHAR(200),
    PRIMARY KEY (id_number)
)

CREATE TABLE employees(
    employee_id INT not null,
    first_name VARCHAR(15),
    last_name VARCHAR(15),
    email VARCHAR(30),
    address VARCHAR(50),
    resume VARBINARY(10),
    PRIMARY KEY (employee_id)
)

CREATE TABLE job_openings(
    opening_id INT not null,
    description VARCHAR(200),
    date DATE,
    status VARCHAR(10),
    PRIMARY KEY (opening_id)
)

CREATE TABLE applicants(
    applicants_id INT not null,
    first_name VARCHAR(15),
    last_name VARCHAR(15),
    resume VARBINARY(10),
    status_of_application VARCHAR(10),
    PRIMARY KEY (applicants_id)
)

CREATE TABLES search_committees(
    search_committee_id INT not null,
    PRIMARY KEY (search_committee_id)
)

-- Add foreign key columns

ALTER TABLE associations
ADD FOREIGN KEY (id_number) REFERENCES companies(id_number);

ALTER TABLE companies
ADD FOREIGN KEY (employee_id) REFERENCES employees(employee_id),
    FOREIGN KEY (job_opening_id) REFERENCES job_openings(opening_id);

ALTER TABLE employees
ADD FOREIGN KEY (id_number) REFERENCES companies(id_number);

ALTER TABLE job_openings
ADD FOREIGN KEY (company_id) REFERENCES companies(id_number),
    FOREIGN KEY (applicants_id) REFERENCES applicants(applicants_id),
    FOREIGN KEY (search_committee_id) REFERENCES search_committees(search_committee_id);
    
ALTER TABLE search_committees
ADD FOREIGN KEY (employee_id) REFERENCES employees(employee_id),
    FOREIGN KEY (opening_id) REFERENCES job_openings(opening_id);