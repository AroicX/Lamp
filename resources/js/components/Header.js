import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class Header extends Component {
  render() {
    return (
      <div className="Header">
        <div className="banner">
          <nav className="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <Link className="navbar-brand" to="/"><img src="./images/lamplogo.png" className="logo" /></Link>
            <button className="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span className="navbar-toggler-icon"></span>
            </button>

            <div className="navbar-collapse collapse" id="navbarsExampleDefault" >
              <ul className="navbar-nav mr-auto">
                <li className="nav-item"><Link className="nav-link" to="/">Buy Electricity</Link></li>
                <li className="nav-item"><Link className="nav-link" to="/">FAQ</Link></li>
                <li className="nav-item"><Link className="nav-link" to="/">Contact</Link></li>
                <li className="nav-item"><Link className="nav-link" to="/">24 Hour Support</Link></li>
                <li className="nav-item"><Link className="nav-link" to="/">0908-749-3044</Link></li>
                <Link className="nav-link" to="/login"><button className="btn btn-danger btn-login">LOGIN </button></Link>

              </ul>

            </div>
          </nav>
        </div>

      
      </div>
    );
  }
}


export default Header;
