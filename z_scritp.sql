

  ALTER TABLE `boardtype`  ADD`orderby` int(11) NOT NULL DEFAULT '100' COMMENT 'DESC1-100';
  ALTER TABLE `boardtype`  ADD `enable` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y'; 
  ALTER TABLE `boardtype`  ADD `deleted` int(11) NOT NULL DEFAULT '0' COMMENT 'deleted=1';
  ALTER TABLE `boardtype`  ADD `create_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DLAdmin';
 ALTER TABLE `boardtype`  ADD  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP  ;
 ALTER TABLE `boardtype`  ADD  `update_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DLAdmin' ;
 ALTER TABLE `boardtype`  ADD  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ;