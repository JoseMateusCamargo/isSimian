
CREATE TABLE `issimian` (
  `ID` int(11) NOT NULL,
  `dna` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `issimian`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

-
ALTER TABLE `issimian`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
