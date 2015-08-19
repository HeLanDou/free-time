package main

import (
	"database/sql"
	"fmt"
	_ "github.com/go-sql-driver/mysql"
	"log"
	"sort"
)

const (
	TotalSecsion = 31
	//TotalHours   = 76.5
	//MinWorkHours = 40
	MaxWorkHours = 20 //50
	//MinPerson    = 6
	//MaxPerson = 6
)

type Person struct {
	id, name       string
	workHours      float64
	availableHours float64
	iffree         [TotalSecsion]bool
}

var (
	TotalPerson int
	Hours       = [31]float64{
		2, 2, 2, 2, 3.5,
		2, 2, 2, 2, 3.5,
		2, 2, 2, 2, 3.5,
		2, 2, 2, 2, 3.5,
		2, 2, 2, 2, 3.5,
		3, 3, 3.5,
		3, 3, 3.5}
	// MaxPerson = [31]int{
	// 	6, 6, 6, 6, 6,
	// 	6, 6, 6, 6, 6,
	// 	6, 6, 6, 6, 6,
	// 	6, 6, 6, 6, 6,
	// 	6, 6, 6, 6, 6,
	// 	6, 6, 6,
	// 	6, 6, 6}
	MaxPerson = [31]int{
		8, 8, 8, 8, 7,
		8, 8, 8, 8, 7,
		8, 8, 8, 8, 7,
		8, 8, 8, 8, 7,
		8, 8, 8, 8, 7,
		6, 6, 6,
		6, 6, 6}
)

type ByPriority []Person

func (p ByPriority) Len() int      { return len(p) }
func (p ByPriority) Swap(i, j int) { p[i], p[j] = p[j], p[i] }
func (p ByPriority) Less(i, j int) bool {
	return p[i].workHours+p[i].availableHours <
		p[j].workHours+p[j].availableHours
}

type ById []string

func (p ById) Len() int           { return len(p) }
func (p ById) Swap(i, j int)      { p[i], p[j] = p[j], p[i] }
func (p ById) Less(i, j int) bool { return p[i] < p[j] }

func main() {
	persons := ReadSQL()
	TotalPerson = len(persons)
	//schedule :=
	//GetSchedule(persons)
	Printss(persons)
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

	persons := make([]Person, 0, TotalPerson)
	for rows.Next() {
		err = rows.Scan(scanArgs...)
		CheckError(err)

		person := Person{workHours: 0}
		person.id, person.name = string(values[0]), string(values[1])
		//fmt.Print(person.id, " ", person.name, " ")
		for i, col := range values[2:33] {
			if string(col) == "1" {
				person.iffree[i] = true
				person.availableHours += Hours[i]
				//fmt.Print(i, " ")
			} else {
				person.iffree[i] = false
			}
			//fmt.Println(i, ": ", person.iffree[i])
		}
		//fmt.Println(person.name, person.availableHours)
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
		secsion := make([]string, 0, MaxPerson[i])
		for h := 0; h < TotalPerson; h++ {
			person := persons[h]
			if person.iffree[i] {
				persons[h].iffree[i] = false
				persons[h].availableHours -= Hours[i]
				if len(secsion) < MaxPerson[i] && person.workHours+Hours[i] <= MaxWorkHours {
					secsion = append(secsion, person.id+" "+person.name)
					persons[h].workHours += Hours[i]
				}
			}
		}
		sort.Sort(ByPriority(persons))
		schedule = append(schedule, secsion)
	}
	return schedule
}

func PrintSchedule(schedule [][]string, persons []Person) {
	for i, section := range schedule {
		sort.Sort(ById(section))
		// fmt.Print(i, " ")
		fmt.Println(i)
		for _, name := range section {
			fmt.Println(name[9:len(name)], " ")
		}
		fmt.Print("\n")
		// if i < 25 && i%5 == 4 || i == 27 || i == 30 {
		// 	fmt.Println("--------------------------------------------------------------")
		// }
	}
	for _, person := range persons {
		fmt.Println(person.id, person.name, ":", person.workHours, "hours")
	}
}
