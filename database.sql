-- CSM Task Manager - Full Database Setup with Demo Data
-- Run this file in phpMyAdmin or MySQL CLI to set up the project

-- Database is created automatically by Docker via MYSQL_DATABASE env var

-- --------------------------------------------------------
-- Table: task
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `task` (
  `main_ID`   int(11)      NOT NULL AUTO_INCREMENT,
  `task_ID`   varchar(255) NOT NULL,
  `ST`        varchar(255) DEFAULT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `esc_grp`   varchar(255) DEFAULT NULL,
  `esc_time`  varchar(255) DEFAULT NULL,
  `severity`  varchar(255) DEFAULT NULL,
  `stat`      varchar(255) DEFAULT NULL,
  `end_t`     varchar(255) DEFAULT NULL,
  `mail_ref`  varchar(255) DEFAULT NULL,
  `history`   text         DEFAULT NULL,
  `updt`      varchar(255) DEFAULT NULL,
  `user`      varchar(255) DEFAULT NULL,
  `uuser`     varchar(255) DEFAULT NULL,
  PRIMARY KEY (`main_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Table: user
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id`       int(11)     NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Demo Users (password: admin123)
-- --------------------------------------------------------
INSERT INTO `user` (`username`, `password`) VALUES
('admin',   'admin123'),
('john.doe', 'pass1234'),
('jane.smith', 'pass5678');

-- --------------------------------------------------------
-- Demo Task Data
-- --------------------------------------------------------
INSERT INTO `task` (`task_ID`, `ST`, `task_name`, `esc_grp`, `esc_time`, `severity`, `stat`, `end_t`, `mail_ref`, `history`, `updt`, `user`, `uuser`) VALUES
('202503250830', '03/25/2026 08:30 AM', 'ERS Health check',                    'IN',                   '03/25/2026 09:30 AM', 'Critical', 'Pending', NULL,                  'REF-001', '2026/03/25 08:30 User: admin ERS health check initiated.</br>', 'ERS nodes showing degraded performance, escalated to IN team.',  'admin',      ''),
('202503250945', '03/25/2026 09:45 AM', 'Sudden ERS SR droped',                'VAS & DO',             '03/25/2026 10:45 AM', 'Major',    'Pending', NULL,                  'REF-002', '2026/03/25 09:45 User: john.doe SR drop detected on ERS.</br>',  'SR dropped by 15%, monitoring in progress.',                     'john.doe',   ''),
('202503251100', '03/25/2026 11:00 AM', 'DPDP Charging/Connectivity issue',    'FS Operations',        '03/25/2026 12:00 PM', 'Major',    'Pending', NULL,                  'REF-003', '2026/03/25 11:00 User: jane.smith DPDP issue reported.</br>',    'Charging failure for postpaid customers, team notified.',        'jane.smith', ''),
('202503241500', '03/24/2026 03:00 PM', 'Link Down With IGW',                  'ICX',                  '03/24/2026 04:00 PM', 'Critical', 'Done',    '03/24/2026 06:30 PM', 'REF-004', '2026/03/24 15:00 User: admin IGW link down detected.</br>2026/03/24 18:30 User: john.doe Link restored after router restart.</br>', 'Link restored. Root cause: router config mismatch.', 'admin', 'john.doe'),
('202503241800', '03/24/2026 06:00 PM', 'Alarms in vVSMSC',                   'IN',                   '03/24/2026 07:00 PM', 'Minor',    'Done',    '03/24/2026 08:15 PM', 'REF-005', '2026/03/24 18:00 User: jane.smith vVSMSC alarm raised.</br>2026/03/24 20:15 User: jane.smith Alarm cleared after node restart.</br>', 'Alarm cleared. Node restarted successfully.', 'jane.smith', 'jane.smith'),
('202503250200', '03/25/2026 02:00 AM', 'ERS Dump Missing',                   'IN',                   '03/25/2026 03:00 AM', 'Major',    'Pending', NULL,                  'REF-006', '2026/03/25 02:00 User: admin ERS dump not received.</br>',       'Dump missing for last 2 cycles, IN team investigating.',         'admin',      ''),
('202503250700', '03/25/2026 07:00 AM', 'Poor Browsing SR',                   'ADN',                  '03/25/2026 08:00 AM', 'Major',    'Pending', NULL,                  'REF-007', '2026/03/25 07:00 User: john.doe Browsing SR degradation noted.</br>', 'Browsing SR below threshold, ADN team alerted.',              'john.doe',   ''),
('202503231200', '03/23/2026 12:00 PM', 'GPAY DB Purging',                    'Summit Communications','03/23/2026 01:00 PM', 'Minor',    'Done',    '03/23/2026 03:45 PM', 'REF-008', '2026/03/23 12:00 User: jane.smith GPAY DB purge scheduled.</br>2026/03/23 15:45 User: jane.smith Purge completed successfully.</br>', 'DB purge completed. Space freed: 45GB.', 'jane.smith', 'jane.smith'),
('202503250600', '03/25/2026 06:00 AM', 'Connectivity Problem with SMSC/NGW', 'VAS & DO',             '03/25/2026 07:00 AM', 'Critical', 'Pending', NULL,                  'REF-009', '2026/03/25 06:00 User: admin SMSC connectivity issue.</br>',     'SMS delivery failing, SMSC team engaged.',                       'admin',      ''),
('202503221000', '03/22/2026 10:00 AM', 'Customer Calling problem',           'Ericsson',             '03/22/2026 11:00 AM', 'Major',    'Done',    '03/22/2026 02:00 PM', 'REF-010', '2026/03/22 10:00 User: john.doe Call drop complaints received.</br>2026/03/22 14:00 User: john.doe Issue resolved after Ericsson patch.</br>', 'Resolved. Ericsson applied hotfix on MSC node.', 'john.doe', 'john.doe');
