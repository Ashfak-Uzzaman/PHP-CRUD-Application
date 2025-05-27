<?php

define("EMAIL_REGX", "/^(cse|eee|low)_[0-9]{15}@lus.ac.bd$/");
define("NAME_REGX", "/^[a-zA-Z\s]+$/");
define("PASSWORD_REGX", "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/");
define("DATE_OF_BIRTH_REGX", "/^\d{1,2}\/\d{1,2}\/\d{2,4}$/");
define("BATCH_REGX", "/^[0-9]{2,3}-[A-Z]$/");
define("DEPARTMENT_REGX", "/^(cse|eee|low|CSE|EEE|LOW)$/");


define("EMAIL_REGX_HTML", "^(cse|eee|low)_[0-9]{15}@lus.ac.bd$");
define("NAME_REGX_HTML", "^[a-zA-Z\s]+$");
define("DATE_OF_BIRTH_REGX_HTML", "^\d{1,2}\/\d{1,2}\/\d{2,4}$");
define("BATCH_REGX_HTML", "^[0-9]{2,3}-[A-Z]$");
define("DEPARTMENT_REGX_HTML", "^(cse|eee|low|CSE|EEE|LOW)$");
define("PASSWORD_REGX_HTML", "^\S+$");
?>