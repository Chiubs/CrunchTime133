import React from "react"
import logImg from "../../CalendarMark.svg"
import { Link } from "react-router-dom";
import { Register } from "./index";

//used to create the login component in html
export class Login extends React.Component {


  //Constructor, props is passed due to using functions
  //isLogginActive: true is used to intialize the active login state, in-case LoginView doesn't work
  constructor(props) {
    super(props);
    this.state = {
      isLogginActive: true
    };
  }


  //Used to render the base-container for the loginpage
  render() {
    return <div className="base-container" ref={this.props.containerRef}>
      <div className="header">Login</div>
      <div className=" content ">
        <div className="image">
          <img src={logImg} />
        </div>

        {/* Uses a form group to get input from text from the user when logging in */}
        <div className="form">
          <div className="form-group">
            <label htmlFor="username">Username</label>
            <input type="text" name="username" placeholder="username" />
          </div>
          <div className="form-group">
            <label htmlFor="password">Password</label>
            <input type="password" name="password" placeholder="password" />
          </div>
        </div>
      </div>
      <div className="footer">
        {/* { <Link to = "/calendar">  */}
        <button type="button" className="btn">
          Login

                </button>
        {/* </Link> */}
        {/* } */}
      </div>
    </div>
  }

  //Props to the right side just in case the one in loginview is not working
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




export default Login;