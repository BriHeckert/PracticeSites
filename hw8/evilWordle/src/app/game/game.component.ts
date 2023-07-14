import { Component, OnInit } from '@angular/core';
import { Guess } from '../guess';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
@Component({
  selector: 'app-game',
  templateUrl: './game.component.html',
  styleUrls: ['./game.component.css']
})
export class GameComponent implements OnInit {

  guessString: string;

  guesses: Array<Guess>;

  guess: Guess;

  answer: string;

  message: string;

  guessCount: number;

  canType: boolean;

  constructor(
    private http:HttpClient
  ) {
    this.guess = new Guess("","",0,0);
    this.answer = "";
    this.guessString = "";
    this.guesses = [];
    this.message = "";
    this.guessCount = 0;
    this.canType = false;
  }

  ngOnInit(): void {
  }

  submitGuess(){
    this.guessCount += 1;
    this.guess.word = this.guess.word.toUpperCase();

  if (this.answer == this.guess.word) {
    // got it right
    this.message = "Congrats you guessed it!";
    this.canType = false;
  } else {
    this.message = "Wrong!";
    // compare lengths
    if (this.guess.word.length === this.answer.length) {
      this.guess.length = this.guess.word + " is the same length as the wordle.";
    } else if (this.guess.word.length < this.answer.length) {
      this.guess.length = this.guess.word + " is too short!";
    } else {
      this.guess.length = this.guess.word + " is too long!";
    }

    // compare locations and characters
    var locationcount = 0;
    var charcount = 0;
    for (let i = 0; i < this.guess.word.length && i < this.answer.length; i++) {
      if (this.answer[i] === this.guess.word[i]) {
        locationcount += 1;
      }
      if (this.answer.includes(this.guess.word[i]) !== false) {
        charcount += 1;
      }
    }
    this.guess.charcount = charcount;
    this.guess.locations = locationcount;
    this.guesses.push(this.guess);
  }
  this.guess = new Guess("","",0,0);
}

  newGame(){
    this.canType = true;
    this.guess = new Guess("","",0,0);
    this.getWord();
    this.guessString = "";
    this.guesses = [];
    this.message = "";
    this.guessCount = 0;
  }

  getWord(){
    this.http.get<any>("https://cs4640.cs.virginia.edu/bnh5fh/hw8/wordle_api.php").subscribe(
      (respData)=>{
        this.answer = respData.toUpperCase();
      }
    )
  }
}
