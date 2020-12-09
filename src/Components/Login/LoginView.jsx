import './App.scss';
import React from "react";
import { Login, Register } from "./index";
//Router is imported to fix conflicts with login being loaded first and
//breaking the npm start
import { BrowserRouter, Route, Link, Switch } from "react-router-dom";
import {BrowserRouter as Router} from 'react-router-dom';
import ReactDOM from "react-dom";




//pages
import loginPage from "./login";
import fullCalendar from '../Calender/fullCalendar';

//LoginView contains the functions that make the right and left side of the
//Login and registerpage work. It flags for active states and changes to
//Login or Register depending on the active state
//Also mounts the components together
class LoginView extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      isLogginActive: true
    };
  }
//mount is used to mount the left and right side to the main container of the login/register page
  componentDidMount() {
    //Add .right by default
    this.rightSide.classList.add("right");
  }
//Change state is used to change whether the view is looking at register or login
  changeState() {
    const { isLogginActive } = this.state;

    if (isLogginActive) {
      this.rightSide.classList.remove("right");
      this.rightSide.classList.add("left");
    } else {
      this.rightSide.classList.remove("left");
      this.rightSide.classList.add("right");
    }
    this.setState(prevState => ({ isLogginActive: !prevState.isLogginActive }));
  }
 
  
  
  //Renders the containers correctly within the router that connects this 
  //page to the login. Also initializes the login/register containers to connect
  //and move around with active states.
  render() {
    const { isLogginActive } = this.state;
    const current = isLogginActive ? "Register" : "Login";
    const currentActive = isLogginActive ? "login" : "register";
    return (
      <div className="containerBG">
        
        <div className="App">
          <div className="login">
            <div className="container" ref={ref => (this.container = ref)}>
              {isLogginActive && (
                <Login containerRef={ref => (this.current = ref)} />
              )}
              {!isLogginActive && (
                <Register containerRef={ref => (this.current = ref)} />
              )}
            </div>
            <RightSide
              current={current}
              currentActive={currentActive}
              containerRef={ref => (this.rightSide = ref)}
              onClick={this.changeState.bind(this)}
            />
          </div>
          
        </div>
      </div>
    );
  }
}





const RightSide = props => {
  return (
    <div
      className="right-side"
      ref={props.containerRef}
      onClick={props.onClick}
    >
      <div className="inner-container">
        <div className="text">{props.current}</div>
      </div>
    </div>
  );
};

export default LoginView;


