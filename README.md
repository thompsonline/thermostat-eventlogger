# thermostat-eventlogger

eventlogger.php
Logs various events from remote devices.
Parameters:
key: security password that must match the key coded in eventlogger.php
device: device name
type: device type
info: informational string (message about the event)

Install:
copy eventlogger.php to /var/www/html/eventlogger/eventlogger.php
Set constants SECURITY_KEY, DB_NAME, DB_USER, DB_PASS

Install table:
CREATE TABLE IF NOT EXISTS `Events` (
`id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(30) NOT NULL,
  `device` char(10) NOT NULL,
  `info` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

ALTER TABLE `Events`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `Events`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

