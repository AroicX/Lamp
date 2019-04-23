import React, { Component  } from 'react';
import Header from './Header';
import { Link } from 'react-router-dom';
import { getFromStorage, setInStorage }  from '../storage';

class Login extends Component { // eslint-disable-line react/prefer-stateless-function
  constructor(props){
    super(props);
    this.state = {
      phone_no: '',
      password: '',
      remember_me: '',
      token: ''

    };
  }


onChangeFields(event){
  this.setState({
      phone_no: this.refs.phone_no.value,
      password: this.refs.password.value,
      remember_me: this.refs.remember_me.value
    })

}


loginUser(e){
  e.preventDefault();

// Grab state
  this.setState({
    isLoading: true
  });
    console.log(this.state.signInEmail);

  const {
    phone_no,
    password,
  } = this.state;


  // Post the request via api to backend

  fetch('/api/v1/users/signin',{

    method: 'POST',
    headers:{
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      phone_no: phone_no,
      password: password,
    }),
  }).then(res => res.json())
    .then(json => {
      console.log('json', json);
          if (json.success) {
            setInStorage('the_main_app', { token: json.token });
            this.setState({
              isLoading: false,
              phone_no: '',
              password: '',
              token: json.token
            });
          } else {
            this.setState({
              signInError: json.message,
              isLoading: false
            });
          }

    });


}


  render() {
    return (
      <div className="Login">

      <div className="container">
         <div className="row">
         <div className="col-md-3"></div>
           <div className="col-md-6 ">

             <form className="loginCard">
                <h1 className="text-center">Login| <Link to='/register'>Register</Link></h1>
              <section>
               <div className="form-group">
                <label htmlFor="phone_no">Enter Phone Number:</label>
                 <input type="text" ref="phone_no" className="form-control"
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
               /> Remember me <a href="" className="pull-right">forget password?</a></label>

               </div>

               <div className="form-group">
                 <button type="submit" className="btn btn-info ">Login</button>
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


export default Login;
