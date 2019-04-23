import React, { Component } from 'react'
import { Link } from 'react-router-dom';
import { BrowserRouter, Route } from 'react-router-dom'
import Header from './Header';


class Home extends Component {

constructor(props){
  super(props);
  this.state = {
    isLoading: true,
    phone_no: ''
  }

  this.onChangeFields = this.onChangeFields.bind(this);

}

componentDidMount(){
  setTimeout(() => {
    this.setState({
      isLoading: false
    })
  },3000);


}

onChangeFields(event){

    this.setState({
      phone_no: event.target.value
    })
  // alert('hey');

  const state = this.state;
  console.log(state);
}

handleSubmit(e){
  e.preventDefault();
  console.log('state active');
  this.setState({
    phone_no: this.refs.phone_no.value
  });

  const userInfo = this.state.phone_no;


  // alert(this.state.phone_no);
}

  render () {
    const {isLoading} = this.state;
    if (isLoading) {
      return(
         <div id="loader-wrapper">
            <div id="loader"></div>

            <div className="loader-section section-left"></div>
             <div className="loader-section section-right"></div>

        </div>
      );
    }
    return (
    <div className="Home">
        <Header/>
          <div className="space"></div>
        <div className="container">
           <div className="row">
             <div className="col-md-6 col-sm-12 wrapper">
               <h4 className="text-white">Purchase electricity from <br/>the comfort of your home</h4>
               <p className="text-white" id="errors">Enter your phone number to begin</p>
               <form onSubmit={this.handleSubmit.bind(this)}>

                 <div className="form-group">
                   <input  className="form-control form-custom" type="number" placeholder="000-000-0000"
                    autoFocus="on" name="phone_no" title="Please enter your Phone Number"
                    value={this.state.phone_no}
                    onChange={this.onChangeFields.bind(this)}/>
                 </div>

                 <br/>
                 <div className="form-group">
                 <button id="continue" className="btn btn-success btn-block btn-continue">Continue</button>

                 </div>
               </form>
             </div>
           </div>
      </div>


    </div>
    )
  }
}

export default Home;
