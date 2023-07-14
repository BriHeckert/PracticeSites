// Brianna Heckert
// https://cs4640.cs.virginia.edu/bnh5fh/hw8/
// Sources:
// https://angular.io/guide/built-in-directives
// https://stackoverflow.com/questions/18988198/angular-ng-if-with-multiple-arguments
// https://stackoverflow.com/questions/54370421/angular-ngstyle-show-hide-condition-not-working
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { GameComponent } from './game/game.component';

@NgModule({
  declarations: [
    AppComponent,
    GameComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
