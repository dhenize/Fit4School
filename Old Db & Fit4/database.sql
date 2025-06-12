CREATE TABLE `students` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);


INSERT INTO `students` (`email`, `password`) VALUES
('marc@pasquin.edu', 'marcP@squin00');
('dhenize@lopez.edu', 'Dhenizelopez00!');

ALTER TABLE `students`
  ADD PRIMARY KEY (`email`);
COMMIT;

CREATE TABLE admins (
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admins (email, password) VALUES 
('admin@123.com', '@Dmin1234');