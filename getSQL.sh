#!/bin/bash
ssh root@128.199.88.2 "mysqldump -u root -p free_time > test.sql"
scp root@128.199.88.2:/root/test.sql ./
mysql -u root -p free_time < test.sql
rm test.sql