import React, { Component  } from 'react';
import Header from './Header';
import { Link } from 'react-router-dom';
import axios from 'axios';

class Register extends Component { // eslint-disable-line react/prefer-stateless-function
  constructor(props){
    super(props);
    this.state = {
      fullname: '',
      phone_no: '',
      password: '',
      signUpError: ''

    };
  }


onChangeFields(event){
  this.setState({
      fullname: this.refs.fullname.value,
      phone_no: this.refs.phone_no.value,
      password: this.refs.password.value
    })

}

SignUpUser(e){
    // Grab state
    e.preventDefault();
    const data = {
    fullname: this.state.fullname,
    phone_no: this.state.phone_no,
    password: this.state.password,
    };


    this.setState({
      isLoading: true
    });

    // Post the request via api to backend
    axios
    .post('/api/v1/users/signup', data)
    .then(res => res.json())
      // .then(json => {
      //       if (json.success) {
      //         console.log(json.message);
      //         this.setState({
      //           signUpError: json.message,
      //           isLoading: false,
      //           fullname: '',
      //           phone_no: '',
      //           password: '',
      //           logoutSuccess: ''
      //         });
      //       } else {
      //         this.setState({
      //           signUpError: json.message,
      //           isLoading: false
      //         });
      //
      //       }
      //
      // });
      .catch((err) => {
        console.error("Failed to get JSON from Google API", err);
      })


}




  render() {
    return (
      <div className="Register">

      <div className="container">
         <div className="row">
         <div className="col-md-3"></div>
           <div className="col-md-6 ">

             <form onSubmit={this.SignUpUser.bind(this)} className="loginCard">
                <h1 className="text-center">Register...| <Link to='/login'>Login </Link></h1>
              <section>
               <div className="form-group">
                <label htmlFor="fullname">Enter Fullname:</label>
                 <input type="text" ref="fullname" className="form-control"
                  placeholder="John Doe"
                  onChange={this.onChangeFields.bind(this)}

                 />
               </div>
               <div className="form-group">
                <label htmlFor="phone_no">Enter Phone Number:</label>
                 <input type="number" ref="phone_no" className="form-control"
                  placeholder="+234 000 0000 000"
                  onChange={this.onChangeFields.bind(this)}

                 />
               </div>


               <div className="form-group">
                <label htmlFor="password">Enter Password:</label>
                 <input type="password" ref="password" className="form-control"
                 onChange={this.onChangeFields.bind(this)}
                 />
               </div>

               <div className="form-group">
               <label><input type="checkbox" ref="remember_me" className="form-checkbox"
               onChange={this.onChangeFields.bind(this)}
               /> Remember me </label>

               </div>

               <div className="form-group">
                 <button type="submit" className="btn btn-info ">Register</button>

               </div>
              </section>


             </form>
           </div>
           <div className="col-md-3"></div>
         </div>
      </div>


      </div>
    );
  }
}


export default Register;
