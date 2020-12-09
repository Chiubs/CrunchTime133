//import logo from './logo.svg';
import './App.scss';
import React from "react";
import { Login, Register } from "./Components/Login/index";
//import bg from "./CalendarMark.jpg";
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";

import ReactDOM from "react-dom";




//pages
import loginPage from "./Components/Login/login";
import fullCalendar from './Components/Calender/fullCalendar';
import  LoginView  from './Components/Login/LoginView'


class App extends React.Component {
    //Renders the pages in a router after getting their exact path onto a URL
    //URL is rendered at the end of the html, using router and switch functions
    //of react-router-dom to connect the pages
  render() {

    return <Router>
      <Switch>
      <Route exact path="/" component={LoginView}/>
      <Route exact path="/calendar" component={fullCalendar}/>
      
      </Switch>
    </Router>

  }



 
}

export default App;


