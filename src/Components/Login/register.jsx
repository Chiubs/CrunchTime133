import React from "react"
import logImg from "../../CalendarMark.svg"

export class Register extends React.Component{

    //constructor, passes props to use functions
constructor(props)
{
    super(props);
}

//renders the register page via html
render(){
    return(
    <div className="base-container" ref={this.props.containerRef}>
        <div className="header">Register</div>
        <div className=" content ">
            <div className="image">
                {/* logimg is used here because  we get it from outside the 
                src folder and need to import*/}
                <img src={logImg} />
            </div>
            <div className="form">
            <div className="form-group">

                {/* Used to intialize forms and place to put text
                when inputting data for the register page, does not have the
                proper registration post-method for PHP */}
                    <label htmlFor="First Name">First Name</label>
                    <input type="First Name" name="First Name" placeholder="First Name"/>
                </div><div className="form-group">
                    <label htmlFor="Last Name">Last Name</label>
                    <input type="Last Name" name="Last Name" placeholder="Last Name"/>
                </div>
            <div className="form-group">
                    <label htmlFor="Email">Email</label>
                    <input type="email" name="Email" placeholder="Email"/>
                </div>
                <div className="form-group">
                    <label htmlFor="username">Username</label>
                    <input type="text" name="username" placeholder="username"/>
                </div>
                <div className="form-group">
                    <label htmlFor="password">Password</label>
                    <input type="password" name="password" placeholder="password"/>
                </div>
            </div>
        </div>

        {/* A footer used at the button to signal a submit button that calls to the database
        A database is not connected and is used just for show */}
        <div className="footer">
            <button type="button" className="btn"> Register </button>
         
        </div>
    </div>
    );
}
}