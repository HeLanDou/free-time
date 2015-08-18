package main

import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
	"log"
)

const (
	TotalSecsion = 31
	//MinWorkHours = 40
	//MaxWorkHours = 100 //50
	//MinPerson    = 6
	MaxPerson = 8
)

type Person struct {
	id, name  string
	workHours int
	iffree    [TotalSecsion]bool
}

var (
	TotalPerson int
	Hours       = [31]int{
		2, 2, 2, 2, 4,
		2, 2, 2, 2, 4,
		2, 2, 2, 2, 4,
		2, 2, 2, 2, 4,
		2, 2, 2, 2, 4,
		4, 4, 4,
		4, 4, 4}
)

// type ByWorkHours []Person

// func (p ByWorkHours) Len() int           { return len(p) }
// func (p ByWorkHours) Swap(i, j int)      { p[i], p[j] = p[j], p[i] }
// func (p ByWorkHours) Less(i, j int) bool { return p[i].workHours < p[j].workHours }

func main() {
	persons := ReadSQL()
	TotalPerson = len(persons)
	Printss(persons)
	//schedule := GetSchedule(persons)
	// for _, p := range persons {
	// 	fmt.Println(p.name, ": ", p.workHours)
	// }
	//PrintSchedule(schedule, persons)
}

func Printss(persons []Person) {
	for i := 0; i < 31; i++ {
		fmt.Println(i)
		for _, person := range persons {
			if person.iffree[i] == true {
				fmt.Println(person.name)
			}
		}
		fmt.Println()
	}
}

func ReadSQL() []Person {
	var err error
	db, err := sql.Open("mysql", "root:soeasy@/free_time?charset=utf8")
	defer db.Close()
	err = db.Ping()
	CheckError(err)
	rows, err := db.Query("select * from lib")
	defer rows.Close()
	CheckError(err)

	values := make([]sql.RawBytes, TotalSecsion+3)
	scanArgs := make([]interface{}, TotalSecsion+3)
	for i := range values {
		scanArgs[i] = &values[i]
	}

	persons := make([]Person, 0, MaxPerson)
	for rows.Next() {
		err = rows.Scan(scanArgs...)
		CheckError(err)

		person := Person{workHours: 0}
		person.id, person.name = string(values[0]), string(values[1])
		//fmt.Print(person.id, " " , person.name, " ")
		for i, col := range values[2:33] {
			if string(col) == "1" {
				person.iffree[i] = true
				//fmt.Print(i, " ")
			} else {
				person.iffree[i] = false
			}
			//fmt.Println(i, ": ", person.iffree[i])
		}
		persons = append(persons, person)
		//fmt.Print("\n")
	}
	return persons
}

func CheckError(err error) {
	if err != nil {
		log.Fatal(err)
	}
}

func GetSchedule(persons []Person) [][]string {
	schedule := make([][]string, 0, TotalSecsion)
	for i := 0; i < TotalSecsion; i++ {
		secsion := make([]string, 0, MaxPerson)
		for h := 0; h < TotalPerson; {
			person := persons[h]
			if person.iffree[i] {
				secsion = append(secsion, person.id)
				persons[h].workHours += Hours[i]
				persons[h].iffree[i] = false
				for k := h; k+1 < TotalPerson && persons[k].workHours > persons[k+1].workHours; k++ {
					persons[k], persons[k+1] = persons[k+1], persons[k]
				}
				if len(secsion) == MaxPerson {
					break
				}
			} else {
				h++
			}
		}
		schedule = append(schedule, secsion)
	}
	return schedule
}

func PrintSchedule(schedule [][]string, persons []Person) {
	for i, section := range schedule {
		fmt.Print(i, " ")
		for _, name := range section {
			fmt.Print(name, " ")
		}
		fmt.Print("\n")
		if i < 25 && i%5 == 4 || i == 27 || i == 30 {
			fmt.Println("--------------------------------------------------------------")
		}
	}
	for _, person := range persons {
		fmt.Println(person.id, person.name, ":", person.workHours, "hours")
	}
}
