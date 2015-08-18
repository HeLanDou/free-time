package main

import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
)

func main() {
	var err error
	db, err := sql.Open("mysql", "root:soeasy@/free_time?charset=utf8")
	defer db.Close()

	if err != nil {
		fmt.Println(err)
		return
	}

	//err = db.Ping()
	if err != nil {
		fmt.Println(err)
		return
	}

	result, err := db.Exec(`drop table lib`)
	if err != nil {
		fmt.Println(err)
		return
	}

	result, err = db.Exec(`create table lib (
id char(8) not null,
name varchar(10) not null,
Mon_m1 bool,
Mon_m2 bool,
Mon_a1 bool,
Mon_a2 bool,
Mon_e bool,
Tue_m1 bool,
Tue_m2 bool,
Tue_a1 bool,
Tue_a2 bool,
Tue_e bool,
Wed_m1 bool,
Wed_m2 bool,
Wed_a1 bool,
Wed_a2 bool,
Wed_e bool,
Thur_m1 bool,
Thur_m2 bool,
Thur_a1 bool,
Thur_a2 bool,
Thur_e bool,
Fri_m1 bool,
Fri_m2 bool,
Fri_a1 bool,
Fri_a2 bool,
Fri_e bool,
Sat_m bool,
Sat_a bool,
Sat_e bool,
Sun_m bool,
Sun_a bool,
Sun_e bool,
extra varchar(100),
primary key(id) ) default charset=utf8;`)
	if err != nil {
		fmt.Println(err)
		return
	}
	fmt.Println(result)
}
