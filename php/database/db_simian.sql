
CREATE TABLE `db_simian` (
  `dna` varchar(250) NOT NULL,
  `status_dna` tinyint(1) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `db_simian`
  ADD PRIMARY KEY (`dna`),
  ADD KEY `dna` (`dna`);
COMMIT;