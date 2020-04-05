package main

import (
	"encoding/json"
	"log"
	"net/http"
	"strconv"
	"io"
	"bufio"
	"encoding/csv"
)

type Question struct {
	Question  string  `json:"question"`
}

type Answer struct {
	Answer string `json:"answer"`
}

type Answers struct {
	Answers []string `json:"answers"`
}

func HandleAnswer(w http.ResponseWriter, r *http.Request) {
	switch r.Method {
	case "POST":
		decoder := json.NewDecoder(r.Body)
		var question Question
		err := decoder.Decode(&question)
		if err != nil {
			w.WriteHeader(http.StatusInternalServerError)
			return
		}

		res1, _ := http.Get("http://hackaton.lukask.pro//export/questions")
		defer res1.Body.Close()
		
		reader := csv.NewReader(bufio.NewReader(res1.Body))
		var answers []string
		var answer Answer

		for {
			line, error := reader.Read()
			if error == io.EOF {
				break
			} else if error != nil {
				w.WriteHeader(http.StatusInternalServerError)
			}
			if question.Question == line[0] {
				res2, _ := http.Get("http://hackaton.lukask.pro//export/answers")
				defer res2.Body.Close()
				
				decoder := json.NewDecoder(res2.Body)

				err := decoder.Decode(&answers)
				if err != nil {
					w.WriteHeader(http.StatusInternalServerError)
				}
				
				i, err := strconv.Atoi(line[1])
				if err != nil {
					w.WriteHeader(http.StatusInternalServerError)
				}
				
				answer.Answer = answers[i]
				w.Header().Set("Content-Type", "application/json")
				json.NewEncoder(w).Encode(answer)
			}
		}
		
		w.WriteHeader(http.StatusNoContent)
	}
}
func main() {

	http.HandleFunc("/answer", HandleAnswer)

	err := http.ListenAndServe(":1337", nil)
	if err != nil {
        log.Fatal("ListenAndServe: ", err)
	}
}
